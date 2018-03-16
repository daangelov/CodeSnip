// Login script
$(document).ready(function () {
    $('form#navbar-main').submit(function (event) {
        event.preventDefault();
        let that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            content = that.serialize() + "&submit=submit";

        $.ajax({
            url: url,
            type: type,
            data: content,
            success: function (data) {
                let obj = JSON.parse(data);
                switch (obj.status) {
                    case 'empty_fields':
                        swal("Oops", "Please enter username and password.", "warning");
                        break;
                    case 'wrong_username':
                        swal("Oops", "Seems like this username is incorrect.", "error");
                        break;
                    case 'wrong_password':
                        swal("Wrong password", "Please try again.", "error");
                        break;
                    case 'pending_acc':
                        swal("Oops", "This account is still waiting for approval.", "info");
                        break;
                    case 'banned_acc':
                        swal("Oops", "This account is banned.", "info");
                        break;
                    case 'rejected_acc':
                        swal("Oops", "This account is rejected.", "info");
                        break;
                    case 'no_way':
                        swal("Oops", "Something went wrong. Please try again.", "error");
                        break;
                    case 'login_success':
                        location.reload();
                        break;
                }
            }
        });
        return false;
    });
});
