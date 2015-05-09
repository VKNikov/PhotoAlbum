<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 9.5.2015 г.
 * Time: 16:32
 */
echo '<img class="align-picture" src="/photoalbum/user_images/' . $_SESSION['user_id'] . '/' .
    $picture[0]['pic_filename'] . '" title="' . $picture[0]['description'] . '" />';
?>
<div>
    <?php
    foreach ($comments as $c) {
        echo '<div class="inner comment"><p>' . $c['comment'] . '</p><span>Posted on: ' . $c['created_on'] . '</span>
        <span>By: ' . $c['username'] . '</span></div>';
    }
    ?>
    <div class="inner comment">
        <form action="" method="post">
            <div>
                <textarea name="comment" id="comment" cols="65" rows="10"></textarea>
            </div>

            <input id="postComment" class="btn btn-info pull-right"  type="submit" value="Post Comment"/>
        </form>
    </div>
</div>
