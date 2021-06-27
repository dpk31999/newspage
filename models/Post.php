<?php

require_once('models/Category.php');
require_once('models/Account.php');

class Post
{
  public $id;
  public $title;
  public $descr;
  public $url_thumb;
  public $slug;
  public $body;
  public $category;
  public $account;
  public $status;
  public $view;
  public $date_created;

  function __construct($id, $title,$descr,$url_thumb,$slug,$body,$category,$account,$status,$view,$date_created)
  {
    $this->id = $id;
    $this->title = $title;
    $this->descr = $descr;
    $this->url_thumb = $url_thumb;
    $this->slug = $slug;
    $this->body = $body;
    $this->category = $category;
    $this->account = $account;
    $this->status = $status;
    $this->view = $view;
    $this->date_created = $date_created;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM posts');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Post($item['id'], $item['title'],$item['descr'],$item['url_thumb'],$item['slug'],$item['body'],Category::find($item['cate_id']),Account::find($item['author_id']),$item['status'],$item['view'],$item['date_created']);
    }

    return $list;
  }

  static function create($title,$descr,$url_thumb,$slug,$keywords,$body,$cate_id,$author_id,$status,$view,$date_created)
  {
      
      $db = DB::getInstance();

      $sql = "INSERT INTO posts (title,descr,url_thumb,slug,keywords,body,cate_id,author_id,status,view,date_created) VALUES ('$title','$descr','$url_thumb','$slug','$keywords','$body','$cate_id','$author_id','$status','$view','$date_created')";

      $db->exec($sql);

  }

  static function save($id,$title,$descr,$url_thumb,$slug,$keywords,$body,$cate_id,$status)
  {

      $db = DB::getInstance();

      $sql = "UPDATE posts SET title = '$title', descr = '$descr', url_thumb = '$url_thumb', slug = '$slug', keywords = '$keywords', body = '$body', cate_id = '$cate_id', status = '$status' WHERE id = '$id'";

      $db->exec($sql);
  
  }

  static function find($id)
  {
    $db = DB::getInstance();

    $req = $db->query("SELECT * FROM posts WHERE id = '$id'");

    $resutl = $req->fetch();
    
    if(isset($resutl['id']))
    {
      return (object) $resutl;
    }
    include_once('controllers/PageController.php');

    $page = new PageController;
    $page->error();

  }

  static function delete($id)
    {
        $db = DB::getInstance();

        $req = $db->exec("DELETE FROM posts WHERE id = '$id'");
    }

    static function posts($id)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM posts WHERE author_id='$id'");

        foreach ($req->fetchAll() as $item) {
            $list[] = new Post($item['id'], $item['title'],$item['descr'],$item['url_thumb'],$item['slug'],$item['body'],Category::find($item['cate_id']),Account::find($item['author_id']),$item['status'],$item['view'],$item['date_created']);
        }

        return $list;
    }

    static function postsPublic()
    {
      $list = [];
      $db = DB::getInstance();
      $req = $db->query('SELECT * FROM posts WHERE status = 0');
  
      foreach ($req->fetchAll() as $item) {
        $list[] = new Post($item['id'], $item['title'],$item['descr'],$item['url_thumb'],$item['slug'],$item['body'],Category::find($item['cate_id']),Account::find($item['author_id']),$item['status'],$item['view'],$item['date_created']);
      }
  
      return $list;
    }

    static function postsPrivate()
    {
      $list = [];
      $db = DB::getInstance();
      $req = $db->query('SELECT * FROM posts WHERE status = 1');
  
      foreach ($req->fetchAll() as $item) {
        $list[] = new Post($item['id'], $item['title'],$item['descr'],$item['url_thumb'],$item['slug'],$item['body'],Category::find($item['cate_id']),Account::find($item['author_id']),$item['status'],$item['view'],$item['date_created']);
      }
  
      return $list;
    }

    static function getHeader()
    {
      $list = [];
      $db = DB::getInstance();
      $req = $db->query('SELECT * FROM posts WHERE status = 0 ORDER BY id DESC LIMIT 1');

      foreach ($req->fetchAll() as $item) {
        $list[] = new Post($item['id'], $item['title'],$item['descr'],$item['url_thumb'],$item['slug'],$item['body'],Category::find($item['cate_id']),Account::find($item['author_id']),$item['status'],$item['view'],$item['date_created']);
      } 
  
      return $list;
    }

    static function getOther()
    {
      $list = [];
      $db = DB::getInstance();
      $req = $db->query('SELECT * FROM posts WHERE status = 0 ORDER BY id DESC LIMIT 4 OFFSET 1');

      foreach ($req->fetchAll() as $item) {
        $list[] = new Post($item['id'], $item['title'],$item['descr'],$item['url_thumb'],$item['slug'],$item['body'],Category::find($item['cate_id']),Account::find($item['author_id']),$item['status'],$item['view'],$item['date_created']);
      }
  
      return $list;
    }

    static function findBySlug($slug)
    {
      $db = DB::getInstance();

      $req = $db->query("SELECT * FROM posts WHERE slug = '$slug'");

      $item = $req->fetch();

      $result = new Post($item['id'], $item['title'],$item['descr'],$item['url_thumb'],$item['slug'],$item['body'],Category::find($item['cate_id']),Account::find($item['author_id']),$item['status'],$item['view'],$item['date_created']);
      
      return $result;
    }
}