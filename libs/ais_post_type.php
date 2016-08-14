<?php

/**
 * Ais_Post_Type Class
 *
 * Used to help create custom post type for AiSThemes.
 * @link http://aisthemes.com/dev/ais_post_type_class
 *
 * @author  Ayub Adiputra
 * @link    http://opreklab.com
 * @version 1.0
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 */
class Ais_Post_Type {

    public $data;
    public $meta_data;

    function __construct( $post_type_data = array() ) {

        $this->data = $this->text_convertion( $post_type_data );

        $this->add_action( 'init', array( $this, 'register' ) );
        $this->add_filter( 'post_updated_messages', array( $this, 'updated_messages' ) );
        $this->add_action( 'add_meta_boxes', array( $this, 'additional_input' ) );
        $this->add_action( 'save_post', array( $this, 'save_post_meta' ) );

        $this->add_action( 'after_switch_theme', array( $this, 'rewrite_flush' ) );
        $this->register_activation_hook( __FILE__, array( $this, 'rewrite_flush' ) );

    }

    public function register() {

        $labels = $this->labels();

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', $this->data['plugin'] ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => $this->data['slug'] ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => $this->data['position'],
            'menu_icon'          => $this->data['icon'],
            /* What form input that you want to use */
            'supports'           => $this->data['supports']
        );

