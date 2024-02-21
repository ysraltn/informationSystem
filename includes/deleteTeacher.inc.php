<?php
session_start();
if ($_SESSION["role"] != "1") {
    header("location: index.php?error=unauthorised");
}
$id = $_GET["id"];
include "../classes/dbh.classes.php";
include '../classes/teacher.classes.php';
include '../classes/teacherController.php';
$teacherController = new TeacherController();
$teacherController->deleteTeacherById($id);
header("location: ../teachers.php");
