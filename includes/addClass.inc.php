<?php
session_start();
if($_SESSION["role"]!="1"){
    header("location: index.php?error=unauthorised");
}
    if(isset($_POST["submit"])){
        $className = $_POST["className"];
        $teacherId = $_POST["teacherId"];
    
        include "../classes/dbh.classes.php";
        include "../classes/class.classes.php";
        include "../classes/classController.php";
        $classController = new ClassController();
        $classController->addClass($className, $teacherId);
        header("location: ../classes.php?error=none");
    }
