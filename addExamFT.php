<?php
session_start();
if($_SESSION["role"]!="2"){
    header("location: index.php?error=unauthorised");
}
$teacherId = $_SESSION["userid"];


include "./classes/dbh.classes.php";
include './classes/student.classes.php';
include './classes/studentController.php';
include './classes/class.classes.php';
include './classes/classController.php';
include './classes/lesson.classes.php';
include './classes/lessonController.php';
$studentController = new StudentController();
$classController = new ClassController();
$lessonController = new LessonController();
$students = $classController->getClassesStudentsByTeacherId($teacherId);
$classes = $classController->getClassesByTeacherId($teacherId);
$lessons = $lessonController->getLessonsByTeacherId($teacherId);


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
            <h4>Add Exam</h4>
            <form action="./includes/addExamToStudent.inc.php" method="post" id="exam-form">
                <input style="margin-bottom: 0.6%;" type="text" name="score" placeholder="Score"><br>
                
                <label for="studentId">Student:</label>
                <select style="margin-bottom: 0.6%;" name="studentId" id="studentId" form="exam-form">
                    <?php
                    foreach ($students as $student) {
                        echo "<option value=" . $student["id"] . ">" . $student["name"]. " " . $student["surname"] . "</option>";
                    }
                    ?>
                </select><br>

                <label for="lessonId">Lesson:</label>
                <select style="margin-bottom: 0.6%;" name="lessonId" id="lessonId" form="exam-form">
                    <?php
                    foreach ($lessons as $lesson) {
                        echo "<option value=" . $lesson["id"] . ">" . $lesson["lessonName"] . "</option>";
                    }
                    ?>
                </select><br>

                <label for="classId">Class:</label>
                <select style="margin-bottom: 0.6%;" name="classId" id="classId" form="exam-form">
                    <?php
                    foreach ($classes as $class) {
                        echo "<option value=" . $class["id"] . ">" . $class["className"] . "</option>";
                    }
                    ?>
                </select><br>

                <button type="submit" name="submit">Add Exam</button>
            </form>
        </div>
    </div>