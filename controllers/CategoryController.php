<?php

require_once('models/Category.php');

class CategoryController extends BaseController
{
    public function show()
    {
        $category = Category::find(8);

        $this->view('category/show',[
            'category' => $category
        ]);
    }
}