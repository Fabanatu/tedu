<?php
// Step 1: Receive input via REQUEST (to handle both GET and POST)
$msisdn = $_REQUEST['msisdn'];
$subcode = $_REQUEST['subcode'];
$shortcode = $_REQUEST['shortcode'];
$additional_field = $_REQUEST['additional_field']; // Adjust field name as required

include 'connection.php';

// Initialize response data
$response = [
    'status' => false,
    'data' => []
];

// Step 2: Check if the subcode exists in the partner table
$partner_query = $conn->prepare("SELECT productname, replymessage, price, validity FROM partners WHERE subcode = ?");
$partner_query->bind_param('s', $subcode);
$partner_query->execute();
$partner_result = $partner_query->get_result();

if ($partner_result->num_rows > 0) { // If the subcode or service exists
    // Subcode exists, fetch details
    $partner_data = $partner_result->fetch_assoc();
    $productname = $partner_data['productname'];
    $replymessage = $partner_data['replymessage'];
    $price = $partner_data['price'];
    $validity = (int)$partner_data['validity']; // Number of days for validity

    // Step 3: Check if msisdn and subcode exist together in the subscribe table
    $subscribe_query = $conn->prepare("SELECT status, expiry_date FROM subscribe WHERE msisdn = ? AND subcode = ?");
    $subscribe_query->bind_param('ss', $msisdn, $subcode);
    $subscribe_query->execute();
    $subscribe_result = $subscribe_query->get_result();

    if ($subscribe_result->num_rows > 0) { // If phone number and subcode exist
        // msisdn found in subscribe table
        $subscribe_data = $subscribe_result->fetch_assoc();
        $status = (int)$subscribe_data['status'];
        $current_expiry_date = (int)$subscribe_data['expiry_date'];
        $current_time = time();

        if ($status == 1) {
            // Update expiry date by adding validity period in seconds
            $new_expiry_date = $current_expiry_date + ($validity * 86400); // 86400 seconds in a day

            // Insert into subscription table
            $subscription_insert = $conn->prepare("INSERT INTO subscription (msisdn, subcode, shortcode, additional_field, start_date, expiry_date) VALUES (?, ?, ?, ?, ?, ?)");
            $current_time = time();
            $subscription_insert->bind_param('ssssii', $msisdn, $subcode, $shortcode, $additional_field, $current_time, $new_expiry_date);
            $subscription_insert->execute();

            // Update expiry date in subscribe table
            $subscribe_update = $conn->prepare("UPDATE subscribe SET expiry_date = ? WHERE msisdn = ? AND subcode = ?");
            $subscribe_update->bind_param('iss', $new_expiry_date, $msisdn, $subcode);
            $subscribe_update->execute();

            $response['status'] = true;
            $response['data'] = ['message' => 'Subscription renewed and expiry date updated.'];
        } else {
            // Status is 0, change to 1 and perform subscription actions
            $new_expiry_date = $current_time + ($validity * 86400);

            // Update status to 1 and expiry date in subscribe table
            $subscribe_update = $conn->prepare("UPDATE subscribe SET status = 1, expiry_date = ? WHERE msisdn = ? AND subcode = ?");
            $subscribe_update->bind_param('iss', $new_expiry_date, $msisdn, $subcode);
            $subscribe_update->execute();

            // Insert into subscription table
            $subscription_insert = $conn->prepare("INSERT INTO subscription (msisdn, subcode, shortcode, additional_field, start_date, expiry_date) VALUES (?, ?, ?, ?, ?, ?)");
            $current_time = time();
            $subscription_insert->bind_param('ssssii', $msisdn, $subcode, $shortcode, $additional_field, $current_time, $new_expiry_date);
            $subscription_insert->execute();

            $response['status'] = true;
            $response['data'] = ['message' => 'Subscription reactivated and expiry date updated.'];
        }
    } else {
        // msisdn and subcode not found in subscribe table, add new subscription
        $current_time = time();
        $new_expiry_date = $current_time + ($validity * 86400); // Epoch format

        // Insert into subscribe table
        $subscribe_insert = $conn->prepare("INSERT INTO subscribe (msisdn, subcode, status, start_date, expiry_date) VALUES (?, ?, ?, ?, ?)");
        $status = 1; // New subscription status is active
        $subscribe_insert->bind_param('ssiss', $msisdn, $subcode, $status, $current_time, $new_expiry_date);
        $subscribe_insert->execute();

        // Insert into subscription table
        $subscription_insert = $conn->prepare("INSERT INTO subscription (msisdn, subcode, shortcode, additional_field, start_date, expiry_date) VALUES (?, ?, ?, ?, ?, ?)");
        $subscription_insert->bind_param('ssssii', $msisdn, $subcode, $shortcode, $additional_field, $current_time, $new_expiry_date);
        $subscription_insert->execute();

        // Send welcome message
        sendWelcomeMessage($msisdn, $productname, $price, $validity, $new_expiry_date, $subcode);

        $response['status'] = true;
        $response['data'] = ['message' => 'New subscription created and welcome message sent.'];
    }
} else {
    $response['data'] = ['message' => 'Subcode does not exist in the partner table.'];
}

// Close the prepared statements and database connection
$partner_query->close();
//$subscribe_query->close();
if (isset($subscription_insert)) $subscription_insert->close();
if (isset($subscribe_update)) $subscribe_update->close();
if (isset($subscribe_insert)) $subscribe_insert->close();
$conn->close();

// Output the response
echo json_encode($response);

// Function to send a welcome message (mockup)
function sendWelcomeMessage($msisdn, $productname, $price, $validity, $new_expiry_date, $subcode) {
    // Convert epoch format to 'YYYY-MM-DD HH:MM:SS' format
    $formatted_expiry_date = date('Y-m-d H:i:s', $new_expiry_date);
    
    // Format the message using the provided arguments
    $message = "You have successfully subscribed to $productname at N$price/$validity days. Your subscription will expire on $formatted_expiry_date.";
    
    // URL-encode the message to ensure it is properly formatted for the URL
    $encodedMessage = urlencode($message);
    
    // Construct the SMS API URL with the required parameters
    $sms_api_url = "http://41.203.77.146:82/goip_send_sms.html?username=root&password=adodo@123&port=11&recipients=$msisdn&sms=$encodedMessage";
    
    // Initialize cURL
    $ch = curl_init();
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $sms_api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
    
    // Execute the cURL request
    $response = curl_exec($ch);
    
    // Close the cURL session
    curl_close($ch);

    // Log the SMS response for debugging purposes
    error_log("SMS API Response: " . $response);
    
    // Optional: Return the response in case you need to handle it further
    return $response;
}
?>
