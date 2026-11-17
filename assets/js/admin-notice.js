jQuery(document).ready(function($) {
    $('#frameword-notice .notice-dismiss').on('click', function() {
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'framewordlite_dismiss_notice',
                nonce: window.framewordliteNotice ? window.framewordliteNotice.nonce : ''
            }
        });
    });
});