        register_post_type( $this->data['slug'], $args );

    }

    public function additional_input () {
        $box_meta = $this->data['box_meta'];
        if ( !empty( $box_meta )) {
            foreach ( $box_meta as $key => $value ) {
                add_meta_box(
                    $key, $value['box_title'], array( $this, 'details_input' ), $this->data['slug'], $value['input_pos'], 'default', array( 'box_file' => $value['box_file'], 'post_meta' => $value['post_meta'] ) );
            }
        }
    }

    public function rewrite_flush() {
        $this->add_action( 'init', array( $this, 'register' ) );
        flush_rewrite_rules();
    }

    function updated_messages( $messages ) {

        $post             = get_post();
        $post_type        = get_post_type( $post );
        $post_type_object = get_post_type_object( $post_type );

        if ( $post_type == $this->data['slug'] ) :

            $messages[$this->data['slug']] = array(
                0  => '', /* Unused. Messages start at index 1. */
                1  => __( $this->data['singular_cap'] . ' updated.', $this->data['plugin'] ),
                2  => __( 'Custom field updated.', $this->data['plugin'] ),
                3  => __( 'Custom field deleted.', $this->data['plugin'] ),
                4  => __( $this->data['singular_cap'] . ' updated.', $this->data['plugin'] ),
                /* translators: %s: date and time of the revision */
                5  => isset( $_GET['revision'] ) ? sprintf( __( $this->data['singular_cap'] . ' restored to revision from %s', $this->data['plugin'] ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
                6  => __( $this->data['singular_cap'] . ' published.', $this->data['plugin'] ),
                7  => __( $this->data['singular_cap'] . ' saved.', $this->data['plugin'] ),
                8  => __( $this->data['singular_cap'] . ' submitted.', $this->data['plugin'] ),
                9  => sprintf(
                    __( $this->data['singular_cap'] . ' scheduled for: <strong>%1$s</strong>.', $this->data['plugin'] ),
                    /* translators: Publish box date format, see http://php.net/date */
                    date_i18n( __( 'M j, Y @ G:i', $this->data['plugin'] ), strtotime( $post->post_date ) )
                ),
                10 => __( $this->data['singular_cap'] . ' draft updated.', $this->data['plugin'] )
            );

            if ( $post_type_object->publicly_queryable ) {

                $permalink = get_permalink( $post->ID );

                $view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View ' . $this->data['singular'], $this->data['plugin'] ) );

                $messages[ $post_type ][1] .= $view_link;
                $messages[ $post_type ][6] .= $view_link;
                $messages[ $post_type ][9] .= $view_link;

                $preview_permalink = add_query_arg( 'preview', 'true', $permalink );
                $preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview ' . $this->data['singular'], $this->data['plugin'] ) );

                $messages[ $post_type ][8]  .= $preview_link;
                $messages[ $post_type ][10] .= $preview_link;

            }

            return $messages;

        endif;

    }

    private function labels() {

        $labels = array(
            'name'               => _x( $this->data['name'], 'Post type general name', $this->data['plugin'] ),
            'singular_name'      => _x( $this->data['singular'], 'Post type singular name', $this->data['plugin'] ),
            'menu_name'          => _x( $this->data['menu'], 'Admin menu', $this->data['plugin'] ),
            'name_admin_bar'     => _x( $this->data['singular_cap'], 'Add new on admin bar', $this->data['plugin'] ),
            'add_new'            => _x( 'Add New', 'Add new post type data', $this->data['plugin'] ),
            'add_new_item'       => __( 'Add New ' . $this->data['singular_cap'], $this->data['plugin'] ),
            'new_item'           => __( 'New ' . $this->data['singular_cap'], $this->data['plugin'] ),
            'edit_item'          => __( 'Edit ' . $this->data['singular_cap'], $this->data['plugin'] ),
            'view_item'          => __( 'View ' . $this->data['singular_cap'], $this->data['plugin'] ),
            'all_items'          => __( 'All ' . $this->data['plurar_cap'], $this->data['plugin'] ),
            'search_items'       => __( 'Search ' . $this->data['plurar_cap'], $this->data['plugin'] ),
            'parent_item_colon'  => __( 'Parent ' . $this->data['plurar_cap'] . ' : ', $this->data['plugin'] ),
            'not_found'          => __( 'No ' . $this->data['plurar_cap'] . ' found.', $this->data['plugin'] ),
            'not_found_in_trash' => __( 'No ' . $this->data['plurar_cap'] . ' found in Trash.', $this->data['plugin'] )
        );

        return $labels;

    }

    public function details_input( $post, $metabox ) {

        $af = $ah = 0;
        $screen = get_current_screen();

        $box_file   = $metabox['args']['box_file'];
        $post_meta  = $metabox['args']['post_meta'];

        if ( $screen->action != 'add' ) {

            global $post;

            if ( ! empty( $post_meta ) ) {
                foreach ( $post_meta as $key => $value) {
                    $this->meta_data[$value]    = get_post_meta( $post->ID, $value, true );
                    $this->post_meta[$value]    = $value;
                }
            }

        }

        require( get_template_directory() . '/inc/modules/meta_box_templates/' . $box_file . '.php' );

    }

    function save_post_meta() {

        if ( function_exists( 'get_current_screen' ) ) {
            $screen = get_current_screen();
        }

        global $post;

        if ( ! empty($screen) && $screen->action != 'add' && ! empty( $post ) && isset($_POST[ $this->data['nonce_f'] ]) ) {

            $postKeys    = $this->data['post_meta'];


            foreach ( $postKeys as $key => $value ) {

                if ( isset( $_POST[$value] ) ) {
                    update_post_meta( $post->ID, $value, $_POST[$value] );
                }

            }

            if ( ! empty( $this->data['save_cust'] ) ) {
                require( get_template_directory() . '/inc/modules/meta_box_templates/save/' . $this->data['save_cust'] . '.php' );
            }

        }
    }

    private function text_convertion ( $post_type_data = false ) {

        $data = array(
            'id'            => $post_type_data['id'],
            'name'          => $post_type_data['name'],
            'menu'          => ucwords( $post_type_data['name'] ),
            'singular'      => $post_type_data['singular'],
            'plurar'        => $post_type_data['plurar'],
            'singular_cap'  => ucwords( $post_type_data['singular'] ),
            'plurar_cap'    => ucwords( $post_type_data['plurar'] ),
            'slug'          => $post_type_data['slug'],
            'plugin'        => $post_type_data['id'] . '-plugin',
            'icon'          => $post_type_data['icon'],
            'supports'      => $post_type_data['supports'],
            'position'      => $post_type_data['position'],
            'box_meta'      => $post_type_data['box_meta'],
            'post_meta'     => $post_type_data['post_meta'],
            'save_cust'     => $post_type_data['save_cust'],
            'nonce_f'       => $post_type_data['nonce_f'],
        );

        return $data;

    }

    public function add_action( $action, $callback, $priority = false ) {
        add_action( $action, $callback, $priority );
    }

    public function add_filter( $filter, $callback ) {
        add_filter( $filter, $callback );
    }

    public function register_activation_hook( $place, $callback ) {
        register_activation_hook( $place, $callback );
    }

}