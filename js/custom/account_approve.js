$(document).ready(function () {

    $('.acc_approve, .acc_ban').on('click', function () {

        var that = $(this),
            data = new FormData();

        data.append('id', that.attr('id'));
        data.append('action', that.attr('data-action'));

        makeAjaxRequest(
            'include/admin/account_approve.php',
            data,
            function (jdata) {
                if (jdata.st === 1) {
                    swal('Страхотно', jdata.msg, 'success').then(function () {
                        that.closest('tr').hide('slow');
                    });
                }
            }
        )
    })
});