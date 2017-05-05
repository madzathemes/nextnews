<?php

function nextnews_customize_header($wp_customize){



  $wp_customize->add_section('layout_settings', array(
    'title'    	=> esc_html__('Layouts', 'nextnews'),
    'panel'  => 'magazin_general'
  ));



	Kirki::add_field( 'nextnews_theme_options[boxed]', array(
		'type'        => 'radio-image',
		'settings'    => 'nextnews_theme_options[boxed]',
		'label'       => esc_html__( 'Page Layouts', 'nextnews' ),
		'section'     => 'general_style_settings',
		'default'     => '2',
		'option_type' => 'option',
		'priority'    => 10,
		'choices'     => array(
				'1'   => get_template_directory_uri() . '/inc/img/boxed.png',
				'2' => get_template_directory_uri() . '/inc/img/full.png',
			 ),
	));

	$wp_customize->add_section('nextnews_header', array(
        'title'    	=> esc_html__('Header', 'nextnews'),
        'priority' => 124,
    ));


	//	==================================================
    //  =============================
    //  = ==== Logo Options
    //  =============================
      $wp_customize->add_panel( 'panel_header', array(
    'priority'       => 300,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'    	=> esc_html__('Header', 'nextnews'),
    'description'    => '',
	) );


    $wp_customize->add_section('nextnews_logo', array(
        'title'    	=> esc_html__('Logo Image', 'nextnews'),
        'priority' => 122,

    'panel'  => 'panel_header',
    ));

    $wp_customize->add_section('nextnews_logo_settings', array(
        'title'    	=> esc_html__('Logo Settings', 'nextnews'),
        'priority' => 123,

    'panel'  => 'panel_header',
    ));



    //  =============================
    //  = Logo             =
    //  =============================
    $wp_customize->add_setting('nextnews_theme_options[header_logo]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'header_logo', array(
        'label'    => esc_html__('Upload Logo', 'nextnews'),
        'section'  => 'nextnews_logo',
        'settings' => 'nextnews_theme_options[header_logo]',
    )));

    //  = Logo Responsive            =
    $wp_customize->add_setting('nextnews_theme_options[header_logox2]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'header_logox2', array(
        'label'    => esc_html__('Upload Responsive Logo (x2)', 'nextnews'),
        'section'  => 'nextnews_logo',
        'settings' => 'nextnews_theme_options[header_logox2]',
    )));

    Kirki::add_field( 'nextnews_theme_options[mobile_logo]', array(
      'type'        => 'image',
      'settings'    => 'nextnews_theme_options[mobile_logo]',
      'label'       => esc_html__( 'Mobile Logo', 'nextnews' ),
      'section'     => 'nextnews_logo',
      'default'     => '',
      'option_type' => 'option',
      'priority'    => 10,
    ) );

    //  =============================
    //  = Logo Widht
    //  =============================

    Kirki::add_field( 'nextnews_theme_options[logo_width]', array(
    'type'        => 'number',
    'settings'    => 'nextnews_theme_options[logo_width]',
    'label'       => esc_attr__( 'Width', 'nextnews' ),
    'section'     => 'nextnews_logo_settings',
    'default'     => 176,
    'option_type' => 'option',
    'choices'     => array(
      'min'  => 20,
      'max'  => 500,
      'step' => 1,
    ),
  ) );

    //  =============================
    //  = Logo Height
    //  =============================

    Kirki::add_field( 'nextnews_theme_options[logo_height]', array(
    'type'        => 'number',
    'settings'    => 'nextnews_theme_options[logo_height]',
    'label'       => esc_attr__( 'Height', 'nextnews' ),
    'section'     => 'nextnews_logo_settings',
    'default'     => 40,
    'option_type' => 'option',
    'choices'     => array(
      'min'  => 20,
      'max'  => 200,
      'step' => 1,
    ),
  ) );

