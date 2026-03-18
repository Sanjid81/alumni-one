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
        Block::make( __( 'Alumni Hero', 'alumni' ) )
        ->set_category( 'alumni', __( 'Alumni', 'alumni' ), 'cover-image' )
        ->add_fields( [
            Field::make( 'text', 'badge', __( 'Badge', 'alumni' ) ),
            Field::make( 'text', 'headline', __( 'Headline', 'alumni' ) ),
            Field::make( 'textarea', 'subheadline', __( 'Subheadline', 'alumni' ) ),
            Field::make( 'text', 'email_placeholder', __( 'Email placeholder', 'alumni' ) ),
            Field::make( 'text', 'primary_cta_label', __( 'Primary CTA label', 'alumni' ) ),
            Field::make( 'text', 'primary_cta_url', __( 'Primary CTA URL', 'alumni' ) ),
            Field::make( 'image', 'hero_image', __( 'Hero image', 'alumni' ) )->set_value_type( 'url' ),
        ] )
        ->set_icon('star-filled')
        ->set_keywords([__('Alumni Hero Custom Block', 'alumni')])
        ->set_description(__('Custom Block for Alumni Hero section', 'alumni'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),
             
    // Trusted Logos
        Block::make( __( 'Trusted Logos', 'alumni' ) )
        ->set_category( 'alumni', __( 'Alumni', 'alumni' ), 'cover-image' )
        ->add_fields( [
            Field::make( 'text', 'label', __( 'Label', 'alumni' ) ),
            Field::make( 'complex', 'logos', __( 'Logos', 'alumni' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( [
                    Field::make( 'text', 'name', __( 'Name', 'alumni' ) ),
                    Field::make( 'image', 'logo', __( 'Logo', 'alumni' ) )->set_value_type( 'url' ),
                ] ),
        ] )
        ->set_icon('star-filled')
        ->set_keywords([__('Trusted Logos Custom Block', 'alumni')])
        ->set_description(__('Custom Block for Trusted Logos section', 'alumni'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

// Problem Cards
        Block::make( __( 'Problem Cards', 'alumni' ) )
        ->set_category( 'alumni', __( 'Alumni', 'alumni' ), 'cover-image' )
        ->add_fields( [
            Field::make( 'text', 'title', __( 'Section title', 'alumni' ) ),
            Field::make( 'textarea', 'description', __( 'Section description', 'alumni' ) ),
            Field::make( 'complex', 'cards', __( 'Cards', 'alumni' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( [
                    Field::make( 'text', 'title', __( 'Card title', 'alumni' ) ),
                    Field::make( 'textarea', 'text', __( 'Card text', 'alumni' ) ),
                    Field::make( 'image', 'icon', __( 'Icon', 'alumni' ) )->set_value_type( 'url' ),
                ] ),
        ] )
        ->set_icon('star-filled')
        ->set_keywords([__('Problem Cards Custom Block', 'alumni')])
        ->set_description(__('Custom Block for Problem Cards section', 'alumni'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),


// Split Highlight
        Block::make( __( 'Split Highlight', 'alumni' ) )
        ->set_category( 'alumni', __( 'Alumni', 'alumni' ), 'cover-image' )
        ->add_fields( [
            Field::make( 'text', 'badge', __( 'Badge', 'alumni' ) ),
            Field::make( 'text', 'title', __( 'Title', 'alumni' ) ),
            Field::make( 'textarea', 'text', __( 'Text', 'alumni' ) ),
            Field::make( 'image', 'image', __( 'Image', 'alumni' ) )->set_value_type( 'url' ),
            Field::make( 'text', 'cta_label', __( 'CTA label', 'alumni' ) ),
            Field::make( 'text', 'cta_url', __( 'CTA URL', 'alumni' ) ),
            Field::make( 'checkbox', 'reverse', __( 'Reverse layout', 'alumni' ) )->set_option_value( 'yes' ),
        ] )
        ->set_icon('star-filled')
        ->set_keywords([__('Split Highlight Custom Block', 'alumni')])
        ->set_description(__('Custom Block for Split Highlight section', 'alumni'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),



// Feature Tabs
        Block::make( __( 'Feature Tabs', 'alumni' ) )
        ->set_category( 'alumni', __( 'Alumni', 'alumni' ), 'cover-image' )
        ->add_fields( [
            Field::make( 'text', 'badge', __( 'Badge', 'alumni' ) ),
            Field::make( 'text', 'title', __( 'Title', 'alumni' ) ),
            Field::make( 'textarea', 'subtitle', __( 'Subtitle', 'alumni' ) ),
            Field::make( 'complex', 'tabs', __( 'Tabs', 'alumni' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( [
                    Field::make( 'text', 'label', __( 'Tab label', 'alumni' ) ),
                    Field::make( 'text', 'title', __( 'Tab title', 'alumni' ) ),
                    Field::make( 'textarea', 'text', __( 'Tab text', 'alumni' ) ),
                    Field::make( 'image', 'side_image', __( 'Side image', 'alumni' ) )->set_value_type( 'url' ),
                ] ),
        ] )
        ->set_icon('star-filled')
        ->set_keywords([__('Feature Tabs Custom Block', 'alumni')])
        ->set_description(__('Custom Block for Feature Tabs section', 'alumni'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

// Three Steps
        Block::make( __( 'Three Steps', 'alumni' ) )
        ->set_category( 'alumni', __( 'Alumni', 'alumni' ), 'cover-image' )
        ->add_fields( [
            Field::make( 'text', 'badge', __( 'Badge', 'alumni' ) ),
            Field::make( 'text', 'title', __( 'Title', 'alumni' ) ),
            Field::make( 'complex', 'steps', __( 'Steps', 'alumni' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( [
                    Field::make( 'text', 'step_label', __( 'Step label', 'alumni' ) ),
                    Field::make( 'text', 'title', __( 'Step title', 'alumni' ) ),
                    Field::make( 'textarea', 'text', __( 'Step text', 'alumni' ) ),
                    Field::make( 'image', 'icon', __( 'Icon', 'alumni' ) )->set_value_type( 'url' ),

                ] ),
        ] )
        ->set_icon('star-filled')
        ->set_keywords([__('Three Steps Custom Block', 'alumni')])
        ->set_description(__('Custom Block for Three Steps section', 'alumni'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),


// Why Choose Grid
        Block::make( __( 'Why Choose Grid', 'alumni' ) )
        ->set_category( 'alumni', __( 'Alumni', 'alumni' ), 'cover-image' )
        ->add_fields( [
            Field::make( 'text', 'badge', __( 'Badge', 'alumni' ) ),
            Field::make( 'text', 'title', __( 'Title', 'alumni' ) ),
            Field::make( 'textarea', 'text', __( 'Intro text', 'alumni' ) ),
            Field::make( 'complex', 'reasons', __( 'Reasons', 'alumni' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( [
                    Field::make( 'text', 'title', __( 'Reason title', 'alumni' ) ),
                    Field::make( 'textarea', 'text', __( 'Reason text', 'alumni' ) ),
                    Field::make( 'file', 'icon', __( 'Icon', 'alumni' ) )
                        ->set_type( 'image' )
                        ->set_value_type( 'url' ),
                ] ),
        ] )
        ->set_icon('star-filled')
        ->set_keywords([__('Why Choose Grid Custom Block', 'alumni')])
        ->set_description(__('Custom Block for Why Choose Grid section', 'alumni'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),


// Pricing
        Block::make( __( 'Pricing', 'alumni' ) )
        ->set_category( 'alumni', __( 'Alumni', 'alumni' ), 'cover-image' )
        ->add_fields( [
            Field::make( 'text', 'title', __( 'Title', 'alumni' ) ),
            Field::make( 'textarea', 'subtitle', __( 'Subtitle', 'alumni' ) ),
            Field::make( 'text', 'toggle_monthly_label', __( 'Monthly label', 'alumni' ) ),
            Field::make( 'text', 'toggle_yearly_label', __( 'Yearly label', 'alumni' ) ),
            Field::make( 'complex', 'plans', __( 'Plans', 'alumni' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( [
                    Field::make( 'text', 'name', __( 'Plan name', 'alumni' ) ),
                    Field::make( 'text', 'badge', __( 'Badge', 'alumni' ) ),
                    Field::make( 'text', 'price', __( 'Price', 'alumni' ) ),
                    Field::make( 'text', 'period', __( 'Period', 'alumni' ) ),
                    Field::make( 'textarea', 'text', __( 'Reason text', 'alumni' ) ),
                    Field::make( 'checkbox', 'featured', __( 'Featured', 'alumni' ) )->set_option_value( 'yes' ),
                    Field::make( 'complex', 'features', __( 'Features', 'alumni' ) )
                        ->set_layout( 'tabbed-horizontal' )
                        ->add_fields( [
                            Field::make( 'text', 'text', __( 'Feature text', 'alumni' ) ),
                        ] ),
                    Field::make( 'text', 'cta_label', __( 'CTA label', 'alumni' ) ),
                    Field::make( 'text', 'cta_url', __( 'CTA URL', 'alumni' ) ),
                    Field::make( 'checkbox', 'cta_highlighted', __( 'CTA highlighted', 'alumni' ) )->set_option_value( 'yes' ),
                ] ),
        ] )
        ->set_icon('star-filled')
        ->set_keywords([__('Pricing Custom Block', 'alumni')])
        ->set_description(__('Custom Block for Pricing section', 'alumni'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),


// Testimonials
        Block::make( __( 'Testimonials', 'alumni' ) )
        ->set_category( 'alumni', __( 'Alumni', 'alumni' ), 'cover-image' )
        ->add_fields( [
            Field::make( 'text', 'title', __( 'Title', 'alumni' ) ),
            Field::make( 'complex', 'items', __( 'Testimonials', 'alumni' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( [
                    Field::make( 'image', 'photo', __( 'Photo', 'alumni' ) )->set_value_type( 'url' ),
                    Field::make( 'textarea', 'quote', __( 'Quote', 'alumni' ) ),
                    Field::make( 'text', 'name', __( 'Name', 'alumni' ) ),
                    Field::make( 'text', 'role', __( 'Role', 'alumni' ) ),
                    Field::make( 'text', 'insitution', __( 'Insitution', 'alumni' ) ),
                ] ),
        ] )
        ->set_icon('star-filled')
        ->set_keywords([__('Testimonials Custom Block', 'alumni')])
        ->set_description(__('Custom Block for Testimonials section', 'alumni'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),

// FAQ
        Block::make( __( 'FAQ', 'alumni' ) )
        ->set_category( 'alumni', __( 'Alumni', 'alumni' ), 'cover-image' )
        ->add_fields( [
            Field::make( 'text', 'title', __( 'Title', 'alumni' ) ),
            Field::make( 'complex', 'items', __( 'FAQ items', 'alumni' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( [
                    Field::make( 'text', 'question', __( 'Question', 'alumni' ) ),
                    Field::make( 'textarea', 'answer', __( 'Answer', 'alumni' ) ),
                ] ),
        ] )
        ->set_icon('star-filled')
        ->set_keywords([__('FAQ Custom Block', 'alumni')])
        ->set_description(__('Custom Block for FAQ section', 'alumni'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),


// Final Call To Action
        Block::make( __( 'Final Call To Action', 'alumni' ) )
        ->set_category( 'alumni', __( 'Alumni', 'alumni' ), 'cover-image' )
        ->add_fields( [
            Field::make( 'text', 'title', __( 'Title', 'alumni' ) ),
            Field::make( 'textarea', 'text', __( 'Text', 'alumni' ) ),
            Field::make( 'text', 'cta_label', __( 'CTA label', 'alumni' ) ),
            Field::make( 'text', 'cta_url', __( 'CTA URL', 'alumni' ) ),
            Field::make( 'checkbox', 'cta_highlighted', __( 'CTA highlighted', 'alumni' ) )->set_option_value( 'yes' ),
            Field::make( 'image', 'background', __( 'Background image', 'alumni' ) )->set_value_type( 'url' ),
        ] )
        ->set_icon('star-filled')
        ->set_keywords([__('Final Call To Action Custom Block', 'alumni')])
        ->set_description(__('Custom Block for Final Call To Action section', 'alumni'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {}),


    );


    // Theme Options


}