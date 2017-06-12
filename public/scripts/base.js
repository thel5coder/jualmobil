
function notificationMessage(message, type) {
    toastr.options.positionClass = "toast-top-full-width";
    onclick:null;
    toastr.options.closeButton = true;
    toastr.options.showDuration = "300";
    toastr.options.hideDuration = "1000";
    toastr.options.timeOut = "5000";
    toastr.options.extendedTimeOut = "1000";
    toastr.options.showEasing = "swing";
    toastr.options.hideEasing = "linear";
    toastr.options.showMethod = "slideDown";
    toastr.options.hideMethod = "slideUp";
    toastr[type](message, type);
}

function runWaitMe(renderEffect,effect, text) {
    $(renderEffect).waitMe({
        effect: effect,
        text: text,
        bg: 'rgba(255,255,255,0.7)',
        color: '#000',
        maxSize: '',
        onClose: function() {
        }
    });
}

function logout(){
    BootstrapDialog.show({
        title: 'Konfirmasi',
        message: 'Apakah Yakin Ingin Keluar',
        cssClass: 'confirmation-dialog',
        draggable: true,
        buttons: [{
                label: 'Yes',
                icon: 'glyphicon glyphicon-send',
                cssClass: 'btn-primary',
                autospin: true,
                action: function(dialog) {
                    window.location = urlRouteLogout;
                }
            }, {
                label: 'Cancel',
                action: function(dialog) {
                    dialog.close();
                }
            }]
    });
    return false;
}

var editor = $('#content').ckeditor({
    extraPlugins: 'embed,autoembed,image2',
    height: 500,
    customConfig:url+'/public/vendor/unisharp/laravel-ckeditor/config.js',
    filebrowserImageBrowseUrl: url+'/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: url+'/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: url+'/laravel-filemanager?type=Files',
    filebrowserUploadUrl: url+'/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
});
