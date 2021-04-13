<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Báo 24h</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="shortcut icon"
        href="https://icons.iconarchive.com/icons/google/noto-emoji-objects/256/62869-newspaper-icon.png">

</head>

<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h2><a href="<?=$domain?>" class="text-decoration-none">Thời báo 247</a></h2>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                    foreach($categories as $category)
                    {
                        echo '
                            <li>
                                <a class="text-uppercase" href="category/'. $category->url .'">'. $category->label .'</a>
                            </li>
                        ';
                    }
                ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a>
                            <form class="form-inline" style="position: relative;">
                                <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                                    aria-label="Search">
                                <i class="fas fa-search" aria-hidden="true"
                                    style="position: absolute;right:10px;bottom:25%"></i>
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?= @$content ?>