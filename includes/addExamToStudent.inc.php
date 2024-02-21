<?php
session_start();
if ($_SESSION["role"] != "1" && $_SESSION["role"] != "2") {
    header("location: index.php?error=unauthorised");
}
if (isset($_POST["submit"])) {
    $id = $_POST["studentId"];
    $lessonId = $_POST["lessonId"];
    $classId = $_POST["classId"];
    $score = $_POST["score"];

    include "../classes/dbh.classes.php";
    include "../classes/student.classes.php";
    include "../classes/studentController.php";
    $studentController = new StudentController();
    $studentController->setExamById($id, $lessonId, $classId, $score);
    if ($_SESSION["role"] == "1") {
        header("location: ../studentDetails.php?id=" . $id);
    } elseif ($_SESSION["role"] == "2") {
        header("location: ../studentDetailsFT.php?id=" . $id);
    }
}
