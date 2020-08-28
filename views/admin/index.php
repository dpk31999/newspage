
<h3>Bài viết</h3>
<div class="row">
    <div class="col-md-3">
        <div class="alert alert-info">
            <h1><?=$countAllPost?></h1>
            <p>Tổng bài viết</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="alert alert-info">
            <h1><?=$countAllYourPost?></h1>
            <p>Bài viết của bạn</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="alert alert-info">
            <h1><?=$countPostPublic?></h1>
            <?php
                if($user->position == '1')
                {
                    echo '<p>Tất cả bài viết xuất bản</p>';
                }    
                else
                {
                    echo '<p>Bài viết xuất bản của bạn</p>';
                }
            ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="alert alert-warning">
            <h1><?=$countPostPrivate?></h1>
            <?php
                if($user->position == '1')
                {
                    echo '<p>Tất cả bài viết ẩn</p>';
                }    
                else
                {
                    echo '<p>Bài viết bị ẩn của bạn</p>';
                }
            ?>
        </div>
    </div>
</div>
<h3>Chuyên mục</h3>
<div class="row">
    <div class="col-md-3">
        <div class="alert alert-info">
            <h1><?=$countCategory?></h1>
            <p>Số chuyên mục</p>
        </div>
    </div>  
</div>
<h3>Tài khoản</h3>
<div class="row">
    <div class="col-md-4">
        <div class="alert alert-info">
            <h1><?=$countAccount?></h1>
            <p>Số tài khoản</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-info">
            <h1><?=$countAccountActive?></h1>
            <p>Tài khoản hoạt động</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-warning">
            <h1><?=$countAccountLock?></h1>
            <p>Tài khoản bị khóa</p>
        </div>
    </div>
</div>