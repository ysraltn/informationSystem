<?php
session_start();
if ($_SESSION["role"] != "1") {
    header("location: index.php?error=unauthorised");
}
$id = $_GET["id"];
include "../classes/dbh.classes.php";
include '../classes/lesson.classes.php';
include '../classes/lessonController.php';
$lessonController = new LessonController();
$lessonController->deleteLessonById($id);
header("location: ../lessons.php?error=none");
