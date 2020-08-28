<?php 

require_once('models/Post.php');
require_once('models/Category.php');

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::all();

        $this->view('admin/posts/index', [
        'posts' => $posts
        ]);
    }

    public function add()
    {
        if(isset($_POST['status']) && isset($_POST['title']))
        {
            $dir = '/newspage/storage/uploads/';
            $name_img = stripslashes($_FILES['img_up']['name']);
            $source_img = $_FILES['img_up']['tmp_name'];
            $arr_type = explode(".", $name_img);
            $type_img = end($arr_type);

            $url_thumb = time(). '.' . $type_img;

            move_uploaded_file($source_img,$_SERVER['DOCUMENT_ROOT'] .  $dir . $url_thumb);

            Post::create($_POST['title'],$_POST['desc'],$url_thumb,$_POST['slug'],$_POST['keywords'],$_POST['body'],$_POST['cate'],$this->user->id,$_POST['status'],0,$this->date_current);

            header('Location: http://localhost/newspage/admin/post');
        }
        
        else{
            $categories = Category::all();
            $this->view('admin/posts/add',[
                'categories' => $categories
            ]);
        }

    }

    public function edit()
    {
        $id = $_GET['p4'];
        if(isset($_POST['status']) && isset($_POST['title']))
        {
            if(isset($_FILES['img_up']))
            {
                $dir = '/newspage/storage/uploads/';
                $name_img = stripslashes($_FILES['img_up']['name']);
                $source_img = $_FILES['img_up']['tmp_name'];
                $arr_type = explode(".", $name_img);
                $type_img = end($arr_type);
    
                $url_thumb = time(). '.' . $type_img;
    
                move_uploaded_file($source_img,$_SERVER['DOCUMENT_ROOT'] .  $dir . $url_thumb);
            }
            else
            {
                $url_thumb = Post::find($id)->url_thumb;
            }

            Post::save($id,$_POST['title'],$_POST['desc'],$url_thumb,$_POST['slug'],$_POST['keywords'],$_POST['body'],$_POST['cate'],$_POST['status']);

            header('Location: http://localhost/newspage/admin/post');
        }

        else{
            $categories = Category::all();
            $post = Post::find($id);

            $this->view('admin/posts/edit',[
                'categories' => $categories,
                'post' => $post
            ]);
        }
    }

    public function delete()
    {
        if(isset($_GET['p4']))
        {
            $id = $_GET['p4'];
            Post::delete($id);
        }
        else if(isset($_POST['id_post']))
        {
            foreach($_POST['id_post'] as $id)
            {
                Post::delete($id);
            }
        }
    }
}