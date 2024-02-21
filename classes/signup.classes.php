<?php

class Signup extends Dbh{
    protected function checkUser($username){
        $statement = $this->connect()->prepare('SELECT username FROM users WHERE username = ?;');

        if(!$statement->execute(array($username))){
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }

        //$resultCheck;
        if($statement->rowCount() > 0){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck; 
    }

    protected function checkUserForUpdate($username, $id){
        $statement = $this->connect()->prepare('SELECT username FROM users WHERE users.username = ? AND users.id != ?;');

        if(!$statement->execute(array($username, $id))){
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }

        //$resultCheck;
        if($statement->rowCount() > 0){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck; 
    }

    public function setUser($firstName, $lastName, $username, $role, $password){
        $statement = $this->connect()->prepare('INSERT INTO users (username, users.name, surname, users.password, users.role) VALUES (?,?,?,?,?);');

        $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

        if(!$statement->execute(array($username, $firstName, $lastName, $hashedPassword, $role))){
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }
        $statement = null;
    }

    public function updateUser($id, $firstName, $lastName, $username, $role, $password){
        $statement = $this->connect()->prepare('UPDATE users SET users.name=?, users.surname=?, users.username=?, users.password=?, users.role=? WHERE users.id=?;');
        
        $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

        if(!$statement->execute(array($firstName, $lastName, $username, $hashedPassword, $role, $id))){
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }
        $statement = null;
    }

}