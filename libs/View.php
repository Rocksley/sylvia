<?php
namespace App;

class View{

    function make($name){

        $viewFile = __VDIR.$name.'.php';
        require_once($viewFile);
    }
}


 ?>
