<?php

session_start();

if(!isset($_SESSION['admin'])){

    header("Location: admin_login.php");
    exit();

}

include("db.php");

$result = mysqli_query($conn,
"SELECT * FROM users");

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Users</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1 style="text-align:center;">
Manage Users
</h1>

<table border="1" align="center" cellpadding="10">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Vehicle Number</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['vehicle_no']; ?></td>

</tr>

<?php

}

?>

</table>

<br>

<div style="text-align:center;">

<a href="admin_dashboard.php" class="btn">
Back to Dashboard
</a>

</div>

</body>

</html>