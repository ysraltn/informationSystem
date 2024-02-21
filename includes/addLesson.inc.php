<?php
session_start();
if ($_SESSION["role"] != "1") {
    header("location: index.php?error=unauthorised");
}
if (isset($_POST["submit"])) {
    $lessonName = $_POST["lessonName"];
    $teacherId = $_POST["teacherId"];

    include "../classes/dbh.classes.php";
    include "../classes/lesson.classes.php";
    include "../classes/lessonController.php";
    $lessonController = new LessonController();
    $lessonController->addLesson($lessonName, $teacherId);
    header("location: ../lessons.php?error=none");
}
