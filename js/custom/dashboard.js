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
        BASE_URL + 'include/dashboard/snippet_edit.php',
        formData,
        function (jdata) {
            if (jdata.st === 1) {

                $('div#snip_' + snipId).collapse('show');

                $('#' + snipId).find('panel-title>h4>strong').html(
                    '<input type="text">'
                );

                $('div#snip_' + snipId + ' .panel-body').html(
                    '<textarea class="snip-textarea">' + jdata.snippet + '</textarea>' +
                    '<button data-save-id="' + snipId + '" class="btn btn-success snip-save">Запази</button>'
                );
            }
        }
    );
}

function changeSnipPublicity(button, pop_button) {


    var formData = new FormData();
    formData.append('id', button.closest('.panel-default').attr('id'));
    formData.append('checked', pop_button.prop('checked'));

    makeAjaxRequest(
        BASE_URL + 'include/dashboard/toggle_snippet_publicity.php',
        formData,
        function (jdata) {
            if (jdata.st === 1) {

                if (pop_button.prop('checked')) {
                    pop_button
                        .closest('.popover-snip-share').find('.copy-share').show()
                        .prop('checked', true);
                } else { // change is equal to off
                    pop_button
                        .closest('.popover-snip-share').find('.copy-share').hide()
                        .prop('checked', false);
                }
            }
        },
        function () {
        },
        'hideSpinner'
    );
}

function createSnippet() {
    location.reload();
}

$(document).ready(function () {

    // Popover buttons 
    $(document).on('click', function (e) {
        $('[data-toggle="popover"],[data-original-title]').each(function () {
            // the 'is' for buttons that trigger popups
            // the 'has' for icons within a button that triggers a popup
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide').data('bs.popover').inState.click = false;
            }
        });
    });

    // Change arrow direction on hide/show
    $('button[data-toggle="collapse"]').on('click', function () {

        $(this).find('span')
            .toggleClass('glyphicon-menu-down')
            .toggleClass('glyphicon-menu-up');
    });

    // Popover for settings
    $('.snip-settings[data-toggle="popover"]').popover({
        container: 'body',
        placement: 'top',
        html: 'true',
        content: '' +
        '<button class="btn btn-snip edit-snip">' +
        '   <span class="glyphicon glyphicon-pencil"></span> Редактирай ' +
        '</button>' +
        '<button class="btn btn-snip delete-snip">' +
        '   <span class="glyphicon glyphicon-trash"></span> Изтрий ' +
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

    // Popover for sharing
    $('.snip-share[data-toggle="popover"]').popover({
        container: 'body',
        placement: 'bottom',
        html: 'true',
        title: "<strong>Опции за споделяне</strong>",
        content: '' +
        '<div class="popover-snip-share">' +
        '   <div class="input-group toggle-share">' +
        '       <h4>Споделяне:</h4>' +
        '       <span class="input-group-btn">' +
        '           <input class="snip-state" data-toggle="toggle" type="checkbox">' +
        '       </span>' +
        '   </div>' +
        '</div>'
    }).on('shown.bs.popover', function () {

        var that = $(this),
            popoverId = that.attr('aria-describedby');

        $('body')
            .delegate("#" + popoverId + " .snip-state", "change", function () {
                changeSnipPublicity(that, $(this));
            })
            .delegate("#" + popoverId + " .input-cp-snip", "click", function () {
                // this.select(); // Doesn't work in safari
                $(this).get(0).setSelectionRange(0, 999); // For safari
            })
            .delegate("#" + popoverId + " .btn-cp-snip", "click", function () {
                $(this).closest('.popover-snip-share').find('.input-cp-snip')
                    .select(); // Doesn't work in safari
                $(this).closest('.popover-snip-share').find('.input-cp-snip')
                    .get(0)
                    .setSelectionRange(0, 999); // For safari
                document.execCommand("copy");
            });

    }).on('show.bs.popover', function () {

        // Load content
        var formData = new FormData(),
            snippet_id = $(this).closest('.panel').attr('id'),
            that = $(this);

        formData.append('id', snippet_id);

        makeAjaxRequest(
            BASE_URL + 'include/dashboard/check_publicity.php',
            formData,
            function (jdata) {

                if (jdata.st === 1) {

                    var popover = that.data('bs.popover');
                    popover.options.content = jdata.content;
                    popover.setContent();
                    popover.$tip.addClass(popover.options.placement);

                    $(".snip-state").bootstrapToggle({
                        onstyle: "success",
                        size: "small",
                        on: "Да",
                        off: "Не"
                    });
                }
            },
            function () {
            },
            'hideSpinner'
        );
    });

    $('.panel-body')
        .on("click", ".snip-save", function () {

            var content = $(this).prev('textarea').val(),
                snipId = $(this).attr('data-save-id'),
                panel = $(this).closest('.panel-body'),
                formData = new FormData();

            formData.append('id', snipId);
            formData.append('content', content);

            makeAjaxRequest(
                BASE_URL + 'include/dashboard/snippet_save.php',
                formData,
                function (jdata) {
                    if (jdata.st === 1) {
                        panel.closest('.panel').find('.label-success').html('Последно редактиране: ' + jdata.date);
                        panel.html('<pre><code class="java hljs">' + jdata.content + '</code></pre>');
                        $('pre code').each(function (i, block) {
                            hljs.highlightBlock(block);
                        });

                    }
                }
            )
        })
        .on('keydown', '.snip-textarea', function (e) {
            var keyCode = e.keyCode || e.which;

            if (keyCode === 9) {
                e.preventDefault();

                var start = this.selectionStart;
                var end = this.selectionEnd;

                // set textarea value to: text before caret + tab + text after caret
                $(this).val($(this).val().substring(0, start)
                    + '    '
                    + $(this).val().substring(end));

                // put caret at right position again
                this.selectionStart =
                    this.selectionEnd = start + 4;

            }
        });

    $("#snip-upload-form").on("submit", function (event) {
        event.preventDefault();

        var actionURL = $(this).attr('action'),
            formData = new FormData($(this)[0]);

        makeAjaxRequest(
            actionURL,
            formData,
            function (jdata) {
                if (jdata.st === 1) {
                    swal(
                        'Страхотно!',
                        'Добавихте парче код към Вашия профил!',
                        'success'
                    ).then(function () {
                        createSnippet();
                    })

                } else {
                    swal('Невалидни данни', jdata.msg, 'warning');
                }
            }
        )
    });

    $("#search-snippet").on("submit", function (event) {
        event.preventDefault();

        makeAjaxRequest(
            BASE_URL + 'include/dashboard/search_snippet.php',
            new FormData($(this)[0]),
            function (jdata) {
                $("#snippet-message").hide();
                if (jdata.snippets.length < 1) {
                    $("#accordion").hide();
                    $("#snippet-message").show();
                } else {
                    $(".snippet").each(function (index, element) {
                        if (jdata.snippets.includes($(element).attr('id'))) {
                            $("#accordion").show();
                            $(element).show();
                        } else {
                            $(element).hide();
                        }
                    });
                }
            }
        )
    })
});