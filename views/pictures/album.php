<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 8.5.2015 г.
 * Time: 23:41
 */

foreach ($pictures as $p) {
    echo '<div class="picture"><a href=""><img src="/photoalbum/user_images/' . $_SESSION['user_id'] . '/' .
        'thumb_' . $p['pic_filename'] . '" /></a></div>';
}
?>
