<?php
if ($_SESSION["role"] != "1" && $_SESSION["role"] != "2") {
    header("location: index.php?error=unauthorised");
}
if (isset($_POST["submit"])) {
    $id = $_POST["examId"];
    $score = $_POST["score"];

    include "../classes/dbh.classes.php";
    include "../classes/exam.classes.php";
    include "../classes/examController.php";
    $examController = new ExamController();
    $examController->updateExamById($id, $score);
    header("location: ../exams.php?error=none");
}
