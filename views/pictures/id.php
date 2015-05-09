<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 9.5.2015 г.
 * Time: 16:32
 */
echo '<img class="align-picture" src="/photoalbum/user_images/' .$picture[0]['user_id'] . '/' .
    $picture[0]['album_id'] . '/' . htmlspecialchars($picture[0]['pic_filename']) . '" title="' . $picture[0]['description'] . '" />';
?>
<div>
    <div class="inner">
        <?php
        if (isset($_SESSION['username'])) {
            echo '<input id="userId" type="hidden" value="<?php echo "' . $_SESSION['user_id'] . '";?>"/>';
            echo '<input id="pictureId" type="hidden" value="<?php echo "' . $picture[0]['id'] . '"?>"/>';

            if (!$this->hasVoted) {
                echo '<input id="like" class="btn btn-info pull-center"  type="submit" value="Like"/>';
            } else {
                echo '<input id="unlike" class="btn btn-info pull-center"  type="submit" value="Unlike"/>';
            }
        }
        ?>

    </div>
    <?php
    foreach ($comments as $c) {
        echo '<div class="inner comment"><p>' . htmlspecialchars($c['comment']) . '</p><span>Posted on: ' . $c['created_on'] . '</span>
        <span>By: ' . htmlspecialchars($c['username']) . '</span></div>';
    }

    if (isset($_SESSION['username'])) : ?>
        <div class="inner comment">
            <form action="" method="post">
                <div>
                    <textarea name="comment" id="comment" cols="65" rows="10"></textarea>
                </div>

                <input id="postComment" class="btn btn-info pull-right"  type="submit" value="Post Comment"/>
            </form>
        </div>
    <?php endif; ?>

</div>
