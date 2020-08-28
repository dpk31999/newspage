<?php
require_once('connection.php');

require_once('core/init.php');

if (isset($_GET['p1'])) {
  if($_GET['p1'] == 'admin')
  {
    if(isset($_GET['p2']))
    {
      $controller = $_GET['p2'];
      if (isset($_GET['p3'])) {
        $action = $_GET['p3'];
      } 
      else {
        $action = 'index';
      }
    }
    else{
      $controller = 'home';
      $action = 'index';
    }


    require_once('routesAdmin.php');
  }
  else{
    $controller = $_GET['p1'];
    if (isset($_GET['p2'])) {
      if(is_numeric($_GET['p2']))
      {
        $action = 'show';
        $id = $_GET['p2'];
      }
      else{
        $action = $_GET['p2'];
      }
    } 
    else {
      $action = 'index';
    }

    require_once('routes.php');
  }
} else {
  $controller = 'home';
  $action = 'index';

  require_once('routes.php');
}
