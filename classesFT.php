<?php
session_start();
if($_SESSION["role"]!="2"){
    header("location: index.php?error=unauthorised");
}
include_once "./classes/dbh.classes.php";
include_once "./classes/class.classes.php";
include_once "./classes/classController.php";
$teacherId = $_SESSION["userid"];

$classController = new ClassController();
$classes = $classController->getClassesByTeacherId($teacherId);

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
        <table id="studentsTable" class="display">
            <thead>
                <tr>
                    <th>class</th>
                    <th>t name</th>
                    <th>t surname</th>
                    <th>average</th>
                    <th>menu</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($classes as $classE) {
                    echo "<tr id= " . $classE["id"] . ">
                    <td>" . $classE["className"] . "</td>
                    <td>" . $classE["name"] . "</td>
                    <td>" . $classE["surname"] . "</td>
                    <td>" . $classE["averageScore"] . "</td>
                    <td> 
                        <button style='font-size: 80%' class='btn btn-primary details'>view class</button> 
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
                var table = $('#studentsTable').DataTable({});
            });

            const detailsButtons = document.querySelectorAll('.details');
            detailsButtons.forEach(function(detailsButton) {
                detailsButton.addEventListener('click', getStudents);
            })
            const deleteButtons = document.querySelectorAll('.delete');
            deleteButtons.forEach(function(deleteButton) {
                deleteButton.addEventListener('click', deleteStudent);
            })
            const addButton = document.querySelector('.add');
            addButton.addEventListener('click', addStudent);

            function getStudents(e) {
                //console.log("details butonu");
                //console.log(e.target.parentElement.parentElement["id"]);
                const id = e.target.parentElement.parentElement["id"];
                window.location.href = `classDetailsFT.php`;
            }

            function deleteStudent(e) {
                const id = e.target.parentElement.parentElement["id"];
                window.location.href = `./includes/deleteStudent.inc.php?id=${id}`;
            }

            function editStudent(e) {
                const id = e.target.parentElement.parentElement["id"];
                window.location.href = `./editUser.php?id=${id}`;
            }

            function addStudent(e) {
                window.location.href = './addUser.php';
            }
        </script>
</body>

</html>