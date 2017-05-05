<?php

function nextnews_customize_footer($wp_customize){

	class nextnews_Customize_Textarea_Control extends WP_Customize_Control {

    public $type = 'textarea';

    public function render_content() {
	        ?>
	        <label>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	        </label>
	        <?php
	    }
	}

		$wp_customize->add_panel( 'panel_footer', array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'    	=> esc_html__('Footer', 'nextnews'),
			'priority' => 301,
		));


		//  =============================
    //  = ==== Footer
    //  =============================
    $wp_customize->add_section('nextnews_footer_settings', array(
        'title'    	=> esc_html__('Settings', 'nextnews'),
        'priority' => 125,
        'panel'  => 'panel_footer',
    ));

		$wp_customize->add_section('nextnews_icons', array(
				'title'    => esc_html__('Social Icons', 'nextnews'),
				'priority' => 128,
				'panel'  => 'magazin_general',
		));


		// ===
		// FOOTER BOTTOM SETTINGS
		$wp_customize->add_section('nextnews_footer_bottom', array(
				'title'    	=> esc_html__('Footer Settings', 'nextnews'),'priority' => 1,
				'panel'  => 'panel_footer',
		));

		// FOOTER PAGE SORCE
		$wp_customize->add_setting('nextnews_theme_options[footer_page]', array(
				'capability'     => 'edit_theme_options',
				'type'           => 'option',
        'sanitize_callback' => 'esc_attr'
		));
		$wp_customize->add_control('footer_page', array(
				'label'      => esc_html__('Footer Page', 'nextnews'),
				'section'    => 'nextnews_footer_bottom',
				'type'    => 'dropdown-pages',
				'settings'   => 'nextnews_theme_options[footer_page]',
		));

    //  FOOTER BOOTOM TOP
    $wp_customize->add_setting('nextnews_theme_options[footer_top]', array(
    		'default'        => "",
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'esc_attr',
    ));
		$wp_customize->add_control('mt_footer_top', array(
        'settings' => 'nextnews_theme_options[footer_top]',
        'label'    	=> esc_html__('Display Logo/About Us/Follow Us Area', 'nextnews'),
        'section'  => 'nextnews_footer_bottom',
        'type'     => 'checkbox',
    ));

		// FOOTER BOTTOM BOTTOM
    $wp_customize->add_setting('nextnews_theme_options[footer_bottom]', array(
        'capability' => 'edit_theme_options',
        'default'        => "",
        'type'       => 'option',
        'sanitize_callback' => 'esc_attr',
    ));
		$wp_customize->add_control('mt_footer_bottom', array(
        'settings' => 'nextnews_theme_options[footer_bottom]',
        'label'    	=> esc_html__('Display Copyright/Footer Menu Area', 'nextnews'),
        'section'  => 'nextnews_footer_bottom',
        'type'     => 'checkbox',
    ));

		// FOOTER LOGO
    $wp_customize->add_setting('nextnews_theme_options[footer_logo]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',

    ));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label'    => esc_html__('Upload Footer Logo', 'nextnews'),
        'section'  => 'nextnews_footer_bottom',
        'settings' => 'nextnews_theme_options[footer_logo]',
    )));

		// FOOTER LOGO
    $wp_customize->add_setting('nextnews_theme_options[footer_logox2]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'footer_logox2', array(
        'label'    => esc_html__('Upload Footer Logo Retina(x2)', 'nextnews'),
        'section'  => 'nextnews_footer_bottom',
        'settings' => 'nextnews_theme_options[footer_logox2]',
    )));


    //  COPYRIGHT
    $wp_customize->add_setting('nextnews_copyright_text', array(
        'default'    	=> esc_html__('Copyright 2016. Powered by WordPress Theme. By Madars Bitenieks', 'nextnews'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_attr',
		));
		$wp_customize->add_control( new nextnews_Customize_Textarea_Control( $wp_customize, 'nextnews_copyright_text', array(
        'label'    	=> esc_html__('Copyright Text', 'nextnews'),
        'section'    => 'nextnews_footer_bottom',
        'settings'   => 'nextnews_copyright_text',
    )));

		// END FOOTER BOTTOM SETTINGS
		// ===



				//  =============================
		    //  = Open Icon in new page
		    //  =============================
		    $wp_customize->add_setting('nextnews_theme_options[mt_icon_blank]', array(
		        'capability' => 'edit_theme_options',
		        'default'        => "off",
		        'type'       => 'option',
		        'sanitize_callback' => 'esc_attr',
		    ));

		    $wp_customize->add_control('mt_icon_blank', array(
		        'settings' => 'nextnews_theme_options[mt_icon_blank]',
		        'label'    	=> esc_html__('Open in new page', 'nextnews'),
		        'section'  => 'nextnews_icons',
		       'type'    => 'select',
		        'choices'    => array(
		        	'on' => 'On',
		            'off' => 'Off',
		        ),
		    ));

				//  =============================
		    //  = Social Icons
		    //  =============================
		    $wp_customize->add_setting('nextnews_theme_options[mt_icon_facebook]', array(
		        'default'        => '',
		        'capability'     => 'edit_theme_options',
		        'type'           => 'option',
		        'sanitize_callback' => 'esc_url',
		    ));
			$wp_customize->add_control('mt_icon_facebook', array(
		        'label'    	=> esc_html__('Facebook icon link', 'nextnews'),
		        'section'    => 'nextnews_icons',
		        'settings'   => 'nextnews_theme_options[mt_icon_facebook]',
		    ));

		    $wp_customize->add_setting('nextnews_theme_options[mt_icon_intagram]', array(
		        'default'        => '',
		        'capability'     => 'edit_theme_options',
		        'type'           => 'option',
		        'sanitize_callback' => 'esc_url',
		    ));
			$wp_customize->add_control('mt_icon_intagram', array(
		       'label'    	=> esc_html__('Instagram icon link', 'nextnews'),
		        'section'    => 'nextnews_icons',
		        'settings'   => 'nextnews_theme_options[mt_icon_intagram]',
		    ));

		    $wp_customize->add_setting('nextnews_theme_options[mt_icon_twitter]', array(
		        'default'        => '',
		        'capability'     => 'edit_theme_options',
		        'type'           => 'option',
		        'sanitize_callback' => 'esc_url',
		    ));
			$wp_customize->add_control('mt_icon_twitter', array(
		        'label'    	=> esc_html__('Twitter icon link', 'nextnews'),
		        'section'    => 'nextnews_icons',
		        'settings'   => 'nextnews_theme_options[mt_icon_twitter]',
		    ));

		    $wp_customize->add_setting('nextnews_theme_options[mt_icon_vimeo]', array(
		        'default'        => '',
		        'capability'     => 'edit_theme_options',
		        'type'           => 'option',
		        'sanitize_callback' => 'esc_url',
		    ));
			$wp_customize->add_control('mt_icon_vimeo', array(
		        'label'    	=> esc_html__('Vimeo icon link', 'nextnews'),
		        'section'    => 'nextnews_icons',
		        'settings'   => 'nextnews_theme_options[mt_icon_vimeo]',
		    ));

		    $wp_customize->add_setting('nextnews_theme_options[mt_icon_youtube]', array(
		        'default'        => '',
		        'capability'     => 'edit_theme_options',
		        'type'           => 'option',
		        'sanitize_callback' => 'esc_url',
		    ));
			$wp_customize->add_control('mt_icon_youtube', array(
		       'label'    	=> esc_html__('Youtube icon link', 'nextnews'),
		        'section'    => 'nextnews_icons',
		        'settings'   => 'nextnews_theme_options[mt_icon_youtube]',
		    ));

		    $wp_customize->add_setting('nextnews_theme_options[mt_icon_linkedin]', array(
		        'default'        => '',
		        'capability'     => 'edit_theme_options',
		        'type'           => 'option',
		        'sanitize_callback' => 'esc_url',
		    ));
			$wp_customize->add_control('mt_icon_linkedin', array(
		        'label'    	=> esc_html__('LinkedIn icon link', 'nextnews'),
		        'section'    => 'nextnews_icons',
		        'settings'   => 'nextnews_theme_options[mt_icon_linkedin]',
		    ));

		    $wp_customize->add_setting('nextnews_theme_options[mt_icon_gplus]', array(
		        'default'        => '',
		        'capability'     => 'edit_theme_options',
		        'type'           => 'option',
		        'sanitize_callback' => 'esc_url',
		    ));
			$wp_customize->add_control('mt_icon_gplus', array(
		       'label'    	=> esc_html__('Google plus link', 'nextnews'),
		        'section'    => 'nextnews_icons',
		        'settings'   => 'nextnews_theme_options[mt_icon_gplus]',
		    ));

		    $wp_customize->add_setting('nextnews_theme_options[mt_icon_dribble]', array(
		        'default'        => '',
		        'capability'     => 'edit_theme_options',
		        'type'           => 'option',
		        'sanitize_callback' => 'esc_url',
		    ));
			$wp_customize->add_control('mt_icon_dribble', array(
		        'label'    	=> esc_html__('Dribble icon link', 'nextnews'),
		        'section'    => 'nextnews_icons',
		        'settings'   => 'nextnews_theme_options[mt_icon_dribble]',
		    ));

		    $wp_customize->add_setting('nextnews_theme_options[mt_icon_skype]', array(
		        'default'        => '',
		        'capability'     => 'edit_theme_options',
		        'type'           => 'option',
		        'sanitize_callback' => 'esc_url',
		    ));
			$wp_customize->add_control('mt_icon_skype', array(
		        'label'    	=> esc_html__('Skype icon link', 'nextnews'),
		        'section'    => 'nextnews_icons',
		        'settings'   => 'nextnews_theme_options[mt_icon_skype]',
		    ));



		    $wp_customize->add_setting('nextnews_theme_options[mt_icon_pinterest]', array(
		        'default'        => '',
		        'capability'     => 'edit_theme_options',
		        'type'           => 'option',
		        'sanitize_callback' => 'esc_url',
		    ));
			$wp_customize->add_control('mt_icon_pinterest', array(
		        'label'    	=> esc_html__('Pinterest icon link', 'nextnews'),
		        'section'    => 'nextnews_icons',
		        'settings'   => 'nextnews_theme_options[mt_icon_pinterest]',
		    ));

		    $wp_customize->add_setting('nextnews_theme_options[mt_icon_rss]', array(
		        'default'        => '',
		        'capability'     => 'edit_theme_options',
		        'type'           => 'option',
		        'sanitize_callback' => 'esc_url',
		    ));
			$wp_customize->add_control('mt_icon_rss', array(
		        'label'    	=> esc_html__('Rss icon link', 'nextnews'),
		        'section'    => 'nextnews_icons',
		        'settings'   => 'nextnews_theme_options[mt_icon_rss]',
		    ));


}

add_action('customize_register', 'nextnews_customize_footer');

?>
