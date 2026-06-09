<?php

session_start();

include("db.php");

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM slots WHERE id='$id'");

$row = mysqli_fetch_assoc($result);

$slot = $row['slot_name'];

$username = $_SESSION['username'];

// Update slot status
mysqli_query($conn,
"UPDATE slots
SET status='Occupied'
WHERE id='$id'");

// Save booking history
mysqli_query($conn,
"INSERT INTO bookings(user_name,slot_name)
VALUES('$username','$slot')");

// Redirect to Booking Success Page
header("Location: booking_success.php");

exit();

?>