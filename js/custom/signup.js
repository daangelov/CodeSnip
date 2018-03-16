// Signup validation
function toggle_change(selector, state) {
    if (state === 'success') {
        selector.removeClass('has-error').addClass('has-success');
        selector.find('#status')
            .removeClass('hidden')
            .removeClass('glyphicon-remove')
            .addClass('glyphicon-ok');
    } else if (state === 'error') {
        selector.removeClass('has-success').addClass('has-error');
        selector.find('#status')
            .removeClass('hidden')
            .removeClass('glyphicon-ok')
            .addClass('glyphicon-remove');
    }

}

$(document).ready(function () {

    // Firstname, lastname and username validate
    $('#firstname-group, #lastname-group, #usr-group').on('focusout keyup', function () {
        var that = $(this),
            input_length = that.find('input').eq(0).val().length;

        if (input_length < 3 || input_length > 20) {
            toggle_change(that, 'error');
        } else {
            toggle_change(that, 'success');
        }
    });
    // Email validate
    $('#email-group').on('focusout keyup', function () {
        var that = $(this),
            email_pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (!email_pattern.test($('#email').val())) {
            toggle_change(that, 'error');
        } else {
            toggle_change(that, 'success');
        }
    });

    // Password validate
    $('#pwd-group').on('focusout keyup', function () {

        var that = $(this),
            input_length = that.find('input').eq(0).val().length;

        if (input_length < 8 || input_length > 20) {
            toggle_change(that, 'error');
        } else {
            toggle_change(that, 'success');
        }
    });

    // Password confirm validate
    $('#pwd-conf-group').on('focusout keyup', function () {

        var that = $(this),
            pwd_value = $('#pwd').val(),
            pwd_conf_value = $('#pwd-conf').val();

        if (pwd_value !== pwd_conf_value) {
            toggle_change(that, 'error');
        } else {
            toggle_change(that, 'success');
        }
    });

    // Sign up
    $('#sign_up').on('submit', function (e) {
        e.preventDefault();

        makeAjaxRequest(
            $(this).attr('action'),
            new FormData($('#sign_up')[0]),
            function (jdata) {
                if (jdata.st === 1) {
                    swal('Поздравления!', jdata.msg, 'success').then(function () {
                        location.reload();
                    });
                } else if (jdata.st === 2) {
                    swal('Внимание!', jdata.msg, 'warning');
                }
            },
            function () {
            }
        );
        return false;
    });
});