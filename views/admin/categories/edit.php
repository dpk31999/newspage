<a href="/newspage/admin/category" class="btn btn-primary">
    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
</a> 
<p class="form-edit-cate">
    <form method="POST" action="<?php echo $cate->id_cate ?>" class="form-cate">
        <div class="form-group">
            <label>Tên chuyên mục</label>
            <input type="text" class="form-control title" value="<?php echo $cate->label ?>" name="name">
        </div>
        <div class="form-group">
            <label>URL chuyên mục</label>
            <input type="text" class="form-control slug" value="<?php echo $cate->url ?>" name="slug">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </div>
        <div class="alert alert-danger hidden"></div>
    </form>
</p>