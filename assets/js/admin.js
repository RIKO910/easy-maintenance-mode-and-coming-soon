;(function($) {
    $(document).ready(function() {

        jQuery(document).ready(function () {
            jQuery('.TRPlugin-emm-global-rule-work__close').click(function () {
                jQuery(this).parent().hide();
            })
        })

        jQuery(document).ready(function () {
            let tabs = jQuery('.TRPlugin-emm-global-rule-form-tab');
            let tabsContent = jQuery('.TRPlugin-emm-global-rule-form-tab-content');

            tabs.click(function (e) {
                e.preventDefault();

                tabsContent.removeClass('TRPlugin-emm-global-rule-form-tab-content--active');
                tabs.removeClass('TRPlugin-emm-global-rule-form-tab--active');

                jQuery(this).addClass('TRPlugin-emm-global-rule-form-tab--active');

                const target = jQuery(this).data('target');

                jQuery('#' + target).addClass('TRPlugin-emm-global-rule-form-tab-content--active');
            });
        });

        jQuery(document).ready(function ($) {
            $('#emm-save-settings').on('click', function (e) {
                e.preventDefault();

                var $btn = $(this); // Convert `this` to a jQuery object
                $btn.html('<span><i class="fa fa-refresh fa-spin"></i></span> Loading...').prop('disabled', true);

                var maintenanceMode = $('input[name="maintenance_mode"]:checked').val();
                var nonce = $('#emm_ajax_nonce_field').val();

                $.ajax({
                    type: 'POST',
                    url: ajaxurl, // WordPress global AJAX URL
                    data: {
                        action: 'emm_save_settings',
                        maintenance_mode: maintenanceMode,
                        nonce: nonce
                    },
                    beforeSend: function () {
                        $('#emm-save-message').hide();
                    },
                    success: function (response) {
                        if (response.success) {
                            setTimeout(function () {
                                $('#emm-save-message').text(response.data.message).show();

                                // Hide the message after 3 seconds
                                setTimeout(function () {
                                    $('#emm-save-message').fadeOut();
                                }, 3000);

                            }, 1000);
                        } else {
                            alert(response.data.message);
                        }
                    },
                    error: function () {
                        alert('An error occurred while saving settings.');
                    },
                    complete: function () {
                        // Reset button after request completion
                        $btn.html('Save').prop('disabled', false);
                    }
                });
            });
        });



    });
})(jQuery);