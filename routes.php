<?php
require_once('controllers/BaseController.php');

$controllers = array(
  'page' => ['index', 'error'],
  'category' => ['show'],
  'post' => ['index','show'],
  'home' => ['index']
); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'page';
  $action = 'error';
}
else if(!array_key_exists($controller, $controllers) && !in_array($action, $controllers[$controller])){
  $controller = 'home';
  $action = 'index';
}

// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
include_once('controllers/' . ucfirst($controller) . 'Controller.php');
// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;

$controller->$action();