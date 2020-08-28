<div class="container">
    <div class="row">
        <div class="col-md-6">
            <p>Vui lòng đăng nhập để tiếp tục.</p>
            <form id="formSignin" action="login" method="POST">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control" placeholder="Tên đăng nhập" name="user_signin">
                    </div>
                    <!-- div.input-group -->
                </div>
                <!-- div.form-group -->
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="pass_signin">
                    </div>
                    <!-- div.input-group -->
                </div>
                <!-- div.form-group -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
                <!-- div.form-group -->
                <?php
                    if(isset($error))
                    {
                        echo '<div class="alert alert-danger">'. $error .'</div>';
                    }
                ?>
            </form>
            <!-- form#formSignin -->
        </div>
        <!-- dib.col-md-6 -->
    </div>
    <!-- div.row -->
</div>
<!-- div.container -->