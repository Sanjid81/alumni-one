<?php
add_action('init', 'create_post_type');

function create_post_type()
{
            // Clients
            register_post_type(
            'clients',
            array(
            'labels' => array(
                'name' => __('Clients'),
                'singular_name' => __('Client')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'supports' => array('title', 'thumbnail', 'revisions'),
            'rewrite' => array('slug' => 'clients'),
            'menu_icon' => 'dashicons-businessman',
            'show_in_graphql' => true,
            'graphql_single_name' => 'client',
            'graphql_plural_name' => 'clients',
            ));

            // Team Members
            register_post_type(
            'team_members',
            array(
            'labels' => array(
                'name' => __('Team Members'),
                'singular_name' => __('Team Member')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
            'rewrite' => array('slug' => 'team-members'),
            'menu_icon' => 'dashicons-groups',
            'show_in_graphql' => true,
            'graphql_single_name' => 'teamMember',
            'graphql_plural_name' => 'teamMembers',
            ));

            // Insight Categories
            register_taxonomy('insight_category', 'insights', array(
                'labels' => array(
                    'name' => __('Insight Categories'),
                    'singular_name' => __('Insight Category'),
                ),
                'hierarchical' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'show_in_graphql' => true,
                'graphql_single_name' => 'insightCategory',
                'graphql_plural_name' => 'insightCategories',
            ));

            // Insights
            register_post_type(
            'insights',
            array(
            'labels' => array(
                'name' => __('Insights'),
                'singular_name' => __('Insight')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt'),
            'rewrite' => array('slug' => 'insights'),
            'menu_icon' => 'dashicons-lightbulb',
            'taxonomies' => array('insight_category', 'post_tag'),
            'show_in_graphql' => true,
            'graphql_single_name' => 'insight',
            'graphql_plural_name' => 'insights',
            ));

            // Project Categories
            register_taxonomy('project_category', 'projects', array(
                'labels' => array(
                    'name' => __('Project Categories'),
                    'singular_name' => __('Project Category'),
                ),
                'hierarchical' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'show_in_graphql' => true,
                'graphql_single_name' => 'projectCategory',
                'graphql_plural_name' => 'projectCategories',
            ));

            // Projects
            register_post_type(
            'projects',
            array(
            'labels' => array(
                'name' => __('Projects'),
                'singular_name' => __('Project')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt'),
            'rewrite' => array('slug' => 'projects'),
            'menu_icon' => 'dashicons-portfolio',
            'taxonomies' => array('project_category'),
            'show_in_graphql' => true,
            'graphql_single_name' => 'project',
            'graphql_plural_name' => 'projects',
            ));
}

