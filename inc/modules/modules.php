<?php

/* TOM */
$tom = new Ais_Tom();

/* Contact */
$contact = new Ais_Contact();

/* Flightstats */
$flightstats = new Ais_Flightstats();

/* Advertisement Data */
$ad_data = array(
    'id'        => 'advertisement',
    'name'      => 'Advertisements',
    'singular'	=> 'ad',
    'plurar'    => 'ads',
    'slug'      => 'advertisement',
    'icon'		=> 'dashicons-pressthis',
    'position'  => 5,
    'supports'	=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'box_meta'  => array(
        'ads_detail'    => array(
            'input_pos' => 'side',
            'box_title' => 'Ads Display',
            'box_file'  => 'ads_form',
            'post_meta'	=> array(
                1   => "ais_advertisement_featured",
                2   => "ais_advertisement_footer",
            ),
        ),
        'ads_featured'    => array(
            'input_pos' => 'normal',
            'box_title' => 'Featured Info',
            'box_file'  => 'ads_form_featured',
            'post_meta' => array(
                1   => "ais_advertisement_lala",
            ),
        )
    ),
    'post_meta' => array(
        1   => "ais_advertisement_featured",
        2   => "ais_advertisement_footer",
        3   => "ais_advertisement_lala",
    ),
    'save_cust' => 'ads_form_featured_save',
    'nonce_f'   => 'ais_advertisement_submit_field',
);
$ad = new Ais_Post_Type( $ad_data );

/* Facility Data */
$facility_data = array(
    'id'        => 'facility',
    'name'      => 'Facilities',
    'singular'  => 'facility',
    'plurar'    => 'facilities',
    'slug'      => 'facility',
    'icon'      => 'dashicons-building',
    'position'  => 10,
    'supports'  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'box_meta'  => array(
        'facility_recommendation'    => array(
            'input_pos' => 'side',
            'box_title' => 'Facility Recommendation',
            'box_file'  => 'facilities_form',
            'post_meta' => array(
                1   => "ais_facility_recommendation",
            ),
        )
    ),
    'post_meta' => array(
        1   => "ais_facility_recommendation",
    ),
    'save_cust' => null,
    'nonce_f'   => 'ais_facility_submit_field',
);
$facility = new Ais_Post_Type( $facility_data );

/* Flight schedule Data */
$flight_schedule_data = array(
    'id'        => 'flight_schedule',
    'name'      => 'Flight Schedules',
    'singular'  => 'flight schedule',
    'plurar'    => 'flight schedules',
    'slug'      => 'flight_schedule',
    'icon'      => 'dashicons-calendar-alt',
    'position'  => 21,
    'supports'  => array( 'title', 'thumbnail' ),
    'box_meta'  => array(
        'flight_schedule_detail'    => array(
            'input_pos' => 'normal',
            'box_title' => 'Flight Schedule Details',
            'box_file'  => 'flight_schedules_form',
            'post_meta' => array(
                1   => "ais_flight_schedule_airlines",
                2   => "ais_flight_schedule_schedule",
                3   => "ais_flight_schedule_estimated",
                4   => "ais_flight_schedule_destination",
                5   => "ais_flight_schedule_gate",
                6   => "ais_flight_schedule_state",
                7   => "ais_flight_schedule_flight_number",
                8   => "ais_flight_schedule_time",
                9   => "ais_flight_schedule_status",
                10  => "ais_flight_schedule_type_of",
            ),
        )
    ),
    'post_meta' => array(
        1   => "ais_flight_schedule_airlines",
        2   => "ais_flight_schedule_schedule",
        3   => "ais_flight_schedule_estimated",
        4   => "ais_flight_schedule_destination",
        5   => "ais_flight_schedule_gate",
        6   => "ais_flight_schedule_state",
        7   => "ais_flight_schedule_flight_number",
        8   => "ais_flight_schedule_time",
        9   => "ais_flight_schedule_status",
        10  => "ais_flight_schedule_type_of",
    ),
    'save_cust' => null,
    'nonce_f'   => 'ais_flight_schedule_submit_field',
);
$flight_schedule = new Ais_Post_Type( $flight_schedule_data );

