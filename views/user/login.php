<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:04
 */
?>

<div class="container">
    <div class="row">
        <form role="form" method="post">
            <input type="hidden" name="secToken" value="<?php echo $_SESSION['secToken'];?>"/>
            <div class="inner">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required
                        Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Username</label>

                    <div class="input-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter Name"
                               required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="InputPass">Enter Password</label>

                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                               required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <a href="/photoalbum/user/register" class="btn btn-info pull-left">Register Instead</a>
                <input type="submit" name="submit" id="login" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
    </div>
</div>
