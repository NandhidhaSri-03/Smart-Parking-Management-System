<?php

include("db.php");

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $vehicle = $_POST['vehicle'];

    $sql = "INSERT INTO users(name,email,password,vehicle_no)
            VALUES('$name','$email','$password','$vehicle')";

    mysqli_query($conn,$sql);

    header("Location: login.php");
    exit();

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Register</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="form-container">

<h2>User Registration</h2>

<form method="POST">

<input type="text"
name="name"
placeholder="Enter Name"
required>

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

<input type="text"
name="vehicle"
id="vehicle"
placeholder="Enter 4 Digit Vehicle Number"
maxlength="4"
required>

<button type="submit" name="register">
Register
</button>

</form>

</div>

<script>

// Vehicle Number Validation

document.querySelector("form").addEventListener("submit", function(e) {

    let vehicle = document.getElementById("vehicle").value;

    if (!/^\d{4}$/.test(vehicle)) {

        alert("Vehicle number must contain exactly 4 digits.");

        e.preventDefault();

    }

});

// Show Password

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