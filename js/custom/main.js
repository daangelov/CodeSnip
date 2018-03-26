const BASE_URL = 'http://' + window.location.hostname + '/CodeSnip/';

function showSpinner() {
    $("#loading_div, #loading_gif").show();
}

function hideSpinner() {
    $("#loading_div, #loading_gif").hide();
}

function showWarning(msg) {
    swal("Възникна грешка!", msg, "error");
}

/* Ajax request */
function makeAjaxRequest(script, formData, done, always) {

    showSpinner();

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
                // console.log(e);
                // console.log(data);
                showWarning('Неправилно върната стойност!');
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

