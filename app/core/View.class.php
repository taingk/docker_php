<?php
class View{

	private $v;
	private $t;
	private $data = [];

	public function __construct($v="default", $t="front"){
		// Assignent $v et $t par les valeurs données en paramètre
		$this->v = $v.".view.php";
		$this->t = $t.".tpl.php";

		// Si view ou template données en paramètre n'existe pas, die
		if ( !file_exists("views/".$this->v) ) {
			die("La vue :".$this->v." n'existe pas");
		}
		if ( !file_exists("views/templates/".$this->t) ) {
			die("Le template :".$this->t." n'existe pas");
		}			

	}

	public function __destruct(){
		// Recupère action et controller en global
		global $a, $c;

		// Transforme les entrés de data en tableau
		extract($this->data);

		// On include le template
		include "views/templates/".$this->t;
	}

	public function assign($key, $value){
		// Prends en paramètre une clée et une valeur et insert dans $data
		$this->data[$key] = $value;
	}

}