/* Passenger Guide Data */
$passenger_guide_data = array(
    'id'        => 'passenger_guide',
    'name'      => 'Passenger Guides',
    'singular'  => 'passenger guide',
    'plurar'    => 'passenger guides',
    'slug'      => 'passenger_guide',
    'icon'      => 'dashicons-book-alt',
    'position'  => 10,
    'supports'  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'box_meta'  => array(
        'icon_detail'    => array(
            'input_pos' => 'side',
            'box_title' => 'Icon Detail',
            'box_file'  => 'passenger_guides_form',
            'post_meta' => array(
                1   => "ais_passenger_guide_icon",
                2   => "ais_passenger_guide_color",
                3   => "ais_passenger_guide_recommendation",
            ),
        )
    ),
    'post_meta' => array(
        1   => "ais_passenger_guide_icon",
        2   => "ais_passenger_guide_color",
        3   => "ais_passenger_guide_recommendation",
    ),
    'save_cust' => null,
    'nonce_f'   => 'ais_passenger_guide_submit_field',
);
$passenger_guide = new Ais_Post_Type( $passenger_guide_data );

/* Service Data */
$service_data = array(
    'id'        => 'service',
    'name'      => 'Services',
    'singular'  => 'service',
    'plurar'    => 'services',
    'slug'      => 'service',
    'icon'      => 'dashicons-smiley',
    'position'  => 5,
    'supports'  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'box_meta'  => array(
        'service_detail'    => array(
            'input_pos' => 'side',
            'box_title' => 'Service Details',
            'box_file'  => 'services_form',
            'post_meta' => null,
        )
    ),
    'post_meta' => null,
    'save_cust' => null,
    'nonce_f'   => 'ais_service_submit_field',
);
$service = new Ais_Post_Type( $service_data );

/* Shop Data */
$shop_data = array(
    'id'        => 'shop',
    'name'      => 'Shops',
    'singular'  => 'shop',
    'plurar'    => 'shops',
    'slug'      => 'shop',
    'icon'      => 'dashicons-cart',
    'position'  => 14,
    'supports'  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'box_meta'  => array(
        'reco_promote'    => array(
            'input_pos' => 'side',
            'box_title' => 'Reco & Promote',
            'box_file'  => 'shops_form',
            'post_meta' => array(
                1   => "ais_shop_recommendation",
                2   => "ais_shop_promotion",
            ),
        )
    ),
    'post_meta' => array(
        1   => "ais_shop_recommendation",
        2   => "ais_shop_promotion",
    ),
    'save_cust' => null,
    'nonce_f'   => 'ais_shop_submit_field',
);
$shop = new Ais_Post_Type( $shop_data );

/* Transit Data */
$transit_data = array(
    'id'        => 'transit',
    'name'      => 'Transits',
    'singular'  => 'transit',
    'plurar'    => 'transits',
    'slug'      => 'transit',
    'icon'      => 'dashicons-clipboard',
    'position'  => 15,
    'supports'  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'box_meta'  => array(
        'transit_recommendation'    => array(
            'input_pos' => 'side',
            'box_title' => 'Transit Recommendation',
            'box_file'  => 'transits_form',
            'post_meta' => array(
                1   => "ais_transit_recommendation",
            ),
        )
    ),
    'post_meta' => array(
        1   => "ais_transit_recommendation",
    ),
    'save_cust' => null,
    'nonce_f'   => 'ais_transit_submit_field',
);
$transit = new Ais_Post_Type( $transit_data );

/* Transportation Data */
$transportation_data = array(
    'id'        => 'transportation',
    'name'      => 'Transportations',
    'singular'  => 'transportation',
    'plurar'    => 'transportations',
    'slug'      => 'transportation',
    'icon'      => 'dashicons-location-alt',
    'position'  => 7,
    'supports'  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'box_meta'  => array(
        'transportation_recommendation'    => array(
            'input_pos' => 'side',
            'box_title' => 'Transportation Recommendation',
            'box_file'  => 'transportations_form',
            'post_meta' => array(
                1   => "ais_transportation_recommendation",
            ),
        )
    ),
    'post_meta' => array(
        1   => "ais_transportation_recommendation",
    ),
    'save_cust' => null,
    'nonce_f'   => 'ais_transportation_submit_field',
);
$transportation = new Ais_Post_Type( $transportation_data );

