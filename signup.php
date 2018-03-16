<?php
require_once 'include/system.php';

include_once ROOT . 'html/common/header.php'; ?>

    <div class="container">
        <div class="omb_login">
            <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                    <h1>Sign up</h1>
                    <form id="sign_up" class="omb_loginForm" action="include/entry/signup.php" method="POST">
                        <!-- First Name -->
                        <div id="firstname-group" class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input id="firstname" type="text" name="first_name" placeholder="First Name"
                                       class="form-control">
                                <span id="status" class="hidden glyphicon glyphicon-ok form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- HIDDEN / POP-UP DIV -->
                        <div id="pop-up-fn">
                            <p>Should be between 3 and 20 characters long</p>
                        </div>
                        <!-- Last Name -->
                        <div id="lastname-group" class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input id="lastname" type="text" name="last_name" placeholder="Last Name"
                                       class="form-control">
                                <span id="status" class="hidden glyphicon glyphicon-ok form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- HIDDEN / POP-UP DIV -->
                        <div id="pop-up-ln">
                            <p>Should be between 3 and 20 characters long</p>
                        </div>
                        <!-- Email -->
                        <div id="email-group" class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                <input id="email" type="email" name="email" placeholder="E-mail" class="form-control">
                                <span id="status" class="hidden glyphicon glyphicon-ok form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- HIDDEN / POP-UP DIV -->
                        <div id="pop-up-em">
                            <p>Should be a valid e-mail</p>
                        </div>
                        <!-- Username -->
                        <div id="uid-group" class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input id="uid" type="text" name="uid" placeholder="Username" class="form-control">
                                <span id="status" class="hidden glyphicon glyphicon-ok form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- HIDDEN / POP-UP DIV -->
                        <div id="pop-up-un">
                            <p>Should be between 3 and 20 characters long</p>
                        </div>
                        <!-- Password -->
                        <div id="pwd-group" class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input id="pwd" type="password" name="pwd" placeholder="Password" class="form-control">
                                <span id="status" class="hidden glyphicon glyphicon-ok form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- HIDDEN / POP-UP DIV -->
                        <div id="pop-up-pw">
                            <p>Should be between 8 and 20 characters long</p>
                        </div>

                        <!-- Submit button -->
                        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
        <!--Go Back-->
        <div class="form-group">
            <label class="col-xs-4 col-sm-4 col-md-4 col-lg-4 control-label"></label>
            <div class="col-md-4"><br>
                <a href="index.php" class="btn btn-lg btn-primary btn-block">GO BACK</a>
            </div>
        </div>
    </div>
    <script src="<?= BASE_URL; ?>js/custom/signup.js"></script>

<?php include_once 'html/common/footer.php'; ?>