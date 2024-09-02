<?php
// Step 1: Connect to the database
include 'connection.php';

// Initialize response data
$response = [
    'status' => false,
    'processed_count' => 0,
    'data' => []
];

// Set batch size
$batch_size = 100;

// Retrieve the last processed ID from a log or a file
$last_processed_id = getLastProcessedId();

// Step 2: Get the current date in 'YYYY-MM-DD' format
$current_date = date('Y-m-d');

// Step 3: Select active subscriptions (status = 1) from the subscribe table, limit to 100 rows, and start from last processed ID
$subscribe_query = "SELECT id, msisdn, subcode FROM subscribe WHERE status = 1 AND id > ? ORDER BY id ASC LIMIT ?";
$subscribe_stmt = $conn->prepare($subscribe_query);
$subscribe_stmt->bind_param('ii', $last_processed_id, $batch_size);
$subscribe_stmt->execute();
$subscribe_result = $subscribe_stmt->get_result();

// Step 4: Check for each subscription if there's content to be sent
if ($subscribe_result->num_rows > 0) {
    while ($row = $subscribe_result->fetch_assoc()) {
        $id = $row['id'];
        $msisdn = $row['msisdn'];
        $subcode = $row['subcode'];

        // Check the content table for matching subcode and today's active date
        $content_query = "SELECT summary FROM content WHERE subcode = ? AND DATE(active_date) = ?";
        $content_stmt = $conn->prepare($content_query);
        $content_stmt->bind_param('ss', $subcode, $current_date);
        $content_stmt->execute();
        $content_result = $content_stmt->get_result();

        if ($content_result->num_rows > 0) {
            // Get one content row (could use fetch_assoc to get any single row)
            $content_row = $content_result->fetch_assoc();
            $summary = $content_row['summary'];

            // Send SMS with the summary (mockup function here)
            sendSMS($msisdn, $summary);

            // Log that we processed this subscription
            $response['data'][] = [
                'msisdn' => $msisdn,
                'subcode' => $subcode,
                'summary' => $summary
            ];
            $response['processed_count']++;
        }

        // Close the content statement
        $content_stmt->close();
        
        // Update last processed ID
        $last_processed_id = $id;
    }

    $response['status'] = true;
    $response['message'] = 'SMS sent to active subscribers.';
} else {
    $response['message'] = 'No active subscriptions found to process.';
}

// Step 5: Close the subscribe statement and the database connection
$subscribe_stmt->close();
$conn->close();

// Save the last processed ID for the next batch
saveLastProcessedId($last_processed_id);

// Output the response in JSON format
echo json_encode($response);

// Function to send SMS (mockup)
function sendSMS($msisdn, $message) {
    // Replace with actual SMS sending logic
    
    echo "Sending SMS to $msisdn: $message\n";
}

// Function to get the last processed ID
function getLastProcessedId() {
    // Implement logic to retrieve the last processed ID, e.g., from a file or database
    $last_id = file_get_contents('last_processed_id.txt');
    return $last_id ? (int)$last_id : 0;
}

// Function to save the last processed ID
function saveLastProcessedId($last_processed_id) {
    // Implement logic to save the last processed ID, e.g., to a file or database
    file_put_contents('last_processed_id.txt', $last_processed_id);
}
?>
