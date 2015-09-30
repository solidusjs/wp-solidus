<!DOCTYPE html>
<html>
    <head>
        <?php
          if ($post->ID) {
             $postID = $post->ID;
           } elseif ($_GET['preview_id']) {
             $postID = $_GET['preview_id'];
           } elseif ($_GET['p']) {
             $postID = $_GET['p'];
           }
        ?>
        <meta http-equiv="refresh" content="0; url=<?php print getRedirect($postID); ?>">
    </head>
</html>
