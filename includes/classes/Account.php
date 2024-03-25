<?php
class Account
{


    private $conn;
    private $errorArray = array();


    public function __construct($conn){
        $this->conn = $conn;
    }

    public function register($fn, $ln,$un,$em,$em2,$pw,$pw2){

        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUserName($un);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pw, $pw2);
      

    }

    private function validateFirstName($fn) {

        if (strlen($fn) < 3 || strlen($fn) > 25) {

            array_push($this->errorArray, Constants::$firstNameCharacters);
        }
    }
    private function validateLastName($ln) {

        if (strlen($ln) < 3 || strlen($ln) > 25) {

            array_push($this->errorArray, Constants::$lastNameCharacters);
        }
    }
    private function validateUserName($un) {

        if (strlen($un) < 5 || strlen($un) > 25) {

            array_push($this->errorArray, Constants::$userNameCharacters);
            return;
        }
        $query =$this->conn->prepare("SELECT * FROM users WHERE username = :un");
        $query->bindValue(":un", $un);
        $query->execute();
        if($query->rowCount() !=0){
            array_push($this->errorArray, Constants::$userNameTaken);
        }
    }
    private function validateEmails($em, $em2) {
        if($em != $em2) {
            array_push($this->errorArray, Constants::$emailsDontMatch);
            return;
        }

        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE email=:em");
        $query->bindValue(":em", $em);

        $query->execute();
        
        if($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
        }
    }

    private function validatePasswords($pw, $pw2) {
        if($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordsDontMatch);
            return;
        }

        if(strlen($pw) < 5 || strlen($pw) > 25) {
            array_push($this->errorArray, Constants::$passwordLength);
        }
    }


    public function getError($error) {
    
        if(in_array($error, $this-> errorArray)){
            return $error;
        }

    }





}
