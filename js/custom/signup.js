// Sign up form validate

$(document).ready(function () {
    var first_name_check = false,
        last_name_check = false,
        email_check = false,
        username_check = false,
        password_check = false;

    $('#firstname-group').on('focusout keyup keypress', function () {
        var first_name_length = $('#firstname').val().length;

        if (first_name_length < 3 || first_name_length > 20) {
            $('#firstname-group')
                .removeClass('has-success')
                .addClass('has-error');
            $('#firstname-group #status')
                .removeClass('hidden')
                .removeClass('glyphicon-ok')
                .addClass('glyphicon-remove');
            first_name_check = false;
        } else {
            $('#firstname-group')
                .removeClass('has-error')
                .addClass('has-success');
            $('#firstname-group #status')
                .removeClass('hidden')
                .removeClass('glyphicon-remove')
                .addClass('glyphicon-ok');
            first_name_check = true;
        }
    });
    $('#lastname-group').on('focusout keyup keypress', function () {
        var last_name_length = $('#lastname').val().length;
        if (last_name_length < 3 || last_name_length > 20) {
            $('#lastname-group')
                .removeClass('has-success')
                .addClass('has-error');
            $('#lastname-group #status')
                .removeClass('hidden')
                .removeClass('glyphicon-ok')
                .addClass('glyphicon-remove');
            last_name_check = false;
        } else {
            $('#lastname-group')
                .removeClass('has-error')
                .addClass('has-success');
            $('#lastname-group #status')
                .removeClass('hidden')
                .removeClass('glyphicon-remove')
                .addClass('glyphicon-ok');
            last_name_check = true;
        }
    });
    $('input#email').on('focusout keyup keypress', function () {
        var email_pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (!email_pattern.test($('input#email').val())) {
            $('#sign_up>#email').addClass('has-error');
            $('#email>div>span#error').removeClass('hidden');
            $('#sign_up>#email').removeClass('has-success');
            $('#email>div>span#success').addClass('hidden');
            email_check = false;
        } else {
            $('#sign_up>#email').removeClass('has-error');
            $('#email>div>span#error').addClass('hidden');
            $('#sign_up>#email').addClass('has-success');
            $('#email>div>span#success').removeClass('hidden');
            email_check = true;
        }
    });
    $('#uid-group').on('focusout keyup keypress', function () {
        var uid_length = $('#uid').val().length;

        if (uid_length < 3 || uid_length > 20) {
            $('#sign_up>#uid').addClass('has-error');
            $('#uid>div>span#error').removeClass('hidden');
            $('#sign_up>#uid').removeClass('has-success');
            $('#uid>div>span#success').addClass('hidden');
            username_check = false;
        } else {
            $('#sign_up>#uid').removeClass('has-error');
            $('#uid>div>span#error').addClass('hidden');
            $('#sign_up>#uid').addClass('has-success');
            $('#uid>div>span#success').removeClass('hidden');
            username_check = true;
        }
    });
    $('input#pwd').on('focusout keyup keypress', function () {
        var uid_length = $('input#pwd').val().length;
        if (uid_length < 8 || uid_length > 20) {
            $('#sign_up>#pwd').addClass('has-error');
            $('#pwd>div>span#error').removeClass('hidden');
            $('#sign_up>#pwd').removeClass('has-success');
            $('#pwd>div>span#success').addClass('hidden');
            password_check = false;
        } else {
            $('#sign_up>#pwd').removeClass('has-error');
            $('#pwd>div>span#error').addClass('hidden');
            $('#sign_up>#pwd').addClass('has-success');
            $('#pwd>div>span#success').removeClass('hidden');
            password_check = true;
        }
    });

    $('form#sign_up').submit(function (event) {
        event.preventDefault();
        if (!first_name_check || !last_name_check || !email_check || !username_check || !password_check) {
            swal("", "Please fill in the form correctly", "warning");
            return false;
        } else {
            var that = $(this),
                url = that.attr('action'),
                type = that.attr('method'),
                content = that.serialize() + "&submit=submit";
            $.ajax({
                url: url,
                type: type,
                data: content,
                success: function (data) {
                    var obj = JSON.parse(data);
                    switch (obj.status) {
                        case 'no_way':
                            swal("Oops", "Something went wrong. Please try again.", "error");
                            break;
                        case 'signup_success':
                            swal("Congratulations", "You are now signed up!", "success");
                            break;
                        case 'error':
                            swal("Oops", "Your request failed.", "error");
                            break;
                        case 'invalid_fields':
                            swal("", "Please fill in the form correctly", "warning");
                            break;
                        case 'invalid_password':
                            swal("", "Password must be a between 8 and 20 characters long", "warning");
                            break;
                        case 'taken_username':
                            swal("Oops", "This username is taken.", "warning");
                            break;
                        case 'taken_email':
                            swal("Oops", "This email is taken.", "warning");
                            break;
                        case 'invalid_email':
                            swal("Oops", "This email is not valid.", "warning");
                            break;
                    }
                }
            });
            return false;
        }
    });

    $('div#first_name').hover(function () {
        $('div#pop-up-fn').show()
            .css('top', 19)
            .css('left', 350);
    }, function () {
        $('div#pop-up-fn').hide();
    });
    $('div#last_name').hover(function () {
        $('div#pop-up-ln').show()
            .css('top', 68)
            .css('left', 350);
    }, function () {
        $('div#pop-up-ln').hide();
    });
    $('div#email').hover(function () {
        $('div#pop-up-em').show()
            .css('top', 117)
            .css('left', 350);
    }, function () {
        $('div#pop-up-em').hide();
    });
    $('div#uid').hover(function () {
        $('div#pop-up-un').show()
            .css('top', 166)
            .css('left', 350);
    }, function () {
        $('div#pop-up-un').hide();
    });
    $('div#pwd').hover(function () {
        $('div#pop-up-pw').show()
            .css('top', 215)
            .css('left', 350);
    }, function () {
        $('div#pop-up-pw').hide();
    });
});
