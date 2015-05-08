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

                <a href="/photoalbum/user/login" class="btn btn-info pull-left">Login Instead</a>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>

        </form>
    </div>
</div>

<script>
    jQuery(function () {
        $("#submit").click(function () {
            $(".error").hide();
            var hasError = false;
            var passwordVal = $("#password").val();
            var checkVal = $("#confirmPass").val();
            if (passwordVal == '') {
                $("#password").after('<span class="error">Please enter a password.</span>');
                hasError = true;
            } else if (checkVal == '') {
                $("#confirmPass").after('<span class="error">Please re-enter your password.</span>');
                hasError = true;
            } else if (passwordVal != checkVal) {
                $("#confirmPass").after('<span class="error">Passwords do not match.</span>');
                hasError = true;
            }
            if (hasError == true) {
                return false;
            }
        });
    });
</script>