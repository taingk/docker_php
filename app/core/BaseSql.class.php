<?php

class BaseSql {
    private $table;
    private $pdo;

    public function __construct() {
        $this->table = get_called_class();
        try {
            $this->pdo = new PDO("mysql:host=" . DHBHOST . ";dbname=" . DBNAME . ";charset=utf8", DBUSER, DBPWD);
        } catch (Expression $e) {
            die("Erreur " . $e);
        }
    }

    public function save() {
        echo "Enregistrement<br>";

    }
}