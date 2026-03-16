<?php
/**
 * Custom Post Types
 *
 * Registers post types used by Carbon Fields association fields.
 * Without these, get_post_type_object() returns null and causes
 * "Attempt to read property 'labels' on null" in Association_Field.
 */

defined('ABSPATH') || exit;

add_action('init', 'headless_register_custom_post_types', 0);

function headless_register_custom_post_types()
{
    register_post_type('projects', [
        'labels' => [
            'name'               => __('Projects', 'headless'),
            'singular_name'      => __('Project', 'headless'),
            'menu_name'          => __('Projects', 'headless'),
            'add_new'            => __('Add New', 'headless'),
            'add_new_item'       => __('Add New Project', 'headless'),
            'edit_item'          => __('Edit Project', 'headless'),
            'new_item'           => __('New Project', 'headless'),
            'view_item'          => __('View Project', 'headless'),
            'search_items'       => __('Search Projects', 'headless'),
            'not_found'          => __('No projects found', 'headless'),
            'not_found_in_trash' => __('No projects found in Trash', 'headless'),
        ],
        'public'       => true,
        'has_archive'  => true,
        'show_in_rest' => true,
        'supports'     => ['title', 'editor', 'thumbnail'],
    ]);

    register_post_type('insights', [
        'labels' => [
            'name'               => __('Insights', 'headless'),
            'singular_name'      => __('Insight', 'headless'),
            'menu_name'          => __('Insights', 'headless'),
            'add_new'            => __('Add New', 'headless'),
            'add_new_item'       => __('Add New Insight', 'headless'),
            'edit_item'          => __('Edit Insight', 'headless'),
            'new_item'           => __('New Insight', 'headless'),
            'view_item'          => __('View Insight', 'headless'),
            'search_items'       => __('Search Insights', 'headless'),
            'not_found'          => __('No insights found', 'headless'),
            'not_found_in_trash' => __('No insights found in Trash', 'headless'),
        ],
        'public'       => true,
        'has_archive'  => true,
        'show_in_rest' => true,
        'supports'     => ['title', 'editor', 'thumbnail'],
    ]);
}
