<?php

class Ais_Taxonomy {

    public $data;

    function __construct( $taxonomy_data = array() ) {

        $this->data = $this->set_data( $taxonomy_data );

        $this->add_action( 'init', array( $this, 'custom_taxonomy' ), 0 );

    }

    /* Create taxonomies : type, hashtag */
    function custom_taxonomy() {

        /* Add type taxonomy, hierarchical */
        $labels = array(
            'name'              => _x( $this->data['plurar_cap'], 'Taxonomy general name' ),
            'singular_name'     => _x( $this->data['singular_cap'], 'Taxonomy singular name' ),
            'search_items'      => __( 'Search ' . $this->data['plurar_cap'] ),
            'all_items'         => __( 'All ' . $this->data['plurar_cap'] ),
            'parent_item'       => __( 'Parent ' . $this->data['singular_cap'] ),
            'parent_item_colon' => __( 'Parent ' . $this->data['singular_cap'] . ' :' ),
            'edit_item'         => __( 'Edit ' . $this->data['singular_cap'] ),
            'update_item'       => __( 'Update ' . $this->data['singular_cap'] ),
            'add_new_item'      => __( 'Add New ' . $this->data['singular_cap'] ),
            'new_item_name'     => __( 'New ' . $this->data['singular_cap'] . ' Name' ),
            'menu_name'         => __( $this->data['plurar_cap'] ),
        );

        $args = array(
            'hierarchical'      => $this->data['hierarchical'],
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => $this->data['slug'] ),
        );

        register_taxonomy( $this->data['slug'], $this->data['post_type'], $args );

    }

    function add_action( $action, $function, $priority ) {
        add_action( $action, $function, $priority );
    }

    function set_data( $taxonomy_data = array() ) {

        $data['id']           = $taxonomy_data['id'];
        $data['name']         = $taxonomy_data['name'];
        $data['singular']     = $taxonomy_data['singular'];
        $data['singular_cap'] = ucwords( $taxonomy_data['singular'] );
        $data['plurar']       = $taxonomy_data['plurar'];
        $data['plurar_cap']   = ucwords( $taxonomy_data['plurar'] );
        $data['slug']         = $taxonomy_data['slug'];
        $data['post_type']    = $taxonomy_data['post_type'];
        $data['hierarchical'] = $taxonomy_data['hierarchical'];

        return $data;

    }

}