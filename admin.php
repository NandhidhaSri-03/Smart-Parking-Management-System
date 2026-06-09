<?php

include("db.php");

$total_slots = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM slots")
);

$vacant_slots = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM slots WHERE status='Vacant'")
);

$occupied_slots = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM slots WHERE status='Occupied'")
);

$total_bookings = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM bookings")
);

$occupancy = 0;

if($total_slots > 0){
    $occupancy = ($occupied_slots / $total_slots) * 100;
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<nav>

<h2>Smart Parking</h2>

<ul>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="admin.php">Admin</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

</nav>

<h1>Admin Analytics Dashboard</h1>

<div class="container">

<div class="slot vacant">
    Total Slots
    <br><br>
    <?php echo $total_slots; ?>
</div>

<div class="slot vacant">
    Vacant Slots
    <br><br>
    <?php echo $vacant_slots; ?>
</div>

<div class="slot occupied">
    Occupied Slots
    <br><br>
    <?php echo $occupied_slots; ?>
</div>

<div class="slot occupied">
    Total Bookings
    <br><br>
    <?php echo $total_bookings; ?>
</div>

<div class="slot vacant">
    Occupancy %
    <br><br>
    <?php echo round($occupancy,2); ?>%
</div>

</div>

</body>
</html>