<?php

session_start();

if(!isset($_SESSION['username'])){

    header("Location: login.php");
    exit();

}

include("db.php");

if(isset($_POST['submit'])){

    $name = $_SESSION['username'];
    $message = $_POST['message'];

    mysqli_query($conn,
    "INSERT INTO feedback(name,message)
    VALUES('$name','$message')");

    echo "<script>

    alert('Feedback Submitted Successfully');

    window.location='dashboard.php';

    </script>";

}

?>

<!DOCTYPE html>
<html>

<head>

<title>User Feedback</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="form-container">

<h2>Give Your Feedback</h2>

<p>
Welcome,
<b><?php echo $_SESSION['username']; ?></b>
</p>

<form method="POST">

<textarea
name="message"
placeholder="Enter Your Feedback"
required
style="width:100%; height:120px;">
</textarea>

<br><br>

<button type="submit"
name="submit">

Submit Feedback

</button>

</form>

<br>

<a href="dashboard.php">
<button type="button">
Back to Dashboard
</button>
</a>

</div>

</body>

</html>