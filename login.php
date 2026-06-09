<?php

session_start();

include("db.php");

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        $row = mysqli_fetch_assoc($result);

        $_SESSION['username'] = $row['name'];

        echo "<script>
        alert('Login Successfully');
        window.location='dashboard.php';
        </script>";

        exit();

    }
    else{

        echo "<script>
        alert('Invalid Email or Password');
        </script>";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="form-container">

<h2>User Login</h2>

<form method="POST">

<input type="email"
name="email"
placeholder="Enter Email"
required>

<input type="password"
id="password"
name="password"
placeholder="Enter Password"
required>

<div style="margin:10px 0; text-align:left;">

<input type="checkbox"
id="showPassword"
onclick="togglePassword()">

<label for="showPassword">
Show Password
</label>

</div>

<button type="submit" name="login">
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