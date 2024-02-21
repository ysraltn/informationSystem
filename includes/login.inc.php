<?php

    if(isset($_POST["submit"])){

        
        $userName = $_POST["userName"];
        $password = $_POST["password"];

        
        include '../classes/dbh.classes.php';
        include '../classes/login.classes.php';
        include '../classes/loginController.classes.php';
        $login = new LoginController($userName,$password);

       
        $login->loginUser();

       
        header("location: ../home.php");
    }
    else{
        echo "burdayim";
        header("location: ../login.php");
    }
    

?>