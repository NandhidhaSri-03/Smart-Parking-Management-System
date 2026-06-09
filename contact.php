<?php

include("db.php");

if(isset($_POST['send'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    mysqli_query($conn,
    "INSERT INTO feedback(name,email,message)
    VALUES('$name','$email','$message')");

    echo "<script>
    alert('Feedback Sent Successfully');
    </script>";
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Contact Us</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<nav>

<h2>Smart Parking</h2>

<ul>
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="history.php">History</a></li>
<li><a href="admin.php">Admin</a></li>
<li><a href="report.php">Reports</a></li>
<li><a href="profile.php">Profile</a></li>
<li><a href="contact.php">Contact Us</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>

</nav>

<h1>Contact Us</h1>

<div class="form-container">

<h3>Smart Parking Management System</h3>

<p><strong>Email:</strong> smartparking@gmail.com</p>

<p><strong>Phone:</strong> +91 9876543210</p>

<p><strong>Address:</strong> Coimbatore, Tamil Nadu, India</p>

<hr>

<h3>Send Feedback</h3>

<form method="POST">

<input type="text"
name="name"
placeholder="Enter Your Name"
required>

<input type="email"
name="email"
placeholder="Enter Your Email"
required>

<textarea
name="message"
placeholder="Enter Your Message"
rows="5"
required></textarea>

<button type="submit" name="send">
Send Message
</button>

</form>

</div>

</body>

</html>