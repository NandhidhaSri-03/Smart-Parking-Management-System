<?php

include("db.php");

session_start();
if(!isset($_SESSION['username'])){

    header("Location: login.php");
    exit();

}

$username = $_SESSION['username'];

$result = mysqli_query($conn,
"SELECT * FROM bookings
WHERE user_name='$username'
AND release_time IS NOT NULL
ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>

<head>

<title>Parking Charges</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1 style="text-align:center;">
Parking Charges Report
</h1>
<div class="form-container">

<h3>Parking Charges Information</h3>

<p><b>Rate:</b> ₹20 Per Hour</p>

<p>Minimum Charge: ₹20</p>

</div>

<table border="1" align="center" cellpadding="10">

<tr>
<th>Slot</th>
<th>Booking Time</th>
<th>Release Time</th>
<th>Hours</th>
<th>Fee</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result)){

    $start = strtotime($row['booking_date']);
    $end = strtotime($row['release_time']);

    $hours = ceil(($end - $start) / 3600);

    if($hours < 1){
        $hours = 1;
    }

    $fee = $hours * 20;

?>

<tr>

<td><?php echo $row['slot_name']; ?></td>

<td>
<?php echo date("d-m-Y h:i A",
strtotime($row['booking_date'])); ?>
</td>

<td>
<?php echo date("d-m-Y h:i A",
strtotime($row['release_time'])); ?>
</td>

<td><?php echo $hours; ?> Hour(s)</td>

<td>₹<?php echo $fee; ?></td>

</tr>

<?php

}

?>

</table>

</body>

</html>