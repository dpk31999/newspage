<a href="<?=$domain?>/admin/category" class="btn btn-primary">
    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
</a>    
<p class="form-add-cate">
    <form method="POST" id="formAddCate" action="add">
        <div class="form-group">
            <label>Tên chuyên mục</label>
            <input type="text" class="form-control title" name="name" required>
        </div>
        <div class="form-group">
            <label>URL chuyên mục</label>
            <input type="text" class="form-control slug" placeholder="Nhấp vào để tự tạo" name="slug" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Tạo</button>
        </div>
        <?php 
        if(isset($error))
        {
            echo '<div class="alert alert-danger ">'. $error .'</div>';
        }
        ?>
    </form>
</p>