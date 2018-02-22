<?php

class BaseSql {
    private $table;
    private $pdo;
    private $columns;

    public function __construct() {
        $this->table = strtolower(get_called_class());

        try {
            $this->pdo = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8', DBUSER, DBPWD);
        } catch (Expression $e) {
            die("Erreur " . $e->getMessage());
        }

    }
    
    public function setColumns() {
        $columnsExcluded = get_class_vars(get_class());
        $this->columns = array_diff_key(get_object_vars($this), $columnsExcluded);
    }
    
    public function save() {
        $this->setColumns();
        print_r($this->columns);
        if ( $this->id ) {
            // update

            
        } else {
            // insert
            unset($this->columns["id"]);

            $usersColumn = implode(",", array_keys($this->columns));
            $valuesColumn = implode(":", array_keys($this->columns));

            $query = "INSERT INTO " . $this->table . " (" .  $usersColumn . ")" . " VALUES (:".$valuesColumn.")";

            $request = $this->pdo->prepare($query);
            $request->execute($this->columns);

            print_r($request);
        }
    }
}