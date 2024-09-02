<?php
header('Content-Type: application/json');

include 'connection.php';

// Initialize response data
$response = [
    'status' => false,
    'treated' => 0, // Number of subscriptions treated
    'data' => [] // Details of treated subscriptions
];

// Get the current epoch time
$current_time = time();

// Limit the number of rows processed at a time (e.g., 100 rows)
$limit = 100;
$query = "SELECT msisdn, subcode, expiry_date FROM subscribe WHERE status = 1 AND expiry_date <= ? LIMIT ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ii', $current_time, $limit);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $treated_count = 0;

    while ($row = $result->fetch_assoc()) {
        $msisdn = $row['msisdn'];
        $subcode = $row['subcode'];
        $expiry_date = $row['expiry_date'];

        // Update the status to 0 (expired) in the subscribe table
        $update_query = "UPDATE subscribe SET status = 0 WHERE msisdn = ? AND subcode = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param('ss', $msisdn, $subcode);
        $update_stmt->execute();

        // Increment the treated count and add details to the response
        $treated_count++;
        $response['data'][] = [
            'msisdn' => $msisdn,
            'subcode' => $subcode,
            'previous_expiry_date' => $expiry_date
        ];
    }

    // Update response status and treated count
    $response['status'] = true;
    $response['treated'] = $treated_count;
} else {
    // No subscriptions were treated
    $response['data'] = ['message' => 'No subscriptions to update.'];
}

// Close the statement and database connection
$stmt->close();
$conn->close();

// Output the response as JSON
echo json_encode($response);
