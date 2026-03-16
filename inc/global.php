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
        'carbon-fields/alumni-hero',
        'carbon-fields/trusted-logos',
        'carbon-fields/problem-cards',
        'carbon-fields/split-highlight',
        'carbon-fields/feature-tabs',
        'carbon-fields/three-steps',
        'carbon-fields/why-choose-grid',
        'carbon-fields/pricing',
        'carbon-fields/testimonials',
        'carbon-fields/faq',
        'carbon-fields/final-call-to-action',       
      
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

/**
 * Specifically ensure Admin Bar "Visit Site" link points to frontend
 * This is safer than filtering home_url which can break the admin.
 */
function headless_custom_admin_bar_site_link($wp_admin_bar)
{
    $frontend_url = carbon_get_theme_option('url');
    if (!empty($frontend_url)) {
        $node = $wp_admin_bar->get_node('view-site');
        if ($node) {
            $node->href = rtrim($frontend_url, '/');
            $wp_admin_bar->add_node($node);
        }
        
        $node_home = $wp_admin_bar->get_node('site-name');
        if ($node_home) {
            $node_home->href = rtrim($frontend_url, '/');
            $wp_admin_bar->add_node($node_home);
        }
    }
}
add_action('admin_bar_menu', 'headless_custom_admin_bar_site_link', 999);