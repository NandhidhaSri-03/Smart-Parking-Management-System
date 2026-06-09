<!DOCTYPE html>
<html>

<head>

<title>Booking Successful</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="form-container">

<h1>🎉 Booking Successful</h1>

<p>Your parking slot has been booked successfully.</p>

<p>
Booking Date:
<?php echo date("d-m-Y"); ?>
</p>

<p>
Booking Time:
<?php echo date("h:i A"); ?>
</p>

<br>

<a href="dashboard.php" class="btn">
Back to Dashboard
</a>

</div>

</body>

</html>