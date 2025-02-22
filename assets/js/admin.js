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

    });
})(jQuery);