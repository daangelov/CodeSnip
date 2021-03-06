function showSpinner() {
    $("#loading_div, #loading_gif").show();
}

function hideSpinner() {
    $("#loading_div, #loading_gif").hide();
}

function showWarning(msg) {
    swal("Възникна грешка!", msg, "warning");
}

/* Ajax request */
function makeAjaxRequest(script, formData, done, always, spinnerHidden) {

    if (typeof spinnerHidden === 'undefined') {
        showSpinner();
    }

    $.ajax({
        url: script,
        type: "POST",
        enctype: "multipart/form-data",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            try {
                var jdata = $.parseJSON(data);

                if (jdata.st === 0) {
                    showWarning(jdata.msg);
                } else {
                    done(jdata);
                }
            } catch (e) {
                /* For development */
                //console.log(e);
                //console.log(data);
                /* End */
                swal({
                    title: "Внимание!",
                    text: "Вашата сесия е изтекла.",
                    icon: "warning",
                    timer: 2000,
                    button: false
                }).then(function () {
                    window.location.href = BASE_URL + 'index.php';
                });
            }
        },
        error: function () {
            showWarning('Проблем с ajax заявката!');
        },
        complete: function () {
            if (typeof always === "function") {
                always();
            }
            hideSpinner();
        }
    });
}

$(document).ready(function () {

    // For highlight js library
    $('pre code').each(function (i, block) {
        hljs.highlightBlock(block);
    });
});
