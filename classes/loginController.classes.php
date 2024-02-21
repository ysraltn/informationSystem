<?php

    class LoginController extends Login{
        private $userName;
        private $password;

        public function __construct($userName, $password)
        {
            $this->userName = $userName;
            $this->password = $password;
        }

        public function loginUser(){
            if($this->emptyInput() == false){
                header("location: ../index.php?error=emptyinput");
                exit();
            }

            $this->getUser($this->userName, $this->password);
        }

        private function emptyInput(){
            //$result;
            if(empty($this->userName || $this->password )){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

    }   