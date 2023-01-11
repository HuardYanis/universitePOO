<?php

require_once "DB.php";

class Etudiant extends DB {

    protected $firstname;
    protected $lastname;
    protected $email;
    protected $password;

    public function __construct($firstname, $lastname, $email, $password) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }


    public function getFirstName() {
    
        return $this->firstname;
    }

    public function getLastName() {
        return $this->lastname;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }



}

?>