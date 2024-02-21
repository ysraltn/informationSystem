<?php
session_start();
if($_SESSION["role"]!="3"){
    header("location: index.php?error=unauthorised");
}
include_once "./classes/dbh.classes.php";
include_once "./classes/exam.classes.php";
include_once "./classes/examController.php";

$id = $_SESSION["userid"];
$examController = new ExamController();
$exams = $examController->getExamsByStudentId($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body style="background-color: #7E8E92;">
    <div style="width: 50%; background-color: #c5d7d9; padding: 1%; margin-top: 1%;" class="container text-center">
        <?php
        include_once 'header.php';
        ?>
        <br>
        <button style="float: left; margin-bottom: 1%" class='btn btn-success add'>add exam</button>
        <table id="examsTable" class="display">
            <thead>
                <tr>
                    <th>name</th>
                    <th>surname</th>
                    <th>class</th>
                    <th>lesson</th>
                    <th>score</th>
                    <th>date</th>
                    <th>average</th>
                    <th>menu</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($exams as $exam) {
                    echo "<tr id= " . $exam["id"] . ">
                    <td>" . $exam["name"] . "</td>
                    <td>" . $exam["surname"] . "</td>
                    <td>" . $exam["className"] . "</td>
                    <td>" . $exam["lessonName"] . "</td>
                    <td>" . $exam["examScore"] . "</td>
                    <td>" . $exam["examDate"] . "</td>
                    <td>" . $exam["lessonAverage"] . "</td>
                    <td> 
                        <button style='font-size: 50%' class='btn btn-secondary edit'>Edit</button>
                        <button style='font-size: 50%' class='btn btn-danger delete'>Delete</button> 
                    </td>
                </tr>";
                }

                ?>

            </tbody>
        </table>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#examsTable').DataTable({});
            });
            const deleteButtons = document.querySelectorAll('.delete');
            deleteButtons.forEach(function(deleteButton) {
                deleteButton.addEventListener('click', deleteExam);
            })
            const editButtons = document.querySelectorAll('.edit');
            editButtons.forEach(function(editButton) {
                editButton.addEventListener('click', editExam);
            })
            const addButton = document.querySelector('.add');
            addButton.addEventListener('click', addExam);

            function deleteExam(e) {
                const id = e.target.parentElement.parentElement["id"];
                window.location.href = `./includes/deleteExam.inc.php?id=${id}`;
            }

            function editExam(e) {
                const id = e.target.parentElement.parentElement["id"];
                window.location.href = `./editExam.php?id=${id}`;
            }

            function addExam(e) {
                window.location.href = './addExam.php';
            }
        </script>
</body>

</html>