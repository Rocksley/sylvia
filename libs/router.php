<?php

  class Router{

    private $post; //Post Routes array
    private  $get; //Get request array

    public function __construct(){

      require 'app/routes.php'; //Including the file which contains Routes
      $this->post = $post; //Assinging the post routes
      $this->get = $get;
    }

    public function post($url){
      try{
        $pController = $this->post[$url];
        return $pController;

      }catch(Exception $e){

        return "No Such route";

      }


    }

    public function get($url){
      return $this->get[$url];

    }

  }


 ?>
