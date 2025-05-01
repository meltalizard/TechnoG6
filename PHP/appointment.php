<?php
session_start();
// Database connection
$servername = "localhost"; // Change as needed
$username = "root"; // Change as needed
$password = ""; // Change as needed
$dbname = "my_application_db"; // Change as needed

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $password = $_POST['password'];
    $street_address = $_POST['street_address'];
    $apartment_unit_suite = $_POST['apartment_unit_suite'];
    $barangay = $_POST['barangay'];
    $city_municipality = $_POST['city_municipality'];
    $province = $_POST['province'];
    $postal_code = $_POST['postal_code'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the users table
    $sql = "INSERT INTO users (username, email, pnumber, password, street_address, apartment_unit_suite, barangay, city_municipality, province, postal_code) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $username, $email, $pnumber, $hashed_password, $street_address, $apartment_unit_suite, $barangay, $city_municipality, $province, $postal_code);

    if ($stmt->execute()) {
        echo "Registration successful!<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

// Handle appointment form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['schedule'])) {
    $user_id = $_POST['user_id']; // Assuming you have the user ID from the session
    $appointment_date = $_POST['appointment_date'];
    $description = $_POST['description'];
    $clinic = $_POST['clinic'];

    // Insert into the appointments table
    $sql = "INSERT INTO appointments (user_id, appointment_date, description, clinic) 
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $appointment_date, $description, $clinic);

    if ($stmt->execute()) {
        echo "Appointment scheduled successfully!<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register and Schedule Appointment</title>
</head>
<body>
    <h1>Register</h1>
    <form action="register_and_schedule.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="pnumber">Phone Number:</label>
        <input type="text" name="pnumber" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="street_address">Street Address:</label>
        <input type="text" name="street_address" required><br>

        <label for="apartment_unit_suite">Apartment/Unit/Suite (Optional):</label>
        <input type="text" name="apartment_unit_suite"><br>

        <label for="barangay">Barangay:</label>
        <input type="text" name="barangay" required><br>

        <label for="city_municipality">City / Municipality:</label>
        <input type="text" name="city_municipality" required><br>

        <label for="province">Province:</label>
        <input type="text" name="province" required><br>

        <label for="postal_code">Postal Code:</label>
        <input