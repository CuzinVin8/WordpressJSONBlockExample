<?php
	
// SHORTCODES

/**
 * sidebar child pages list
 */
function efk_list_child_pages() { 
	global $post; 
	$p = $post;
	
	while ( $p->post_parent ) {
		$p = get_post( $p->post_parent );
	}
	
		$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $p->ID . '&echo=0' );
	if ( $childpages ) {
		$string = '<div class="widgetizedArea"><h3>' . get_the_title($p->ID) . '</h3><div class="menu-admissions-sidebar-menu-container"><ul id="menu-admissions-sidebar-menu" class="menu">' . $childpages . '</ul></div></div>';
	}
	
	return $string;
}

add_shortcode('efk_childpages', 'efk_list_child_pages');