<?php

function add_graphql_support_to_posts($args, $post_type)
{
    if ('post' === $post_type) {
        $args['show_in_graphql'] = true;
        $args['graphql_single_name'] = 'post';
        $args['graphql_plural_name'] = 'posts';
    }
    return $args;
}

function headless_allowed_block_types($allowed_blocks, $editor_context)
{
    // List of allowed custom blocks
    $custom_blocks = array(
        'carbon-fields/hero',
        'carbon-fields/our-work',
        'carbon-fields/project-selected-showcase',
        'carbon-fields/insight-selected-showcase',
        'carbon-fields/what-we-do',
        'carbon-fields/our-clients',
        'carbon-fields/testimonials',
        'carbon-fields/get-in-touch',
        'carbon-fields/about-us-hero',
        'carbon-fields/team-member-showcase',
        'carbon-fields/hero-insight',
        'carbon-fields/all-insights-showcase',
        'carbon-fields/all-projects-showcase',
        'carbon-fields/contact-us',
        'carbon-fields/project-overview',
        'carbon-fields/project-scope',
        'carbon-fields/project-challenge',
        'carbon-fields/project-detail-entries',
        'carbon-fields/project-solution',
        'carbon-fields/what-we-did',
        'carbon-fields/project-results',
        'carbon-fields/project-beyond-metrics',
    );

    // If you want to allow some core blocks (e.g., for simple text or media), 
    // uncomment the ones you need below:
    // $custom_blocks[] = 'core/paragraph';
    // $custom_blocks[] = 'core/image';
    // $custom_blocks[] = 'core/heading';
    // $custom_blocks[] = 'core/list';

    return $custom_blocks;
}

add_filter('allowed_block_types_all', 'headless_allowed_block_types', 10, 2);

add_filter('register_post_type_args', 'add_graphql_support_to_posts', 10, 2);

// Hide default WordPress Posts
function headless_remove_default_posts_menu()
{
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'headless_remove_default_posts_menu');