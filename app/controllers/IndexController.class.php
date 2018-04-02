<?php

class IndexController{

	public function indexAction($params){
		$name = "Kevin";

		$v = new View("default","front");
		$v->assign("name", $name);
	}

}