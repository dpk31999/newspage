<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 px-0">
                <a href="p/<?=$postHeader[0]->slug?>.html">
                    <div style="position: relative">
                        <img class="img-thumbnail border-0" src="/newspage/storage/uploads/<?=$postHeader[0]->url_thumb?>">
                        <h4 class="" style="position: absolute;bottom:0;left:10px;text-shadow: 1px 0 0 #fff, -1px 0 0 #fff, 0 1px 0 #fff, 0 -1px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;"><?=$postHeader[0]->title?></h4>
                        <h4><span style="position: absolute;top:10px;right:10px;height:20px" class="label label-primary">Hot news</span></h4>
                    </div>
                </a>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <?php

                        foreach($otherPost as $post)
                        {
                            echo '
                            <div class="col-md-6 pb-3">
                                <a href="p/'. $post->slug .'.html">
                                    <div style="position: relative">
                                        <img class="img-thumbnail border-0" src="/newspage/storage/uploads/'. $post->url_thumb .'">
                                        <h4 class="" style="position: absolute;bottom:0;left:10px;text-shadow: 1px 0 0 #fff, -1px 0 0 #fff, 0 1px 0 #fff, 0 -1px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;">'. $post->title .'</h4>
                                    </div>
                                </a>
                            </div>      
                            ';
                        }

                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

