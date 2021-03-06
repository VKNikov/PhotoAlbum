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
            if (!$this->hasVoted) {
                echo '<input id="like" class="btn btn-info pull-left"  type="submit" value="Like"/>';
            } else {
                echo '<input id="unlike" class="btn btn-info pull-left"  type="submit" value="unlike"/>';
            }

            if ($isOwnPicture) {
                echo '<input id="filename" type="hidden" value="' . $picture[0]['pic_filename'] . '"/>';
                echo '<input id="deletePicture" type="hidden" value="' . $picture[0]['id'] . '"/>';
                echo '<input id="deleteButton" class="btn btn-info pull-right"  type="submit" value="Delete"/>';
            }
        }


        ?>
    </div>

    <div class="detailBox">

        <?php
        if (isset($_SESSION['username'])) : ?>
            <input id="userId" type="hidden" value="<?php echo $_SESSION['user_id'];?>"/>
            <input id="pictureId" type="hidden" value="<?php echo $picture[0]['id']; ?>"/>
            <input id="pictureName" type="hidden" value="<?php echo $picture[0]['pic_filename']; ?>"/>
        <?php endif ?>


        <div class="titleBox">
            <label>Comment Box</label>
        </div>

        <div class="actionBox">
            <ul class="commentList">
                <?php
                foreach ($comments as $c) : ?>
                <li>
                    <div class="commentText">
                        <p class=""><?php echo htmlspecialchars($c['comment']); ?></p>
                        <span class="date sub-text">on <?php echo $c['created_on']; ?></span>
                        <span class="date sub-text">By <?php echo $c['username']; ?></span>
                    </div>
                </li>
                <?php endforeach ?>
            </ul>

            <?php
            if (isset($_SESSION['username'])) : ?>
                <form class="form-inline" role="form" method="post">
                    <div class="form-group">
                        <input name="comment" id="comment" class="form-control" type="text" placeholder="Your comment" />
                    </div>
                    <div class="form-group">
                        <input class="btn btn-default" type="submit" value="Add"/>
                    </div>
                    <input type="hidden" name="secToken" value="<?php echo $_SESSION['secToken'];?>"/>
                </form>
            <?php endif; ?>

        </div>

    </div>
</div>
