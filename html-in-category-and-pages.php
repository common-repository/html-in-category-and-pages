<?php
/* 
Plugin Name: .html in category and pages
Plugin URI: http://dineshkarki.com.np/html-in-category-and-pages
Description: Add .html extension in category and pages.
Author: Dinesh Karki
Version: 1.0
Author URI: http://www.dineshkarki.com.np
*/

/*  Copyright 2012  Dinesh Karki  (email : dnesskarki@gmail.com) */

function hcp_init(){ add_filter('category_rewrite_rules', 'hcp_category_rewrite', 3); add_filter('category_link', 'hcp_category_link',1); add_filter('page_rewrite_rules', 'hcp_page_rewrite', 2); add_filter('page_link', 'hcp_page_link'); add_filter('post_rewrite_rules', 'hcp_post_rewrite', 2); add_filter('post_link', 'hcp_post_link'); add_filter('user_trailingslashit', 'hcp_no_page_slash',1,2); } $hcp_extension_to_use = get_option('hcp_extension_to_use'); if (empty($hcp_extension_to_use)){ update_option('hcp_extension_to_use', 'html'); $hcp_extension_to_use = get_option('hcp_extension_to_use'); } function hcp_category_rewrite($rules) { global $hcp_extension_to_use; foreach ( $rules as $key => $value ) { $newrules[str_replace('/?', '.'.$hcp_extension_to_use, $key)] = $value; } return $newrules; } function hcp_category_link($link) { global $hcp_extension_to_use; return $link . '.'.$hcp_extension_to_use; } function hcp_page_rewrite($rules) { global $hcp_extension_to_use; foreach ( $rules as $key => $value ) { $newrules[str_replace('/?', '.'.$hcp_extension_to_use, $key)] = $value; } return $newrules; } function hcp_page_link($link) { global $hcp_extension_to_use; return $link . '.'.$hcp_extension_to_use; } function hcp_post_rewrite($rules) { global $hcp_extension_to_use; foreach ( $rules as $key => $value ) { $newrules[str_replace('/?', '.'.$hcp_extension_to_use, $key)] = $value; } return $newrules; } function hcp_post_link($link) { global $hcp_extension_to_use; return $link . '.'.$hcp_extension_to_use; } function hcp_no_page_slash($string, $type){ global $wp_rewrite; if ($wp_rewrite->using_permalinks() && $wp_rewrite->use_trailing_slashes==true){ return untrailingslashit($string); }else{ return $string; } } hcp_init();

include('hcp_plugin_interface.php');
?>