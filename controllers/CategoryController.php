<?php

require_once('models/Category.php');

class CategoryController extends BaseController
{
    public function show()
    {
        $category = Category::findBySlug($_GET['p2']);

        $this->view('category/show',[
            'category' => $category
        ]);
    }
}