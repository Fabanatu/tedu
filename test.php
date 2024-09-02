<?php
function short($longUrl) {
    $bitlyAccessCode = '0b9e095477685b3620a5f6f701ed005ca29b546f';
    $bitlyApiUrl = 'https://api-ssl.bitly.com/v4/shorten';

    // Prepare the payload
    $data = [
        'long_url' => $longUrl
    ];

    // Setup cURL
    $ch = curl_init($bitlyApiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $bitlyAccessCode,
        'Content-Type: application/json'
    ]);

    // Execute cURL request
    $result = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        return 'cURL Error: ' . $error_msg;
    }

    curl_close($ch);

    // Decode the response
    $response = json_decode($result, true);

    // Check for errors in the API response
    if (isset($response['link'])) {
        return $response['link'];
    } else {
        return 'Error: ' . $response['message'] ?? 'An unknown error occurred.';
    }
}

echo short('https://www.cd.com');
?>