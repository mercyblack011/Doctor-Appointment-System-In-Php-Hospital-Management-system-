<?php
// Database connection variables
$servername = "localhost"; // or your server address
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "edoc"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Extract form data
$from = $_REQUEST['email'];
$name = $_REQUEST['name'];
$subject = $_REQUEST['subject'];
$number = $_REQUEST['number'];
$cmessage = $_REQUEST['message'];

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, number, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $from, $subject, $number, $cmessage);

// Execute the statement
$stmt->execute();

// Close the connection
$stmt->close();
$conn->close();

// Redirect or refresh the page after insertion
header("Location: contact.html"); // Redirect back to the contact page or wherever you want
exit;
?>
