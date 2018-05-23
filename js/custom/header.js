// Login

$(document).ready(function () {

    $('#login').on('submit', function (e) {
        e.preventDefault();
        var form = $('form#login');
        makeAjaxRequest(
            form.attr('action'),
            new FormData(form[0]),
            function (jdata) {
                if (jdata.st === 1) {
                    window.location.href = BASE_URL + 'dashboard.php';
                } else if (jdata.st === 2) {
                    swal('Внимание!', jdata.msg, 'warning');
                }
            }
        );
        return false;
    });
});
