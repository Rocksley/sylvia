<?php
if(isset($_GET['url'])){

    if(empty($_GET['url'])){ //If the alias is empty
      $url = "/"; //Then set URL to root or /
    }else{
      $url = $_GET['url']; //Else set URL to get value
    }

    $router= new Router;

    $route = explode('@',$router->get($url));
    $controllerName = $route[0];
    $functionName = $route[1];

    require_once(__CDIR.$controllerName.'.php');

    $controller = new $controllerName;
    $controller->$functionName();
  }

  if(isset($_POST['url'])){
    if(empty($_POST['url'])){
      $url = '/';

    }else{
      $url = $_POST['url'];
    }

    $router= new Router;

    $route = explode('@',$router->get($url));
    $controllerName = $route[0];
    $functionName = $route[1];

    require_once(__CDIR.$controllerName.'.php');

    $controller = new $controllerName;
    $controller->$functionName();
  

  }

?>
