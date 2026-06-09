<?php

session_start();

if(!isset($_SESSION['admin'])){

    header("Location: admin_login.php");
    exit();

}

include("db.php");

// Statistics
$total_users = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM users")
);

$total_bookings = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM bookings")
);

$total_slots = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM slots")
);

$occupied_slots = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM slots WHERE status='Occupied'")
);

$available_slots = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM slots WHERE status='Vacant'")
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1 style="text-align:center;">
👨‍💼 Admin Dashboard
</h1>

<h3 style="text-align:center;">
Welcome <?php echo $_SESSION['admin']; ?>
</h3>

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

<br>

<div style="text-align:center;">

<a href="manage_users.php" class="btn">
Manage Users
</a>

<a href="manage_bookings.php" class="btn">
Manage Bookings
</a>

<a href="feedbacks.php" class="btn">
View Feedbacks
</a>

<a href="report.php" class="btn">
Reports
</a>

<a href="logout.php" class="btn">
Logout
</a>

</div>

</body>

</html>