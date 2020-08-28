<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8"/>
	<title>Newspage Administration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

	<!-- Liên kết Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<!-- Liên kết thư viện jQuery -->
</head>
<body>

      <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Newspage Administration</a>
            </div><!-- div.navbar-header -->
        </div><!-- div.container-fluid -->
      </nav>

      <div class="row">
        <div class="col-md-3 sidebar">
          <ul class="list-group">
            <li class="list-group-item">
              <div class="media">
                <a class="pull-left">
                    <img class="media-object" src="/newspage/storage/<?=$user->url_avatar?>" alt="Ảnh đại diện của" width="64" height="64">
                </a>
                <div class="media-body">
                  <h4 class="media-heading"><?php echo $user->username ?></h4>

                  <?php
                  if ($user->position == '1')
                  {
                    echo '<span class="label label-primary">Quản trị viên</span>';
                  }
                  else
                  {
                    echo '<span class="label label-success">Tác giả</span>';
                  }

                  ?>
                </div>
              </div>
            </li>
            <a class="list-group-item text-decoration-none <?php if(!isset($_GET['p2'])) echo 'active'; ?>" href="/newspage/admin">
              <span class="glyphicon glyphicon-dashboard"></span> Bảng điều khiển
            </a>
            <a class="list-group-item text-decoration-none <?php if(isset($_GET['p2']) && $_GET['p2'] == 'profile') echo 'active'; ?>" href="/newspage/admin/profile">
              <span class="glyphicon glyphicon-user"></span> Hồ sơ cá nhân
            </a>
            <a class="list-group-item text-decoration-none <?php if(isset($_GET['p2']) && $_GET['p2'] == 'post') echo 'active'; ?>" href="/newspage/admin/post">
              <span class="glyphicon glyphicon-edit"></span> Bài viết
            </a>
            <a class="list-group-item text-decoration-none <?php if(isset($_GET['p2']) && $_GET['p2'] == 'account') echo 'active'; ?>" href="/newspage/admin/account">
              <span class="glyphicon glyphicon-lock"></span> Tài khoản
            </a>
            <?php
            if ($user->position == '1')
            {
              echo 
              '	
                <a class="list-group-item text-decoration-none '; if(isset($_GET['p2']) && $_GET['p2'] == 'category') echo 'active'; echo '" href="/newspage/admin/category">
                  <span class="glyphicon glyphicon-tag"></span> Chuyên mục
                </a>
              ';
            }

            ?>
            <a class="list-group-item text-decoration-none" href="/newspage/admin/logout">
              <span class="glyphicon glyphicon-off"></span> Thoát
            </a>
          </ul>
        </div>
                  
        <div class="col-md-8">
            <?= @$content ?>
        </div>
      </div>



  <script src="/newspage/asset/js/jquery.min.js"></script>
  <script src="/newspage/asset/js/form.js"></script>	    
  <script src="/newspage/asset/ckeditor/ckeditor.js"></script>	  
  <script>
      config = {};
      config.entities_latin = false;
      config.language = "vi";
      CKEDITOR.replace("body", config);
    </script>
</body>
</html>