<?php

class Users extends BaseSql {
    private $id = null;
    private $firstname;
    private $lastname;
    private $email;
    private $pwd;
    private $token;
    private $age;
    
    private $status;
    private $date_inserted;
    private $date_updated;

    public function __construct() {
        parent::__construct();
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFirstname($firstname) {
        $this->firstname = ucfirst(strtolower(trim($firstname)));
    }

    public function setLastname($lastname) {
        $this->lastname = strtoupper(trim($lastname));
    }

    public function setEmail($email) {
        $this->email = strtolower(trim($email));
    }

    public function setPwd($pwd) {
        // Salt unique PAR mot de passe
        $this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
    }

    public function setToken($token) {
        $this->token = $token;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getId() {
        return $this->id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPwd() {
        return $this->pwd;
    }

    public function getToken() {
        return $this->token;
    }

    public function getAge() {
        return $this->age;
    }

    public function getStatus() {
        return $this->status;
    }
}

?>