<?php
/*
Plugin Name:   Redirectly
Plugin URI:    https://plugins.svn.wordpress.org/redirectly
Description:   If only one post is found by the search results, redirectly will redirect the user to that post
Version:       1.0.0
Author:        chrisb10
Author URI:    https://profiles.wordpress.org/chrisb10
*/

//If only one post is found by the search results, redirect user to that post

add_action('template_redirect', 'redirectly_single_post_redirect');
function redirectly_single_post_redirect() {
    if (is_search()) {
        global $wp_query;
        if ($wp_query->post_count == 1 && $wp_query->max_num_pages == 1) {
            wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
            exit;
        }
    }
}