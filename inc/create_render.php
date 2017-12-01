<?php

function render_function(){

    $post_type = "render";
    $labels = array(
            'name'               => 'Renders',
            'singular_name'      => 'Render',
            'all_items'          => 'All the renders',
            'add_new'            => 'Add a render',
            'add_new_item'       => 'Add a render',
            'edit_item'          => "Edit render",
            'new_item'           => 'New render',
            'view_item'          => "View render",
            'search_items'       => 'Find a render',
            'not_found'          => 'No result',
            'not_found_in_trash' => 'No result',
            'parent_item_colon'  => 'Parent render:',
            'menu_name'          => 'renders',
        );

        $args = array(
            'labels'              => $labels,
            'hierarchical'        => false,
            'supports'            => array( 'title','thumbnail','editor', 'excerpt' ),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-slides',
            'show_in_nav_menus'   => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => false,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => array( 'slug' => $post_type )
        );

        register_post_type($post_type, $args );

        $taxonomy="software";
        $object_type = array("render");
        $args = array(
              'label' => __( 'software' ),
              'rewrite' => array( 'slug' => 'software' ),
              'hierarchical' => true,
          );
         register_taxonomy( $taxonomy, $object_type, $args );

        $taxonomy="renderer";
        $object_type = array("render");
        $args = array(
            'label' => __( 'Renderer' ),
            'rewrite' => array( 'slug' => 'renderer' ),
            'hierarchical' => true,
        );
        register_taxonomy( $taxonomy, $object_type, $args );

        $taxonomy="files";
        $object_type = array("render");
        $args = array(
            'label' => __( 'Files' ),
            'rewrite' => array( 'slug' => 'files' ),
            'hierarchical' => true,
        );
        register_taxonomy( $taxonomy, $object_type, $args );

}

add_action('init', 'render_function');
