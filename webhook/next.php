<?php

/**
 * Trigger Next.js Revalidation
 */
function trigger_next_revalidation($id = null, $type = 'general') {
    // Get frontend URL from theme options
    $frontend_url = carbon_get_theme_option('url');

    // Fallback if the theme option is not set
    if (empty($frontend_url)) {
        $frontend_url = 'http://localhost:3000';
    }

    // Normalize URL (remove trailing slash if exists)
    $frontend_url = rtrim($frontend_url, '/');

    // Construct the webhook URL
    $webhook_url = $frontend_url . "/api/revalidate?secret=12345678";

    // Send POST request to Next.js API
    // We use non-blocking request to avoid slowing down the WordPress admin
    $response = wp_remote_post($webhook_url, array(
        'method'      => 'POST',
        'timeout'     => 45,
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking'    => false,
        'headers'     => array(
            'Content-Type' => 'application/json; charset=utf-8',
        ),
    ));

    // Log result
    if (is_wp_error($response)) {
        error_log("Revalidation failed [$type]: " . $response->get_error_message());
    } else {
        error_log("Revalidation triggered [$type]" . ($id ? " for ID: $id" : ""));
    }
}

/**
 * Revalidate on Post Save
 */
function revalidate_on_post_save($post_id, $post, $update) {
    // Prevent triggering on autosaves and revisions
    if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
        return;
    }

    // List of post types that should trigger revalidation
    $allowed_post_types = array('page', 'post', 'insights', 'projects', 'team_members', 'clients');
    
    if (!in_array($post->post_type, $allowed_post_types)) {
        return;
    }

    trigger_next_revalidation($post_id, 'post_save');
}
add_action('save_post', 'revalidate_on_post_save', 10, 3);

/**
 * Revalidate on Theme Options Save
 */
function revalidate_on_theme_options_save() {
    trigger_next_revalidation(null, 'theme_options');
}
add_action('carbon_fields_theme_options_container_saved', 'revalidate_on_theme_options_save');

/**
 * Revalidate on Post Order Update (Post Types Order Plugin)
 */
function revalidate_on_post_order_update() {
    trigger_next_revalidation(null, 'post_order');
}
add_action('PTO/order_update_complete', 'revalidate_on_post_order_update');

/**
 * Revalidate on Menu Update
 */
function revalidate_on_menu_update() {
    trigger_next_revalidation(null, 'menu_update');
}
add_action('wp_update_nav_menu', 'revalidate_on_menu_update');