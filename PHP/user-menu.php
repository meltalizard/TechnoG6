<?php
session_start();

// Redirect if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care | Home</title>
    <link rel="stylesheet" href="user-menu.css">
</head>
<body>
    <div class="wrapper">
        <!-- Navbar -->
        <div class="navbar">
            <div class="navbar-left">
                <a href="home.html">
                    <img src="../Images/maintitle.png" class="maintitle" alt="Logo">
                </a>
                <span class="welcome-text">
                    👤 Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>
                </span>
            </div>
            <div class="navbar-right">
                <a href="home.html">Home</a>
                <a href="appointment.html">Create an Appointment</a>
                <a href="helpcenter.html">Help Center</a>
                <a href="logout.php">Log out</a>
            </div>
        </div>

        <!-- Title -->
        <div class="title">
            <img src="../Images/maintitle.png" class="hero">
        </div>

        <!-- Menu Options -->
        <div class="menu-options">
            <div class="options">
                <a href="appointment.html">
                    <img src="../Images/cat1.png" class="option-image">
                    <h3>Create an Appointment</h3>
                </a>
            </div>
            <div class="options">
                <a href="#">
                    <img src="../Images/Dog1.png" class="option-image">
                    <h3>Pet & User details</h3>
                </a>
            </div>
            <div class="options">
                <a href="#">
                    <img src="../Images/girlIcon.png" class="option-image">
                    <h3>Appointment History</h3>
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2025 Pet Care Services. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
