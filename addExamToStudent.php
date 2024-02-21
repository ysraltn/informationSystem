<?php
session_start();
if($_SESSION["role"]!="1"){
    header("location: index.php?error=unauthorised");
}

$id = $_GET["id"];
include "./classes/dbh.classes.php";
include './classes/student.classes.php';
include './classes/studentController.php';
include './classes/lesson.classes.php';
include './classes/lessonController.php';
$studentController = new StudentController();
$student = $studentController->getStudentById($id);
$lessonController = new LessonController();
$lessons = $lessonController->getAllLessons();
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
            <h4>Add Exam Score</h4>
            <form action="./includes/addExamToStudent.inc.php" method="post" id="addExam-form">
                <input style="margin-bottom: 0.6%;" type="text" name="firstName" placeholder="Firstname" value=<?php echo $student[0]["name"] ?> readonly><br>
                <input style="margin-bottom: 0.6%;" type="text" name="lastName" placeholder="Lastname" value=<?php echo $student[0]["surname"] ?> readonly><br>
                <input style="margin-bottom: 0.6%;" type="text" name="className" placeholder="Class" value=<?php echo $student[0]["className"] ?> readonly><br>
                <input type="hidden" name="studentId" value=<?php echo $id ?>>
                <input type="hidden" name="classId" value=<?php echo $student[0]["classId"] ?>>

                <label for="lessons">Lesson:</label>
                <select style="margin-bottom: 0.6%;" name="lessonId" id="lesson" form="addExam-form">
                    <?php
                    foreach ($lessons as $lesson) {
                        echo "<option value=" . $lesson["id"] . ">" . $lesson["lessonName"] . "</option>";
                    }
                    ?>
                </select><br>
                <input style="margin-bottom: 0.6%;" type="text" name="score" placeholder="Score"><br>
                <button type="submit" name="submit">Add</button>
            </form>
        </div>
    </div>