<?php

class User
{
    public $id;
    public $username;
    private $password;

    function __contruct($id,$username,$password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    static function attemp($username,$password)
    {
        $db = DB::getInstance();

        $password = md5($password);

        $req = $db->query("SELECT * FROM accounts WHERE username = '$username' AND password = '$password'");

        if($req->rowCount() > 0)
        {
            return true;
        }
        return false;
    }

    static function get($user)
    {
        $db = DB::getInstance();

        $req = $db->query("SELECT * FROM accounts WHERE username = '$user'");

        $data_user = (object) $req->fetch();

        return $data_user;
    }
}