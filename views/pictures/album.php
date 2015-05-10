
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
            <?php if ($album[0]['user_id'] == $_SESSION['user_id']): ?>
            <div class="form-group">

                <a href="/photoalbum/pictures/add" class="btn btn-primary btn-lg">Add New Picture</a>
            </div>
            <?php endif ?>
        <?php endif?>
        <div class="form-group">

            <input id="downloadAlbum" class="btn btn-primary btn-lg" value="Download Album"/a>
        </div>
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

    <div class="detailBox">
            <div class="titleBox">
                <label>Comment Box</label>
<!--                <button type="button" class="close" aria-hidden="true">&times;</button>-->
            </div>

            <div class="actionBox">
                <ul class="commentList">
                    <?php
                    foreach ($albumComments as $comment) : ?>
                        <li>
                            <div class="commentText">
                                <p class=""><?php echo htmlspecialchars($comment['comment']); ?></p>
                                <span class="date sub-text">on <?php echo $comment['created_on']; ?></span>
                                <span class="date sub-text">By <?php echo $comment['username']; ?></span>
                            </div>
                        </li>
                    <?php endforeach ?>

                    <!--                    <div class="commenterImage">-->
                    <!--                        <img src="http://lorempixel.com/50/50/people/6" />-->
                    <!--                    </div>-->
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
                    </form>
                <?php endif; ?>
        </div>

    </div>

</div>
