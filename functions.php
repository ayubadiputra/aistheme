<?php

/**
 * AiS Themes functions and definitions
 *
 * @package AiS Themes
 * @since AiS Themes 1.0
 */

/*
 *  Global variable declaration
 */



add_action( 'after_setup_theme', 'ais_setup' );

if ( ! function_exists( 'ais_setup' ) ) :

    function ais_setup() {

        load_theme_textdomain( 'ais', get_template_directory() . '/languages' );

        /* Add default posts and comments RSS feed links to head */
        add_theme_support( 'automatic-feed-links' );

        /* Enable support for the Aside Post Format */
        add_theme_support( 'post-formats', array( 'aside' ) );

        /* This theme uses wp_nav_menu() in one location. */
        register_nav_menus( array(
            'primary'           => __( 'Primary Menu', 'ais' ),
            'sidebar_info'      => __( 'Sidebar Info Menu', 'ais' ),
            'usefull_links'     => __( 'Usefull Links', 'ais' ),
            'information_links' => __( 'Information Links', 'ais' ),
            'social_media'      => __( 'Social Media Menu', 'ais' ),
            'contact_connect'   => __( 'Connect with Us Menu', 'ais' ),
        ));

    }

endif;



/**
 * Enqueue scripts and styles
 */

add_action( 'wp_enqueue_scripts', 'ais_shape_scripts' );

function ais_shape_scripts() {

    /* CSS */
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'salvattore-css', get_template_directory_uri() . '/assets/third-party/salvattore/salvattore.css' );
    wp_enqueue_style( 'normalize-css', get_template_directory_uri() . '/assets/third-party/salvattore/normalize.css' );
    wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/fonts/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700,300,600' );
    wp_enqueue_style( 'frontend-css', get_template_directory_uri() . '/assets/css/ais-front-end.css' );
    wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'front-end-css', get_template_directory_uri() . '/assets/css/ais-front-end.css' );
    wp_enqueue_style( 'add-css', get_template_directory_uri() . '/assets/css/add.css' );

    /* CSS Themes Color */
    $basic_data     = get_option('ais_theme_options_basic');
    $themesColor    = $basic_data['ais_theme_option_themes_color'];
    if ( !empty($themesColor) )
        wp_enqueue_style( 'ais-'.$themesColor.'-css', get_template_directory_uri() . '/assets/css/color-themes/ais-'.$themesColor.'.css' );
    else
        wp_enqueue_style( 'ais-blue-css', get_template_directory_uri() . '/assets/css/color-themes/ais-blue.css' );

    /* jQuery / Javascript */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.3.5', true );
    wp_enqueue_script( 'salvattore-js', get_template_directory_uri() . '/assets/third-party/salvattore/salvattore.min.js', array(), '1.0.8', true );

    if ( is_home() || is_front_page() ) {
        wp_enqueue_script( 'flight-js', get_template_directory_uri() . '/assets/js/flight.js', array('jquery'), '20120206', true );
    }

    if ( is_post_type_archive( array( 'flight_schedule' ) ) ) {
        wp_enqueue_script( 'flight-schedule-js', get_template_directory_uri() . '/assets/js/flight-schedule.js', array('jquery'), '20120206', true );
    }

    wp_enqueue_script( 'ais-js', get_template_directory_uri() . '/assets/js/aisthemes.js', array('jquery'), '20120206', true );

}



/***
    AiS Ajax URL
*/

add_action('wp_head', 'ais_ajaxurl');

function ais_ajaxurl() {

?>
    <script type="text/javascript">
        var ajaxURL     = '<?php echo admin_url('admin-ajax.php'); ?>';
        var home        = '<?php echo get_home_url(); ?>';
    </script>
<?php

}

/***
    Google Analytics
*/

add_action('wp_head', 'ais_analytics');

function ais_analytics() {

    $googleAnalityc    = get_option('ais_theme_option_google_analityc');

    if ( !empty($googleAnalityc) ) :

?>

    <script type="text/javascript">
        <?php echo $googleAnalityc; ?>
    </script>

<?php

    endif;

}



/***
    Add Image Size Ration
*/
function ais_jpeg_quality() {
    return 80;
}

add_filter('jpeg_quality', 'ais_jpeg_quality');

the_post_thumbnail();

add_image_size( 'md-landscape', 1200, 675 );
add_image_size( 'mf-landscape', 1200, 300, true );
add_image_size( 'xx-landscape', 450, 400 );
add_image_size( 'xf-landscape', 290, 232, true );
add_image_size( 'xs-landscape', 290, 232 );

add_theme_support( 'post-thumbnails' );



/***
    Register AiS Themes Footerbar and widgetized areas.
*/

add_action( 'widgets_init', 'ais_widgets_init' );

function ais_widgets_init() {

    register_sidebar( array(
        'name'          => 'AiS Themes Footerbar',
        'id'            => 'ais_themes_footerbar',
        'before_widget' => '<div class="footer-widget-item col-sm-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title"><h4>',
        'after_title'   => '</h4></div>',
    ) );

    register_sidebar( array(
        'name'          => 'AiS Themes Sidebar',
        'id'            => 'ais_themes_sidebar',
        'before_widget' => '<div class="sidebar-widget-item col-sm-12"><aside class="widget-item">',
        'after_widget'  => '</aside></div>',
        'before_title'  => '<div class="widget-title"><h4>',
        'after_title'   => '</h4></div>',
    ) );

}



/***
    Custom read more Excerpt
*/
function ais_new_excerpt_more( $more ) {
    return ' ... <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'ais-read-more' ) . '</a>';
}
add_filter( 'excerpt_more', 'ais_new_excerpt_more' );

/***
    Load libraries
*/
require_once( 'libs/ais_post_type.php' );
require_once( 'libs/ais_taxonomy.php' );
require_once( 'libs/ais_function_helper.php' );
require_once( 'libs/ais_user_role.php' );
require_once( 'libs/ais_recommend_plugin.php' );
require_once( 'libs/wp_bootstrap_navwalker.php' );

/***
    AiS Themes Options, Modules, and Page Template
*/
require_once( 'inc/modules/ais_templates/templates.php' );
require_once( 'inc/modules/ais_contact/contact.php' );
require_once( 'inc/modules/ais_flightstats/flightstats.php' );
require_once( 'inc/modules/ais_tom/tom.php' );
require_once( 'inc/modules/ais_tom/backup.php' );
require_once( 'inc/modules/modules.php' );
require_once( 'inc/ajax.php' );


/* Create repeatable fields */
// if ( file_exists( get_template_directory() . '/inc/libs/repeatable-fields-metabox/repeatable-fields-metabox.php' ) ) {

        // require_once get_template_directory() . '/inc/libs/repeatable-fields-metabox/repeatable-fields-metabox.php';

    // }