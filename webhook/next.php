<?php

function my_post_action_callback($post_id, $post, $update) {
    // Prevent triggering on autosaves and revisions
    if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
        return;
    }

    // Ensure the post has a valid permalink
    $post_url = get_permalink($post_id);
    if (!$post_url) return;

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
        error_log("Revalidation failed for post ID $post_id: " . $response->get_error_message());
    } else {
        error_log("Revalidation successful for: " . $post_url);
    }
}

add_action('save_post', 'my_post_action_callback', 10, 3);