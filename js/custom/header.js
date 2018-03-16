// Login

$(document).ready(function () {

    $('form#navbar-main').on('submit', function (e) {
        e.preventDefault();

        makeAjaxRequest(
            $(this).attr('action'),
            new FormData($('form#navbar-main')[0]),
            function (jdata) {
                if (jdata.st === 1) {
                    location.reload();
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
