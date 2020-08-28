<?php

require_once('models/User.php');

class LoginController extends BaseController
{
    public function index()
    {
        if(isset($_SESSION['user']))
        {
            header('Location: http://localhost/newspage/admin');
        }
        if(isset($_POST['user_signin']) && isset($_POST['pass_signin']))
        {
            if ($_POST['user_signin'] == '' || $_POST['pass_signin'] == '')
            {
                $this->view('admin/auth/login',[
                    'error' => 'Vui long dang nhap cho dung'
                ]);
            }
            else{
                if(User::attemp($_POST['user_signin'],$_POST['pass_signin']))
                {
                    $session = new Session();
                    $session->send($_POST['user_signin']);
                    header('Location: http://localhost/newspage/admin');
                }
                else{
                    $this->view('admin/auth/login',[
                        'error' => 'Sai ten dang nhap hoac mat khau'
                    ]);
                }
            }
        }
        else{
            $this->view('admin/auth/login');
        }
    }

}