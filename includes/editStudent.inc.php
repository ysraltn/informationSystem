<?php
session_start();
if ($_SESSION["role"] != "1") {
    header("location: index.php?error=unauthorised");
}
if (isset($_POST["submit"])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $userName = $_POST["userName"];
    $role = $_POST["role"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];
    $id = $_POST["id"];


    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signupController.classes.php";
    $signup = new SignupController($firstName, $lastName, $userName, $role, $password, $repeatPassword);
    $signup->updateUserI($id);
    header("location: ../students.php?error=none");
}
