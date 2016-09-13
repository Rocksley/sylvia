<?php
/*

  This file contains all the configuration data for the project. Including this
  file allows to use contants that are defined in this file.

*/
  require('config/app.php');

/*

  Routes file contains all the routing data. You need to place all the routing data
  into this routes file. This file contains some arrays and the data from arrays are used
  by router to route the url.

*/

require('libs/route.php'); //Including Router PHP
require('app/routes.php');
require('libs/View.php'); //Inlcudi
require('libs/Controller.php');
require('bootstrap/app.php'); //Bootstrap

?>
