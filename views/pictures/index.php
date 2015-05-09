<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:16
 */
?>

<h1>Pictures' main page.</h1>
<div class="container">
    <?php
    if (isset($_SESSION['username'])) {
        echo '<a href="/photoalbum/pictures/add" class="btn btn-info pull-left">Add New Picture</a>';
    }
    ?>

</div>