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
        <form role="form" method="post">
            <div class="inner">
                <h1>Add New Album</h1>
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="AlbumName">Enter Album's Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputName" id="AlbumName" placeholder="Album Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="InputMessage">Enter Description</label>
                    <div class="input-group">
                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5"></textarea>
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Add Album" class="btn btn-info pull-right">
            </div>
        </form>
    </div>
</div>