<?php

defined( 'ABSPATH' ) || exit;

/**
 * Class EMM_Mode.
 *
 * @since 1.0.0
 */
class EMM_Mode {

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
        define( 'EMM_VERSION', $this->version );
        define( 'EMM_PLUGIN_DIR', plugin_dir_path( $this->file ) );
        define( 'EMM_PLUGIN_URL', plugin_dir_url( $this->file ) );
        define( 'EMM_PLUGIN_BASENAME', plugin_basename( $this->file ) );
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
        update_option( 'EMM_VERSION', $this->version );
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
        delete_option( 'EMM_VERSION' );
    }

    /**
     * Init hook.
     *
     * @return void
     * @since 1.0.0
     */
    public function init_hooks() {
        add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
        add_action( 'admin_notices', array( $this, 'admin_notices' ) );
        add_action( 'init', array( $this, 'init' ) );
    }

    /**
     * Load textdomain.
     *
     * @return void
     * @since 1.0.0
     */
    public function load_textdomain() {
        load_plugin_textdomain( 'easy-maintenance-mode', false, dirname( plugin_basename( $this->file ) ) . '/languages/' );
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
            new EMM_Admin();
        }
    }
}