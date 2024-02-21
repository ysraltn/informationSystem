<?php
session_start();
if ($_SESSION["role"] != "1" && $_SESSION["role"] != "2") {
    header("location: index.php?error=unauthorised");
}
$id = $_GET["id"];
include "../classes/dbh.classes.php";
include '../classes/exam.classes.php';
include '../classes/examController.php';
$examController = new ExamController();
$examController->deleteExamById($id);
header("location: ../exams.php?error=none");
