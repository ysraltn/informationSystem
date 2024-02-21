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
            <h4>Login</h4>
            <form action="./includes/login.inc.php" method="post">
                <input type="text" name="userName" placeholder="Username/Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
    </div>