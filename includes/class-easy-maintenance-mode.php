<?php

defined( 'ABSPATH' ) || exit;

/**
 * Class EMM_Mode.
 *
 * @since 1.0.0
 */
class EASYMAMO_Mode {

    /**
     * File.
     *
     * @var string $file File
     *
     * @since 1.0.0
     */
    public string $file;

    /**
     * Version.
     *
     * @var mixed|string $version Version
     *
     * @since 1.0.0
     */
    public string $version = '1.0.0';

    /**
     * Constructor.
     *
     * @since 1.0.0
     */
    public function __construct( $file, $version = '1.0.0' ) {
        $this->file    = $file;
        $this->version = $version;
        $this->define_constant();
        $this->activation();
        $this->deactivation();
        $this->init_hooks();
    }

    /**
     * Define Constant.
     *
     * @return void
     * @since 1.0.0
     */
    public function define_constant() {
        define( 'EASYMAMO_VERSION', $this->version );
        define( 'EASYMAMO_PLUGIN_DIR', plugin_dir_path( $this->file ) );
        define( 'EASYMAMO_PLUGIN_URL', plugin_dir_url( $this->file ) );
        define( 'EASYMAMO_PLUGIN_BASENAME', plugin_basename( $this->file ) );
    }

    /**
     * Activation.
     *
     * @return void
     * @since 1.0.0
     */
    public function activation() {
        register_activation_hook( $this->file, array( $this, 'activation_hook' ) );
    }

    /**
     * Activation hook.
     *
     * @return void
     * @since 1.0.0
     */
    public function activation_hook() {
        update_option( 'EASYMAMO_VERSION', $this->version );
    }

    /**
     * Deactivation.
     *
     * @return void
     * @since 1.0.0
     */
    public function deactivation() {
        register_deactivation_hook( $this->file, array( $this, 'deactivation_hook' ) );
    }

    /**
     * Deactivation hook
     *
     * @return void
     * @since 1.0.0
     */
    public function deactivation_hook() {
        delete_option( 'EASYMAMO_VERSION' );
    }

    /**
     * Init hook.
     *
     * @return void
     * @since 1.0.0
     */
    public function init_hooks() {
        add_action( 'admin_notices', array( $this, 'admin_notices' ) );
        add_action( 'init', array( $this, 'init' ) );
    }

    /**
     * Admin notices.
     *
     * @return void
     * @since 1.0.0
     */
    public function admin_notices() {
        printf( '<div id="message" class="notice is-dismissible notice-success"><p>%s</p></div>', 'Your Easy Maintenance Mode Plugin is Active' );
    }

    /**
     * Init.
     *
     * @since 1.0.0
     * @return void
     */
    public function init() {

        if ( is_admin() ) {
            new EASYMAMO_Admin();
        }

        add_action('template_redirect', array( $this, 'emm_check_maintenance_mode' ) );
        add_action('wp_enqueue_scripts', array( $this, 'enqueue_scripts_frontend' ) );
    }

    /**
     * Maintenance mode template show on frontend.
     *
     * @since 1.0.0
     * @return void
     */
    public function emm_check_maintenance_mode(){
        $maintenance_status = get_option('easymamo_maintenance_mode_on_off', 'off');
        if ( $maintenance_status == 'on' ) {
            require_once EASYMAMO_PLUGIN_DIR. 'includes/maintenance-template/template-one.php';
        }
    }

    /**
     * Enqueue frontend styles and scripts.
     *
     * @since 1.0.0
     * @return void
     */
    public function enqueue_scripts_frontend() {
        $maintenance_status = get_option('easymamo_maintenance_mode_on_off', 'off');
        if ( $maintenance_status == 'on' ) {
            wp_enqueue_style(
                'pct_frontend_style',
                EASYMAMO_PLUGIN_URL . 'assets/css/frontend.css',
                array(),
                EASYMAMO_VERSION
            );
        }
    }
}