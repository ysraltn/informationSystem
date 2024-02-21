<?php
session_start();
if($_SESSION["role"]!=1 && $_SESSION["role"]!=2){
    header("location: index.php?error=unauthorised");
}
$id = $_GET["id"];
include "./classes/dbh.classes.php";
include './classes/exam.classes.php';
include './classes/examController.php';
$examController = new ExamController();
$exam = $examController->getExamById($id);
if($exam[0]["teacherUserId"]!=$_SESSION["userid"] && $_SESSION["role"]!="1"){
    header("location: index.php?error=unauthorised");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info Sys</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body style="background-color: #7E8E92;">

    <div style="width: 50%; background-color: #9BBABF; padding-top: 0%; padding-bottom:3%; margin-top: 1%;" class="container text-center">
        <?php
        include_once 'header.php';
        ?>
        <div class="container text-center">
            <h4>Edit Exam Score</h4>
            <form action="./includes/editExam.inc.php" method="post" id="addExam-form">
                <input style="margin-bottom: 0.6%;" type="text" name="firstName" placeholder="Firstname" value=<?php echo $exam[0]["name"] ?> readonly><br>
                <input style="margin-bottom: 0.6%;" type="text" name="lastName" placeholder="Lastname" value=<?php echo $exam[0]["surname"] ?> readonly><br>
                <input style="margin-bottom: 0.6%;" type="text" name="className" placeholder="Class" value=<?php echo $exam[0]["className"] ?> readonly><br>
                <input style="margin-bottom: 0.6%;" type="text" name="lessonName" placeholder="Lesson" value=<?php echo $exam[0]["lessonName"] ?> readonly><br>
                <input style="margin-bottom: 0.6%;" type="text" name="score" placeholder="Score" value=<?php echo $exam[0]["examScore"] ?>><br>
                <input type="hidden" name="examId" value=<?php echo $id ?>>
                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>