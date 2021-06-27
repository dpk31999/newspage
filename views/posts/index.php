<?php
echo '<ul>';
foreach ($posts as $post) {
  echo '<li>
    <a href="post/'. $post->id .'">' . $post->title . '</a>
  </li>';
}
echo '</ul>';
?>