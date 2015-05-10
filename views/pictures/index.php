<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:16
 */
?>
<div class="center">
    <?php
    if (isset($_SESSION['username']) && !empty($pictures)) : ?>
        <form class="form-inline">
            <div class="form-group">
                <button id="image-gallery-button" class="btn btn-primary btn-lg" type="button">

                    <i class="glyphicon glyphicon-picture">
                    </i>
                    Launch Image Gallery
                </button>
            </div>
            <div class="btn-group" data-toggle="buttons">

                <label class="btn btn-success btn-lg">
                    <i class="glyphicon glyphicon-leaf">
                    </i>
                    <input id="borderless-checkbox" type="checkbox"/>
                    Borderless
                </label>
                <label class="btn btn-primary btn-lg">
                    <i class="glyphicon glyphicon-fullscreen">
                    </i>
                    <input id="fullscreen-checkbox" type="checkbox"/>
                    Fullscreen
                </label>

            </div>
        </form>
    <?php endif?>


    <br/>

    <div id="links">
        <?php
        if (!empty($pictures)) {
            foreach ($pictures as $p) {
                echo '<a class="anchorButton" id="'. $p['id'] . '" href="/photoalbum/user_images/' . $p['user_id'] .
                    '/' . $p['album_id'] . '/' . $p['pic_filename'] . '" title="' . $p['description'] .
                    '" data-gallery=""> <img src="/photoalbum/user_images/' . $p['user_id'] . '/' .
                    $p['album_id'] . '/' . 'thumb_' . $p['pic_filename'] . '" title="' . $p['description'] . '"/></a>';
            }
        } else {
            echo '<div class="inner"><h1>No pictures with votes to display</h1></div>';
        }
        ?>

    </div>
    <br/>

    <div id="blueimp-gallery" class="blueimp-gallery" >
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        <!-- Controls for the borderless lightbox -->
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body next"></div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-default pull-left prev">
                                <i class="glyphicon glyphicon-chevron-left"></i>
                                Previous
                            </button>
                            <button type="button" class="btn btn-primary next">
                                Next
                                <i class="glyphicon glyphicon-chevron-right"></i>
                            </button>
                        </div>
                        <!--                        <div>-->
                        <!--                            <div>-->
                        <!--                                <button type="button" class="btn">-->
                        <!--                                    Show Comments-->
                        <!--                                    <i class="glyphicon glyphicon-chevron"></i>-->
                        <!--                                </button>-->
                        <!---->
                        <!--                                <button type="button" class="btn">-->
                        <!--                                    Show Comments-->
                        <!--                                    <i class="glyphicon glyphicon-chevron"></i>-->
                        <!--                                </button>-->
                        <!--                            </div>-->
                        <!--                            <div id="comments"></div>-->
                        <!--                            --><?php
                        //                            if (!empty($picturesComments)) {
                        //                                echo '<div> </div>>';
                        //                            }
                        //                            ?>
                        <!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container">

</div>