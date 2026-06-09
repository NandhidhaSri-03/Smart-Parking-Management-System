<?php

include("db.php");

$id = $_GET['id'];

// Get Slot Name
$result = mysqli_query($conn,
"SELECT * FROM slots WHERE id='$id'");

$row = mysqli_fetch_assoc($result);

$slot = $row['slot_name'];

// Update Slot Status
mysqli_query($conn,
"UPDATE slots
SET status='Vacant'
WHERE id='$id'");

// Save Release Time in Latest Booking
mysqli_query($conn,
"UPDATE bookings
SET release_time = NOW()
WHERE slot_name='$slot'
AND release_time IS NULL
ORDER BY id DESC
LIMIT 1");

echo "<script>

alert('Slot Released Successfully');

window.location='feedback.php';

</script>";