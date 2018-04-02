<?php

class BaseSql {
    private $table;
    private $pdo;
    private $columns;

    public function __construct() {
        // Remplit $table par le nom de la classe qui l'appelle, qui vient de models/
        $this->table = strtolower(get_called_class());

        try {
            // Connexion à la bdd
            $this->pdo = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8', DBUSER, DBPWD);
        } catch (Expression $e) {
            die("Erreur " . $e->getMessage());
        }

    }
    
    public function setColumns() {
        $columnsExcluded = get_class_vars(get_class());
        // Retire les attributs de cette class : table pdo columns
        // On ne garde que les attributs de la classe enfant
        $this->columns = array_diff_key(get_object_vars($this), $columnsExcluded);
    }
    
    public function save() {
        // Clean $columns
        $this->setColumns();
        print_r($this->columns);
        
        // Si un id est spécifié, c'est un update
        if ( $this->id ) {

            
        } else {
            // Sinon c'est un insert
            // On retire id comme il est null
            unset($this->columns["id"]);

            // On recupere les clé de columns et les sépare par ',' et ':' 
            $usersColumn = implode(",", array_keys($this->columns));
            $valuesColumn = implode(",:", array_keys($this->columns));

            $query = "INSERT INTO " . $this->table . " (" .  $usersColumn . ")" . " VALUES (:".$valuesColumn.")";

            // Prepare et execute la requete 
            $request = $this->pdo->prepare($query);
            // alimenté par le tableau $columns
            $request->execute($this->columns);
            
            print_r($request);
        }
    }
}