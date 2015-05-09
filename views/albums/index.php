<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:09
 */
?>


<div class="container">
    <div class="row">
        <div class="inner">
            <h1>This is Albums' main page.</h1>
            <?php
            foreach ($albums as $a) {
                if (isset($_SESSION['username'])) {
                    echo '<p value=' . $a['id'] . '><a href= "/photoalbum/pictures/album/' .
                        $a['id'] . '">' . $a['name'] . '</a></p>';
                } else {
                    if ($a['is_public']) {
                        echo '<p value=' . $a['id'] . '><a href= "/photoalbum/pictures/album/' .
                            $a['id'] . '">' . $a['name'] . '</a></p>';
                    }
                }
            }

            if (isset($_SESSION['username'])) {
                echo '<a href="/photoalbum/albums/create" class="btn btn-info pull-left">Create New Album</a>';
            }
            ?>

        </div>
    </div>
</div>