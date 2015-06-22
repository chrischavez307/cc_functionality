<?php

	// Prevent Empty Title Tag on Home and Blog Pages
	add_filter( 'wp_title', 'cc_no_empty_wp_title' );
		
	function cc_no_empty_wp_title( $title )
		{
		  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
			return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'name' );
		  }
		  return $title;
	}
	
	
	// Capitalize Title Tags
	function cc_cap_title($title) {
		 $title = ucwords($title);
		 return $title;
	}
	
	add_filter('wp_title', 'cc_cap_title');
	add_filter('the_title', 'cc_cap_title');
	
?>
