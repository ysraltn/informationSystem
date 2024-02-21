<?php
session_start();
if($_SESSION["role"]!="1"){
    header("location: index.php?error=unauthorised");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
</head>

<body style="background-color: #7E8E92;">
    <?php
    $id = $_GET["id"];
    include "./classes/dbh.classes.php";
    include './classes/class.classes.php';
    include './classes/classController.php';
    $classController = new ClassController();
    $students = $classController->getClassesStudents($id);
    ?>
    <div style="width: 50%; background-color: #c5d7d9; padding: 1%; margin-top: 1%;" class="container text-center">
        <?php
        include_once './header.php';
        echo "<br>";
        ?>
        <?php
        echo $students[0]["className"] . " students<br>";
        ?>
        <button style="float: left; margin-bottom: 1%" class='btn btn-success add' id=<?php echo $id ?>>add exam</button><br><br>
        <button style="float: left; margin-bottom: 1%" class='btn btn-success addS' id=<?php echo $id ?>>add student</button><br>
        <table id="studentsTable" class="display">
            <caption>class students</caption>
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
                foreach ($students as $student) {
                    echo "<tr id= " . $student["studentId"] . ">
                <td>" . $student["name"] . "</td>
                <td>" . $student["surname"] . "</td>
                <td>" . $student["className"] . "</td>
                <td>
                    <button style='font-size: 80%' class='btn btn-primary exams'>Exams</button>
                    <button id=" . $id . " style='font-size: 80%' class='btn btn-danger delete'>Delete</button>

                </td>
              </tr>";
                }
                ?>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#studentsTable').DataTable({});
    });

    const addButton = document.querySelector('.add');
    addButton.addEventListener('click', addExam);

    const addSButton = document.querySelector('.addS');
    addSButton.addEventListener('click', addStudent);

    const deleteButtons = document.querySelectorAll('.delete');
    deleteButtons.forEach(function(deleteButton) {
        deleteButton.addEventListener('click', deleteStudent);
    })

    const detailsButtons = document.querySelectorAll('.exams');
    detailsButtons.forEach(function(detailsButton) {
        detailsButton.addEventListener('click', showDetails);
    })

    function addExam(e) {
        const id = e.target["id"];
        window.location.href = `./addExam.php?id=${id}`;
    }

    function addStudent(e) {
        const id = e.target["id"];
        window.location.href = `./addStudentToClass.php?id=${id}`;
    }

    function deleteStudent(e) {
        const sId = e.target["id"];
        const cId = e.target.parentElement.parentElement["id"];
        window.location.href = `./deleteStudentFromClass.inc.php?sid=${sId}&cid=${cId}`;
    }

    function showDetails(e) {
        //console.log("details butonu");
        //console.log(e.target.parentElement.parentElement["id"]);
        const id = e.target.parentElement.parentElement["id"];
        window.location.href = `studentDetails.php?id=${id}`;
    }
</script>


</html>