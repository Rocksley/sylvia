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

    if(Route::makeComparable($route) == Route::makeComparable($this->url) && $method == $this->method){

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

  /*

    If there is two slashes in url. One infront and another in back this function
    removes both front and backslashes from the url and make two urls comparable

  */

  public static function makeComparable($url){
    /*

      Checks if there is any slashes infront of the url string

    */

    if(substr($url,0,1) == '/'){
      $url = substr($url,1,strlen($url));
    }

    /*

      Checks if there is any slashes end of the url string

    */

    if(substr($url,strlen($url) - 1,1) == '/'){
      $url = substr($url,0,strlen($url) -1 );
    }
    /*

      return the processed url

    */

    return $url;

  }

}

?>
