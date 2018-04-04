<div class="container">
    <div class="omb_login">
        <div class="row omb_row-sm-offset-3">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <h1>Sign up</h1>
                <form id="sign_up" class="omb_loginForm" action="<?= BASE_URL; ?>include/entry/signup.php" method="POST">
                    <!-- First Name -->
                    <div id="firstname-group" class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input id="firstname" type="text" name="fname" placeholder="Име" class="form-control">
                            <span id="status" class="hidden glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>
                    </div>

                    <!-- Last Name -->
                    <div id="lastname-group" class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input id="lastname" type="text" name="lname" placeholder="Фамилия" class="form-control">
                            <span id="status" class="hidden glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>
                    </div>

                    <!-- Email -->
                    <div id="email-group" class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input id="email" type="email" name="email" placeholder="E-mail адрес" class="form-control">
                            <span id="status" class="hidden glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>
                    </div>

                    <!-- Username -->
                    <div id="usr-group" class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input id="usr" type="text" name="usr" placeholder="Потребителско име" class="form-control">
                            <span id="status" class="hidden glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>
                    </div>

                    <!-- Password -->
                    <div id="pwd-group" class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input id="pwd" type="password" name="pwd" placeholder="Парола" class="form-control">
                            <span id="status" class="hidden glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>
                    </div>

                    <!-- Password Confirm-->
                    <div id="pwd-conf-group" class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input id="pwd-conf" type="password" name="pwd-conf" placeholder="Потвърди парола" class="form-control">
                            <span id="status" class="hidden glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Регистрирай се</button>
                </form>
            </div>
        </div>
    </div>
    <!--Go Back-->
    <div class="form-group">
        <label class="col-xs-4 col-sm-4 col-md-4 col-lg-4 control-label"></label>
        <div class="col-md-4"><br>
            <a href="<?= BASE_URL; ?>index.php" class="btn btn-lg btn-primary btn-block">Назад</a>
        </div>
    </div>
</div>