<?php

class Ais_Tom {

    function __construct( $data = array() ) {
        $this->add_action( "admin_menu", array( $this, "options_menu" ) );
        $this->add_action( "admin_init", array( $this, "options_display") );
        $this->add_action( 'admin_enqueue_scripts', array( $this, 'set_media_uploader' ) );
    }

    function options_menu() {

        add_menu_page(
            "Basic Settings", "AiS Options", "manage_options", "ais-theme-options-basic", array( $this, "options_page" ), "dashicons-admin-site", 25
        );
        add_submenu_page(
            'ais-theme-options-basic', 'Basic', 'Basic', 'manage_options', 'ais-theme-options-basic', array( $this, 'options_page' )
        );
        add_submenu_page(
            'ais-theme-options-basic', 'Partners', 'Partners', 'manage_options', 'ais-theme-options-partner', array( $this, 'options_page' )
        );
        add_submenu_page(
            'ais-theme-options-basic', 'Stats', 'Stats', 'manage_options', 'ais-theme-options-stats', array( $this, 'options_page' )
        );
        add_submenu_page(
            'ais-theme-options-basic', 'Information Items', 'Items', 'manage_options', 'ais-theme-options-items', array( $this, 'options_page' )
        );
        add_submenu_page(
            'ais-theme-options-basic', 'REST API Data', 'REST API', 'manage_options', 'ais-theme-options-api', array( $this, 'options_page' )
        );

        add_submenu_page(
            'ais-theme-options-basic', 'Others Airport', 'Others Airport', 'manage_options', 'ais-theme-options-othersairport', array( $this, 'options_page' )
        );

        wp_enqueue_style( 'ais-themes-admin-style', get_stylesheet_directory_uri() . '/assets/css/ais-admin.css' );
        wp_enqueue_style( 'ais-themes-font-awesome-style', get_stylesheet_directory_uri() . '/assets/fonts/font-awesome/css/font-awesome.min.css' );

    }

    /* Option page */
    function options_page () {

    ?>

        <div class="wrap">

            <?php require_once ('view/header_settings.php'); ?>

            <div class="setting-area">

                <?php require_once ('view/menu_settings.php'); ?>

                <form id="themes-option" class="theme-option" method="post" action="options.php">
                    <?php
                        $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : null;
                        settings_fields( $page . "-section");
                        do_settings_sections( $page . "-options");
                        submit_button();
                    ?>
                </form>

            </div>
        </div>

    <?php

    }

    /* Add option page display */
    function options_display() {

        /* Basic Settings */
        add_settings_section( "ais-theme-options-basic-section", null, array( $this, "options_display_fields" ), "ais-theme-options-basic-options" );
        register_setting( "ais-theme-options-basic-section", "ais_theme_options_basic", array( $this, "options_save_theme" ) );

        /* Partner Settings */
        add_settings_section( "ais-theme-options-partner-section", null, array( $this, "options_display_fields" ), "ais-theme-options-partner-options" );
        register_setting( "ais-theme-options-partner-section", "ais_theme_options_partner", array( $this, "options_save_theme" ) );

        /* Stats Settings */
        add_settings_section( "ais-theme-options-stats-section", null, array( $this, "options_display_fields" ), "ais-theme-options-stats-options" );
        register_setting( "ais-theme-options-stats-section", "ais_theme_options_stats", array( $this, "options_save_theme" ) );

        /* Items Settings */
        add_settings_section( "ais-theme-options-items-section", null, array( $this, "options_display_fields" ), "ais-theme-options-items-options" );
        register_setting( "ais-theme-options-items-section", "ais_theme_options_items", array( $this, "options_save_theme" ) );

        /* API Settings */
        add_settings_section( "ais-theme-options-api-section", null, array( $this, "options_display_fields" ), "ais-theme-options-api-options" );
        register_setting( "ais-theme-options-api-section", "ais_theme_options_api", array( $this, "options_save_theme" ) );

        /* Others Airport Settings */
        add_settings_section( "ais-theme-options-othersairport-section", null, array( $this, "options_display_fields" ), "ais-theme-options-othersairport-options" );
        register_setting( "ais-theme-options-othersairport-section", "ais_theme_options_othersairport", array( $this, "options_save_theme" ) );

    }

    /* Items - Get update option */
    function options_save_theme() {

        $data = null;

        if ( ! empty( $_POST ) ) {
            foreach ( $_POST as $key => $value ) {
                if ( false !== strpos( $key, 'ais_theme_option' ) ) {
                    $data[$key] = $value;
                }
            }
        }

        /* Generate Data */
        if ( ! empty( $_POST['ais_themes_options_generate_items'] ) ) {

            $user_id = get_current_user_id();

            /* Load set data */
            require_once( __DIR__ . '/data/ais_info_items.php' );

        }

        /* Others Airport Data */
        if ( ! empty( $_POST['ais_themes_options_submit_others_airport'] ) ) {

            /* Load set data */
            require_once( __DIR__ . '/data/ais_others_airport.php' );

        }

        /* REST API Settings */
        if ( ! empty( $_POST['ais_theme_options_filter_api'] ) ) {

            $data = array();

            $data["ais_theme_options_filter_api"]       = true;

            foreach ( $_POST as $key => $value ) {
                if ( false !== strpos( $key, 'ais_theme_options_filter_key' ) ) {
                    $data['ais_theme_options_filter_data'][]    = $value;
                }
            }

        }

        return $data;
    }

    /* Display theme option fields */
    function options_display_fields() {
        $page = isset( $_GET['page'] ) ? $_GET['page'] : null ;
        $page = str_replace( 'ais-theme-options-', '', $page );
        require( get_template_directory() . '/inc/modules/ais_tom/view/' . $page . '_settings.php' );
    }

    /* Set Media Uploader */
    function set_media_uploader () {

        if ( is_admin () && !empty( $_GET['page'] ) && false !== strpos( $_GET['page'], 'ais-theme-options' ) ) :

            wp_enqueue_style( 'add-admin-css', get_template_directory_uri() . '/assets/css/add-admin.css' );
            wp_enqueue_media ();
            wp_enqueue_script('media-button', get_template_directory_uri() . '/assets/js/media-button.js', array('jquery'), '1.0', true);

        endif;

    }

    function add_action( $action, $function, $priority = false ) {
        add_action( $action, $function, $priority );
    }

}