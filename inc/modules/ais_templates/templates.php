<?php

/***
    Create input page template
*/
add_action("admin_init", "ais_page_template_additional_input");
 
function ais_page_template_additional_input () {

    if ( !empty($_GET['action']) && ( $_GET['action'] == 'edit' ) ) :

        $post_id = ( !empty($_GET['post']) ) ? $_GET['post'] : 0;

        $pageTemplate =  basename( get_post_meta($post_id, '_wp_page_template', TRUE) );

        if ( $pageTemplate == 'page-homepage_landing.php' ) :
            add_meta_box("homepage_landing-ais", "AiS Themes", "ais_homepage_landing_details", "page", "normal", "high");

        elseif ( $pageTemplate == 'page-homepage_info.php' ):
            add_meta_box("homepage_info-ais", "AiS Themes", "ais_homepage_info_details", "page", "normal", "high");

        endif;

    endif;

}



/* Page temlpate Homepage - Landing */ 
function ais_homepage_landing_details() {

    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
    $custom = get_post_custom($post_id);

    $alnt = $almt = $aflt = $aft = $altc = $afso = $afst = $afsr = $afsoi = $afsti = $afsri = null;

    if ( !empty($custom) ) : 

        $aft    = ( !empty($custom["ais_featured_title"][0]) ) ? $custom["ais_featured_title"][0] : null;
        $altc   = ( !empty($custom["ais_landing_top_container"][0]) ) ? $custom["ais_landing_top_container"][0] : null;
        $afso   = ( !empty($custom["ais_featured_services_one"][0]) ) ? $custom["ais_featured_services_one"][0] : null;
        $afst   = ( !empty($custom["ais_featured_services_two"][0]) ) ? $custom["ais_featured_services_two"][0] : null;
        $afsr   = ( !empty($custom["ais_featured_services_three"][0]) ) ? $custom["ais_featured_services_three"][0] : null;
        $afsoi  = ( !empty($custom["ais_featured_services_one_icon"][0]) ) ? $custom["ais_featured_services_one_icon"][0] : null;
        $afsti  = ( !empty($custom["ais_featured_services_two_icon"][0]) ) ? $custom["ais_featured_services_two_icon"][0] : null;
        $afsri  = ( !empty($custom["ais_featured_services_three_icon"][0]) ) ? $custom["ais_featured_services_three_icon"][0] : null;
        $aflt   = ( !empty($custom["ais_flight_title"][0]) ) ? $custom["ais_flight_title"][0] : null;
        $alnt   = ( !empty($custom["ais_latest_news_title"][0]) ) ? $custom["ais_latest_news_title"][0] : null;
        $almt   = ( !empty($custom["ais_load_more_text"][0]) ) ? $custom["ais_load_more_text"][0] : null;

    endif;

    require( get_template_directory() . '/inc/modules/ais_templates/view/homepage_landing.php' );

}

/* Page temlpate Homepage - Info */ 
function ais_homepage_info_details() {

    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
    $custom = get_post_custom($post_id);

    $altc = $aflt = null;

    if ( !empty($custom) ) : 

        $altc   = ( !empty($custom["ais_landing_top_container"][0]) ) ? $custom["ais_landing_top_container"][0] : null;
        $aflt   = ( !empty($custom["ais_flight_title"][0]) ) ? $custom["ais_flight_title"][0] : null;
        $alnt   = ( !empty($custom["ais_latest_news_title"][0]) ) ? $custom["ais_latest_news_title"][0] : null;
        $aadt   = ( !empty($custom["ais_arrival_departure_title"][0]) ) ? $custom["ais_arrival_departure_title"][0] : null;

    endif;

    require( get_template_directory() . '/inc/modules/ais_templates/view/homepage_info.php' );

}



/* Save post meta */
add_action('save_post', 'ais_page_template_save_post_meta');

function ais_page_template_save_post_meta() {

    if ( function_exists( 'get_current_screen' ) ) {
        $screen = get_current_screen();
    }

    global $post;

    if ( !empty($screen) && $screen->action != 'add' && !empty( $post ) ) :

        $postKeys = array();
        $pageTemplate =  basename( get_post_meta($post->ID, '_wp_page_template', TRUE) );

        if ( $pageTemplate == 'page-homepage_landing.php' ) :

            $postKeys    = array (
                1   => "ais_landing_top_container",
                2   => "ais_featured_services_one",
                3   => "ais_featured_services_two",
                4   => "ais_featured_services_three",
                5   => "ais_featured_services_one_icon",
                6   => "ais_featured_services_two_icon",
                7   => "ais_featured_services_three_icon",
                8   => "ais_featured_title",
                9   => "ais_flight_title",
                10  => "ais_latest_news_title",
                11  => "ais_load_more_text",
            );

        elseif ( $pageTemplate == 'page-homepage_info.php' ) :

            $postKeys    = array (
                1   => "ais_landing_top_container",
                2   => "ais_flight_title",
                3   => "ais_latest_news_title",
                4   => "ais_arrival_departure_title",
            );

        endif;

        foreach ( $postKeys as $key => $value ) :

            if ( !empty( $_POST[$value] ) ) :

                update_post_meta($post->ID, $value, $_POST[$value]);

            endif;

        endforeach;

    endif;

}



/* Add custom CSS for flight schedules form */
add_action( 'admin_print_styles-post-new.php', 'ais_page_template_admin_styles', 11 );
add_action( 'admin_print_styles-post.php', 'ais_page_template_admin_styles', 11 );

function ais_page_template_admin_styles() {

    global $post_type;
    if ( 'page' == $post_type )
        wp_enqueue_style( 'page_template-admin-style', get_stylesheet_directory_uri() . '/inc/modules/assets/css/ais-admin-style.css' );

}