<?php

session_start();
require 'conf.inc.php';

try {
    $bdd = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8', DBUSER, DBPASSWORD);
    // phpinfo();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$uri = $_SERVER['REQUEST_URI'];
$uri = explode("?", $uri);
$uri = str_ireplace(DIRNAME, '', urldecode($uri[0]));

$exploded = explode(DS, $uri);

$c = (empty($exploded[1])) ? "index" : $exploded[1];
$a = (empty($exploded[2])) ? "index" : $exploded[2];

unset($exploded[0]);
unset($exploded[1]);

$c = ucfirst(strtolower($c))."Controller";
$a = strtolower($a)."Action";

$params = [ 'POST' => $_POST, "GET" => $_GET, "URL" => array_values($exploded) ];

if (file_exists('controllers/' . $c . '.class.php')) {
    include('controllers/' . $c . '.class.php');
    if (class_exists($c)) {
        $objC = new $c();
        if (method_exists($objC, $a)) {
            $objC->$a($params);
        } else {
            die('L\'action ' . $a . ' n\'existe pas');
        }
    } else {
        die('La class n\'existe pas');        
    }
} else {
    die('Le controller ' . $c . ' n\'existe pas');
}