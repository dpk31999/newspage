<h3>Hồ sơ cá nhân</h3>
<div class="panel panel-default">
    <div class="panel-heading">Upload ảnh đại diện</div>
    <div class="panel-body">
        <form action="profile/editavatar" method = "POST" enctype="multipart/form-data">
            <div class="form-group box-current-img">
                <p><strong>Ảnh hiện tại</strong></p>
                <img src="/newspage/storage/<?=$user->url_avatar?>" alt = "Ảnh hiện tại của <?=$user->name?>" width="80" height="80">
            </div>
            <div class= "alert alert-info">Vui lòng chọn ảnh có đuôi .jpg .png .gif và có dung lượng dưới 5MB.</div>
            <div class="form-group">
                <label>Chọn hình ảnh</label>
                <input type="file" class= "form-control" id="img_up" name="img_avt" onchange="preUpImg();">
            </div>
            <div class="form-group box-pre-img hidden">
                <p><strong>Ảnh xem trước</strong></p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary pull-left" type="submit">Upload</button>
            </div>
            <div class="clearfix"></div><br>
            <?php 
                if(isset($_SESSION['status']) && $_SESSION['status'] == 'successAvt')
                {
                    echo '<div class="alert alert-success">Thay đổi thành công</div>';
                    unset($_SESSION['status']);
                }
                if(isset($_SESSION['error']) && $_SESSION['error'] == 'errorAvt')
                {
                    echo '<div class="alert alert-danger">Bạn chưa chọn ảnh</div>';
                    unset($_SESSION['error']);
                }
            ?>
        </form>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Cập nhật thông tin</div>
    <div class="panel-body">
        <form method="POST" action="profile/editinfo">
            <div class="form-group">
                <label>Tên hiển thị *</label>
                <input type="text" class="form-control" name="name" value="<?=$user->name?>" required>
            </div>
            <div class="form-group">
                <label>Email *</label>
                <input type="text" class="form-control" name="email" value="<?=$user->email?>" required>
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" class="form-control" name="phone" value="<?=$user->phone?>" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
            <?php 
                if(isset($_SESSION['status']) && $_SESSION['status'] == 'successInfo')
                {
                    echo '<div class="alert alert-success">Thay đổi thành công</div>';
                    unset($_SESSION['status']);
                }
                if(isset($_SESSION['error']) && $_SESSION['error'] == 'errorInfo')
                {
                    echo '<div class="alert alert-danger">Vui lòng nhập đủ thông tin</div>';
                    unset($_SESSION['error']);
                }
            ?>
        </form>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Đổi mật khẩu</div>
    <div class="panel-body">
        <form method="POST" action="profile/editpassword">
            <div class="form-group">
                <label>Nhập mật khẩu cũ</label>
                <input type="password" class="form-control" name="old-password" required>
            </div>
            <div class="form-group">
                <label>Nhập mật khẩu mới</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu mới</label>
                <input type="password" class="form-control" name="confirm-password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
            </div>
            <?php 
                if(isset($_SESSION['status']) && $_SESSION['status'] == 'successPass')
                {
                    echo '<div class="alert alert-success">Thay đổi thành công</div>';
                    unset($_SESSION['status']);
                }
                if(isset($_SESSION['error']) && $_SESSION['error'] == 'errorPass')
                {
                    echo '<div class="alert alert-danger">Vui lòng nhập đủ thông tin</div>';
                    unset($_SESSION['error']);
                }
                if(isset($_SESSION['error']) && $_SESSION['error'] == 'errorPassNotCorrect')
                {
                    echo '<div class="alert alert-danger">Mật khẩu cũ không chính xác</div>';
                    unset($_SESSION['error']);
                }
                if(isset($_SESSION['error']) && $_SESSION['error'] == 'errorPassConfirm')
                {
                    echo '<div class="alert alert-danger">Mật khẩu xác nhận không chính xác</div>';
                    unset($_SESSION['error']);
                }
            ?>
        </form>
    </div>
</div>
