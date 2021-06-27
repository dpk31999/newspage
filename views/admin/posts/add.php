<a href="<?=$domain?>/admin/post" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
</a>
<p class="from-add-post">
    <form method="POST" id="formAddPost" action="add" enctype="multipart/form-data">
        <div class="form-group">
        <label>Trạng thái bài viết</label>
        <?php
            if($user->position == 1){
                echo 
                '
                    <div class="radio">
                        <label>
                            <input type = "radio" name = "status" value = "1"> Xuất bản
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type = "radio" name = "status" value = "0"> Ẩn
                        </label>
                    </div>
                ';
            }
        ?>
        </div>
        <div class="form-group">
            <label>Tiêu đề bài viết</label>
            <input type="text" class="form-control title" name="title">
        </div>
        <div class="form-group">
            <label>Slug bài viết</label>
            <input type="text" class="form-control slug" name="slug">
        </div>
        <div class="form-group">
            <label>Chọn hình ảnh</label>
            <input type="file" class="form-control" name="img_up" id="img_up" onchange="preUpImg();">
        </div>
        <div class="form-group box-pre-img hidden">
            <p><strong>Ảnh xem trước</strong></p>
        </div>
        <div class="form-group hidden box-progress-bar">
            <div class="progress">
                <div class="progress-bar" role="progressbar"></div>
            </div>
        </div>
        <div class="form-group">
            <label>Mô tả bài viết</label>
            <textarea name="desc" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Từ khoá bài viết</label>
            <input type="text" class="form-control" name="keywords">
        </div>
        <div class="form-group">
            <label>Chuyên mục</label>
            <select class="form-control" name="cate">
                <option value="">Vui lòng chọn chuyên mục</option>
                <?php
                    foreach($categories as $category)
                    {
                        echo '<option value="' . $category->id_cate . '">' . $category->label . '</option>';
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nội dung bài viết</label>
            <textarea name="body" id="body" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Thêm bài viết</button>
        </div>
        <?php
        if(isset($error))
        {
            echo '<div class="alert alert-danger hidden">'. $error .'</div>';
        }
        ?>
    </form>
</p>