<?php

include("db.php");

// Total Users
$total_users = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM users")
);

// Total Bookings
$total_bookings = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM bookings")
);

// Occupied Slots
$occupied_slots = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM slots WHERE status='Occupied'")
);

// Available Slots
$available_slots = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM slots WHERE status='Vacant'")
);

// Latest Feedback
$feedbacks = mysqli_query($conn,
"SELECT * FROM feedback ORDER BY id DESC LIMIT 3");

?>

<!DOCTYPE html>
<html>

<head>

<title>Smart Parking Management System</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<nav>

<h2>Smart Parking</h2>

<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="contact.php">Contact</a></li>
<li><a href="register.php">Register</a></li>
<li><a href="login.php">Login</a></li>
</ul>

</nav>

<!-- Hero Section -->

<div class="hero">

<h1>SMART PARKING MANAGEMENT SYSTEM</h1>

<p>Find Available Parking Slots Instantly</p>

<a href="register.php" class="btn">
Register
</a>

<a href="login.php" class="btn">
Login
</a>

</div>

<!-- Features -->

<h2 style="text-align:center;color:darkblue;">
Our Features
</h2>

<div class="container">

<div class="slot vacant">
User Registration
</div>

<div class="slot occupied">
Secure Login
</div>

<div class="slot vacant">
Parking Dashboard
</div>

<div class="slot occupied">
Slot Booking
</div>

<div class="slot vacant">
Booking History
</div>

<div class="slot occupied">
Reports & Analytics
</div>

<div class="slot vacant">
User Profile
</div>

<div class="slot occupied">
Feedback System
</div>

</div>

<!-- Project Highlights -->

<h2 style="text-align:center;color:darkblue;">
Project Highlights
</h2>

<div class="container">

<div class="slot vacant">
Real-Time Parking
</div>

<div class="slot occupied">
User Management
</div>

<div class="slot vacant">
Admin Dashboard
</div>

<div class="slot occupied">
Feedback Tracking
</div>

<div class="slot vacant">
Booking Analytics
</div>

<div class="slot occupied">
Parking Reports
</div>

</div>

<!-- Live Statistics -->

<h2 style="text-align:center;color:darkblue;">
Live Statistics
</h2>

<div class="container">

<div class="slot vacant">
Total Users
<br><br>
<?php echo $total_users; ?>
</div>

<div class="slot occupied">
Total Bookings
<br><br>
<?php echo $total_bookings; ?>
</div>

<div class="slot vacant">
Available Slots
<br><br>
<?php echo $available_slots; ?>
</div>

<div class="slot occupied">
Occupied Slots
<br><br>
<?php echo $occupied_slots; ?>
</div>

</div>

<!-- Parking Gallery -->

<h2 style="text-align:center;color:darkblue;">
Parking Gallery
</h2>

<div class="gallery">

<img src="images/parking.jpg">

<img src="images/parking1.jpg">

<img src="images/parking2.jpg">

<img src="images/parking3.jpg">

<img src="images/parking4.jpg">

</div>

<!-- Latest Feedback -->

<h2 style="text-align:center;color:darkblue;">
Latest User Feedback
</h2>

<div class="container">

<?php
while($row = mysqli_fetch_assoc($feedbacks)){
?>

<div class="slot vacant">

<b><?php echo $row['name']; ?></b>

<br><br>

<?php echo $row['message']; ?>

</div>

<?php
}
?>

</div>

<!-- Developer Information -->

<div class="form-container">

<h2>Developer Information</h2>

<h3>Nandhidha Sri</h3>

<p><strong>Department:</strong> Computer Science and Engineering</p>

<p><strong>Project:</strong> Smart Parking Management System</p>

<p><strong>Technologies Used:</strong></p>

<ul>
<li>HTML</li>
<li>CSS</li>
<li>PHP</li>
<li>MySQL</li>
<li>JavaScript</li>
</ul>

</div>

<!-- Footer -->

<footer>

<p>Smart Parking Management System</p>

<p>© 2026 All Rights Reserved</p>

<p>Developed By: Nandhidha Sri</p>

</footer>

</body>

</html>