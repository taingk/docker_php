<?php

define("DBUSER","root");
define("DBPWD","root");
define("DBHOST","mysql_simple");
define("DBNAME","app");
define("DBPORT","3306");


define("DS", "/");

//dirname($_SERVER["SCRIPT_NAME"]) => /3IW classe 2/
//dirname($_SERVER["SCRIPT_NAME"]) => //
$scriptName = (dirname($_SERVER["SCRIPT_NAME"]) == "/")?"":dirname($_SERVER["SCRIPT_NAME"]);
define("DIRNAME", $scriptName.DS);