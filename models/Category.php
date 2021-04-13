<?php

require_once('models/Post.php');

class Category
{
    public $id_cate;
    public $label;
    public $url;
    public $date_created;

    function __construct($id_cate,$label,$url,$date_created)
    {
        $this->id_cate = $id_cate;
        $this->label = $label;
        $this->url = $url;
        $this->date_created = $date_created;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM categories');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Category($item['id_cate'], $item['label'],$item['url'],$item['date_created']);
        }

        return $list;
    }

    static function create($label,$url,$date_created)
    {
        
        $db = DB::getInstance();

        $db->exec("INSERT INTO categories (label,url,date_created) VALUES ('$label','$url','$date_created')");

    }

    static function save($id,$label,$url)
    {
        $db = DB::getInstance();

        $db->exec("UPDATE categories SET label = '$label', url = '$url' WHERE id_cate = '$id'");
    }

    static function find($id)
    {
        $db = DB::getInstance();

        $req = $db->query("SELECT * FROM categories WHERE id_cate = '$id'");

        $resutl = $req->fetch();
        
        if(isset($resutl['id_cate']))
        {
            return new Category($resutl['id_cate'], $resutl['label'],$resutl['url'],$resutl['date_created']);
        }

        include_once('controllers/PageController.php');

        $page = new PageController;
        $page->error();

    }

    static function findByName($label)
    {
        $db = DB::getInstance();

        $req = $db->query("SELECT * FROM categories WHERE label = '$label'");

        $resutl = $req->fetch();
        
        if(isset($resutl['id_cate']))
        {
            return new Category($resutl['id_cate'], $resutl['label'],$resutl['url'],$resutl['date_created']);
        }

        include_once('controllers/PageController.php');

        $page = new PageController;
        $page->error();

    }

    static function delete($id)
    {
        $db = DB::getInstance();

        $req = $db->exec("DELETE FROM categories WHERE id_cate = '$id'");
    }

    public function posts()
    {
        $conn = new DB();
        $db = $conn->connect();
        $id_cate = $this->id_cate;

        $req = $db->query("SELECT * FROM posts WHERE cate_id = '$id_cate'");

        foreach ($req->fetchAll() as $item) {
            $list[] = new Post($item['id'], $item['title'],$item['descr'],$item['url_thumb'],$item['slug'],$item['body'],Category::find($item['cate_id']),Account::find($item['author_id']),$item['status'],$item['view'],$item['date_created']);
        }

        return $list;
    }

    public function haha()
    {
        echo 'haha';
    }

    static function findBySlug($slug)
    {
        $db = DB::getInstance();

        $req = $db->query("SELECT * FROM categories WHERE url = '$slug'");

        $item = $req->fetch();

        $result = new Category($item['id_cate'], $item['label'],$item['url'],$item['date_created']);
        
        return $result;
    }
}