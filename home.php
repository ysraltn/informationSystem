<?php
    session_start();
    if(!isset($_SESSION["role"])){
        header("location: index.php");
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

<body style="background-color: #7E8E92; background-image: url('./assets/png/yavuzlar.png'); background-size: 220px 220px;
  background-repeat: no-repeat; background-position: center center;">

    <div style="width: 50%; background-color: #9BBABF; padding-top: 0%; margin-top: 1%;" class="container text-center">
        <?php
        include_once 'header.php';
        ?>
    </div>
    <br><br><br><br><br><br><br><br><br><br>
    <p style="text-align: center; padding: 5%">Ahmet Yasir Altin<br>13.10.2023</p>

</body>