<?php
  namespace App;

  class Route{
    private $controller,$function,$name,$url,$method;

    public function __construct($url,$handler,$method){
      $this->method = $method;
      $this->url = $url;
      if(!empty($handler)){

        $handlerArray = explode('@',$handler);
        $this->controller = $handlerArray[0];
        $this->function = $handlerArray[1];
      }

    }

    public static function get($url,$controller){

      return new Route($url,$controller,'GET');

    }

    public function name($name){
      $this->name = $name;
    }

    public function getName(){

    }

    public function getController(){

      return $this->controller;

    }

    public function getFunction(){

      return $this->function;

    }

    public function getUrl(){
      return $this->url;
    }

    public function toCall($route,$method){

      if($route == $this->url && $method == $this->method){

        return true;

      }else{

        return false;

      }
    }


    public function call($controller,$function,$url){

      require __CDIR.$controller.'.php';

      $app = new $controller;

        $app->$function();

    }


  }

 ?>
