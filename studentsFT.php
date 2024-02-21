<?php
session_start();

include_once "./classes/dbh.classes.php";
include_once "./classes/student.classes.php";
include_once "./classes/studentController.php";

$studentController = new StudentController();
$students = $studentController->getAllStudents();

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
        <button style="float: left; margin-bottom: 1%" class='btn btn-success add'>add student</button>
        <table id="studentsTable" class="display">
            <thead>
                <tr>
                    <th>name</th>
                    <th>surname</th>
                    <th>class</th>
                    <th>average</th>
                    <th>menu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($students as $student) {
                    echo "<tr id= " . $student["id"] . ">
                <td>" . $student["name"] . "</td>
                <td>" . $student["surname"] . "</td>
                <td>" . $student["className"] . "</td>
                <td>" . $student["averageScore"] . "</td>
                <td> 
                    <button class='btn btn-primary details'>Exams</button>  
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
                detailsButton.addEventListener('click', showDetails);
            })
            

            function showDetails(e) {
                //console.log("details butonu");
                //console.log(e.target.parentElement.parentElement["id"]);
                const id = e.target.parentElement.parentElement["id"];
                window.location.href = `studentDetailsFT.php?id=${id}`;
            }

        </script>
</body>

</html>