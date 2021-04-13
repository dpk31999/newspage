<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1><?=$post->title?></h1>
      <div style="position: relative">
        <p style="position: absolute;left: 0"><?=$post->account->name?></p>
        <p style="position: absolute;right: 0"><?=$post->date_created?></p>
      </div>
      <br>
      <?=$post->body?>
    </div>
    <div class="col-md-4">
      <?php
        foreach($categories as $category)
        {
          echo '<p>'. $category->label .'</p>';
        } 
      ?>
    </div>
  </div>
</div>