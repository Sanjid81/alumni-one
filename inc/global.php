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
    $view_mode = carbon_get_theme_option('view_mode');

    // If not in content management mode, allow all blocks
    if ($view_mode !== 'content_management') {
        return $allowed_blocks;
    }

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
        'carbon-fields/thank-you-hero',
        'carbon-fields/core-paragraph',
        'carbon-fields/core-heading',
        'carbon-fields/core-list',
        'carbon-fields/core-quote',
        'carbon-fields/core-code',
        'carbon-fields/core-details',
        'carbon-fields/core-math',
        'carbon-fields/core-preformatted',
        'carbon-fields/core-pullquote',
        'carbon-fields/core-table',
        'carbon-fields/core-verse',
        'carbon-fields/core-classic',
        'carbon-fields/stretchy-paragraph',
        'carbon-fields/stretchy-heading',
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

// Hide menus based on view mode
function headless_restrict_admin_menu()
{
    $view_mode = carbon_get_theme_option('view_mode');

    if ($view_mode === 'content_management') {
        remove_menu_page('edit.php'); // Posts
        remove_menu_page('plugins.php');
        remove_menu_page('edit-comments.php');
        remove_menu_page('themes.php'); // Appearance
        remove_menu_page('tools.php');
        remove_menu_page('options-general.php'); // Settings
        
        // Form plugins
        remove_menu_page('fluent_forms');
        remove_menu_page('wpforms-overview');

        // SEO and SMTP
        remove_menu_page('wpseo_dashboard'); // Yoast SEO
        remove_menu_page('wp-mail-smtp'); // WP Mail SMTP

        // GraphQL
        remove_menu_page('graphiql-ide'); // GraphiQL IDE
        remove_menu_page('wp-graphql-gutenberg-admin'); // WPGraphQL Gutenberg
    }
}
add_action('admin_menu', 'headless_restrict_admin_menu', 999);