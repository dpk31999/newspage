<?php 

require_once('models/Category.php');

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::all();

        $this->view('admin/categories/index',[
            'categories' => $categories
        ]);
    }

    public function add()
    {
        if(isset($_POST['name']) && isset($_POST['slug']))
        {
            Category::create($_POST['name'],$_POST['slug'],date("Y-m-d H:i:s"));

            header('Location: '. $this->domain .'/admin/category');
        }
        
        else{
            $this->view('admin/categories/add');
        }

    }

    public function edit()
    {
        $id = $_GET['p4'];
        if(isset($_POST['name']) && isset($_POST['slug']))
        {
            Category::save($id,$_POST['name'],$_POST['slug']);

            header('Location: '. $this->domain .'/admin/category');
        }

        else{
            $cate = Category::find($id);

            $this->view('admin/categories/edit',[
                'cate' => $cate
            ]);
        }
    }

    public function delete()
    {
        if(isset($_GET['p4']))
        {
            $id = $_GET['p4'];
            Category::delete($id);
        }
        else if(isset($_POST['id_cate']))
        {
            foreach($_POST['id_cate'] as $id)
            {
                Category::delete($id);
            }
        }
    }
}