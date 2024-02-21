<?php
session_start();
if($_SESSION["role"]!="1"){
    header("location: index.php?error=unauthorised");
}

$id = $_GET["id"];
include "./classes/dbh.classes.php";
include './classes/student.classes.php';
include './classes/studentController.php';
include './classes/class.classes.php';
include './classes/classController.php';
$studentController = new StudentController();
$students = $studentController->getAllStudents();
$classController = new ClassController();
$classes = $classController->getAllClasses();
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
            <h4>Add Student to Class</h4>
            <form action="./includes/addStudentToClass.inc.php" method="post" id="addSC-form">
                

                <label for="student">Student:</label>
                <select style="margin-bottom: 0.6%;" name="studentId" id="studentId" form="addSC-form">
                    <?php
                    foreach ($students as $student) {
                        echo "<option value=" . $student["id"] . ">" . $student["name"] . " " . $student["surname"] . "</option>";
                    }
                    ?>
                </select><br>

                <label for="class">Class:</label>
                <select style="margin-bottom: 0.6%;" name="classId" id="classId" form="addSC-form">
                    <?php
                    foreach ($classes as $class) {
                        echo "<option value=" . $class["id"] . ">" . $class["className"] . "</option>";
                    }
                    ?>
                </select><br>
                <button type="submit" name="submit">Add</button>
            </form>
        </div>
    </div>