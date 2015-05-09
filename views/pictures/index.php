<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:16
 */
?>


<div class="container">
    <div class="inner">
        <h1>Pictures' main page.</h1>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<a href="/photoalbum/pictures/add" class="btn btn-info pull-left">Add New Picture</a>';
        }
        ?>
    </div>

</div>