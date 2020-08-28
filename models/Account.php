<?php

class Account
{
    public $id;
    public $username;
    private $password;
    public $name;
    public $email;
    public $position;
    public $status;
    public $date_created;
    public $phone;
    public $url_avatar;

    function __construct($id,$username,$name,$email,$position,$status,$date_created,$phone,$url_avatar)
    {
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->position = $position;
        $this->status = $status;
        $this->date_created = $date_created;
        $this->phone = $phone;
        $this->url_avatar = $url_avatar;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM accounts');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Account($item['id'], $item['username'],$item['name'],$item['email'],$item['position'],$item['status'],$item['date_created'],$item['phone'],$item['url_avatar']);
        }

        return $list;
    }

    static function create($username,$password,$name,$date_created)
    {
        
        $db = DB::getInstance();
        $password = md5($password);

        $sql = "INSERT INTO accounts (username,password,name,email,position,status,date_created,phone,url_avatar) VALUES ('$username','$password','$name','','0','0','$date_created','','')";

        $db->exec($sql);

    }

    static function save($id,$username,$password)
    {
        $db = DB::getInstance();

        $password = md5($password);

        $db->exec("UPDATE accounts SET username = '$username', password = '$password' WHERE id = '$id'");
    }

    static function find($id)
    {
        $db = DB::getInstance();

        $req = $db->query("SELECT * FROM accounts WHERE id = '$id'");

        $item = $req->fetch();
        
        if(isset($item['id']))
        {
            return new Account($item['id'], $item['username'],$item['name'],$item['email'],$item['position'],$item['status'],$item['date_created'],$item['phone'],$item['url_avatar']);
        }

        include_once('controllers/PageController.php');

        $page = new PageController;
        $page->error();

    }

    static function delete($id)
    {
        $db = DB::getInstance();

        $req = $db->exec("DELETE FROM accounts WHERE id = '$id'");
    }

    static function lock($id)
    {
        $db = DB::getInstance();

        $req = $db->exec("UPDATE accounts SET status = '1' WHERE id = '$id'");
    }

    static function unlock($id)
    {
        $db = DB::getInstance();

        $req = $db->exec("UPDATE accounts SET status = '0' WHERE id = '$id'");
    }

    static function exist($username)
    {
        $db = DB::getInstance();

        $req = $db->query("SELECT * FROM accounts WHERE username = '$username'");

        if($req->rowCount() > 0)
        {
            return true;
        }
        return false;
    }

    static function saveAvatar($id,$url_avatar)
    {
        $db = DB::getInstance();

        $db->exec("UPDATE accounts SET url_avatar = '$url_avatar' WHERE id = '$id'");
    }

    static function saveInfo($id,$name,$email,$phone)
    {
        $db = DB::getInstance();

        $db->exec("UPDATE accounts SET name = '$name' , email = '$email' , phone = '$phone' WHERE id = '$id'");
    }

    static function savePass($id,$password)
    {
        $db = DB::getInstance();

        $password = md5($password);

        $db->exec("UPDATE accounts SET password = '$password' WHERE id = '$id'");
    }

    static function accountsActive()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM accounts WHERE status = 0');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Account($item['id'], $item['username'],$item['name'],$item['email'],$item['position'],$item['status'],$item['date_created'],$item['phone'],$item['url_avatar']);
        }

        return $list;
    }

    static function accountsLock()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM accounts WHERE status = 1');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Account($item['id'], $item['username'],$item['name'],$item['email'],$item['position'],$item['status'],$item['date_created'],$item['phone'],$item['url_avatar']);
        }

        return $list;
    }
}