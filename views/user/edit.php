<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:08
 */
?>

<div class="container">
    <div class="row">
        <form role="form" method="post">
            <input type="hidden" name="secToken" value="<?php echo $_SESSION['secToken'];?>"/>
            <div class="center">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required
                        Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Enter Name</label>

                    <div class="input-group">
                        <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name"
                               required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter Email</label>

                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmailFirst" name="InputEmail"
                               placeholder="Enter Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputPass">Enter Password</label>

                    <div class="input-group">
                        <input type="password" class="form-control" id="InputPass" name="InputPass"
                               placeholder="Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ConfirmPass">Confirm Password</label>

                    <div class="input-group">
                        <input type="password" class="form-control" id="ConfirmPass" name="ConfirmPass"
                               placeholder="Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
    </div>
</div>