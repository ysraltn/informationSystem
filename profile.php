<?php
session_start();

$id = $_SESSION["userid"];
include "./classes/dbh.classes.php";
include './classes/student.classes.php';
include './classes/studentController.php';
$studentController = new StudentController();
$student = $studentController->getStudentById($id);
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
            <h4>Change Password</h4>
            <form action="./includes/editStudent.inc.php" method="post" id="signup-form">
                <input style="margin-bottom: 0.6%;" type="text" name="firstName" placeholder="Firstname" value=<?php echo $student[0]["name"] ?> readonly><br>
                <input style="margin-bottom: 0.6%;" type="text" name="lastName" placeholder="Lastname" value=<?php echo $student[0]["surname"] ?> readonly><br>
                <input style="margin-bottom: 0.6%;" type="text" name="userName" placeholder="Username" value=<?php echo $student[0]["username"] ?> readonly><br>
                <input type="hidden" name="id" value=<?php echo $id ?>>
                <input type="hidden" name="role" value=<?php echo $student[0]["role"] ?>>

                <input style="margin-bottom: 0.6%;" type="password" name="password" placeholder="Password"><br>
                <input style="margin-bottom: 0.6%;" type="password" name="repeatPassword" placeholder="Repeat Password"><br>
                <button type="submit" name="submit">Change</button>
            </form>
        </div>
    </div>