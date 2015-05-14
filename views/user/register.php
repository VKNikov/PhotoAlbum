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
                    <label for="InputName">Enter Name</label>

                    <div class="input-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter Name"
                               required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter Email</label>

                    <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
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
                <div class="form-group">
                    <label for="confirmPass">Confirm Password</label>

                    <div class="input-group">
                        <input type="password" class="form-control" id="confirmPass" name="confirmPass"
                               placeholder="Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="captcha">Captcha</label>
                    <div class="input-group">
                        <input type="text" placeholder="Enter Code" id="captcha" name="captcha" class="inputcaptcha" required="required">
                        <img src="/photoalbum/libs/captcha/captcha.php" class="imgcaptcha" alt="captcha"  />
                        <img src="/photoalbum/libs/captcha/images/refresh.png" alt="reload" class="refresh" />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>

                </div>

                <a href="/photoalbum/user/login" class="btn btn-info pull-left">Login Instead</a>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>

        </form>
    </div>
</div>
