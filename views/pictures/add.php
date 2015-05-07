<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:49
 */
?>

<div class="container">

    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="inner">
                <h1>Add new picture page</h1>

                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Album Name</label>
                    <div class="form-group">
                        <div class="input-group">
                            <select name="Album" id="Album">
                                <?php
                                foreach ($album as $a) {
                                    echo '<option value='.$a['id'].'>'.$a['name'].'</option>';
                                }
                                ?>
                            </select>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>

                    <label for="InputPass">Picture Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="pictureName" id="pictureName" placeholder="Enter Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="InputPass">Choose File</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="file" name="pictureFile" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="InputPass">Public?</label>
                    <div class="input-group">
                        <input type="checkbox" class="form-control" name="is_public" value="1">
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Add Picture" class="btn btn-info pull-right">
            </div>
        </form>
    </div>
</div>