<?php 
require './vendor/autoload.php';
$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);




function getConnection() {
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="slim";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

$container = new \Slim\Container();




?>