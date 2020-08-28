<?php 
require_once('models/User.php');
require_once('models/Post.php');

class HomeController extends BaseController
{
    public function index()
    {
        if(isset($_SESSION['user']))
        {
            $countAllPost = count((array) Post::all());
            $countAllYourPost = count((array) Post::posts($this->user->id));
            $countPostPublic = count((array) Post::postsPublic());
            $countPostPrivate = count((array) Post::postsPrivate());
            $countCategory = count((array) Category::all());
            $countAccount = count((array) Account::all());
            $countAccountActive = count((array) Account::accountsActive());
            $countAccountLock = count((array) Account::accountsLock());

            $this->view('admin/index',[
                'countAllPost' => $countAllPost,
                'countAllYourPost' => $countAllYourPost,
                'countPostPublic' => $countPostPublic,
                'countPostPrivate' => $countPostPrivate,
                'countCategory' => $countCategory,
                'countAccount' => $countAccount,
                'countAccountActive' => $countAccountActive,
                'countAccountLock' => $countAccountLock
            ]);
        }
        else{
            header('Location: http://localhost/newspage/admin/login');
        }
    }

}