<div class="container">
    <div class="row">
        <div class="col-md-8">
        <h1><?=$category->label?></h1>
        <?php

            foreach($category->posts() as $post)
            {
                echo '
                <div class="col-md-6 pb-3">
                    <a href="'. $domain .'/post/'. $post->slug .'.html">
                        <div style="position: relative">
                            <img class="img-thumbnail border-0" src="'. $domain .'/storage/uploads/'. $post->url_thumb .'">
                            <h4 class="" style="position: absolute;bottom:0;left:10px;text-shadow: 1px 0 0 #fff, -1px 0 0 #fff, 0 1px 0 #fff, 0 -1px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;">'. $post->title .'</h4>
                        </div>
                    </a>
                </div>     
                ';
            }

        ?>
        </div>
        <div class="col-md-4">
            Right Content
        </div>
    </div>
</div>