/* Blog Data */
$blog_data = array(
    'id'        => 'blog',
    'name'      => 'Blogs',
    'singular'  => 'blog',
    'plurar'    => 'blogs',
    'slug'      => 'blog',
    'icon'      => 'dashicons-format-aside',
    'position'  => 5,
    'supports'  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'box_meta'  => array(
        'blog_recommendation'    => array(
            'input_pos' => 'side',
            'box_title' => 'Blog Recommendation',
            'box_file'  => 'blogs_form',
            'post_meta' => array(
                1   => "ais_blog_recommendation",
            ),
        )
    ),
    'post_meta' => array(
        1   => "ais_blog_recommendation",
    ),
    'save_cust' => null,
    'nonce_f'   => 'ais_blog_submit_field',
);
$blog = new Ais_Post_Type( $blog_data );



/* Types Taxonomy Data */
$type_data = array(
    'id'            => 'type',
    'name'          => 'Types',
    'singular'      => 'type',
    'plurar'        => 'types',
    'slug'          => 'type',
    'hierarchical'  => true,
    'post_type'     => array( "flight_schedule" )
);
$type = new Ais_Taxonomy( $type_data );

/* Categories Taxonomy Data */
$category_data = array(
    'id'            => 'category',
    'name'          => 'Categories',
    'singular'      => 'category',
    'plurar'        => 'categories',
    'slug'          => 'category',
    'hierarchical'  => true,
    'post_type'     => array( 'blog', 'post', 'passenger_guide', 'service', 'advertisement', 'transit' )
);
$category = new Ais_Taxonomy( $category_data );

/* Varieties Taxonomy Data */
$variety_data = array(
    'id'            => 'variety',
    'name'          => 'Varieties',
    'singular'      => 'variety',
    'plurar'        => 'varieties',
    'slug'          => 'variety',
    'hierarchical'  => true,
    'post_type'     => array( 'facility', 'shop', 'transportation' )
);
$variety = new Ais_Taxonomy( $variety_data );

/* Tags Taxonomy Data */
$tag_data = array(
    'id'            => 'tag',
    'name'          => 'Tags',
    'singular'      => 'tag',
    'plurar'        => 'tags',
    'slug'          => 'post_tag',
    'hierarchical'  => false,
    'post_type'     => array( 'blog', 'post', 'passenger_guide', 'service' )
);
$tag = new Ais_Taxonomy( $tag_data );

/* Hastags Taxonomy Data */
$hastag_data = array(
    'id'            => 'hastag',
    'name'          => 'Hastags',
    'singular'      => 'hastag',
    'plurar'        => 'hastags',
    'slug'          => 'hastag',
    'hierarchical'  => false,
    'post_type'     => array( 'advertisement', 'facility', 'shop', 'transportation' )
);
$hastag = new Ais_Taxonomy( $hastag_data );

/* Groups Taxonomy Data */
$group_data = array(
    'id'            => 'group',
    'name'          => 'Groups',
    'singular'      => 'group',
    'plurar'        => 'groups',
    'slug'          => 'group',
    'hierarchical'  => false,
    'post_type'     => array( 'flight_schedule', 'transit' )
);
$group = new Ais_Taxonomy( $group_data );


/* Register admin styles */
function ais_admin_styles() {

    global $post_type;

    $post_types = array( 'advertisement' );
    if ( array_key_exists( $post_type, $post_types ) ) {
        wp_enqueue_style( 'ais-admin-style', get_stylesheet_directory_uri() . '/assets/css/ais-admin.css' );
    }

}

add_action( 'admin_print_styles-post.php', 'ais_admin_styles', 11 );