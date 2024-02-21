<?php
session_start();
include_once "./classes/dbh.classes.php";
include_once "./classes/teacher.classes.php";
include_once "./classes/teacherController.php";
$id = $_GET["id"];
$teacherController = new TeacherController();
$teachersLessons = $teacherController->getTeachersLessons($id);

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
        <button style="float: left; margin-bottom: 1%" class='btn btn-success add'>add lesson</button>
        <table id="teachersTable" class="display">
            <thead>
                <tr>
                    <th>name</th>
                    <th>surname</th>
                    <th>lesson</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($teachersLessons as $teachersLesson) {
                    echo "<tr id= " . $teachersLesson["id"] . ">
                <td>" . $teachersLesson["name"] . "</td>
                <td>" . $teachersLesson["surname"] . "</td>
                <td>" . $teachersLesson["lessonName"] . "</td>
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
                var table = $('#teachersTable').DataTable({});
            });
            const deleteButtons = document.querySelectorAll('.delete');
            deleteButtons.forEach(function(deleteButton) {
                deleteButton.addEventListener('click', deleteTeacher);
            })
            const editButtons = document.querySelectorAll('.lessons');
            editButtons.forEach(function(editButton) {
                editButton.addEventListener('click', lessons);
            })
            const addButton = document.querySelector('.add');
            addButton.addEventListener('click', addLesson);

            function deleteTeacher(e) {
                const id = e.target.parentElement.parentElement["id"];
                window.location.href = `./includes/deleteStudent.inc.php?id=${id}`;
            }

            function lessons(e) {
                const id = e.target.parentElement.parentElement["id"];
                window.location.href = `./editUser.php?id=${id}`;
            }

            function addLesson(e) {
                window.location.href = './addLesson.php';
            }
        </script>
</body>

</html>