<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    wezido
 * @subpackage wezido/admin/partials
 */

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'wezido_options';

  //
  // Create options
   //
  // Create options
  CSF::createOptions( $prefix, array(

    // framework title
    'framework_title'         => 'Wezido <small>by Teconce</small>',
    'framework_class'         => '',

    // menu settings
    'menu_title'              => 'Wezido',
    'menu_slug'               => 'wezido',
    'menu_type'               => 'menu',
    'menu_capability'         => 'manage_options',
    'menu_icon'               => 'dashicons-heart',
    'menu_position'           => 6,
    'menu_hidden'             => false,
    'menu_parent'             => '',

    // menu extras
    'show_bar_menu'           => true,
    'show_sub_menu'           => true,
    'show_in_network'         => true,
    'show_in_customizer'      => false,

    'show_search'             => true,
    'show_reset_all'          => false,
    'show_reset_section'      => false,
    'show_footer'             => false,
    'show_all_options'        => true,
    'show_form_warning'       => true,
    'sticky_header'           => false,
    'save_defaults'           => true,
    'ajax_save'               => true,

    // admin bar menu settings
    'admin_bar_menu_icon'     => '',
    'admin_bar_menu_priority' => 80,

    // footer
    'footer_text'             => '',
    'footer_after'            => '',
    'footer_credit'           => 'Thank you for using Wezido. Powered by <a href="https://teconce.com">Teconce</a>',

    // database model
    'database'                => '', // options, transient, theme_mod, network
    'transient_time'          => 0,

    // contextual help
    'contextual_help'         => array(),
    'contextual_help_sidebar' => '',

    // typography options
    'enqueue_webfont'         => true,
    'async_webfont'           => false,

    // others
    'output_css'              => true,

    // theme and wrapper classname
    'nav'                     => 'inline',
    'theme'                   => 'light',
    'class'                   => '',

    // external default values
    'defaults'                => array(),

  ) );

 CSF::createSection( $prefix, array(
    'title'  => 'Welcome',
    'icon' =>'dashicons dashicons-buddicons-groups',
     'class' =>'wezido-col-4',
    'fields' => array(
        
         array(
      'id'         => 'wezido_w_text',
      'type'       => 'wezwelcometext',
      'title'      => '',
    ),
    
     array(
      'id'         => 'wezido_m_banner',
      'type'       => 'mayosisbanner',
      'title'      => '',
    ),
        )
        
        ));

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Widgets',
    'icon' =>'dashicons dashicons-tagcloud',
     'class' =>'wezido-col-4',
    'fields' => array(

    array(
      'id'         => 'wezido_title',
      'type'       => 'switcher',
      'title'      => 'Heading',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
     array(
      'id'         => 'wezido_team',
      'type'       => 'switcher',
      'title'      => 'Team Member',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
      array(
      'id'         => 'wezido_flipbox',
      'type'       => 'switcher',
      'title'      => 'Flipbox',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
    
     array(
      'id'         => 'wezido_before_after',
      'type'       => 'switcher',
      'title'      => 'Before After',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
      array(
      'id'         => 'wezido_pricing_table',
      'type'       => 'switcher',
      'title'      => 'Pricing Table',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
      array(
      'id'         => 'wezido_counter',
      'type'       => 'switcher',
      'title'      => 'Counter',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
    
    
    array(
      'id'         => 'wezido_blog',
      'type'       => 'switcher',
      'title'      => 'Blog Post',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
    array(
      'id'         => 'wezido_blog_cat',
      'type'       => 'switcher',
      'title'      => 'Blog Category',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
   
     array(
      'id'         => 'wezido_edd_recent',
      'type'       => 'switcher',
      'title'      => 'EDD Recent',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
     array(
      'id'         => 'wezido_edd_masonry',
      'type'       => 'switcher',
      'title'      => 'EDD Masonry',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
      array(
      'id'         => 'wezido_edd_justified',
      'type'       => 'switcher',
      'title'      => 'EDD Justified',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
    
     array(
      'id'         => 'wezido_edd_cat',
      'type'       => 'switcher',
      'title'      => 'EDD Category',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),

  

    )
  ) );
  
  
  
  
  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Scripts',
    'icon' => 'dashicons dashicons-embed-generic',
    'class' =>'wezido-col-3',
    'fields' => array(

       array(
      'id'         => 'wezido_beer_slider',
      'type'       => 'switcher',
      'title'      => 'Beer Slider',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
    array(
      'id'         => 'wezido_before_after_js',
      'type'       => 'switcher',
      'title'      => 'Beer Slider',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
    array(
      'id'         => 'wezido_flipbox_js',
      'type'       => 'switcher',
      'title'      => 'Flipbox JS',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
    array(
      'id'         => 'wezido_counterup',
      'type'       => 'switcher',
      'title'      => 'Counter UP JS',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),

    array(
      'id'         => 'wezido_counter_js',
      'type'       => 'switcher',
      'title'      => 'Counter JS',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    
    array(
      'id'         => 'wezido_gridzy_js',
      'type'       => 'switcher',
      'title'      => 'Gridzy JS',
      'text_on'    => 'Enabled',
      'text_off'   => 'Disabled',
      'text_width' => 100,
      'default' => true,
    ),
    

    )
  ) );

}

// A Custom function for get an option
if ( ! function_exists( 'wezido_get_option' ) ) {
  function wezido_get_option( $option = '', $default = null ) {
    $options = get_option( 'wezido_options' ); // Attention: Set your unique id of the framework
    return ( isset( $options[$option] ) ) ? $options[$option] : $default;
  }
}
