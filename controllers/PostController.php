<?php
require_once('models/Post.php');
require_once('models/Category.php');

class PostController extends BaseController
{

  public function index()
  {
    // $postLastest = Post::getLastest();
    // $postInHeader = Post::getInHeader();
    // $otherPost = Post::other();
    $categories = Category::all();

    print_r($categories);
    // $this->view('posts/index', [
    //   'posts' => $posts
    // ]);
  }

  public function show()
  {
    $post = Post::findBySlug($_GET['p2']);
    $categories = Category::all();

    $this->view('posts/show',[
      'post' => $post,
      'categories' => $categories
    ]);
  }
}