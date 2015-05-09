<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photo Album</title>
    <link rel="stylesheet" href="/photoalbum/styles/styles.css" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="/photoalbum/libs/blueimp/css/bootstrap-image-gallery.min.css">


</head>
<body>
<header>
    <?php if (!empty($_SESSION['username'])) {
        echo "<h2>Hi, {$_SESSION['username']}!, Welcome back to your Photo Album</h2>";
    } else {
        echo "<h2>Welcome to Vassil's Photo Album website</h2>";
    } ?>


    <div id="custom-bootstrap-menu" class="navbar navbar-default" role="navigation">
        <div class="container-fluid">

            <div class="navbar-collapse navbar-menubuilder">
                <ul class="nav navbar-nav navbar-center">

                    <li><a href="/photoalbum/albums/">Albums</a></li>
                    <li><a href="/photoalbum/pictures/">Pictures</a></li>
                    <?php
                    if (!empty($_SESSION['username'])) {
                        echo '<li><a href="/photoalbum/albums/home">Home</a></li>';
                        echo '<li><a href=' . "/photoalbum/user/edit" . '>Edit Profile</a></li>';
                        echo '<li><a href=' . "/photoalbum/user/logout" . '>Logout</a></li>';
                    } else {
                        echo '<li><a href=' . "/photoalbum/user/register" . '>Register</a></li>';
                        echo '<li><a href=' . "/photoalbum/user/login" . '>Login</a></li>';
                    } ?>
                </ul>
            </div>

        </div>
    </div>
</header>
<div class="center" id="wrapper">

<?php include('messages.php'); ?>
