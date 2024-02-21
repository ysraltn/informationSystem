<?php
session_start();
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
    header("location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info Sys</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body style="background-color: #7E8E92;">

    <div style="width: 50%; background-color: #9BBABF; padding-top: 0%; padding-bottom:3%; margin-top: 1%;" class="container text-center">
        <?php
        include_once 'header.php';
        ?>
        <div class="container text-center">
            <h4>Sign Up</h4>
            <form action="./includes/signup.inc.php" method="post" id="signup-form">
                <input style="margin-bottom: 0.6%;" type="text" name="firstName" placeholder="Firstname"><br>
                <input style="margin-bottom: 0.6%;" type="text" name="lastName" placeholder="Lastname"><br>
                <input style="margin-bottom: 0.6%;" type="text" name="userName" placeholder="Username"><br>
                
                <label for="roles">Role:</label>
                <select style="margin-bottom: 0.6%;" name="role" id="role" form="signup-form">
                    <option value="3">Student</option>
                    <option value="2">Teacher</option>
                </select><br>
                <input style="margin-bottom: 0.6%;" type="password" name="password" placeholder="Password"><br>
                <input style="margin-bottom: 0.6%;" type="password" name="repeatPassword" placeholder="Repeat Password"><br>
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
    </div>