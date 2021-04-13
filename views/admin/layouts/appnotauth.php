<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8"/>
	<title>Newspage Administration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

	<!-- Liên kết Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/> 

	<!-- Liên kết thư viện jQuery -->
	<script src="<?=$domain?>/asset/js/jquery.min.js"></script>
    <script src="<?=$domain?>/asset/js/form.js"></script>	    
    <script src="<?=$domain?>/asset/ckeditor/ckeditor.js"></script>	  
</head>
<body>

    <div class="container">
    <div class="page-header">
        <h1>Newspage <small>Administration</small></h1>
    </div><!-- div.page-header -->
    </div>

    <div class="col-8">
        <?= @$content ?>
    </div>
  </div>
</body>
</html>