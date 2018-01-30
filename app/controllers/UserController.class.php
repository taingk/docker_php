<?php
class UserController{

	public function indexAction($params){
		echo "Action par défaut de user";
	}
	

	public function addAction($params){
		echo "Ajout d'un utilisateur<pre>";

		$user = new Users();
		$user->setFirstname("Kevin");
		$user->setLastname("Taing");
		$user->setEmail("ktaing2@myges.fr");
		$user->setPwd("motdepasse");
		$user->setToken("token");
		$user->setAge(22);
		$user->save();
	}

	public function listAction($params){
		$v = new View("users","front");
	}

	public function modifyAction($params){
		echo "Modification d'un utilisateur";
		echo $params["URL"][0];
		
	}
}