<?php

require_once('models/Category.php');
include_once('models/User.php');

class BaseController
{
  
  public $date_current;
  public $user;
  public $domain = 'http://localhost/newspage';

  function __construct()
  {
    date_default_timezone_set('Asia/Ho_Chi_Minh'); 
    $this->date_current = date("Y-m-d H:i:s");
    if(isset($_SESSION['user']))
    {
      $this->user = User::get($_SESSION['user']);
    }
  }

  // Hàm hiển thị kết quả ra cho người dùng.
  function view($file, $data = array())
  {
    $view_file = 'views/' . $file . '.php';  
    $categories = Category::all();
    $domain = $this->domain;

    if (is_file($view_file)) {
      // Nếu tồn tại file đó thì tạo ra các biến chứa giá trị truyền vào lúc gọi hàm
      if(isset($_SESSION['user']))
      {
        $user = $this->user;
        extract(['user' => $user]);
      }
      extract($data);
      // Sau đó lưu giá trị trả về khi chạy file view template với các dữ liệu đó vào 1 biến chứ chưa hiển thị luôn ra trình duyệt
      ob_start();
      require_once($view_file);
      $content = ob_get_clean();
      // Sau khi có kết quả đã được lưu vào biến $content, gọi ra template chung của hệ thống đế hiển thị ra cho người dùng
      if(isset($_GET['p1']) && $_GET['p1'] == 'admin')
      {
        if(isset($_SESSION['user']))
        {
          require_once('views/admin/layouts/application.php');
        }
        else{
          require_once('views/admin/layouts/appnotauth.php');
        }
      }
      else{
        require_once('views/layouts/application.php');
      }
    } else {
      // Nếu file muốn gọi ra không tồn tại thì chuyển hướng đến trang báo lỗi.
      header('Location: '. $this->domain .'/page/error');
    }
  }
}