/*  Kirki::add_field( 'mt_space_logo', array(
  	'type'        => 'spacing',
  	'settings'    => 'mt_space_logo',
  	'label'       => __( 'Logo Padding', 'my_textdomain' ),
  	'section'     => 'nextnews_logo_settings',
  	'priority'    => 10,
  	'default'     => array(
  		'top'    => '20px',
  		'bottom' => '20px',
  	),
  ) );
  Kirki::add_field( 'mt_space_menu', array(
    'type'        => 'spacing',
    'settings'    => 'mt_space_menu',
    'label'       => __( 'Menu Padding', 'my_textdomain' ),
    'section'     => 'nextnews_logo_settings',
    'priority'    => 10,
    'default'     => array(
      'top'    => '20px',
      'bottom' => '20px',
    ),
  ) ); */


	 //  =============================
    //  = Logo margin Top
    //  =============================


    Kirki::add_field( 'nextnews_theme_options[logo_top]', array(
  	'type'        => 'number',
  	'settings'    => 'nextnews_theme_options[logo_top]',
  	'label'       => esc_attr__( 'Top Space', 'nextnews' ),
  	'section'     => 'nextnews_logo_settings',
  	'default'     => 18,
    'option_type' => 'option',
  	'choices'     => array(
  		'min'  => 0,
  		'max'  => 120,
  		'step' => 1,
  	),
  ) );

    //  =============================
    //  = Logo margin Bottom
    //  =============================
    Kirki::add_field( 'nextnews_theme_options[logo_bottom]', array(
  	'type'        => 'number',
  	'settings'    => 'nextnews_theme_options[logo_bottom]',
  	'label'       => esc_attr__( 'Top Space', 'nextnews' ),
  	'section'     => 'nextnews_logo_settings',
  	'default'     => 18,
    'option_type' => 'option',
  	'choices'     => array(
  		'min'  => 0,
  		'max'  => 120,
  		'step' => 1,
  	),
  ) );

    //  =============================
    //  = Logo Height fixed
    //  =============================
    $wp_customize->add_setting('nextnews_theme_options[mt_logo_h_f]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
	));

    $wp_customize->add_control('mt_logo_h_f', array(
        'label'    	=> esc_html__('Logo height (px)', 'nextnews'),
        'section'    => 'nextnews_menu_fixed',
        'description'    => esc_html__('Default: 40', 'nextnews'),
        'settings'   => 'nextnews_theme_options[mt_logo_h_f]',
    ));

    //	==================================================
    //  =============================
    //  = ==== Header Options
    //  =============================




    $wp_customize->add_section('nextnews_menu_mobile_', array(
        'title'    	=> esc_html__('Mobile Menu', 'nextnews'),
        'priority' => 126,
        'panel'  => 'panel_header',
    ));

      $wp_customize->add_section('nextnews_header_parallax', array(
        'title'    	=> esc_html__('Parallax', 'nextnews'),
        'priority' => 127,
        'panel'  => 'panel_header',
    ));





    //  =============================
    //  = Menu fixed
    //  =============================
    $wp_customize->add_setting('nextnews_theme_options[mt_menu_fix]', array(
    	'default'        => "",
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'esc_attr',
    ));

    $wp_customize->add_control('mt_menu_fix', array(
        'settings' => 'nextnews_theme_options[mt_menu_fix]',
        'label'    	=> esc_html__('On/Off', 'nextnews'),
        'priority'   => 2,
        'section'  => 'nextnews_menu_fixed',
        'type'     => 'checkbox',
    ));




    //  =============================
    //  = Menu Small on/off  	    =
    //  =============================
     $wp_customize->add_setting('nextnews_theme_options[mt_menu_small]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',

    ));
    $wp_customize->add_control( 'mt_menu_small', array(
        'settings' => 'nextnews_theme_options[mt_menu_small]',
        'label'    	=> esc_html__('Menu Icon', 'nextnews'),
        'section' => 'nextnews_menu_mobile',
        'type'    => 'select',
		'priority'   => 1,
        'choices'    => array(
        	'1' => 'Default',
            '2' => 'On',
			'3' => 'Off'

        ),
    ));





   //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('mt_color_mobile_bg', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mt_color_mobile_bg', array(
        'label'    => esc_html__('Mobile Menu Background', 'nextnews'),
        'section'  => 'nextnews_menu_mobile',
        'settings' => 'mt_color_mobile_bg',
    )));

     //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('mt_color_mobile_link', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mt_color_mobile_link', array(
        'label'    => esc_html__('Mobile Menu Link', 'nextnews'),
        'section'  => 'nextnews_menu_mobile',
        'settings' => 'mt_color_mobile_link',
    )));

      //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('mt_color_mobile_link_hover', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mt_color_mobile_link_hover', array(
        'label'    => esc_html__('Mobile Menu Link Hover', 'nextnews'),
        'section'  => 'nextnews_menu_mobile',
        'settings' => 'mt_color_mobile_link_hover',
    )));

      //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('mt_color_mobile_title', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mt_color_mobile_title', array(
        'label'    => esc_html__('Mobile Menu Title', 'nextnews'),
        'section'  => 'nextnews_menu_mobile',
        'settings' => 'mt_color_mobile_title',
    )));

       //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('mt_color_mobile_text', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mt_color_mobile_text', array(
        'label'    => esc_html__('Mobile Menu Text', 'nextnews'),
        'section'  => 'nextnews_menu_mobile',
        'settings' => 'mt_color_mobile_text',
    )));

       //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('mt_color_mobile_icon', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mt_color_mobile_icon', array(
        'label'    => esc_html__('Mobile Menu Social Icon', 'nextnews'),
        'section'  => 'nextnews_menu_mobile',
        'settings' => 'mt_color_mobile_icon',
    )));

       //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('mt_color_mobile_icon_hover', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mt_color_mobile_icon_hover', array(
        'label'    => esc_html__('Mobile Menu Social Icon Hover', 'nextnews'),
        'section'  => 'nextnews_menu_mobile',
        'settings' => 'mt_color_mobile_icon_hover',
    )));

     //  =============================
    //  = Header BG image          =
    //  =============================
    $wp_customize->add_setting('nextnews_theme_options[mt_mobile_menu_bg_img]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'default' => '',
        'sanitize_callback' => 'esc_url',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mt_mobile_menu_bg_img', array(
        'label'    => esc_html__('Mobile Menu BG Image', 'nextnews'),
        'section'  => 'nextnews_menu_mobile',
        'settings' => 'nextnews_theme_options[mt_mobile_menu_bg_img]',
    )));

    //  =============================
    //  = Shop on/off  	    =
    //  =============================
     $wp_customize->add_setting('nextnews_theme_options[mt_mobile_menu_bg_img_style]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',

    ));
    $wp_customize->add_control( 'mt_mobile_menu_bg_img_style', array(
        'settings' => 'nextnews_theme_options[mt_mobile_menu_bg_img_style]',
        'label'    	=> esc_html__('Mobile Menu BG Image Style', 'nextnews'),
        'section' => 'nextnews_menu_mobile',
        'type'    => 'select',
		'priority'   => 16,
        'choices'    => array(
        	'1' => 'Default',
            '2' => 'Cover',
			'3' => 'Repeat',
			'4' => 'No-Repeat'

        ),
    ));
    //  =============================
    //  = Shop on/off  	    =
    //  =============================
     $wp_customize->add_setting('nextnews_theme_options[mt_mobile_menu_bg_img_position]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',

    ));
    $wp_customize->add_control( 'mt_mobile_menu_bg_img_position', array(
        'settings' => 'nextnews_theme_options[mt_mobile_menu_bg_img_position]',
        'label'    	=> esc_html__('Mobile Menu BG Image Position', 'nextnews'),
        'section' => 'nextnews_menu_mobile',
        'type'    => 'select',
		'priority'   => 16,
        'choices'    => array(
	        '0' => 'Default',
        	'1' => 'Center',
            '2' => 'Top Center',
			'3' => 'Bottom Center',
			'4' => 'Left Center',
			'5' => 'Left Top',
			'6' => 'Left Bottom',
			'7' => 'Right Center',
			'8' => 'Right Top',
			'9' => 'Right Bottom'

        ),
    ));


    //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('mt_color_fixed_menu_bg', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mt_color_fixed_menu_bg', array(
        'label'    => esc_html__('Background color', 'nextnews'),
        'section'  => 'nextnews_menu_fixed',
        'settings' => 'mt_color_fixed_menu_bg',
    )));




		//  =============================
		//  = Header Top                =
		//  =============================
		$wp_customize->add_section('nextnews_header_top', array(
        'title'    	=> esc_html__('Header Top', 'nextnews'),
        'priority' => 124,
				'panel'  => 'panel_header',
    ));


   Kirki::add_field( 'mt_menu_small_on', array(
     	'type'        => 'switch',
     	'settings'    => 'mt_menu_small_on',
     	'label'       => esc_attr__( 'Small Menu For Desktop', 'nextnews' ),
     	'section'     => 'nextnews_header_top',
     	'default'     => 'on',
     	'priority'    => 10,
     	'choices'     => array(
     		'on'  => esc_attr__( 'On', 'nextnews' ),
     		'off' => esc_attr__( 'Off', 'nextnews' ),
     	),
   ) );



   Kirki::add_field( 'mt_menu_search', array(
       'type'        => 'switch',
       'settings'    => 'mt_menu_search',
       'label'       => esc_attr__( 'Search Button', 'nextnews' ),
       'section'     => 'nextnews_header_top',
       'default'     => 'on',
       'priority'    => 10,
       'choices'     => array(
      		'on'  => esc_attr__( 'On', 'nextnews' ),
      		'off' => esc_attr__( 'Off', 'nextnews' ),
      	),
   ) );

   Kirki::add_field( 'mt_header_top', array(
       'type'        => 'switch',
       'settings'    => 'mt_header_top',
       'label'       => esc_attr__( 'Header Top', 'nextnews' ),
       'section'     => 'nextnews_header_top',
       'default'     => 'on',
      	'priority'    => 10,
      	'choices'     => array(
      		'on'  => esc_attr__( 'On', 'nextnews' ),
      		'off' => esc_attr__( 'Off', 'nextnews' ),
      	),
   ) );
   Kirki::add_field( 'mt_top_follower', array(
       'type'        => 'switch',
       'settings'    => 'mt_top_follower',
       'label'       => esc_attr__( 'Header Top Follower Count', 'nextnews' ),
       'section'     => 'nextnews_header_top',
       'default'     => 'on',
       'priority'    => 10,
       'choices'     => array(
         'on'  => esc_attr__( 'On', 'nextnews' ),
         'off' => esc_attr__( 'Off', 'nextnews' ),
       ),
   ) );

   Kirki::add_field( 'mt_menu_share', array(
    'type'        => 'switch',
    'settings'    => 'mt_menu_share',
    'label'       => esc_attr__( 'Fixed Share Buttons', 'nextnews' ),
    'section'     => 'nextnews_header_top',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => array(
      'on'  => esc_attr__( 'On', 'nextnews' ),
      'off' => esc_attr__( 'Off', 'nextnews' ),
    ),
    ));

    Kirki::add_field( 'nextnews_theme_options[menu_fixed]', array(
     'type'        => 'select',
     'settings'    => 'nextnews_theme_options[menu_fixed]',
     'label'       => esc_attr__( 'Fixed Header', 'nextnews' ),
     'section'     => 'nextnews_header_top',
     'default'     => 'mt-fixed-up',
     'option_type' => 'option',
     'priority'    => 10,
     'multiple'    => 1,
     'choices'     => array(
       'mt-fixed-up' => esc_attr__( 'Show When Scroll Up', 'nextnews' ),
       'mt-fixed-always' => esc_attr__( 'Show Always', 'nextnews' ),
       'mt-fixed-disabled' => esc_attr__( 'Disable', 'nextnews' ),
     ),
     ));

}

add_action('customize_register', 'nextnews_customize_header');

?>
