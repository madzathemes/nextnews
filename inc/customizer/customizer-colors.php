<?php
function nextnews_customize_colors($wp_customize){

  $wp_customize->add_section('header_ad_menu', array(
    'title'    	=> esc_html__('Header Ad Menu', 'nextnews'),
    'priority' => 1,
    'panel'  => 'magazin_ads',
  ));

  Kirki::add_field( 'global_theme_options[header_ad_menu]', array(
    'type'        => 'code',
    'settings'    => 'global_theme_options[header_ad_menu]',
    'label'       =>  esc_html__( 'YOUR AD CODE', 'nextnews' ),
    'section'     => 'header_ad_menu',
    'default'     => '',
    'priority'    => 1,
    'sanitize_callback' => 'do_not_filter_anything',
    'option_type' => 'option',
    'choices'     => array(
      'language' => 'css, html, javascript',
      'theme'    => 'monokai',
      'height'   => 250,
    ),
  ));

  $wp_customize->add_panel( 'colors_settings', array(
    'priority'       => 300,
    'capability'     => 'edit_theme_options',
    'title'    	=> esc_html__('Style', 'nextnews'),
  ));

  $wp_customize->add_section('general_style_settings', array(
    'title'    	=> esc_html__('General', 'nextnews'),
    'panel'  => 'colors_settings'
  ));

  $wp_customize->add_section('background_settings', array(
    'title'    	=> esc_html__('Background', 'nextnews'),
    'panel'  => 'colors_settings'
  ));

  Kirki::add_field( 'nextnews_theme_options[background_image]', array(
    'type'        => 'image',
    'settings'    => 'nextnews_theme_options[background_image]',
    'label'       => esc_html__( 'Background Image', 'nextnews' ),
    'section'     => 'background_settings',
    'default'     => '',
    'option_type' => 'option',
    'priority'    => 10,
  ) );

  Kirki::add_field( 'nextnews_theme_options[background_color]', array(
    'type'        => 'color',
    'settings'    => 'nextnews_theme_options[background_color]',
    'label'       => esc_html__( 'Background Color', 'nextnews' ),
    'section'     => 'background_settings',
    'default'     => '',
    'option_type' => 'option',
    'priority'    => 10,
  ) );

  Kirki::add_field( 'nextnews_theme_options[background_color_content]', array(
    'type'        => 'color',
    'settings'    => 'nextnews_theme_options[background_color_content]',
    'label'       => esc_html__( 'Background Color Wrap', 'nextnews' ),
    'section'     => 'background_settings',
    'default'     => '',
    'option_type' => 'option',
    'priority'    => 10,
  ) );


  // GENERAL COLORS //
  $wp_customize->add_section('colors_general', array(
    'title'    	=> esc_html__('General', 'nextnews'),
    'panel'  => 'colors_settings'
  ));


  Kirki::add_field( 'radius', array(
  'type'        => 'radio-buttonset',
  'settings'    => 'radius',
  'label'       => esc_html__( 'Border Radius', 'nextnews' ),
  'section'     => 'general_style_settings',
  'default'     => '5px',
  'priority'    => 1,
  'option_type' => 'option',
  'choices'     => array(
    '0px'   => esc_attr__( '0px', 'nextnews' ),
    '5px' => esc_attr__( '5px', 'nextnews' ),
    '25px' => esc_attr__( '25px', 'nextnews' ),
  ),
  ));

  Kirki::add_field( 'colors', array(
  'type'        => 'radio-buttonset',
  'settings'    => 'colors',
  'label'       => esc_html__( 'Color Sheme', 'nextnews' ),
  'section'     => 'general_style_settings',
  'default'     => 'color1',
  'priority'    => 1,
  'option_type'           => 'option',
  'choices'     => array(
    'color1'   => esc_attr__( 'Color 1', 'nextnews' ),
    'color2' => esc_attr__( 'Color 2', 'nextnews' ),
  ),
  ));

Kirki::add_field( 'zoom', array(
 'type'        => 'radio-buttonset',
 'settings'    => 'zoom',
 'label'       => esc_html__( 'Image Hover Zoom', 'nextnews' ),
 'section'     => 'general_style_settings',
 'default'     => 'on',
 'priority'    => 1,
 'option_type'           => 'option',
 'choices'     => array(
   'on'   => esc_attr__( 'Zoom On', 'nextnews' ),
   'off' => esc_attr__( 'Zoom Off', 'nextnews' )
 ),
));



  $wp_customize->add_setting('nextnews_theme_options[colors_default]', array(
      'capability'        => 'edit_theme_options',
      'type'           => 'option',
      'sanitize_callback' => 'sanitize_hex_color',
    ));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nextnews_theme_options[colors_default]', array(
      'label'    => esc_html__('Site Color', 'nextnews'),
      'section'  => 'general_style_settings',
      'settings' => 'nextnews_theme_options[colors_default]',
    )));

    Kirki::add_field( 'nextnews_theme_options[themecolor]', array(
     'type'        => 'select',
     'settings'    => 'nextnews_theme_options[themecolor]',
     'label'       => esc_html__( 'Theme Color Sheme', 'nextnews' ),
     'section'     => 'general_style_settings',
     'default'     => 'whitesmoke',
     'priority'    => 1,
     'option_type'           => 'option',
     'choices'     => array(
       'whitesmoke'   => esc_attr__( 'WhiteSmoke', 'nextnews' ),
       'white' => esc_attr__( 'White', 'nextnews' ),
       'black' => esc_attr__( 'Black', 'nextnews' ),
       'color' => esc_attr__( 'Color', 'nextnews' )
     ),
    ));

    Kirki::add_field( 'mt_colors_default', array(
      'type'        => 'multicolor',
      'settings'    => 'mt_colors_default',
      'label'       => esc_attr__( 'Site Color', 'nextnews' ),
      'section'     => 'general_style_settings',
      'option_type' => 'option',
      'priority'    => 1,
      'choices'     => array(
          'color'    => esc_attr__( 'Color', 'nextnews' ),
          'textinbackground'   => esc_attr__( 'Text If Background', 'nextnews' ),
      ),
      'default'     => array(
          'color'    => '',
          'textinbackground'    => '',
      ),
    ));


  $wp_customize->add_setting('nextnews_theme_options[colors_button]', array(
      'capability'        => 'edit_theme_options',
      'type'           => 'option',
      'sanitize_callback' => 'sanitize_hex_color',
    ));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nextnews_theme_options[colors_button]', array(
      'label'    => esc_html__('Form Button', 'nextnews'),
      'section'  => 'general_style_settings',
      'settings' => 'nextnews_theme_options[colors_button]',
  )));



  // MENU COLORS //
  $wp_customize->add_section('colors_menu', array(
    'title'    	=> esc_html__('Header & Menu Colors', 'nextnews'),
    'panel'  => 'colors_settings'
  ));




  Kirki::add_field( 'mt_colors_header', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_header',
    'label'       => esc_attr__( 'Top Bar', 'nextnews' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'background'    => esc_attr__( 'Background', 'nextnews' ),
        'link'   => esc_attr__( 'Link', 'nextnews' ),
        'hover'  => esc_attr__( 'Hover', 'nextnews' ),
        'bold'  => esc_attr__( 'Bold', 'nextnews' ),
    ),
    'default'     => array(
        'background'    => '',
        'link'    => '',
        'hover'    => '',
        'bold'    => ''
    ),
  ));


  Kirki::add_field( 'mt_colors_menu_bg', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_menu_bg',
    'label'       => esc_attr__( 'Menu Background', 'nextnews' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'in'    => esc_attr__( 'Background', 'nextnews' ),
    ),
    'default'     => array(
        'in'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_menu_link', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_menu_link',
    'label'       => esc_attr__( 'Menu Links', 'nextnews' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'text'    => esc_attr__( 'Links', 'nextnews' ),
        'text_hover'   => esc_attr__( 'Hover', 'nextnews' ),
        'border'  => esc_attr__( 'Background', 'nextnews' ),
    ),
    'default'     => array(
        'text'    => '',
        'text_hover'    => '',
        'border'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_menu_link_sub', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_menu_link_sub',
    'label'       => esc_attr__( 'Menu Sub Links', 'nextnews' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'text'    => esc_attr__( 'Lines', 'nextnews' ),
        'text_hover'   => esc_attr__( 'Hover', 'nextnews' ),
        'background'  => esc_attr__( 'Background', 'nextnews' ),
        'background_hover'  => esc_attr__( 'Hover', 'nextnews' ),
    ),
    'default'     => array(
        'text'    => '',
        'text_hover'    => '',
        'background'    => '',
        'background_hover'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_menu_button', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_menu_button',
    'label'       => esc_attr__( 'Menu Smart Button', 'nextnews' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'text'    => esc_attr__( 'Lines', 'nextnews' ),
        'text_hover'   => esc_attr__( 'Hover', 'nextnews' ),
    ),
    'default'     => array(
        'text'    => '',
        'text_hover'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_menu_search', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_menu_search',
    'label'       => esc_attr__( 'Menu Search', 'nextnews' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 1,
    'choices'     => array(
        'text'    => esc_attr__( 'Text', 'nextnews' ),
        'text_hover'   => esc_attr__( 'Hover', 'nextnews' ),
        'background'  => esc_attr__( 'Background', 'nextnews' ),
        'background_hover'  => esc_attr__( 'Hover', 'nextnews' ),
    ),
    'default'     => array(
        'text'    => '',
        'text_hover'    => '',
        'background'    => '',
        'background_hover'    => '',
    ),
  ));


  Kirki::add_field( 'mt_colors_menu_smart', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_menu_smart',
    'label'       => esc_attr__( 'Smart Menu', 'nextnews' ),
    'section'     => 'colors_menu',
    'option_type' => 'option',
    'priority'    => 100,
    'choices'     => array(
        'background'    => esc_attr__( 'Background', 'nextnews' ),
        'link'   => esc_attr__( 'Link', 'nextnews' ),
        'hover'  => esc_attr__( 'Hover', 'nextnews' ),
        'out'  => esc_attr__( 'Out', 'nextnews' ),
    ),
    'default'     => array(
        'background'    => '',
        'link'    => '',
        'hover'    => '',
        'out'    => '',
    ),
  ));


  // FOOTER COLORS //
  $wp_customize->add_section('colors_footer', array(
    'title'    	=> esc_html__('Footer Colors', 'nextnews'),
    'panel'  => 'colors_settings'
  ));


Kirki::add_field( 'mt_colors_footer_social', array(
  'type'        => 'multicolor',
  'settings'    => 'mt_colors_footer_social',
  'label'       => esc_attr__( 'Footer Social Icons', 'nextnews' ),
  'section'     => 'colors_footer',
  'option_type' => 'option',
  'choices'     => array(
      'icon'    => esc_attr__( 'Icon', 'nextnews' ),
      'hover'   => esc_attr__( 'Hover', 'nextnews' ),
      'background'   => esc_attr__( 'Background', 'nextnews' ),
      'background_hover'  => esc_attr__( 'Hover', 'nextnews' ),
  ),
  'default'     => array(
      'icon'    => '',
      'hover'    => '',
      'background'    => '',
      'background_hover'    => '',
  ),
));

Kirki::add_field( 'mt_colors_footer_bottom', array(
  'type'        => 'multicolor',
  'settings'    => 'mt_colors_footer_bottom',
  'label'       => esc_attr__( 'Footer Colors', 'nextnews' ),
  'section'     => 'colors_footer',
  'option_type' => 'option',
  'choices'     => array(
      'background'    => esc_attr__( 'Background', 'nextnews' ),
      'text'   => esc_attr__( 'Text', 'nextnews' ),
      'link'  => esc_attr__( 'Link', 'nextnews' ),
      'hover'  => esc_attr__( 'Hover', 'nextnews' ),
  ),
  'default'     => array(
      'background'    => '',
      'text'    => '',
      'link'    => '',
      'hover'    => '',
  ),
));


  // MENU COLORS //
  $wp_customize->add_section('colors_other', array(
    'title'    	=> esc_html__('Other Colors', 'nextnews'),
    'panel'  => 'colors_settings'
  ));


  Kirki::add_field( 'colors_post_share', array(
    'type'        => 'multicolor',
    'settings'    => 'colors_post_share',
    'label'       => esc_attr__( 'Post Share Count', 'nextnews' ),
    'section'     => 'colors_other',
    'option_type' => 'option',
    'priority'    => 100,
    'choices'     => array(
        'text'    => esc_attr__( 'Text', 'nextnews' ),
        'text_dark'   => esc_attr__( 'Photo bg', 'nextnews' ),
        'icon'   => esc_attr__( 'Icon', 'nextnews' ),
        'icon_dark'   => esc_attr__( 'Photo bg', 'nextnews' ),
    ),
    'default'     => array(
        'text'    => '',
        'text_dark'    => '',
        'icon'    => '',
        'icon_dark'    => '',
    ),
  ));
  Kirki::add_field( 'colors_post_view', array(
    'type'        => 'multicolor',
    'settings'    => 'colors_post_view',
    'label'       => esc_attr__( 'Post View Count', 'nextnews' ),
    'section'     => 'colors_other',
    'option_type' => 'option',
    'priority'    => 100,
    'choices'     => array(
        'text'    => esc_attr__( 'Text', 'nextnews' ),
        'text_dark'   => esc_attr__( 'Photo bg', 'nextnews' ),
        'icon'   => esc_attr__( 'Icon', 'nextnews' ),
        'icon_dark'   => esc_attr__( 'Photo bg', 'nextnews' ),
    ),
    'default'     => array(
        'text'    => '',
        'text_dark'    => '',
        'icon'    => '',
        'icon_dark'    => '',
    ),
  ));

  Kirki::add_field( 'mt_colors_cat', array(
    'type'        => 'multicolor',
    'settings'    => 'mt_colors_cat',
    'label'       => esc_attr__( 'Post List Category', 'nextnews' ),
    'section'     => 'colors_other',
    'option_type' => 'option',
    'priority'    => 100,
    'choices'     => array(
        'text'    => esc_attr__( 'Text', 'nextnews' ),
        'background'   => esc_attr__( 'Background', 'nextnews' ),
    ),
    'default'     => array(
        'text'    => '',
        'background'    => '',
    ),

  ));




}

add_action('customize_register', 'nextnews_customize_colors');

function mytheme_kirki_fields( $fields ) {
  $fields[] =  array(
    'type'        => 'background',
    'settings'    => 'mt_bg_header',
    'label'       => esc_attr__( 'Header', 'nextnews' ),
    'section'     => 'colors_menu',
    'priority'    => 1,
    'default'     => array(
            'color'    => 'rgba(25,170,141,0.7)',
            'image'    => '',
            'repeat'   => 'no-repeat',
            'size'     => 'cover',
            'attach'   => 'fixed',
            'position' => 'center-bottom',
        ),
        'output'      => '.mt-header'
  );

  $fields[] =  array(
    'type'        => 'multicolor',
    'settings'    => 'mt_bg_header_in',
    'label'       => esc_attr__( 'Header Bar Background', 'nextnews' ),
    'section'     => 'colors_menu',
    'priority'    => 1,
    'choices'     => array(
        'top'    => esc_attr__( 'Top Bar', 'nextnews' ),
        'head'   => esc_attr__( 'Head Bar', 'nextnews' ),
        'menu'   => esc_attr__( 'Menu Bar', 'nextnews' ),
    ),
    'default'     => array(
        'top'    => '',
        'head'    => '',
        'menu'    => '',
    ),
    'output'    => array(
      array(
        'choice'    => 'top',
        'element'   => '.mt-top-bar.box > div > div > div, .mt-top-bar.full > div, .mt-top-bar.stretched > div',
        'property'  => 'background-color',
      ),
      array(
        'choice'    => 'head',
        'element'   => '.mt-head-bar.box > div > div > div, .mt-head-bar.full > div, .mt-head-bar.stretched > div',
        'property'  => 'background-color',
      ),
      array(
        'choice'    => 'menu',
        'element'   => '.mt-menu-bar.box > div > div > div, .mt-menu-bar.full > div, .mt-menu-bar.stretched > div',
        'property'  => 'background-color',
      ),
    )
  );

  return $fields;
}
add_filter( 'kirki/fields', 'mytheme_kirki_fields' );



?>
