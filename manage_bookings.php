<?php

session_start();

if(!isset($_SESSION['admin'])){

    header("Location: admin_login.php");
    exit();

}

include("db.php");

$result = mysqli_query($conn,
"SELECT * FROM bookings
ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Bookings</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1 style="text-align:center;">
Manage Bookings
</h1>

<table border="1"
align="center"
cellpadding="10">

<tr>

<th>ID</th>
<th>User Name</th>
<th>Slot Name</th>
<th>Booking Time</th>
<th>Release Time</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['user_name']; ?></td>

<td><?php echo $row['slot_name']; ?></td>

<td>
<?php echo date(
"d-m-Y h:i A",
strtotime($row['booking_date'])
); ?>
</td>

<td>

<?php

if($row['release_time']){

    echo date(
    "d-m-Y h:i A",
    strtotime($row['release_time'])
    );

}else{

    echo "Still Parked";

}

?>

</td>

</tr>

<?php

}

?>

</table>

<br>

<div style="text-align:center;">

<a href="admin_dashboard.php"
class="btn">

Back to Dashboard

</a>

</div>

</body>

</html>