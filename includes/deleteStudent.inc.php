<?php
session_start();
if ($_SESSION["role"] != "1") {
    header("location: index.php?error=unauthorised");
}
$id = $_GET["id"];
include "../classes/dbh.classes.php";
include '../classes/student.classes.php';
include '../classes/studentController.php';
$studentController = new StudentController();
$studentController->deleteStudentById($id);
header("location: ../students.php?error=none");
