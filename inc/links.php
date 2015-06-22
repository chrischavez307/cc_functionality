<?php

	// Force all external links to open in a new window
	add_filter('the_content', 'cc_external_link');
	add_filter('the_excerpt', 'cc_external_link');

	function cc_external_link($content) {
		return preg_replace_callback('/<a[^>]+/', 'cc_external_link_callback', $content);
	}

	function cc_external_link_callback($matches) {
	    $link = $matches[0];
		$site_link = get_bloginfo('url');
		if (strpos($link, 'rel') === false) {
	        $link = preg_replace("%(href=\S(?!$site_link))%i", 'target="_blank" $1', $link);
		}
		elseif (preg_match("%href=\S(?!$site_link)%i", $link)) {
	        $link = preg_replace('/target=\S(?!blank)\S*/i', 'target="_blank"', $link);
		}
	
	return $link;
}
	
?>
