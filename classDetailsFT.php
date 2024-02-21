<?php
session_start();
if($_SESSION["role"]!="2"){
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
    $id = $_SESSION["userid"];
    include "./classes/dbh.classes.php";
    include './classes/class.classes.php';
    include './classes/classController.php';
    $classController = new ClassController();
    $students = $classController->getClassesStudentsByTeacherId($id);
    ?>
    <div style="width: 50%; background-color: #c5d7d9; padding: 1%; margin-top: 1%;" class="container text-center">
        <?php
        include './header.php';
        echo "<br>";
        ?>
        <?php
        echo $students[0]["className"] . " students<br>";
        ?>
        <button style="float: left; margin-bottom: 1%" class='btn btn-success add' id=<?php echo $id ?>>add exam</button><br>
        <table id="studentsTable" class="display">
            <caption>class students</caption>
            <thead>
                <tr>
                    <th>name</th>
                    <th>surname</th>
                    <th>class</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($students as $student) {
                    echo "<tr>
                <td>" . $student["name"] . "</td>
                <td>" . $student["surname"] . "</td>
                <td>" . $student["className"] . "</td>
              </tr>";
                }
                ?>
    </div>
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

    function addExam(e) {
        const id = e.target["id"];
        window.location.href = `./addExamToStudentFT.php?id=${id}`;
    }
</script>


</html>