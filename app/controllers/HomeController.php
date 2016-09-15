<?php
use App\Controller;
use App\View;

class HomeController extends Controller{


  public function welcome(){
    return View::make('home/welcome');
  }

  public function login(){

    return View::make('home/login');

  }

  public function postHandler(){
    echo $_POST['id'];
    echo "This is a post request";
  }
}

 ?>
