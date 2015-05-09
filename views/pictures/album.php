
<div class="center">
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
        <?php
        if (isset($_SESSION['username'])) : ?>
            <div class="form-group">
                <input id="userId" type="hidden" value="<?php echo $_SESSION['user_id'];?>"/>
                <input id="albumId" type="hidden" value="<?php echo $albumId; ?>" />
                <?php
                if ($this->hasVoted) : ?>
                    <button id="unlikeAlbum" class="btn btn-primary btn-lg" type="button">
                        Unlike Album
                    </button>
                <?php else : ?>
                    <button id="likeAlbum" class="btn btn-primary btn-lg" type="button">
                        Like Album
                    </button>
                <?php endif ?>

            </div>
        <?php endif?>

    </form>

    <br/>

    <!--

     The container for the list of example images

    -->

    <div id="links">
        <?php
        foreach ($pictures as $p) {
            echo '<a class="anchorButton" id="'. $p['id'] . '" href="/photoalbum/user_images/' . $p['user_id'] .
                '/' . $p['album_id'] . '/' . $p['pic_filename'] . '" title="' . $p['description'] .
                '" data-gallery=""> <img src="/photoalbum/user_images/' . $p['user_id'] . '/' .
                $p['album_id'] . '/' . 'thumb_' . $p['pic_filename'] . '" title="' . $p['description'] . '"/></a>';
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
