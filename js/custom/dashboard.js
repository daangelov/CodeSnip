function deleteSnip(button) {

    swal({
        title: 'Внимание',
        text: 'Сигурни ли сте, че искате да изтриете този код? Действието не може да бъде върнато!',
        icon: "warning",
        buttons: {
            no: {text: "Отказ", value: false},
            yes: {text: "Изтрий", value: true}
        }
    }).then(function (value) {
        button.popover('hide');

        if (value !== true) {
            return false;
        } else {
            var snipId = button.closest('.panel-default').attr('id'),
                formData = new FormData();
            formData.append('id', snipId);
            makeAjaxRequest(
                BASE_URL + 'include/dashboard/snippet_delete.php',
                formData,
                function (jdata) {
                    if (jdata.st === 1) {
                        button.closest('.panel-default').hide('slow');
                    }
                }
            );
        }
    });
}

function editSnip(button) {
    button.popover('hide');

    var snipId = button.closest('.panel-default').attr('id'),
        formData = new FormData();
    formData.append('id', snipId);

    makeAjaxRequest(
        BASE_URL + 'include/dashboard/snippet_get_data.php',
        formData,
        function (jdata) {
            if (jdata.st === 1) {

                $('div#snip_' + snipId).collapse('show');

                $('div#snip_' + snipId + ' .panel-body').html(
                    '<textarea class="snip-textarea">' + jdata.snippet + '</textarea>' +
                    '<button data-save-id="' + snipId + '" class="btn btn-success snip-save">Запази</button>'
                );
            }
        }
    );
}

$(document).ready(function () {

    $(document).on('click', function(e) {
        $('[data-toggle="popover"],[data-original-title]').each(function() {
            // the 'is' for buttons that trigger popups
            // the 'has' for icons within a button that triggers a popup
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide').data('bs.popover').inState.click = false
            }
        });
    });

    $('pre code').each(function (i, block) {
        hljs.highlightBlock(block);
    });

    $('button[data-toggle="collapse"]').on('click', function () {

        $(this).find('span')
            .toggleClass('glyphicon-chevron-down')
            .toggleClass('glyphicon-chevron-up');
    });

    $('[data-toggle="popover"]').popover({
        container: 'body',
        placement: 'top',
        html: 'true',
        content: '' +
            '<button class="btn btn-snip edit-snip">' +
                '<span class="glyphicon glyphicon-pencil"></span> Редактирай ' +
            '</button>' +
            '<button class="btn btn-snip delete-snip">' +
                '<span class="glyphicon glyphicon-trash"></span> Изтрий ' +
            '</button>'
    }).on('shown.bs.popover', function () {

        var that = $(this);
        $('button.delete-snip').click(function () {
            deleteSnip(that);
        });
        $('button.edit-snip').click(function () {
            editSnip(that);
        });
    });

    $(document).on("click", ".snip-save", function () {

        var content = $(this).prev('textarea').val(),
            snipId = $(this).attr('data-save-id'),
            panel = $(this.closest('.panel-body')),
            formData = new FormData();

        formData.append('id', snipId);
        formData.append('content', content);

        makeAjaxRequest(
            BASE_URL + 'include/dashboard/snippet_save.php',
            formData,
            function (jdata) {
                if (jdata.st === 1) {
                    panel.html('<pre><code class="java hljs"></code></pre>');
                    $('code.hljs').text(content);

                    $('pre code').each(function (i, block) {
                        hljs.highlightBlock(block);
                    });
                }
            }
        )
    });
});