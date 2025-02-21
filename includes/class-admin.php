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
            __( 'Easy Maintenance Mode', 'easy-maintenance-mode' ),
            __( 'Easy Maintenance Mode', 'easy-maintenance-mode' ),
            'manage_options',
            'easy-maintenance-mode',
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
            <h1 class=""><?php echo esc_html__('Easy Maintenance Mode', 'easy-maintenance-mode')?></h1>

            <form name="post" action="" id="">
                <div id="" class="qbp-full-page">
                    <div id="" class="qbp-columns-2">
                        <div id="" class="qbp-column-a">
                            <div class="qbp-global-pricing-rule-work">
                                <div class="qbp-global-pricing-rule-work__title">
                                    <?php echo esc_html__('How easy maintenance mode work', 'easy-maintenance-mode')?>
                                </div>
                                <p><?php echo esc_html__('Easy maintenance mode plugin for WordPress works by temporarily disabling the front-end of your website while allowing administrators to work on updates, design changes, or other maintenance tasks.', 'easy-maintenance-mode')?></p>

                                <div class="qbp-global-pricing-rule-work__steps">

                                    <div class="qbp-global-pricing-rule-work-step">
                                        <div class="qbp-global-pricing-rule-work-step__icon"><i class="fas fa-power-off"></i></div>
                                        <div class="qbp-global-pricing-rule-work-step__title"><?php echo esc_html__('On Maintenance Mode', 'easy-maintenance-mode')?></div>
                                        <div class="qbp-global-pricing-rule-work-step__description"><?php echo esc_html__('Just click on off click button it work properly', 'easy-maintenance-mode')?></div>
                                    </div>
                                    <div class="qbp-global-pricing-rule-work-step qbp-global-pricing-rule-work-step--arrow">
                                        <span class="dashicons dashicons-arrow-right-alt"></span>
                                    </div>

                                    <div class="qbp-global-pricing-rule-work-step">
                                        <div class="qbp-global-pricing-rule-work-step__icon"><i class="fa fa-solid fa-pen-fancy"></i></div>
                                        <div class="qbp-global-pricing-rule-work-step__title"><?php echo esc_html__('Design Template', 'easy-maintenance-mode')?></div>
                                        <div class="qbp-global-pricing-rule-work-step__description"><?php echo esc_html__('You can chose any design', 'easy-maintenance-mode')?></div>
                                    </div>
                                    <div class="qbp-global-pricing-rule-work-step qbp-global-pricing-rule-work-step--arrow">
                                        <span class="dashicons dashicons-arrow-right-alt"></span>
                                    </div>

                                    <div class="qbp-global-pricing-rule-work-step">
                                        <div class="qbp-global-pricing-rule-work-step__icon"><i class="fa fa-solid fa-bell-slash"></i></div>
                                        <div class="qbp-global-pricing-rule-work-step__title"><?php echo esc_html__('Time Duration', 'easy-maintenance-mode')?></div>
                                        <div class="qbp-global-pricing-rule-work-step__description"><?php echo esc_html__('You can also chose time duration', 'easy-maintenance-mode')?></div>
                                    </div>

                                </div>

                                <div class="qbp-global-pricing-rule-work__close">
                                    ×
                                </div>
                            </div>


                            <div class="qbp-global-pricing-rule-form">
                                <div class="qbp-global-pricing-rule-form__tabs">

                                    <div class="qbp-global-pricing-rule-form-tab qbp-global-pricing-rule-form-tab--active" data-target="qbp-global-pricing-rule-pricing">
                                        <div class="qbp-global-pricing-rule-form-tab__icon">
                                            <span class="dashicons dashicons-arrow-right-alt2"></span>
                                        </div>
                                        <div class="qbp-global-pricing-rule-form-tab__title">
                                            <h3>Maintenance Mode</h3>
                                            <div>Set up maintenance mode</div>
                                        </div>
                                    </div>


                                    <div class="qbp-global-pricing-rule-form-tab " data-target="qbp-global-pricing-rule-products-and-categories">
                                        <div class="qbp-global-pricing-rule-form-tab__icon">
                                            <span class="dashicons dashicons-arrow-right-alt2"></span>
                                        </div>
                                        <div class="qbp-global-pricing-rule-form-tab__title">
                                            <h3>Design Template</h3>
                                            <div>Set design template</div>
                                        </div>
                                    </div>



                                    <div class="qbp-global-pricing-rule-form-tab " data-target="qbp-global-pricing-rule-quantity">
                                        <div class="qbp-global-pricing-rule-form-tab__icon">
                                            <span class="dashicons dashicons-arrow-right-alt2"></span>
                                        </div>
                                        <div class="qbp-global-pricing-rule-form-tab__title">
                                            <h3>Time setup</h3>
                                            <div>Time setup</div>
                                        </div>
                                    </div>

                                </div>

                                <div class="qbp-global-pricing-rule-form__content">

                                    <div class="qbp-global-pricing-rule-form-tab-content qbp-global-pricing-rule-form-tab-content--active" id="qbp-global-pricing-rule-pricing">
                                        <div class="qbp-global-pricing-rule-hint ">
                                            <div class="qbp-global-pricing-rule-hint__icon">
                                                <span class="dashicons dashicons-info"></span>
                                            </div>
                                            <div class="qbp-global-pricing-rule-hint__content">
                                                This section controls the base product price. You can set new regular and sale prices or specify a percentage discount based on the original product price.			</div>
                                        </div>

                                        <div class=" ">

                                            <p class="form-field">
                                                <label for="pricing_type">Maintenance mode</label>
                                                <label for="pricing_type-flat" style="padding: 0; float: none; width: auto; margin: 0;">
                                                    <input type="radio"  style="margin-right: 3px;" value="flat" checked="checked" name="pricing_type" id="pricing_type-flat">
                                                    on</label>
                                                <label for="pricing_type-percentage" style="padding: 0; float: none; width: auto; margin: 0 5px 0 20px;">
                                                    <input type="radio"  value="percentage" style="margin-right: 3px;" name="pricing_type" id="pricing_type-percentage">
                                                    Off</label>
                                            </p>

                                        </div>
                                    </div>



                                    <div class="qbp-global-pricing-rule-form-tab-content " id="qbp-global-pricing-rule-products-and-categories">
                                        <div class="qbp-global-pricing-rule-hint ">
                                            <div class="qbp-global-pricing-rule-hint__icon">
                                                <span class="dashicons dashicons-info"></span>
                                            </div>
                                            <div class="qbp-global-pricing-rule-hint__content">
                                                If you do not specify products or product categories, the rule will work for all products in your store. (excluding products selected in the exclusions section)			</div>
                                        </div>


                                    </div>



                                    <div class="qbp-global-pricing-rule-form-tab-content " id="qbp-global-pricing-rule-quantity">
                                        <div class="qbp-global-pricing-rule-hint ">
                                            <div class="qbp-global-pricing-rule-hint__icon">
                                                <span class="dashicons dashicons-info"></span>
                                            </div>
                                            <div class="qbp-global-pricing-rule-hint__content">
                                                Quantity rules are applied to products individually.</div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- /post-body-content -->

                        <div id="" class=" qbp-column-b">

                            <div id="qbp_notice_notice_box" class="notice_box">
                                <h2 class="notice_box_header">Publish</h2>
                                <hr/>
                                <div class="publish_button">
                                    <button class="btn ">Publish</button>
                                </div>
                            </div>

                            <div id="qbp_notice_notice_box" class="notice_box">
                                <h2 class="notice_box_header">Maintenance mode</h2>
                                <hr/>
                                <div class="notice-content">
                                    <h4>Please note that rules in products have higher priority overriding the pricing rules you set here.</h4>
                                    <h4>Priorities are the following:</h4>
                                    <ul class="qbp-global-pricing-notice-list">
                                        <li>Single product rules (or single variation)</li>
                                        <li>Variable product rules (if a product is a variable)</li>
                                        <li>Global rules</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
        wp_enqueue_style('font-awesome-webfonts',
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