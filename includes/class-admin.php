<?php
defined( 'ABSPATH' ) || exit;


/**
 * Class Admin.
 *
 * @since 1.0.0
 */
class EMM_Admin {


    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ), 59 );
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
    }

    /**
     * Add top-level menu.
     *
     * @since 1.0.0
     * @return void
     */
    public function admin_menu() {
        add_menu_page(
            __( 'Easy Maintenance Mode', 'easy-maintenance-mode-and-coming-soon' ),
            __( 'Easy Maintenance Mode', 'easy-maintenance-mode-and-coming-soon' ),
            'manage_options',
            'easy-maintenance-mode-and-coming-soon',
            array( $this, 'render_settings_page' ),
            'dashicons-hammer',
            6
        );
    }

    /**
     * Settings.
     *
     * @since 1.0.0
     * @return void
     */
    public function render_settings_page() {
        ?>

        <div class="wrap">
            <h1 class=""><?php echo esc_html__('Easy Maintenance Mode', 'easy-maintenance-mode-and-coming-soon')?></h1>

            <div id="" class="TRPlugin-emm-full-page">
                <div id="" class="TRPlugin-emm-columns-2">
                    <div id="" class="TRPlugin-emm-column-a">
                        <div class="TRPlugin-emm-global-rule-work">
                            <div class="TRPlugin-emm-global-rule-work__title">
                                <?php echo esc_html__('How Easy Maintenance Mode Works', 'easy-maintenance-mode-and-coming-soon')?>
                            </div>
                            <p><?php echo esc_html__('Easy maintenance mode plugin for WordPress works by temporarily disabling the front-end of your website while allowing administrators to work on updates, design changes, or other maintenance tasks.', 'easy-maintenance-mode-and-coming-soon')?></p>

                            <div class="TRPlugin-emm-global-rule-work__steps">

                                <div class="TRPlugin-emm-global-rule-work-step">
                                    <div class="TRPlugin-emm-global-rule-work-step__icon"><i class="fas fa-power-off"></i></div>
                                    <div class="TRPlugin-emm-global-rule-work-step__title"><?php echo esc_html__('Turn On Maintenance', 'easy-maintenance-mode-and-coming-soon')?></div>
                                    <div class="TRPlugin-emm-global-rule-work-step__description"><?php echo esc_html__('Click the toggle button to activate maintenance mode', 'easy-maintenance-mode-and-coming-soon')?></div>
                                </div>
                                <div class="TRPlugin-emm-global-rule-work-step TRPlugin-emm-global-rule-work-step--arrow">
                                    <span class="dashicons dashicons-arrow-right-alt"></span>
                                </div>

                                <div class="TRPlugin-emm-global-rule-work-step">
                                    <div class="TRPlugin-emm-global-rule-work-step__icon"><i class="fa fa-solid fa-pen-fancy"></i></div>
                                    <div class="TRPlugin-emm-global-rule-work-step__title"><?php echo esc_html__('Choose a Design Template', 'easy-maintenance-mode-and-coming-soon')?></div>
                                    <div class="TRPlugin-emm-global-rule-work-step__description"><?php echo esc_html__('Select a pre-designed template for the maintenance page', 'easy-maintenance-mode-and-coming-soon')?></div>
                                </div>
                                <div class="TRPlugin-emm-global-rule-work-step TRPlugin-emm-global-rule-work-step--arrow">
                                    <span class="dashicons dashicons-arrow-right-alt"></span>
                                </div>

                                <div class="TRPlugin-emm-global-rule-work-step">
                                    <div class="TRPlugin-emm-global-rule-work-step__icon"><i class="fa fa-solid fa-bell-slash"></i></div>
                                    <div class="TRPlugin-emm-global-rule-work-step__title"><?php echo esc_html__('Set Time Duration', 'easy-maintenance-mode-and-coming-soon')?></div>
                                    <div class="TRPlugin-emm-global-rule-work-step__description"><?php echo esc_html__('Define how long maintenance mode should remain active', 'easy-maintenance-mode-and-coming-soon')?></div>
                                </div>

                            </div>

                            <div class="TRPlugin-emm-global-rule-work__close">
                                ×
                            </div>
                        </div>


                        <div class="TRPlugin-emm-global-rule-form">
                            <div class="TRPlugin-emm-global-rule-form__tabs">

                                <div class="TRPlugin-emm-global-rule-form-tab TRPlugin-emm-global-rule-form-tab--active" data-target="TRPlugin-emm-global-rule-maintenance">
                                    <div class="TRPlugin-emm-global-rule-form-tab__icon">
                                        <span class="dashicons dashicons-arrow-right-alt2"></span>
                                    </div>
                                    <div class="TRPlugin-emm-global-rule-form-tab__title">
                                        <h3><?php echo esc_html__('Enable Maintenance Mode', 'easy-maintenance-mode-and-coming-soon'); ?></h3>
                                        <div><?php echo esc_html__('Set up maintenance mode', 'easy-maintenance-mode-and-coming-soon'); ?></div>
                                    </div>
                                </div>


                                <div class="TRPlugin-emm-global-rule-form-tab " data-target="TRPlugin-emm-global-rule-page-template">
                                    <div class="TRPlugin-emm-global-rule-form-tab__icon">
                                        <span class="dashicons dashicons-arrow-right-alt2"></span>
                                    </div>
                                    <div class="TRPlugin-emm-global-rule-form-tab__title">
                                        <h3><?php echo esc_html__('Custom Maintenance Page', 'easy-maintenance-mode-and-coming-soon')?></h3>
                                        <div><?php echo esc_html__('Set design template', 'easy-maintenance-mode-and-coming-soon')?></div>
                                    </div>
                                </div>



                                <div class="TRPlugin-emm-global-rule-form-tab " data-target="TRPlugin-emm-global-rule-countdown-timer">
                                    <div class="TRPlugin-emm-global-rule-form-tab__icon">
                                        <span class="dashicons dashicons-arrow-right-alt2"></span>
                                    </div>
                                    <div class="TRPlugin-emm-global-rule-form-tab__title">
                                        <h3><?php echo esc_html__('Countdown Timer', 'easy-maintenance-mode-and-coming-soon')?></h3>
                                        <div><?php echo esc_html__('Time setup if needed', 'easy-maintenance-mode-and-coming-soon')?></div>
                                    </div>
                                </div>

                            </div>

                            <div class="TRPlugin-emm-global-rule-form__content">

                                <div class="TRPlugin-emm-global-rule-form-tab-content TRPlugin-emm-global-rule-form-tab-content--active" id="TRPlugin-emm-global-rule-maintenance">
                                    <div class="TRPlugin-emm-global-rule-hint ">
                                        <div class="TRPlugin-emm-global-rule-hint__icon">
                                            <span class="dashicons dashicons-info"></span>
                                        </div>
                                        <div class="TRPlugin-emm-global-rule-hint__content">
                                            <?php echo esc_html__('While enabled, only administrators can access the backend.', 'easy-maintenance-mode-and-coming-soon')?>
                                            </div>
                                    </div>

                                    <div class=" ">

                                        <p class="form-field">
                                            <label for="pricing_type"><?php echo esc_html__('Maintenance mode', 'easy-maintenance-mode-and-coming-soon')?></label>
                                            <label for="pricing_type-flat" style="padding: 0; float: none; width: auto; margin: 0;">
                                                <input type="radio"  style="margin-right: 3px;" value="flat" checked="checked" name="pricing_type" id="pricing_type-flat">
                                                on</label>
                                            <label for="pricing_type-percentage" style="padding: 0; float: none; width: auto; margin: 0 5px 0 20px;">
                                                <input type="radio"  value="percentage" style="margin-right: 3px;" name="pricing_type" id="pricing_type-percentage">
                                                Off</label>
                                        </p>

                                    </div>
                                </div>



                                <div class="TRPlugin-emm-global-rule-form-tab-content " id="TRPlugin-emm-global-rule-page-template">
                                    <div class="TRPlugin-emm-global-rule-hint ">
                                        <div class="TRPlugin-emm-global-rule-hint__icon">
                                            <span class="dashicons dashicons-info"></span>
                                        </div>
                                        <div class="TRPlugin-emm-global-rule-hint__content">
                                            <?php echo esc_html__('Choose from multiple design templates.', 'easy-maintenance-mode-and-coming-soon')?>
                                        </div>
                                    </div>

                                </div>



                                <div class="TRPlugin-emm-global-rule-form-tab-content " id="TRPlugin-emm-global-rule-countdown-timer">
                                    <div class="TRPlugin-emm-global-rule-hint ">
                                        <div class="TRPlugin-emm-global-rule-hint__icon">
                                            <span class="dashicons dashicons-info"></span>
                                        </div>
                                        <div class="TRPlugin-emm-global-rule-hint__content">
                                            <?php echo esc_html__('Set an estimated time for maintenance completion.', 'easy-maintenance-mode-and-coming-soon')?></div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- /post-body-content -->

                    <div id="" class=" TRPlugin-emm-column-b">

                        <div id="TRPlugin-emm-notice-box" class="notice_box">
                            <h2 class="notice_box_header"><?php echo esc_html__('Save', 'easy-maintenance-mode-and-coming-soon')?></h2>
                            <hr/>
                            <div class="publish-content">
                                <h4><?php echo esc_html__('Click the "Save" button to apply changes immediately.', 'easy-maintenance-mode-and-coming-soon')?></h4>
                            </div>
                            <div class="publish_button">
                                <button class="btn "><?php echo esc_html__('Save', 'easy-maintenance-mode-and-coming-soon')?></button>
                            </div>
                        </div>

                        <div id="TRPlugin-emm-notice-box" class="notice_box">
                            <h2 class="notice_box_header"><?php echo esc_html__('Maintenance mode', 'easy-maintenance-mode-and-coming-soon')?></h2>
                            <hr/>
                            <div class="notice-content">
                                <h4><?php echo esc_html__('Priorities are the following:', 'easy-maintenance-mode-and-coming-soon')?></h4>
                                <ul class="TRPlugin-emm-notice-list">
                                    <li><?php echo esc_html__('User Experience – Inform visitors with a clear message and expected downtime duration.', 'easy-maintenance-mode-and-coming-soon')?></li>
                                    <li><?php echo esc_html__('Testing – Always test your maintenance page before enabling it on a live site.', 'easy-maintenance-mode-and-coming-soon')?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

    /**
     * Enqueue admin styles and scripts.
     *
     * @param string $hook Page hook.
     *
     * @since 1.0.0
     * @return void
     */
    public function enqueue_admin_assets($hook)
    {
        //  Fontawesome
        wp_enqueue_style(
                'main-font-awesome-css-custom',
            EMM_PLUGIN_URL . 'assets/fontawesome/css/fontawesome.min.css',
                array(),
                '5.15.3'
        );
        wp_enqueue_style(
            'main-all-css-custom',
            EMM_PLUGIN_URL . 'assets/fontawesome/css/all.min.css',
            array(),
            '5.15.3'
        );
        wp_enqueue_style(
                'font-awesome-webfonts',
            EMM_PLUGIN_URL . 'assets/fontawesome/webfonts',
            array(),
            '5.15.3'
        );

        // Enqueue admin CSS.
        wp_enqueue_style(
            'pct_admin_style',
            EMM_PLUGIN_URL . 'assets/css/admin.css',
            array(),
            EMM_VERSION
        );

        // Enqueue admin JavaScript.
        wp_enqueue_script(
            'qbt_admin_script',
            EMM_PLUGIN_URL . 'assets/js/admin.js',
            array('jquery'),
            EMM_VERSION,
            true
        );
    }

}