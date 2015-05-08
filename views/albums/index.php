<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:09
 */
?>

<h1>This is Albums' main page.</h1>
<div class="container">
    <div class="row">
        <div class="inner">
            <?php
            foreach ($albums as $a) {
                echo '<p value=' . $a['id'] . '>' . $a['name'] . '</p>';
            }

            if ($_SESSION['username']) {
                echo '<a href="/photoalbum/albums/create" class="btn btn-info pull-left">Create New Album</a>';
            }
            ?>

        </div>
    </div>
</div>