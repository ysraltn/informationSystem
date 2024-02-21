<?php
session_start();
if ($_SESSION["role"] != "1") {
    header("location: index.php?error=unauthorised");
}
if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $teacherId = $_POST["teacherId"];
    $lessonName = $_POST["lessonName"];

    include "../classes/dbh.classes.php";
    include "../classes/lesson.classes.php";
    include "../classes/lessonController.php";
    $lessonController = new LessonController();
    $lessonController->updateLessonById($id, $teacherId, $lessonName);
    header("location: ../lessons.php?error=none");
}
