<?php
session_start();
if($_SESSION["role"]!=1){
    header("location: index.php?error=unauthorised");
}
include_once "./classes/dbh.classes.php";
include_once "./classes/teacher.classes.php";
include_once "./classes/teacherController.php";

$teacherController = new TeacherController();
$teachers = $teacherController->getAllTeachers();

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
        <button style="float: left; margin-bottom: 1%" class='btn btn-success add'>add teacher</button>
        <table id="teachersTable" class="display">
            <thead>
                <tr>
                    <th>name</th>
                    <th>surname</th>
                    <th>class</th>
                    <th>menu</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($teachers as $teacher) {
                    echo "<tr id= " . $teacher["id"] . ">
                <td>" . $teacher["name"] . "</td>
                <td>" . $teacher["surname"] . "</td>
                <td>" . $teacher["className"] . "</td>
                <td> 
                    <button style='font-size: 80%' class='btn btn-secondary edit'>Edit</button>
                    <button style='font-size: 80%' class='btn btn-primary lessons'>Lessons</button>
                    <button style='font-size: 80%' class='btn btn-danger delete'>Delete</button> 
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
                var table = $('#teachersTable').DataTable({});
            });
            const deleteButtons = document.querySelectorAll('.delete');
            deleteButtons.forEach(function(deleteButton) {
                deleteButton.addEventListener('click', deleteTeacher);
            })
            const lessonsButtons = document.querySelectorAll('.lessons');
            lessonsButtons.forEach(function(lessonsButton) {
                lessonsButton.addEventListener('click', lessons);
            })
            const editButtons = document.querySelectorAll('.edit');
            editButtons.forEach(function(editButton) {
                editButton.addEventListener('click', edit);
            })
            const addButton = document.querySelector('.add');
            addButton.addEventListener('click', addTeacher);

            function deleteTeacher(e) {
                const id = e.target.parentElement.parentElement["id"];
                window.location.href = `./includes/deleteStudent.inc.php?id=${id}`;
            }

            function edit(e) {
                const id = e.target.parentElement.parentElement["id"];
                window.location.href = `./editUser.php?id=${id}`;
            }

            function lessons(e) {
                const id = e.target.parentElement.parentElement["id"];
                window.location.href = `./teachersLessons.php?id=${id}`;
            }

            function addTeacher(e) {
                window.location.href = './addUser.php';
            }
        </script>
</body>

</html>