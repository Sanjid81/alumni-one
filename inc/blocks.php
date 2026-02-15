<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;
use WpGraphQLCrb\Container as WpGraphQLCrbContainer;

add_action('carbon_fields_register_fields', 'headless_register_components');

function headless_register_components()
{
    WpGraphQLCrbContainer::register(
      
        /////////////////////////////////////////////
        //Home page blocks
        /////////////////////////////////////////////

        // Hero
        Block::make(__('Hero', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Hero Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/hero.png" style="max-width: 100%; width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'title', __('Title', 'nh'))
                    ->set_default_value(''),
                Field::make('textarea', 'description', __('Description', 'nh'))
                    ->set_default_value(''),
                Field::make('text', 'button_text', __('Button Text', 'nh'))
                    ->set_default_value(''),
                Field::make('radio', 'link_source', __('Link Source', 'nh'))
                    ->add_options(array(
                        'internal' => __('Internal', 'nh'),
                        'custom' => __('Custom', 'nh'),
                    ))
                    ->set_default_value('internal'),
                Field::make('association', 'button_page', __('Select Button Page', 'nh'))
                    ->set_types([
                        [
                            'type' => 'post',
                            'post_type' => 'page',
                        ],
                    ])
                    ->set_max(1)
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'link_source',
                            'value' => 'internal',
                        )
                    )),
                Field::make('text', 'custom_url', __('Custom URL', 'nh'))
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'link_source',
                            'value' => 'custom',
                        )
                    )),
                Field::make('checkbox', 'open_in_new_tab', __('Open in new tab', 'nh')),
            ))
            ->set_icon('star-filled')
            ->set_keywords([__('Hero Custom Block', 'nh')])
            ->set_description(__('Custom Block', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),
        // Our Work
        Block::make(__('Our Work', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Our Work Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/our-work.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('select', 'style_version', __('Style Version', 'nh'))
                    ->add_options(array(
                        'v1' => __('Version 1', 'nh'),
                        'v2' => __('Version 2', 'nh'),
                    ))
                    ->set_default_value('v1'),
                Field::make('text', 'section_title', __('Section Title', 'nh'))
                    ->set_default_value('')
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'style_version',
                            'value' => 'v1',
                        )
                    )),
                Field::make('image', 'background_image', __('Background Image', 'nh'))
                    ->set_value_type('url'),
                Field::make('text', 'body_title', __('Body Title', 'nh'))
                    ->set_default_value(''),
                Field::make('textarea', 'body_description', __('Body Description', 'nh'))
                    ->set_default_value(''),
                Field::make('radio', 'link_source', __('Link Source', 'nh'))
                    ->add_options(array(
                        'internal' => __('Internal', 'nh'),
                        'custom' => __('Custom', 'nh'),
                    ))
                    ->set_default_value('internal'),
                Field::make('association', 'button_page', __('Select Button Page', 'nh'))
                    ->set_types([
                        [
                            'type' => 'post',
                            'post_type' => 'page',
                        ],
                    ])
                    ->set_max(1)
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'link_source',
                            'value' => 'internal',
                        )
                    )),
                Field::make('text', 'custom_url', __('Custom URL', 'nh'))
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'link_source',
                            'value' => 'custom',
                        )
                    )),
                Field::make('checkbox', 'open_in_new_tab', __('Open in new tab', 'nh')),
            ))
            ->set_icon('portfolio')
            ->set_keywords([__('Our Work Custom Block', 'nh')])
            ->set_description(__('Custom Block for Our Work section', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Project Selected Showcase
        Block::make(__('Project Selected Showcase', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Project Selected Showcase Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/project-selected-showcase.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('association', 'projects', __('Select Projects', 'nh'))
                    ->set_types([
                        [
                            'type' => 'post',
                            'post_type' => 'projects',
                        ],
                    ]),
                Field::make('text', 'button_text', __('Button Text', 'nh'))
                    ->set_default_value(''),
                Field::make('radio', 'link_source', __('Link Source', 'nh'))
                    ->add_options(array(
                        'internal' => __('Internal', 'nh'),
                        'custom' => __('Custom', 'nh'),
                    ))
                    ->set_default_value('internal'),
                Field::make('association', 'button_page', __('Select Button Page', 'nh'))
                    ->set_types([
                        [
                            'type' => 'post',
                            'post_type' => 'page',
                        ],
                    ])
                    ->set_max(1)
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'link_source',
                            'value' => 'internal',
                        )
                    )),
                Field::make('text', 'custom_url', __('Custom URL', 'nh'))
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'link_source',
                            'value' => 'custom',
                        )
                    )),
                Field::make('checkbox', 'open_in_new_tab', __('Open in new tab', 'nh')),
            ))
            ->set_icon('portfolio')
            ->set_keywords([__('Project Selected Showcase Custom Block', 'nh')])
            ->set_description(__('Custom Block for Project Selected Showcase section', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),
        
        // Insight Selected Showcase
        Block::make(__('Insight Selected Showcase', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Insight Selected Showcase Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/insight-selected-showcase.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'section_title', __('Section Title', 'nh'))
                    ->set_default_value(''),
                Field::make('textarea', 'section_description', __('Section Description', 'nh'))
                    ->set_default_value(''),
                Field::make('association', 'insights', __('Select Insights', 'nh'))
                    ->set_types([
                        [
                            'type' => 'post',
                            'post_type' => 'insights',
                        ],
                    ]),
                Field::make('radio', 'link_source', __('Link Source', 'nh'))
                    ->add_options(array(
                        'internal' => __('Internal', 'nh'),
                        'custom' => __('Custom', 'nh'),
                    ))
                    ->set_default_value('internal'),
                Field::make('association', 'button_page', __('Select Button Page', 'nh'))
                    ->set_types([
                        [
                            'type' => 'post',
                            'post_type' => 'page',
                        ],
                    ])
                    ->set_max(1)
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'link_source',
                            'value' => 'internal',
                        )
                    )),
                Field::make('text', 'custom_url', __('Custom URL', 'nh'))
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'link_source',
                            'value' => 'custom',
                        )
                    )),
                Field::make('checkbox', 'open_in_new_tab', __('Open in new tab', 'nh')),
            ))
            ->set_icon('images-alt2')
            ->set_keywords([__('Insight Selected Showcase Custom Block', 'nh')])
            ->set_description(__('Custom Block for Insight Selected Showcase section', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),
    
        // What We Do
        Block::make(__('What We Do', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>What We Do Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/what-we-do.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'section_title', __('Section Title', 'nh'))
                    ->set_default_value(''),
                Field::make('complex', 'what_we_do_items', __('What We Do Items', 'nh'))
                    ->set_layout('tabbed-horizontal')
                    ->add_fields(array(
                        Field::make('text', 'card_title_short', __('Title on Card (Short)', 'nh'))
                            ->set_default_value(''),
                        Field::make('textarea', 'item_title', __('Item Title', 'nh'))
                            ->set_default_value(''),
                        Field::make('textarea', 'item_description', __('Item Description', 'nh'))
                            ->set_default_value(''),
                        Field::make('color', 'background_color', __('Background Color', 'nh'))
                            ->set_default_value(''),
                    ))
            ))
            ->set_icon('grid-view')
            ->set_keywords([__('What We Do Custom Block', 'nh')])
            ->set_description(__('Custom Block for What We Do section', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),
    
        // Our Clients
        Block::make(__('Our Clients', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Our Clients Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/our-clients.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'section_title', __('Section Title', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('groups')
            ->set_keywords([__('Our Clients Custom Block', 'nh')])
            ->set_description(__('Custom Block for Our Clients section', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),
    
        // Testimonials
        Block::make(__('Testimonials', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Testimonials Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/testimonials.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('complex', 'testimonials', __('Testimonials', 'nh'))
                    ->set_layout('tabbed-horizontal')
                    ->add_fields(array(
                        Field::make('image', 'client_image', __('Client Image', 'nh'))
                            ->set_value_type('url'),
                        Field::make('text', 'client_name', __('Client Name', 'nh'))
                            ->set_default_value(''),
                        Field::make('text', 'client_designation', __('Client Designation', 'nh'))
                            ->set_default_value(''),
                        Field::make('text', 'title', __('Title', 'nh'))
                            ->set_default_value(''),
                        Field::make('textarea', 'description', __('Description', 'nh'))
                            ->set_default_value(''),
                    ))
            ))
            ->set_icon('testimonial')
            ->set_keywords([__('Testimonials Custom Block', 'nh')])
            ->set_description(__('Custom Block for Testimonials section', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),
    
        // Get In Touch
        Block::make(__('Get In Touch', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Get In Touch Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/get-in-touch.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'title', __('Title', 'nh'))
                    ->set_default_value(''),
                Field::make('textarea', 'description', __('Description', 'nh'))
                    ->set_default_value(''),
                Field::make('radio', 'redirect_source', __('Redirect Source', 'nh'))
                    ->add_options(array(
                        'internal' => __('Internal', 'nh'),
                        'custom' => __('Custom', 'nh'),
                    ))
                    ->set_default_value('internal'),
                Field::make('association', 'redirect_page', __('Redirect Page', 'nh'))
                    ->set_types([
                        [
                            'type' => 'post',
                            'post_type' => 'page',
                        ],
                    ])
                    ->set_max(1)
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'redirect_source',
                            'value' => 'internal',
                        )
                    )),
                Field::make('text', 'redirect_custom_url', __('Redirect Custom URL', 'nh'))
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'redirect_source',
                            'value' => 'custom',
                        )
                    )),
            ))
            ->set_icon('email')
            ->set_keywords([__('Get In Touch Custom Block', 'nh')])
            ->set_description(__('Custom Block for Get In Touch section', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        /////////////////////////////////////////////
        //About-us page blocks
        /////////////////////////////////////////////

        // About Us Hero
        Block::make(__('About Us Hero', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>About Us Hero Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/about-us-hero.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'title', __('Title', 'nh'))
                    ->set_default_value(''),
                Field::make('textarea', 'description', __('Description', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('id')
            ->set_keywords([__('About Us Hero Custom Block', 'nh')])
            ->set_description(__('Custom Block for About Us Hero section', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),
    
        // Team Member Showcase
        Block::make(__('Team Member Showcase', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Team Member Showcase Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/team-member-showcase.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'section_title', __('Section Title', 'nh'))
                    ->set_default_value(''),
                Field::make('textarea', 'description', __('Description', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('groups')
            ->set_keywords([__('Team Member Showcase Custom Block', 'nh')])
            ->set_description(__('Custom Block for Team Member Showcase section', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        /////////////////////////////////////////////
        //Insights page blocks
        /////////////////////////////////////////////
    
        // Hero Insight
        Block::make(__('Hero Insight', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Hero Insight Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/hero-insight.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'title', __('Title', 'nh'))
                    ->set_default_value(''),
                Field::make('textarea', 'description', __('Description', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('welcome-view-site')
            ->set_keywords([__('Hero Insight Custom Block', 'nh')])
            ->set_description(__('Custom Block for Insights page hero section', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),
    
        // All Insights Showcase
        Block::make(__('All Insights Showcase', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>All Insights Showcase Block</h2><p>This block will display all insights with category filtering on the frontend.</p><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/all-insights-showcase.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
            ))
            ->set_icon('category')
            ->set_keywords([__('All Insights Showcase Custom Block', 'nh')])
            ->set_description(__('Custom Block for displaying all insights with category filter', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        /////////////////////////////////////////////
        //Our Work page blocks
        /////////////////////////////////////////////
        
        // All Works Showcase
        Block::make(__('All Projects Showcase', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>All Projects Showcase Block</h2><p>This block will display all projects on the frontend.</p><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/all-projects-showcase.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
            ))
            ->set_icon('portfolio')
            ->set_keywords([__('All Projects Showcase Custom Block', 'nh')])
            ->set_description(__('Custom Block for displaying all projects', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        /////////////////////////////////////////////
        //Contact Us page blocks
        /////////////////////////////////////////////

        // Contact Us
        Block::make(__('Contact Us', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Contact Us Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/contact-us.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'section_title', __('Section Title', 'nh'))
                    ->set_default_value(''),
                Field::make('textarea', 'section_description', __('Section Description', 'nh'))
                    ->set_default_value(''),
                Field::make('text', 'phone_number', __('Phone Number', 'nh'))
                    ->set_default_value(''),
                Field::make('text', 'email_address', __('Email Address', 'nh'))
                    ->set_default_value(''),
                Field::make('radio', 'redirect_source', __('Redirect Source', 'nh'))
                    ->add_options(array(
                        'internal' => __('Internal', 'nh'),
                        'custom' => __('Custom', 'nh'),
                    ))
                    ->set_default_value('internal'),
                Field::make('association', 'redirect_page', __('Redirect Page', 'nh'))
                    ->set_types([
                        [
                            'type' => 'post',
                            'post_type' => 'page',
                        ],
                    ])
                    ->set_max(1)
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'redirect_source',
                            'value' => 'internal',
                        )
                    )),
                Field::make('text', 'redirect_custom_url', __('Redirect Custom URL', 'nh'))
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'redirect_source',
                            'value' => 'custom',
                        )
                    )),
            ))
            ->set_icon('phone')
            ->set_keywords([__('Contact Us Custom Block', 'nh')])
            ->set_description(__('Custom Block for Contact Us section', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        /////////////////////////////////////////////
        //Project Details page blocks
        /////////////////////////////////////////////

        // Project Overview
        Block::make(__('Project Overview', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Project Overview Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/project-overview.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'section_title', __('Section Title', 'nh'))
                    ->set_default_value(''),
                Field::make('textarea', 'description_one', __('Description One', 'nh'))
                    ->set_default_value(''),
                Field::make('textarea', 'description_two', __('Description Two', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('media-text')
            ->set_keywords([__('Project Overview Custom Block', 'nh')])
            ->set_description(__('Custom Block for Project Overview section', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Project Scope
        Block::make(__('Project Scope', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Project Scope Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/project-scope.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'section_title', __('Section Title', 'nh'))
                    ->set_default_value(''),
                Field::make('complex', 'scope_columns', __('Scope Columns', 'nh'))
                    ->set_layout('tabbed-horizontal')
                    ->add_fields(array(
                        Field::make('text', 'column_title', __('Column Title', 'nh'))
                            ->set_default_value(''),
                        Field::make('complex', 'column_items', __('Column Items', 'nh'))
                            ->add_fields(array(
                                Field::make('text', 'item_text', __('Item Text', 'nh'))
                                    ->set_default_value(''),
                            ))
                    ))
            ))
            ->set_icon('editor-ul')
            ->set_keywords([__('Project Scope Custom Block', 'nh')])
            ->set_description(__('Custom Block for Project Scope section with columns and lists', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Project Challenge
        Block::make(__('Project Challenge', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Project Challenge Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/project-challenge.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'section_title', __('Section Title', 'nh'))
                    ->set_default_value(''),
                Field::make('complex', 'content_entries', __('Content Entries', 'nh'))
                    ->set_layout('tabbed-horizontal')
                    ->add_fields(array(
                        Field::make('textarea', 'content_text', __('Content Text', 'nh'))
                            ->set_default_value(''),
                    ))
                    ->set_help_text(__('Add as many details/paragraphs as needed.', 'nh')),
                Field::make('file', 'image', __('Image', 'nh'))
                    ->set_value_type('url'),
            ))
            ->set_icon('align-pull-right')
            ->set_keywords([__('Project Challenge Custom Block', 'nh')])
            ->set_description(__('Custom Block for Project Challenge section with text and image', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Project Detail Entries
        Block::make(__('Project Detail Entries', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Project Detail Entries Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/project-detail-entries.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('complex', 'detail_entries', __('Detail Entries', 'nh'))
                    ->set_layout('tabbed-horizontal')
                    ->add_fields(array(
                        Field::make('text', 'entry_title', __('Entry Title', 'nh'))
                            ->set_default_value(''),
                        Field::make('textarea', 'entry_description', __('Entry Description', 'nh'))
                            ->set_default_value(''),
                    ))
                    ->set_help_text(__('Add entries with a title and description.', 'nh')),
            ))
            ->set_icon('list-view')
            ->set_keywords([__('Project Detail Entries Custom Block', 'nh')])
            ->set_description(__('Custom Block for Project Detail Entries section with rows of title and text', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Project Solution
        Block::make(__('Project Solution', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Project Solution Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/project-solution.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'section_title', __('Section Title', 'nh'))
                    ->set_default_value(''),
                Field::make('complex', 'solution_details', __('Solution Details', 'nh'))
                    ->set_layout('tabbed-horizontal')
                    ->add_fields(array(
                        Field::make('textarea', 'content_text', __('Content Text', 'nh'))
                            ->set_default_value(''),
                    ))
                    ->set_help_text(__('Add as many details/paragraphs as needed.', 'nh')),
                Field::make('file', 'image', __('Image', 'nh'))
                    ->set_value_type('url'),
            ))
            ->set_icon('lightbulb')
            ->set_keywords([__('Project Solution Custom Block', 'nh')])
            ->set_description(__('Custom Block for Project Solution section with text and image', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // What We Did
        Block::make(__('What We Did', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>What We Did Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/what-we-did.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'section_title', __('Section Title', 'nh'))
                    ->set_default_value(''),
                Field::make('complex', 'did_entries', __('Entries', 'nh'))
                    ->set_layout('tabbed-horizontal')
                    ->add_fields('standard', __('Standard Row', 'nh'), array(
                        Field::make('text', 'title', __('Title', 'nh'))
                            ->set_default_value(''),
                        Field::make('textarea', 'description', __('Description', 'nh'))
                            ->set_default_value(''),
                        Field::make('radio', 'media_type', __('Media Type', 'nh'))
                            ->add_options(array(
                                'image' => __('Image', 'nh'),
                                'video' => __('Video', 'nh'),
                            ))
                            ->set_default_value('image'),
                        Field::make('file', 'image', __('Image', 'nh'))
                            ->set_value_type('url')
                            ->set_conditional_logic(array(
                                array(
                                    'field' => 'media_type',
                                    'value' => 'image',
                                )
                            )),
                        Field::make('text', 'video_url', __('Video URL (Embed Link)', 'nh'))
                            ->set_default_value('')
                            ->set_conditional_logic(array(
                                array(
                                    'field' => 'media_type',
                                    'value' => 'video',
                                )
                            )),
                    ))
                    ->add_fields('grid', __('Image Grid', 'nh'), array(
                        Field::make('complex', 'grid_images', __('Grid Images', 'nh'))
                            ->add_fields(array(
                                Field::make('file', 'image', __('Image', 'nh'))
                                    ->set_value_type('url'),
                            ))
                    ))
            ))
            ->set_icon('images-alt2')
            ->set_keywords([__('What We Did Custom Block', 'nh')])
            ->set_description(__('Custom Block for What We Did section with flexible layouts', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Project Results
        Block::make(__('Project Results', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Project Results Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/project-results.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'section_title', __('Section Title', 'nh'))
                    ->set_default_value(''),
                Field::make('textarea', 'description', __('Description', 'nh'))
                    ->set_default_value(''),
                Field::make('complex', 'result_metrics_data', __('Metrics', 'nh'))
                    ->add_fields('entry', __('Metric Entry', 'nh'), array(
                        Field::make('text', 'label', __('Label', 'nh'))
                            ->set_default_value(''),
                        Field::make('text', 'number', __('Number', 'nh'))
                            ->set_default_value(''),
                    ))
                    ->set_help_text(__('Add metric cards (e.g., 12.74% Click-through Rate). Each entry will have two text fields.', 'nh')),
            ))
            ->set_icon('chart-bar')
            ->set_keywords([__('Project Results Custom Block', 'nh')])
            ->set_description(__('Custom Block for Project Results section with metrics', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Project Beyond Metrics
        Block::make(__('Project Beyond Metrics', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Project Beyond Metrics Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/project-beyond-metrics.png" style="max-width: 100%;width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'section_title', __('Section Title', 'nh'))
                    ->set_default_value(''),
                Field::make('complex', 'beyond_narrative', __('Beyond Narrative', 'nh'))
                    ->set_layout('tabbed-horizontal')
                    ->add_fields(array(
                        Field::make('textarea', 'content_text', __('Content Text', 'nh'))
                            ->set_default_value(''),
                    ))
                    ->set_help_text(__('Add as many details/paragraphs as needed.', 'nh')),
                Field::make('textarea', 'quote_text', __('Quote Text', 'nh'))
                    ->set_default_value(''),
                Field::make('file', 'person_image', __('Person Image', 'nh'))
                    ->set_value_type('url'),
                Field::make('text', 'person_name', __('Person Name', 'nh'))
                    ->set_default_value(''),
                Field::make('text', 'person_designation', __('Person Designation', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('format-quote')
            ->set_keywords([__('Project Beyond Metrics Custom Block', 'nh')])
            ->set_description(__('Custom Block for Project Beyond Metrics section with a testimonial', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        /////////////////////////////////////////////
        //Thank you page blocks
        /////////////////////////////////////////////

        // Hero   
        Block::make(__('Thank You Hero', 'nh'))
            ->add_fields(array(
                Field::make('html', 'crb_information_text')
                    ->set_html('<h2>Hero Block</h2><img src="' . IMG . 'http://headless-toha-startup.local/wp-content/uploads/2026/02/hero.png" style="max-width: 100%; width: 100%; height: auto; border: 1px solid #ddd; margin-top: 10px;" />'),
                Field::make('text', 'title', __('Title', 'nh'))
                    ->set_default_value(''),
                Field::make('textarea', 'description', __('Description', 'nh'))
                    ->set_default_value(''),
                Field::make('text', 'button_text', __('Button Text', 'nh'))
                    ->set_default_value(''),
                Field::make('radio', 'link_source', __('Link Source', 'nh'))
                    ->add_options(array(
                        'internal' => __('Internal', 'nh'),
                        'custom' => __('Custom', 'nh'),
                    ))
                    ->set_default_value('internal'),
                Field::make('association', 'button_page', __('Select Button Page', 'nh'))
                    ->set_types([
                        [
                            'type' => 'post',
                            'post_type' => 'page',
                        ],
                    ])
                    ->set_max(1)
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'link_source',
                            'value' => 'internal',
                        )
                    )),
                Field::make('text', 'custom_url', __('Custom URL', 'nh'))
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'link_source',
                            'value' => 'custom',
                        )
                    )),
                Field::make('checkbox', 'open_in_new_tab', __('Open in new tab', 'nh')),
            ))
            ->set_icon('star-filled')
            ->set_keywords([__('Thank You Hero Custom Block', 'nh')])
            ->set_description(__('Custom Thank You Hero Block', 'nh'))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        /////////////////////////////////////////////
        // Standard Blocks (Core Wrappers)
        /////////////////////////////////////////////

        // Paragraph
        Block::make(__('Core Paragraph', 'nh'))
            ->add_fields(array(
                Field::make('rich_text', 'content', __('Content', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('editor-paragraph')
            ->set_keywords([__('paragraph', 'nh'), __('text', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Heading
        Block::make(__('Core Heading', 'nh'))
            ->add_fields(array(
                Field::make('text', 'content', __('Heading Text', 'nh'))
                    ->set_default_value(''),
                Field::make('select', 'level', __('Heading Level', 'nh'))
                    ->add_options(array(
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                    ))
                    ->set_default_value('h2'),
            ))
            ->set_icon('heading')
            ->set_keywords([__('heading', 'nh'), __('title', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // List
        Block::make(__('Core List', 'nh'))
            ->add_fields(array(
                Field::make('complex', 'list_items', __('List Items', 'nh'))
                    ->add_fields(array(
                        Field::make('text', 'item', __('Item', 'nh')),
                    ))
                    ->set_layout('tabbed-horizontal'),
                Field::make('select', 'list_type', __('List Type', 'nh'))
                    ->add_options(array(
                        'ul' => __('Unordered (Bullets)', 'nh'),
                        'ol' => __('Ordered (Numbers)', 'nh'),
                    ))
                    ->set_default_value('ul'),
            ))
            ->set_icon('editor-ul')
            ->set_keywords([__('list', 'nh'), __('bullets', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Quote
        Block::make(__('Core Quote', 'nh'))
            ->add_fields(array(
                Field::make('textarea', 'quote', __('Quote', 'nh'))
                    ->set_default_value(''),
                Field::make('text', 'cite', __('Citation/Author', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('editor-quote')
            ->set_keywords([__('quote', 'nh'), __('testimonial', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Code
        Block::make(__('Core Code', 'nh'))
            ->add_fields(array(
                Field::make('textarea', 'code', __('Code', 'nh'))
                    ->set_default_value(''),
                Field::make('text', 'language', __('Language (Optional)', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('editor-code')
            ->set_keywords([__('code', 'nh'), __('programming', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Details
        Block::make(__('Core Details', 'nh'))
            ->add_fields(array(
                Field::make('text', 'summary', __('Summary (Clickable)', 'nh'))
                    ->set_default_value(''),
                Field::make('rich_text', 'content', __('Hidden Content', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('list-view')
            ->set_keywords([__('details', 'nh'), __('accordion', 'nh'), __('summary', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Math
        Block::make(__('Core Math', 'nh'))
            ->add_fields(array(
                Field::make('textarea', 'formula', __('Math Formula (LaTeX)', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('editor-italic')
            ->set_keywords([__('math', 'nh'), __('formula', 'nh'), __('latex', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Preformatted
        Block::make(__('Core Preformatted', 'nh'))
            ->add_fields(array(
                Field::make('textarea', 'content', __('Content', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('editor-code')
            ->set_keywords([__('preformatted', 'nh'), __('text', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Pullquote
        Block::make(__('Core Pullquote', 'nh'))
            ->add_fields(array(
                Field::make('textarea', 'quote', __('Quote', 'nh'))
                    ->set_default_value(''),
                Field::make('text', 'cite', __('Citation/Author', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('editor-quote')
            ->set_keywords([__('pullquote', 'nh'), __('quote', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Table
        Block::make(__('Core Table', 'nh'))
            ->add_fields(array(
                Field::make('complex', 'rows', __('Table Rows', 'nh'))
                    ->add_fields(array(
                        Field::make('complex', 'columns', __('Columns', 'nh'))
                            ->add_fields(array(
                                Field::make('text', 'cell', __('Cell Content', 'nh')),
                            ))
                            ->set_layout('tabbed-horizontal'),
                    ))
                    ->set_layout('tabbed-vertical'),
            ))
            ->set_icon('editor-table')
            ->set_keywords([__('table', 'nh'), __('data', 'nh'), __('grid', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Verse
        Block::make(__('Core Verse', 'nh'))
            ->add_fields(array(
                Field::make('textarea', 'content', __('Content', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('editor-customchar')
            ->set_keywords([__('verse', 'nh'), __('poetry', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Classic
        Block::make(__('Core Classic', 'nh'))
            ->add_fields(array(
                Field::make('rich_text', 'content', __('Content', 'nh'))
                    ->set_default_value(''),
            ))
            ->set_icon('editor-kitchensink')
            ->set_keywords([__('classic', 'nh'), __('editor', 'nh'), __('tinymce', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Stretchy Paragraph
        Block::make(__('Stretchy Paragraph', 'nh'))
            ->add_fields(array(
                Field::make('rich_text', 'content', __('Content', 'nh'))
                    ->set_default_value(''),
                Field::make('checkbox', 'is_stretchy', __('Enable Stretchy Effect', 'nh'))
                    ->set_default_value(true),
            ))
            ->set_icon('editor-paragraph')
            ->set_keywords([__('stretchy', 'nh'), __('paragraph', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

        // Stretchy Heading
        Block::make(__('Stretchy Heading', 'nh'))
            ->add_fields(array(
                Field::make('text', 'content', __('Heading Text', 'nh'))
                    ->set_default_value(''),
                Field::make('select', 'level', __('Heading Level', 'nh'))
                    ->add_options(array(
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                    ))
                    ->set_default_value('h2'),
                Field::make('checkbox', 'is_stretchy', __('Enable Stretchy Effect', 'nh'))
                    ->set_default_value(true),
            ))
            ->set_icon('heading')
            ->set_keywords([__('stretchy', 'nh'), __('heading', 'nh')])
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),
    );


    // Theme Options
WpGraphQLCrbContainer::register(
    Container::make('theme_options', __('Theme Options'))
        ->add_fields(array(
            Field::make('select', 'view_mode', __('View Mode', 'nh'))
                ->add_options(array(
                    'developer' => __('Developer (Full Access)', 'nh'),
                    'content_management' => __('Content Management (Restricted Access)', 'nh'),
                ))
                ->set_default_value('developer')
                ->set_help_text(__('Choose between Developer or Content Management view.', 'nh')),

            // ✅ Language Switcher Checkbox
            Field::make('checkbox', 'enable_language_switcher', __('Enable Language Switcher', 'nh'))
                ->set_option_value('yes')
                ->set_default_value(false)
                ->set_help_text(__('Check to enable the language switcher in the frontend.', 'nh')),

            Field::make('file', 'website_logo', __('Main Logo', 'nh'))
                ->set_value_type('url'),

            Field::make('file', 'website_favicon', __('Favicon', 'nh'))
                ->set_value_type('url'),

            Field::make('text', 'site_title', __('Site Title', 'nh'))
                ->set_default_value(''),

            Field::make('textarea', 'site_description', __('Site Description', 'nh'))
                ->set_default_value(''),

            Field::make('text', 'button_text', __('Button Text', 'nh'))
                ->set_default_value(''),

            Field::make('radio', 'link_source', __('Link Source', 'nh'))
                ->add_options(array(
                    'internal' => __('Internal', 'nh'),
                    'custom' => __('Custom', 'nh'),
                ))
                ->set_default_value('internal'),
            Field::make('association', 'button_page', __('Button Page', 'nh'))
                ->set_types([
                    [
                        'type' => 'post',
                        'post_type' => 'page',
                    ],
                ])
                ->set_max(1)
                ->set_conditional_logic(array(
                    array(
                        'field' => 'link_source',
                        'value' => 'internal',
                    )
                )),
            Field::make('text', 'custom_url', __('Custom URL', 'nh'))
                ->set_conditional_logic(array(
                    array(
                        'field' => 'link_source',
                        'value' => 'custom',
                    )
                )),

            Field::make('text', 'email', __('Email Address', 'nh'))
                ->set_default_value(''),

            Field::make('textarea', 'address', __('Physical Address', 'nh'))
                ->set_default_value(''),

            Field::make('text', 'url', __('Frontend URL', 'nh'))
                ->set_default_value(''),

            Field::make('text', 'preconnect_url', __('Preconnect URL', 'nh'))
                ->set_default_value(''),
        ))
  );

}