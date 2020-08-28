<a href="post/add" class="btn btn-default">
    <span class="glyphicon glyphicon-plus"></span> Thêm
</a> 
<a href="post" class="btn btn-default">
    <span class="glyphicon glyphicon-repeat"></span> Reload
</a> 
<a class="btn btn-danger" id="del_post_list">
    <span class="glyphicon glyphicon-trash"></span> Xoá
</a> 

<p>
    <form method="POST" id="formSearchPost">
        <div class="input-group">         
            <input type="text" class="form-control" id="kw_search_post" placeholder="Nhập ID, tiêu đề, slug ...">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </span>
        </div>
    </form>
</p>

<div class="table-responsive" id="list_post">
    <table class="table table-striped list">
        <tr>
            <td><input type="checkbox"></td>
            <td><strong>ID</strong></td>
            <td><strong>Tiêu đề</strong></td>
            <td><strong>Trạng thái</strong></td>
            <td><strong>Chuyên mục</strong></td>
            <td><strong>Lượt xem</strong></td>
            <td><strong>Tác giả</strong></td>
            <td><strong>Tools</strong></td>
        </tr>
        <?php 
            foreach($posts as $post)
            {
                echo '
                    <tr>
                        <td><input type="checkbox" name="id_post[]" value="' . $post->id .'"></td>
                        <td>' . $post->id . '</td>
                        <td style="width: 30%;"><a href="posts/edit/' . $post->id . '">' . $post->title . '</a></td>';
                        if($post->status == '1')
                        {
                            echo '<td>Ẩn</td>';
                        }
                        else{
                            echo '<td>Xuất bản</td>';
                        }
                        echo
                        '<td>' . $post->category->label . '</td>
                        <td>' . $post->view . '</td>
                        <td>' .$post->account->name. '</td>
                        <td>
                            <a href="post/edit/' . $post->id .'" class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a class="btn btn-danger btn-sm del-post-list" data-id="' . $post->id . '">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                ';
            }
        ?>
    </table>
</div>