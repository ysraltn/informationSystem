<?php
session_start();
if($_SESSION["role"]!="1"){
    header("location: index.php?error=unauthorised");
}

include "./classes/dbh.classes.php";
include './classes/teacher.classes.php';
include './classes/teacherController.php';
$teacherController = new TeacherController();
$teachers = $teacherController->getAllTeachers();
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
            <h4>Add Lesson</h4>
            <form action="./includes/addLesson.inc.php" method="post" id="signup-form">
                <input style="margin-bottom: 0.6%;" type="text" name="lessonName" placeholder="LessonName"><br>
                
                <label for="roles">Teacher:</label>
                <select style="margin-bottom: 0.6%;" name="teacherId" id="teacherId" form="signup-form">
                    <?php
                    foreach ($teachers as $teacher) {
                        echo "<option value=" . $teacher["id"] . ">" . $teacher["name"]. " " . $teacher["surname"] . "</option>";
                    }
                    ?>
                </select><br>
                <button type="submit" name="submit">Add Lesson</button>
            </form>
        </div>
    </div>