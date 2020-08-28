<a href="/newspage/admin/post" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
</a>
<form method="POST" id="formEditPost" action="<?=$post->id?>" enctype="multipart/form-data">
    <div class="form-group">
    <label>Trạng thái bài viết</label>
    <?php
        if($user->position == 1){
            if($post->status == '0'){
                echo 
                '
                    <div class="radio">
                        <label>
                            <input type = "radio" name = "status" value = "0" checked> Xuất bản
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type = "radio" name = "status" value = "1"> Ẩn
                        </label>
                    </div>
                ';
            }
            else if($post->status == '1'){
                echo
                '
                    <div class="radio">
                        <label>
                            <input type = "radio" name = "status" value = "0"> Xuất bản
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type = "radio" name = "status" value = "1" checked> Ẩn
                        </label>
                    </div>
                ';
            }
        }
        else{
            echo '
                <div class="radio">
                    <label>
                        <input type = "radio" name = "status" value = "0" checked> Ẩn
                    </label>
                </div>
            ';
        }
    ?>
    </div>
    <div class="form-group">
        <label>Tiêu đề bài viết</label>
        <input type="text" class="form-control title" value="<?=$post->title?>" name="title">
    </div>
    <div class="form-group">
        <label>Slug bài viết</label>
        <input type="text" class="form-control slug" value="<?=$post->slug?>" name="slug">
    </div>
    <div class="form-group">
        <label>Chọn hình ảnh</label>
        <input type="file" class="form-control" name="img_up" id="img_up" onchange="preUpImg();">
    </div>
    <div class="form-group">
        <p><strong>Ảnh cũ</strong></p>
        <img src="/newspage/storage/uploads/<?=$post->url_thumb?>" height="100px" width="100px" alt="">
    </div>
    <div class="form-group box-pre-img hidden">
        <p><strong>Ảnh xem trước</strong></p>
    </div>
    <div class="form-group">
        <label>Mô tả bài viết</label>
        <textarea name="desc" class="form-control"><?=$post->descr?></textarea>
    </div>
    <div class="form-group">
        <label>Từ khoá bài viết</label>
        <input type="text" class="form-control" value="<?=$post->keywords?>" name="keywords">
    </div>
    <div class="form-group">
        <label>Chuyên mục</label>
        <select class="form-control" name="cate">
            <?php
                foreach($categories as $category)
                {
                    if ($category->id_cate == $post->cate_id) {
                        echo '<option value="' . $category->id_cate . '" selected>' . $category->label . '</option>';
                    } else {
                        echo '<option value="' . $category->id_cate . '">' . $category->label . '</option>';
                    }
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Nội dung bài viết</label>
        <textarea name="body" id="body" class="form-control"><?=$post->body?></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sửa bài viết</button>
    </div>
    <?php
    if(isset($error))
    {
        echo '<div class="alert alert-danger hidden">'. $error .'</div>';
    }
    ?>
</form>