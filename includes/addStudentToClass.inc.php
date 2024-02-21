<?php
session_start();
if($_SESSION["role"]!="1"){
    header("location: index.php?error=unauthorised");
}
if (isset($_POST["submit"])) {
    $studentId = $_POST["studentId"];
    $classId = $_POST["classId"];

    include "../classes/dbh.classes.php";
    include "../classes/class.classes.php";
    include "../classes/classController.php";
    $classController = new ClassController();
    $classController->addStudentToClass($studentId, $classId);
    header("location: ../classDetails.php?id=" . $classId);
}
