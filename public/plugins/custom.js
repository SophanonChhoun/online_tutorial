// $(document).ready(function() {
// 	 $("#phone_number").keydown(function (e) {
//         // Allow: backspace, delete, tab, escape, enter and .
//         if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
//              // Allow: Ctrl+A, Command+A
//             (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
//              // Allow: home, end, left, right, down, up
//             (e.keyCode >= 35 && e.keyCode <= 40)) {
//                  // let it happen, don't do anything
//                  return;
//         }
//         // Ensure that it is a number and stop the keypress
//         if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
//             e.preventDefault();
//         }
//     });
// });
//
// function setValidation() {
//     // resetCheckActive();
//     jQuery.validator.setDefaults({
//         errorPlacement: function(error, element) {
//         },
//         errorLabelContainer: $("div.validate_error"),
//     });
//     $("form#form_contain").validate({
//         ignore: [],
//         rules: {
//             "title": "required",
//             "page_type_id": "required",
//
//         },
//         highlight: function(input) {
//             $(input).parents('.form-line').addClass('error focused').css('color', 'red');
//             $(input).parents('.form-group').find('label.error').remove();
//         },
//         unhighlight: function(input) {
//             $(input).parents('.form-line').removeClass('error');
//             $(input).parents('.form-group').find('label.error').remove();
//         },
//     });
// }
// $(document).ready(function() {
//     setValidation();
// });


var showLoading = function () {
    $('body').loading();
}

var hideLoading = function () {
    $('body').loading('stop');
}

var setToastMessage = function (message) {
    localStorage.setItem('action', JSON.stringify({
        success: true,
        message: message
    }));
}

var showToastSuccess = function (message) {
    $.toast({
        heading: 'Success',
        text: message,
        showHideTransition: 'slide',
        icon: 'success'
    })
}

var showToastError = function (message) {
    $.toast({
        heading: 'Error',
        text: message,
        showHideTransition: 'slide',
        icon: 'error'
    })
}

$(function () {
    let alert = localStorage.getItem('action');
    if (alert) {
        alert = JSON.parse(alert);
        if (alert.success == true) {
            $.toast({
                heading: 'Success',
                text: alert.message,
                showHideTransition: 'slide',
                icon: 'success'
            })
        }
        localStorage.setItem('action', '');
    }
});

var showAlertError = function (messages) {
    let error_message = messages;
    if(Array.isArray(messages) || typeof(messages) === 'object') {
        error_message = '';
        for (let key in messages) {
            error_message = error_message + messages[key] + '<br>';
        }
    }
    error_message = error_message ? error_message : "Something went wrong";
    $.alert({
        title: 'Message!',
        content: error_message,
        type: 'orange',
        typeAnimated: true,
        escapeKey: 'close',
        buttons: {
            close: function () {
            }
        }
    });
}

function defaultStatus(id, state) {
    $('#status-' + id).prop("checked", state);
}

function defaultFeatureStatus(id, state) {
    $('#feature-' + id).prop("checked", state);
}

function showErrorTitle(messages, title, that) {
    var error_message = '';
    if (messages.title_en_exist) {
        error_message = 'The English '+ title +' has already been taken.'
    }

    if (messages.title_kh_exist) {
        error_message = (error_message ? '<br>' : '') + 'The Khmer '+ title +' has already been taken.';
    }

    $.confirm({
        title: 'Duplicate ' + title,
        content: error_message + '<br>Are you sure you want to duplicate ' + title + '?',
        type: 'orange',
        typeAnimated: true,
        buttons: {
            yes: {
                text: 'Yes',
                btnClass: 'btn-orange',
                action: function(){
                    that.save();
                }
            },
            close: function () {
                hideLoading();
            }
        }
    });
}
