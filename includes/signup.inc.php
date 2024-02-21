<?php
    if(isset($_POST["submit"])){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $userName = $_POST["userName"];
        $role = $_POST["role"];
        $password = $_POST["password"];
        $repeatPassword = $_POST["repeatPassword"];

        include "../classes/dbh.classes.php";
        include "../classes/signup.classes.php";
        include "../classes/signupController.classes.php";
        $signup = new SignupController($firstName, $lastName, $userName, $role, $password, $repeatPassword);
        $signup->signupUser();
        header("location: ../index.php?error=none");
    }
?>