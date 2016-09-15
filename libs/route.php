<?php
namespace App;
  /*

    Class Route is under namespace App. So before every file you need to enter
        use App/Route
    to use the class route independently. Route class takes three parameters while
    making an object and five vairables are assinged in this class as private
    variables. Three paramenters are $url, $handler and $method. $url is simply
    the url of caught by bootstrap/app.php file.  $handler is the second parameter
    of the get,post function and the last parameter $method is the http method.

  */

class Route{
  //different private variables are declared

  private $controller,$function,$name,$url,$method;

  //Contstructor taking three parameters.
  public function __construct($url,$handler,$method){

    //Assiging the method and url to variables of class

    $this->method = $method;
    $this->url = $url;

    /*

      Checking if the $handler variable is empty if not then exploding it taking
      @ and the separation element and taking first element of array as controller
      and second as function.

    */

    if(!empty($handler)){

      $handlerArray = explode('@',$handler);
      $this->controller = $handlerArray[0];
      $this->function = $handlerArray[1];
    }

  }

  /*

    Get is a static function. It takes two arguments or parameters. One is url
    and another one is controllers name. It simply return a route object. This
    function is used in routes.php file to define the routes to different urls.

  */

  public static function get($url,$controller){

    return new Route($url,$controller,'GET');

  }

  /*

    Post is another static function that takes two arguments like get. It is very
    similar to get you can check the get function for more information. It handles
    the GET http request from the client. It also return a route object but the
    third parameter is post.

  */

  public static function post($url,$controller){

    return new Route($url,$controller,'POST');

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
