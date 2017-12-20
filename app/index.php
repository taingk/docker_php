<?php

session_start();
require 'conf.inc.php';

function myAutoLoader($class) {
    $class = $class.".class.php";
    if (file_exists("core/".$class)) {
        include "core/".$class;
    }
}

spl_autoload_register("myAutoloader");

try {
    $bdd = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8', DBUSER, DBPASSWORD);
    // phpinfo();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$uri = $_SERVER['REQUEST_URI'];
$uri = explode("?", $uri); // Parser l'URI pour retirer le parametre GET
$uri = str_ireplace(DIRNAME, '', urldecode($uri[0])); // Retire le directory défini dans la constante DIRNAME
$exploded = explode(DS, $uri); // On coupe à chaque '/'

$c = (empty($exploded[1])) ? "index" : $exploded[1]; 
$a = (empty($exploded[2])) ? "index" : $exploded[2];

unset($exploded[0]); // On enlève les valeurs pour clean le tableau pour réutilisation
unset($exploded[1]);

$c = ucfirst(strtolower($c))."Controller"; // Controller
$a = strtolower($a)."Action"; // Action

// Tableau qui retourne les paramètres POST GET et réinitialise les clés à 0
$params = [ 'POST' => $_POST, "GET" => $_GET, "URL" => array_values($exploded) ]; 

if (file_exists('controllers/' . $c . '.class.php')) {
    // Include: Si le fichier n'existe pas, continue le traitement
    include('controllers/' . $c . '.class.php');
    if (class_exists($c)) {
        $objC = new $c(); // Instance d'une classe dynamique
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