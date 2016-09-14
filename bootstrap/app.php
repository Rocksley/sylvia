<?php
use App\Route;
use App\Controller;

$routes = require 'app/routes.php';

if(isset($_GET['url'])){

  $url = $_GET['url'];
}else{

  $url = '/';
}
$method = $_SERVER['REQUEST_METHOD'];

foreach($routes as $route){

  if($route->toCall($url,$method)){
    $route->call($route->getController(),$route->getFunction(),$route->getUrl());

  }
}
?>
