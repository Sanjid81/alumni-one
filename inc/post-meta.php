<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;
use WpGraphQLCrb\Container as WpGraphQLCrbContainer;

function Postmeta()
{
    // Team Member Meta
    WpGraphQLCrbContainer::register(
    Container::make('post_meta', 'Team Member Details')
    ->where('post_type', '=', 'team_members')
    ->add_fields(array(
        Field::make('text', 'designation', __('Designation', 'nh')),
        Field::make('textarea', 'what_he_do', __('What he do', 'nh')),
    )));
    
    // Insight Meta
    WpGraphQLCrbContainer::register(
    Container::make('post_meta', 'Insight Details')
    ->where('post_type', '=', 'insights')
    ->add_fields(array(
        Field::make('textarea', 'insight_description', __('Description on homepage', 'nh')),
    )));
}

add_action('carbon_fields_register_fields', 'Postmeta');
