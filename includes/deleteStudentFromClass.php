<?php
session_start();
if ($_SESSION["role"] != "1") {
    header("location: index.php?error=unauthorised");
}
$studentId = $_GET["sid"];
$classId = $_GET["cid"];
include "../classes/dbh.classes.php";
include '../classes/class.classes.php';
include '../classes/classController.php';
$classController = new ClassController();
$classController->deleteStudentFromClass($studentId, $classId);
header("location: ../students.php?error=none");
