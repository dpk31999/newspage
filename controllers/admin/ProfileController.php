<?php 

require_once('models/Account.php');

class ProfileController extends BaseController
{
    public function index()
    {
        $this->view('admin/profile/index');
    }

    public function editavatar()
    {
        if(isset($_FILES['img_avt']))
        {
            $dir = '/newspage/storage/';
            $name_img = stripslashes($_FILES['img_avt']['name']);
            if($name_img != '')
            {
                $source_img = $_FILES['img_avt']['tmp_name'];
                $arr_type = explode(".", $name_img);
                $type_img = end($arr_type);

                $url_thumb = 'avatar/' . time(). '.' . $type_img;

                move_uploaded_file($source_img,$_SERVER['DOCUMENT_ROOT'] .  $dir . $url_thumb);

                Account::saveAvatar($this->user->id,$url_thumb);

                $_SESSION['status'] = 'successAvt';
            }
            else
            {
                $_SESSION['error'] = 'errorAvt';
            }

            header('Location: http://localhost/newspage/admin/profile');
        }
    }

    public function editinfo()
    {
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']))
        {
            Account::saveInfo($this->user->id,$_POST['name'],$_POST['email'],$_POST['phone']);
            $_SESSION['status'] = 'successInfo';
        }
        else
        {
            $_SESSION['error'] = 'errorInfo';
        }
        header('Location: http://localhost/newspage/admin/profile');
    }

    public function editpassword()
    {
        if(isset($_POST['old-password']) && isset($_POST['password']) && isset($_POST['confirm-password']))
        {
            if($_POST['old-password'] == '' || $_POST['password'] == '' || $_POST['confirm-password'] == '')
            {
                $_SESSION['error'] = 'errorPass';
            }
            else if($_POST['password'] != $_POST['confirm-password'])
            {
                $_SESSION['error'] = 'errorPassConfirm';
            }
            else if(md5($_POST['old-password']) != $this->user->password)
            {
                $_SESSION['error'] = 'errorPassNotCorrect';
            }
            else
            {
                Account::savePass($this->user->id,$_POST['password']);
                $_SESSION['status'] = 'successPass';
            }
        }

        header('Location: http://localhost/newspage/admin/profile');
    }
}