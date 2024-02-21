<?php
session_start();
if($_SESSION["role"]!="1"){
    header("location: index.php?error=unauthorised");
}

$id = $_GET["id"];
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
            <h4>Update User</h4>
            <form action="./includes/editStudent.inc.php" method="post" id="signup-form">
                <input style="margin-bottom: 0.6%;" type="text" name="firstName" placeholder="Firstname" value=<?php echo $student[0]["name"] ?>><br>
                <input style="margin-bottom: 0.6%;" type="text" name="lastName" placeholder="Lastname" value=<?php echo $student[0]["surname"] ?>><br>
                <input style="margin-bottom: 0.6%;" type="text" name="userName" placeholder="Username" value=<?php echo $student[0]["username"] ?>><br>
                <input type="hidden" name="id" value=<?php echo $id ?>>

                <label for="roles">Role:</label>
                <select style="margin-bottom: 0.6%;" name="role" id="role" form="signup-form">
                <?php 
                if($student[0]["role"]=="2"){
                    echo '<option value="3">Student</option>
                    <option value="2" selected>Teacher</option>';
                }
                elseif($student[0]["role"]=="3"){
                    echo '<option value="3" selected>Student</option>
                    <option value="2">Teacher</option>';
                }
                ?>
               <br>
                <input style="margin-bottom: 0.6%;" type="password" name="password" placeholder="Password"><br>
                <input style="margin-bottom: 0.6%;" type="password" name="repeatPassword" placeholder="Repeat Password"><br>
                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>