$(document).ready(function () {

    $(document).delegate('.acc_approve, .acc_ban', 'click', function () {
        
        var that = $(this),
            data = new FormData(),
            id = that.attr('id'),
            action = that.attr('data-action');

        data.append('id', id);
        data.append('action', action);

        makeAjaxRequest(
            'include/admin/account_approve.php',
            data,
            function (jdata) {
                if (jdata.st === 1) {
                    swal('Страхотно', jdata.msg, 'success').then(function () {
                        if (action === 'approve') {
                            that.closest('tr').find('td:nth-child(5)').html('Одобрен');
                            that.closest('td').html(
                                '<a title="Забрани" id="' + id + '" data-action="ban" class="acc_ban btn btn-default btn-danger">' +
                                '<span class="glyphicon glyphicon-remove"></span>' +
                                '</a>'
                            );

                        } else {
                            that.closest('tr').find('td:nth-child(5)').html('Забранен');
                            that.closest('td').html(
                                '<a title="Одобри" id="' + id + '" data-action="approve" class="acc_approve btn btn-default btn-success">' +
                                '<span class="glyphicon glyphicon-ok"></span>' +
                                '</a>'
                            );
                        }
                    });
                }
            }
        )
    })
});