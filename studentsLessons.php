<?php
session_start();
include_once "./classes/dbh.classes.php";
include_once "./classes/lesson.classes.php";
include_once "./classes/lessonController.php";

$lessonController = new LessonController();
$lessons = $lessonController->getAllLessons();
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
        echo "<br>";
        ?>
        <button style="float: left; margin-bottom: 1%" class='btn btn-success add'>add lesson</button>
        <table id="lessonsTable" class="display">
            <thead>
                <tr>
                    <th>lesson</th>
                    <th>teacher name</th>
                    <th>teacher surname</th>
                    <th>menu</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lessons as $lesson) {
                    echo "<tr id= " . $lesson["id"] . ">
                    <td>" . $lesson["lessonName"] . "</td>
                    <td>" . $lesson["name"] . "</td>
                    <td>" . $lesson["surname"] . "</td>
                    <td> 
                        <button class='btn btn-secondary edit'>Edit 
                        <button class='btn btn-danger delete'>Delete</button> 
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
                var table = $('#lessonsTable').DataTable({});
            });
            const deleteButtons = document.querySelectorAll('.delete');
            deleteButtons.forEach(function(deleteButton) {
                deleteButton.addEventListener('click', deleteLesson);
            })
            const editButtons = document.querySelectorAll('.edit');
            editButtons.forEach(function(editButton) {
                editButton.addEventListener('click', editTeacher);
            })
            const addButton = document.querySelector('.add');
            addButton.addEventListener('click', addLesson);

            function deleteLesson(e) {
                const id = e.target.parentElement.parentElement["id"];
                window.location.href = `./includes/deleteLesson.inc.php?id=${id}`;
            }

            function editTeacher(e) {
                const id = e.target.parentElement.parentElement["id"];
                window.location.href = `./editLesson.php?id=${id}`;
            }

            function addLesson(e) {
                window.location.href = './addLesson.php';
            }
        </script>
</body>

</html>