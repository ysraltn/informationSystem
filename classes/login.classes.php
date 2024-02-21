<?php
ob_start();
class Login extends Dbh{
    protected function getUser($username, $password){
        $statement = $this->connect()->prepare('SELECT users.password FROM users WHERE username = ?;');

        if(!$statement->execute(array($username))){
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }

        if($statement->rowCount() == 0){
            $statement = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $passwordHashed = $statement->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed[0]["password"]);
        $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
        echo $passwordHashed[0]["password"];
        echo "<br>";

        if($checkPassword == false){
            $statement = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        elseif($checkPassword == true){
            $statement = $this->connect()->prepare('SELECT * FROM users WHERE users.username = ?;');
            if(!$statement->execute(array($username))){
                $statement = null;
                header("location: ../index.php?error=statementfailed");
                exit();
            }
            if($statement->rowCount() == 0){
                $statement = null;
                // echo "parola";
                // echo $username;
                // echo $password;
                // echo "<br>";
                // echo $hashedPassword;
                header("location: ../index.php?error=usernotfound");
                exit();
            }
            $user = $statement->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["userid"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];
            $_SESSION["firstName"] = $user[0]["name"];
            $_SESSION["surName"] = $user[0]["surname"];
            $_SESSION["role"] = $user[0]["role"];
            $_SESSION["loggedIn"] = true;
            header("location: ../home.php");
            exit();
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck; 
    }


}