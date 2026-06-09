<?php

include("db.php");

$result = mysqli_query($conn,
"SELECT * FROM feedback
ORDER BY created_at DESC");

?>

<!DOCTYPE html>
<html>

<head>

<title>View Feedback</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<nav>

<h2>Smart Parking</h2>

<ul>
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="admin.php">Admin</a></li>
<li><a href="report.php">Reports</a></li>
<li><a href="view_feedback.php">Feedback</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>

</nav>

<h1>User Feedback</h1>

<table border="1" align="center" cellpadding="10">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Message</th>
<th>Date</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['message']; ?></td>

<td>
<?php
echo date(
"d-m-Y h:i A",
strtotime($row['created_at'])
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