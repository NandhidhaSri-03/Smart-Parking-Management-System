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

// Total Slots
$total_slots = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM slots")
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

// Occupancy Percentage
$occupancy = 0;

if($total_slots > 0){

    $occupancy = ($occupied_slots / $total_slots) * 100;

}

// Most Used Slot
$most_used = mysqli_query($conn,"
SELECT slot_name, COUNT(*) as total
FROM bookings
GROUP BY slot_name
ORDER BY total DESC
LIMIT 1
");

$row = mysqli_fetch_assoc($most_used);

$most_used_slot = $row['slot_name'] ?? "No Bookings";
$most_used_count = $row['total'] ?? 0;

?>

<!DOCTYPE html>
<html>

<head>

<title>Reports</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<nav>

<h2>Smart Parking</h2>

<ul>

<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="history.php">History</a></li>
<li><a href="report.php">Reports</a></li>
<li><a href="contact.php">Contact</a></li>
<li><a href="logout.php">Logout</a></li>

</ul>

</nav>

<h1 style="text-align:center;">
Parking Reports
</h1>
<div style="text-align:center; margin:20px;">

<a href="download_report.php">

<button>
Download Report (CSV)
</button>

</a>

</div>

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

<div class="slot vacant">
Most Used Slot
<br><br>
<?php echo $most_used_slot; ?>
</div>

<div class="slot occupied">
Booking Count
<br><br>
<?php echo $most_used_count; ?>
</div>

<div class="slot vacant">
Occupancy Rate
<br><br>
<?php echo round($occupancy,2); ?>%
</div>

<div class="slot occupied">
Report Date
<br><br>
<?php echo date("d-m-Y"); ?>
</div>

</div>

</body>

</html>