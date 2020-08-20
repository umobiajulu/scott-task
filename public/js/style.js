(function ($) {
    "use strict";
       toastr.options = {
        "debug": false,
        "newestOnTop": false,
        "positionClass": "toast-bottom-right",
        "closeButton": true,
        "progressBar": true
    };
    window.livewire.on('success', message => {
        toastr.success(message)
    })
    window.livewire.on('info', message => {
        toastr.info(message)
    })
    window.livewire.on('warning', message => {
        toastr.warning(message)
    })
    window.livewire.on('error', message => {
        toastr.error(message)
    })

})(jQuery);
