<a href="newspage/admin/account" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
</a>
<form method="POST" action="add">
    <div class="form-group">
        <label>Tên đăng nhập</label>
        <input type="text" class="form-control title" name="username" required>
    </div>
    <div class="form-group">
        <label>Mật khẩu</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="form-group">
        <label>Nhập lại mật khẩu</label>
        <input type="password" class="form-control" name="confirm-password" required>
    </div>
    <div class="form-group">
        <label>Tên</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Thêm</button>
    </div>
    <?php
    if(isset($error))
    {
        echo '<div class="alert alert-danger">'. $error .'</div>';
    }
    ?>
</form>