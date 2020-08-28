<?php 

require_once('models/Account.php');

class AccountController extends BaseController
{
    public function index()
    {
        $accounts = Account::all();
        $this->view('admin/accounts/index',[
            'accounts' => $accounts
        ]);
    }

    public function add()
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            if(Account::exist($_POST['username']))
            {
                $this->view('admin/accounts/add',[
                    'error' => 'Tên đăng nhập đã tồn tại'
                ]);
            }
            else if($_POST['password'] != $_POST['confirm-password'])
            {
                $this->view('admin/accounts/add',[
                    'error' => 'Mật khẩu xác nhận không chính xác'
                ]);
            }
            else
            {
                Account::create($_POST['username'],$_POST['password'],$_POST['name'],$this->date_current);

                header('Location: http://localhost/newspage/admin/account');
            }
        }
        else
        {
            $this->view('admin/accounts/add');
        }
    }

    public function delete()
    {
        if(isset($_GET['p4']))
        {
            $id = $_GET['p4'];
            Account::delete($id);
        }
        else if(isset($_POST['id_acc']))
        {
            foreach($_POST['id_acc'] as $id)
            {
                Account::delete($id);
            }
        }
    }

    public function lock()
    {
        if(isset($_GET['p4']))
        {
            $id = $_GET['p4'];
            Account::lock($id);
        }
        else if(isset($_POST['id_acc']))
        {
            foreach($_POST['id_acc'] as $id)
            {
                Account::lock($id);
            }
        }
    }

    public function unlock()
    {
        if(isset($_GET['p4']))
        {
            $id = $_GET['p4'];
            Account::unlock($id);
        }
        else if(isset($_POST['id_acc']))
        {
            foreach($_POST['id_acc'] as $id)
            {
                Account::unlock($id);
            }
        }
    }
}