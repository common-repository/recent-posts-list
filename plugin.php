<?php
/**
 * Plugin Name: Recent Posts List
 * Description: <strong>Recent Posts List</strong> is a simple WordPress plugin to show the recent posts in list. It shows just after the main content.
 * Author: Zakaria Binsaifullah
 * Author URI: https://makegutenblock.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package ATGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Posts Links

require_once plugin_dir_path( __FILE__ ) . 'admin/admin.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/admin-submenu.php';

/**
 * Filter Hook for Content
*/
function rplp_recent_posts_links( $content ){

	$rplp_current_post = get_the_ID();
	$rplp_total_posts = get_option( 'total_posts' );
	$rplp_section_title = get_option( 'section_title' );

	if (is_single()) {
		$rplp__posts = new WP_Query(array(
	    	'post_type' => 'post',
	    	'posts_per_page' => $rplp_total_posts,
	    	'post__not_in' => array($rplp_current_post)
    	));
		$post_index = 0;
		$content .= '<div class="rplp_container">';
		$content .= '<h3>'.$rplp_section_title.'</h3>';
	    if ($rplp__posts->have_posts()) {
	    	while ($rplp__posts->have_posts()) {
	    	    $rplp__posts->the_post();
	    	    $post_index ++;
	    	    $content .= '<h4>'.$post_index.'. <a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
	    	}
	    }
	    $content .= "</div>";
	}
	return $content;
}
add_filter( 'the_content', 'rplp_recent_posts_links' );

// Plugin Action Link
function rplp_admin_settings_link( $links ) {
	$new_link = array(
		'<a href="'. esc_url( 'https://makegutenblock.com/contact/' ) .'" target="_blank" style="color: #A11637; font-weight: 600">Contact</a>'
	);
	return array_merge( $new_link, $links );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'rplp_admin_settings_link' );

// Redirecting
function rplp_user_redirecting( $plugin ) {
	if( plugin_basename(__FILE__) == $plugin ){
		wp_redirect( admin_url( 'admin.php?page=rplp-links' ) );
		die();
	}
}
add_action( 'activated_plugin', 'rplp_user_redirecting' );
