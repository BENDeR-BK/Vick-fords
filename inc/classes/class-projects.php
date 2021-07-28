<?php

class VF_Projects {

/**
*	Set post type params
*/
private $type = 'projects';
private $slug;
private $name;
private $singular_name;
private $plural_name;

/**
*	Recipes constructor
*/
public function __construct() {
    $this->name = __( 'Projects', 'vick_fords' );
    $this->singular_name = __( 'project', 'vick_fords' );
    $this->plural_name = __( 'projects', 'vick_fords' );

    $this->slug = 'projects';

    add_action('init', array($this, 'register'));
    add_action('init', array($this, 'register_taxonomy'));
    add_action('init', array($this, 'register_taxonomy_tag'));

    // add_filter('single_template', array($this, 'get_custom_pt_single_template'));
    // add_filter('archive_template', array($this, 'get_custom_pt_archive_template'));
}

/**
 * Register post type
 */
public function register() {
    $labels = array(
        'name'                  => $this->name,
        'singular_name'         => $this->singular_name,
        'add_new'               => sprintf( __('Add New %s', 'vick_fords' ), $this->singular_name ),
        'add_new_item'          => sprintf( __('Add New %s', 'vick_fords' ), $this->singular_name ),
        'edit_item'             => sprintf( __('Edit %s', 'vick_fords'), $this->singular_name ),
        'new_item'              => sprintf( __('New %s', 'vick_fords'), $this->singular_name ),
        'all_items'             => sprintf( __('All %s', 'vick_fords'), $this->plural_name ),
        'view_item'             => sprintf( __('View %s', 'vick_fords'), $this->name ),
        'search_items'          => sprintf( __('Search %s', 'vick_fords'), $this->name ),
        'not_found'             => sprintf( __('No %s found' , 'vick_fords'), strtolower($this->name) ),
        'not_found_in_trash'    => sprintf( __('No %s found in Trash', 'vick_fords'), strtolower($this->name) ),
        'parent_item_colon'     => '',
        'menu_name'             => $this->name
    );
    $args = array(
        'labels' => $labels,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => $this->slug ),
        'has_archive'           => true,
        'menu_position'         => 8,
        'supports'              => array( 
            'title', 
            // 'editor', 
            'author', 
            'thumbnail', 
            // 'excerpt', 
            'page-attributes', 
            'comments' 
        ),
        'menu_icon'  =>  'dashicons-screenoptions',
    );
    register_post_type( $this->type, $args );
}

public function register_taxonomy() {
    $category = 'category'; // Second part of taxonomy name

    $labels = array(
        'name' => sprintf( __( '%s Categories', 'vick_fords' ), $this->name ),
        'menu_name' => sprintf( __( 'Categories','vick_fords' ), $this->name ),
        'singular_name' => sprintf( __( '%s Category', 'vick_fords' ), $this->name ),
        'search_items' =>  sprintf( __( 'Search %s Categories', 'vick_fords' ), $this->name ),
        'all_items' => sprintf( __( 'All %s Categories','vick_fords' ), $this->name ),
        'parent_item' => sprintf( __( 'Parent %s Category','vick_fords' ), $this->name ),
        'parent_item_colon' => sprintf( __( 'Parent %s Category:','vick_fords' ), $this->name ),
        'new_item_name' => sprintf( __( 'New %s Category Name','vick_fords' ), $this->name ),
        'add_new_item' => sprintf( __( 'Add New %s Category','vick_fords' ), $this->name ),
        'edit_item' => sprintf( __( 'Edit %s Category','vick_fords' ), $this->name ),
        'update_item' => sprintf( __( 'Update %s Category','vick_fords' ), $this->name ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => $this->slug.'-'.$category ),
    );
    register_taxonomy( $this->type.'-'.$category, array($this->type), $args );
}

public function register_taxonomy_tag() { // Second part of taxonomy name

    $labels = array(
        'name' => __( 'Tags', 'vick_fords' ),
        'menu_name' => __( 'Tags','vick_fords' ),
        'singular_name' => __( 'Tag', 'vick_fords' ),
        'popular_items' => __( 'Popular Tags', 'vick_fords' ),
        'search_items' =>  __( 'Search Tag', 'vick_fords' ),
        'all_items' => __( 'All Tags','vick_fords' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'new_item_name' => __( 'New Tag Name','vick_fords' ),
        'add_new_item' => __( 'Add New Tag','vick_fords' ),
        'edit_item' => __( 'Edit Tag','vick_fords' ),
        'update_item' => __( 'Update Tag','vick_fords' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'update_count_callback' => '_update_post_term_count',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => $this->slug.'-tag' ),
    );
    register_taxonomy( $this->type.'_tag', array($this->type), $args );
}

// function get_custom_pt_single_template($single_template) {
//     global $post;

//     if ($post->post_type == $this->type) {
//         if(file_exists(get_template_directory().'/single-projects.php')) return $single_template;
//     }
//     return $single_template;
// }

// // https://codex.wordpress.org/Plugin_API/Filter_Reference/archive_template
// function get_custom_pt_archive_template( $archive_template ) {
//     global $post;

//     if ( is_post_type_archive ( $this->type ) ) {
//         if(file_exists(get_template_directory().'/template-project.php')) return $archive_template;
//     }
//     return $archive_template;
// }

}

new VF_Projects();

?>