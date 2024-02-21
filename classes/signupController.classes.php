<?php

    class SignupController extends Signup{
        private $firstName;
        private $lastName;
        private $userName;
        private $role;
        private $password;
        private $repeatPassword;

        public function __construct($firstName, $lastName, $userName, $role, $password, $repeatPassword)
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->userName = $userName;
            $this->role = $role;
            $this->password = $password;
            $this->repeatPassword = $repeatPassword;
        }

        public function signupUser(){

            if($this->emptyInput() == false){
                //echo "empty i";
                header("location: ../index.php?error=emptyinput");
                exit();
            }
            if($this->invalidUserName() == false){
                header("location: ../index.php?error=emptyusername");
                exit();
            }
            if($this->passwordMatch() == false){
                header("location: ../index.php?error=passdontmatch");
                exit();
            }
            if($this->usernameTakenCheck() == false){
                header("location: ../index.php?error=usernameoremailtaken");
                exit();
            }

            $this->setUser($this->firstName, $this->lastName, $this->userName, $this->role, $this->password);
        }

        public function updateUserI($id){

            if($this->emptyInput() == false){
                //echo "empty i";
                header("location: ../students.php?error=emptyinput");
                exit();
            }
            
            if($this->passwordMatch() == false){
                header("location: ../students.php?error=passdontmatch");
                exit();
            }

            if($this->usernameTakenForUpdateCheck($id) == false){
                header("location: ../students.php?error=usernameoremailtaken");
                exit();
            }

            $this->updateUser($id, $this->firstName, $this->lastName, $this->userName, $this->role, $this->password);
        }

        private function emptyInput(){
            //$result;
            if (empty($this->firstName) || empty($this->lastName) || empty($this->userName) || empty($this->role) || empty($this->password) || empty($this->repeatPassword)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function invalidUserName() {
            //$result;
            if(!preg_match("/^[a-zA-Z0-9]*$/", $this->userName)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function passwordMatch(){
            if($this->password !== $this->repeatPassword){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function usernameTakenCheck(){
            if(!$this->checkUser($this->userName)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function usernameTakenForUpdateCheck($id){
            if(!$this->checkUserForUpdate($this->userName, $id)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }
    }