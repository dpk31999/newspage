<a href="category/add" class="btn btn-primary">
    <span class="glyphicon glyphicon-plus"></span> Thêm
</a> 
<a href="category" class="btn btn-primary">
    <span class="glyphicon glyphicon-repeat"></span> Reload
</a> 
<a class="btn btn-danger" id="del_cate_list">
    <span class="glyphicon glyphicon-trash"></span> Xoá
</a> 

<br><br>
<div class="table-responsive">
    <table class="table table-striped list" id="list_cate">
        <tr>
            <td><input type="checkbox"></td>
            <td><strong>ID</strong></td>
            <td><strong>Tên chuyên mục</strong></td>
            <td><strong>Tools</strong></td>
        </tr>
        <?php 
        
        foreach($categories as $category)
        {
            echo '
                <tr data-id="'. $category->id_cate .'">
                    <td><input type="checkbox" name="id_cate[]" value="' . $category->id_cate .'"></td>
                    <td>' . $category->id_cate .'</td>
                    <td><a href="category/edit/' . $category->id_cate .'">' . $category->label . '</a></td>
                    <td>
                        <a href="category/edit/'. $category->id_cate .'" class="btn btn-primary btn-sm">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a class="btn btn-danger btn-sm del-cate-list" data-id="' . $category->id_cate . '">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            ';
        }
        
        ?>
    </table>
</div>