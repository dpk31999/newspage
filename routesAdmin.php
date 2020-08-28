<?php 
require_once('controllers/BaseController.php');

$controllers = array(
    'home' => ['index'],
    'login' => ['index'],
    'account' => ['index','add','edit','delete','lock','unlock'],
    'post' => ['index','add','edit','delete'],
    'profile' => ['index','editavatar','editinfo','editpassword'],
    'logout' => ['index'],
    'category' => ['index','add','edit','delete'],
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'page';
    $action = 'error';
}
else if(!array_key_exists($controller, $controllers) && !in_array($action, $controllers[$controller])){
    $controller = 'home';
    $action = 'index';
}


if($action == 'error')
{
    include_once('controllers/' . ucfirst($controller) . 'Controller.php');
}
else{
    include_once('controllers/admin/' . ucfirst($controller) . 'Controller.php');    
}

$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;

$controller->$action();