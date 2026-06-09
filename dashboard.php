<?php

session_start();

include("db.php");

if(isset($_GET['search'])){

    $search = $_GET['search'];

    $result = mysqli_query($conn,
    "SELECT * FROM slots WHERE slot_name='$search'");

}
else{

    $result = mysqli_query($conn,
    "SELECT * FROM slots");

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Dashboard</title>

    <link rel="stylesheet" href="style.css">
    <meta http-equiv="refresh" content="5">

</head>

<body>

<nav>

    <h2>Smart Parking</h2>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="reset.php">Reset Slots</a></li>
        <li><a href="charges.php">Charges</a></li>
        <li><a href="view_feedback.php">Feedback</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

</nav>

<h2 style="text-align:center;color:darkblue;">
Welcome,
<?php
echo isset($_SESSION['username'])
? $_SESSION['username']
: "Guest";
?>
</h2>

<h1>Parking Dashboard</h1>
<div style="
text-align:center;
background:#f0f8ff;
padding:15px;
margin:15px;
border-radius:10px;
font-size:18px;
font-weight:bold;
border:1px solid #ccc;">

🚗 Parking Charge: ₹20 Per Hour

</div>
<div style="text-align:center; margin:10px;">

🟢 Vacant Slot

&nbsp;&nbsp;&nbsp;&nbsp;

🔴 Occupied Slot

</div>

<form method="GET" style="text-align:center; margin-bottom:20px;">

<input type="text"
name="search"
placeholder="Search Slot (A1)">

<button type="submit">
Search
</button>

</form>

<div class="container">

<?php

while($row = mysqli_fetch_assoc($result)){

$class = ($row['status']=="Vacant")
? "vacant"
: "occupied";

?>

<div class="slot <?php echo $class; ?>">

    <div class="slot-name">
        <?php echo $row['slot_name']; ?>
    </div>

    <div class="slot-status">
        <?php echo $row['status']; ?>
    </div>

    <?php
    if($row['status']=="Vacant"){
    ?>
        <br>
        <a href="book.php?id=<?php echo $row['id']; ?>">
            Book
        </a>
    <?php
    }
    ?>

    <?php
    if($row['status']=="Occupied"){
    ?>
        <br>
        <a href="release.php?id=<?php echo $row['id']; ?>">
            Release
        </a>
    <?php
    }
    ?>

</div>

<?php

}

?>

</div>

</body>
</html>