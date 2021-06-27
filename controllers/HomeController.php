<?php

require_once('models/Post.php');

class HomeController extends BaseController
{
    public function index()
    {
        $postHeader = Post::getHeader();
        $otherPost = Post::getOther();

        $this->view('index',[
            'postHeader' => $postHeader,
            'otherPost' => $otherPost
        ]);
    }
}