<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Retrieve the form data
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q3_reason = $_POST['q3-reason'];
$q4 = $_POST['q4'];
$q4_reason = $_POST['q4-reason'];
$q5 = $_POST['q5'];
$q5_reason = $_POST['q5-reason'];
$q6 = $_POST['q6'];
$q6_reason = $_POST['q6-reason'];
$q7_reason = $_POST['q7-reason'];
$q8_reason = $_POST['q8-reason'];

// Database connection details
$hostname = "localhost";
$username = "root";
$password = "";
$database = "feedback_db";

// Create a connection to the database
$conn = new mysqli($hostname, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to insert the feedback data
$sql = "INSERT INTO feedback (q1, q2, q3, q3_reason, q4, q4_reason, q5, q5_reason, q6, q6_reason, q7_reason, q8_reason)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssss", $q1, $q2, $q3, $q3_reason, $q4, $q4_reason, $q5, $q5_reason, $q6, $q6_reason, $q7_reason, $q8_reason);

// Execute the statement
if ($stmt->execute()) {
    // Feedback data inserted successfully
    echo "Thank you for your feedback!";
} else {
    // Error occurred while inserting data
    echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
