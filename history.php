<?php

session_start();

if(!isset($_SESSION['username'])){

    header("Location: login.php");
    exit();

}

include("db.php");

$username = $_SESSION['username'];

$search = "";

if(isset($_GET['search'])){

    $search = $_GET['search'];

    $result = mysqli_query($conn,
    "SELECT * FROM bookings
    WHERE user_name='$username'
    AND slot_name LIKE '%$search%'
    ORDER BY booking_date DESC");

}
else{

    $result = mysqli_query($conn,
    "SELECT * FROM bookings
    WHERE user_name='$username'
    ORDER BY booking_date DESC");

}

?>

<!DOCTYPE html>
<html>

<head>

<title>My Booking History</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1 style="text-align:center;">
My Booking History
</h1>

<form method="GET"
style="text-align:center; margin-bottom:20px;">

<input type="text"
name="search"
placeholder="Search Slot Name"
value="<?php echo $search; ?>">

<button type="submit">
Search
</button>

<a href="history.php">
<button type="button">
Clear
</button>
</a>

</form>

<table border="1"
align="center"
cellpadding="10">

<tr>

<th>ID</th>
<th>Slot Name</th>
<th>Booking Date</th>

</tr>

<?php

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['slot_name']; ?></td>

<td>
<?php
echo date(
"d-m-Y h:i A",
strtotime($row['booking_date'])
);
?>
</td>

</tr>

<?php

}

?>

</table>

</body>

</html>