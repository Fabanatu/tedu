<?php
// Database configuration
$host = 'localhost';     // Database host (usually 'localhost')
$user = 'root';      // Database username
$password = '';  // Database password
$dbname = 'uniussd'; // Database name

// Create a new MySQLi connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set the character set to UTF-8
$conn->set_charset("utf8");

// Connection successful
//echo "Connected successfully"; // Uncomment to test the connection

// Remember to close the connection when done
// $conn->close();
?>
