<?php

session_start();

include("db.php");

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        $_SESSION['admin'] = $email;

        header("Location: admin_dashboard.php");
        exit();

    }else{

        echo "<script>
        alert('Invalid Admin Login');
        </script>";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="form-container">

<h2>Admin Login</h2>

<form method="POST">

<input type="email"
name="email"
placeholder="Enter Admin Email"
required>

<input type="password"
id="password"
name="password"
placeholder="Enter Password"
required>

<div style="margin:10px 0; text-align:left;">

<input type="checkbox"
onclick="togglePassword()">

Show Password

</div>

<button type="submit"
name="login">

Login

</button>

</form>

</div>

<script>

function togglePassword(){

    var x = document.getElementById("password");

    if(x.type === "password"){

        x.type = "text";

    }
    else{

        x.type = "password";

    }

}

</script>

</body>

</html>