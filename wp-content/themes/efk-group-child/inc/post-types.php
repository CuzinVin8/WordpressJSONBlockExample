<?php
	
// post types
add_action( 'init', 'register_custom_post_types' );
function register_custom_post_types() {

	//==================================//
	// Case Studies
	//=================================//
	register_post_type( 'case-study',
		array(
			'labels' => array(
        'name' => __( 'Case Studies', 'case-study' ),
        'singular_name' => __( 'Case Study', 'case-study' ),
        'add_new_item' => __('Add Case Study'),
        'edit_item' => __('Edit Case Study'),
        'new_item' => __('New Case Study'),
			),
			'public' => true,
			'publicly_queryable' => true,
      'menu_icon' => 'dashicons-welcome-learn-more',
			'taxonomies' => array('services' ),
      'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes'),
			'show_ui' => true,
			'show_in_rest' => true,
      'capability_type' => 'post',
			'has_archive' => false,
			'hierarchical' => false,
			'query_var' => true,
			'rewrite' => array( 
				'slug' => 'case-study'
			),
		)
	);
	
	
}
			
		

/* Services Taxonomy
/********************************************************/
add_action( 'init', 'create_taxonomy', 0 );

function create_taxonomy() {
// Labels part for the GUI
  $labels = array(
    'name' => _x( 'Services', 'services' ),
    'singular_name' => _x( 'Service', 'service' ),
    'search_items' => __( 'Search Services' ),
    'popular_items' => __( 'Popular Services' ),
    'all_items' => __( 'All Services' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Service' ),
    'update_item' => __( 'Update Service' ),
    'add_new_item' => __( 'Add New Service' ),
    'new_item_name' => __( 'New Service Name' ),
    'separate_items_with_commas' => __( 'Separate services with commas' ),
    'add_or_remove_items' => __( 'Add or remove services' ),
    'choose_from_most_used' => __( 'Choose from the most used services' ),
    'menu_name' => __( 'Services' ),
  );

// Register the taxonomy like tag for faculty
  register_taxonomy('services',array( 'case-study' ),array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
	  'show_in_rest' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'service' )
  ));
}