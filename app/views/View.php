<?php

class View{

    function make($name){

        $viewFile = __VDIR.$name.'.php';
        require_once($viewFile);
    }
}


 ?>
