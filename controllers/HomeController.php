<?php

require_once('models/Category.php');
require_once('models/Post.php');

class HomeController extends BaseController
{
    public function index()
    {
        $categories = Category::all();
        $postHeader = Post::getHeader();
        $otherPost = Post::getOther();

        $this->view('index',[
            'categories' => $categories,
            'postHeader' => $postHeader,
            'otherPost' => $otherPost
        ]);
    }
}