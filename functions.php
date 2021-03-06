<?php

/*-----------------------------------------------------------------------------------*/
/* Function
/*-----------------------------------------------------------------------------------*/
require get_template_directory() .'/inc/functions/functions-widget.php';
require get_template_directory() .'/inc/functions/functions-header.php';
require get_template_directory() .'/inc/functions/functions-hooks.php';
require get_template_directory() .'/inc/functions/functions-comment.php';
require get_template_directory() .'/inc/functions/functions-plugins.php';
require get_template_directory() .'/inc/functions/functions-general.php';
require get_template_directory() .'/inc/functions/functions-title.php';
require get_template_directory() .'/inc/functions/functions-footer.php';

/*-----------------------------------------------------------------------------------*/
/* Customizer
/*-----------------------------------------------------------------------------------*/
if (class_exists('Kirki')) {
require get_template_directory() .'/inc/customizer/customizer-fonts.php';
require get_template_directory() .'/inc/customizer/customizer-footer.php';
require get_template_directory() .'/inc/customizer/customizer-header.php';
require get_template_directory() .'/inc/customizer/customizer-posts.php';
require get_template_directory() .'/inc/customizer/customizer-colors.php';
}

/*-----------------------------------------------------------------------------------*/
/* Single
/*-----------------------------------------------------------------------------------*/
require get_template_directory() .'/inc/single/single-heads.php';
require get_template_directory() .'/inc/single/single-media.php';
require get_template_directory() .'/inc/single/single-sidebar.php';
require get_template_directory() .'/inc/single/single-content.php';
require get_template_directory() .'/inc/single/single-styles.php';

/*-----------------------------------------------------------------------------------*/
/* Theme Setup
/*-----------------------------------------------------------------------------------*/
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

function nextnews_theme_setup() {

	add_editor_style();
	add_theme_support( 'post-formats', array('video', 'gallery') );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( "title-tag" );

	load_theme_textdomain( 'nextnews', get_template_directory() . '/languages' );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	set_post_thumbnail_size( 999, 999, true );
	add_image_size( 'nextnews_810', 854, 9999, false );

	register_nav_menus( array(
		'primary' => esc_html__( 'Header Menu', 'nextnews' ),
		'top_menu' => esc_html__( 'Top Navigation', 'nextnews' ),
		'mobile' => esc_html__( 'Mobile Menu', 'nextnews' ),
		'footer_menu' => esc_html__( 'Footer Navigation', 'nextnews' ),
	) );
	if ( ! isset( $content_width ) ) { $content_width = 900; }


}

add_action( 'after_setup_theme', 'nextnews_theme_setup' );

/*-----------------------------------------------------------------------------------*/
/* Default Options
/*-----------------------------------------------------------------------------------*/


if ( ! isset( $content_width ) ) {
	$content_width = 740;
}

function nextnews_import_files() {
    return array(
        array(
            'import_file_name'             => esc_html__( 'Demo 1', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo1/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo1/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo1/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews01.png',
						'preview_url'                => 'https://nextnews01.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 2', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo2/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo2/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo2/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews02.png',
						'preview_url'                => 'https://nextnews02.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 3', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo3/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo3/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo3/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews03.png',
						'preview_url'                => 'https://nextnews03.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 4', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo4/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo4/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo4/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews04.png',
						'preview_url'                => 'https://nextnews04.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 5', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo5/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo5/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo5/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews05.png',
						'preview_url'                => 'https://nextnews05.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 6', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo6/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo6/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo6/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews06.png',
						'preview_url'                => 'https://nextnews06.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 7', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo7/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo7/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo7/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews07.png',
						'preview_url'                => 'https://nextnews07.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 8', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo8/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo8/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo8/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews08.png',
						'preview_url'                => 'https://nextnews08.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 9', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo9/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo9/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo9/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews09.png',
						'preview_url'                => 'https://nextnews09.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 10', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo10/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo10/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo10/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews10.png',
						'preview_url'                => 'https://nextnews10.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 11', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo11/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo11/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo11/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews11.png',
						'preview_url'                => 'https://nextnews11.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 12', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo12/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo12/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo12/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews12.png',
						'preview_url'                => 'https://nextnews12.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 13', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo13/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo13/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo13/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews13.png',
						'preview_url'                => 'https://nextnews13.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 14', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo14/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo14/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo14/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews14.png',
						'preview_url'                => 'https://nextnews14.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 15', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo15/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo15/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo15/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews15.png',
						'preview_url'                => 'https://nextnews15.madzathemes.com/',
        ),
				array(
            'import_file_name'             => esc_html__( 'Demo 16', 'nextnews' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo16/demo.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/import/demo16/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo16/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'nextnews' ),
						'import_preview_image_url'   => 'http://nextnews01.madzathemes.staging.wpengine.com/wp-content/uploads/sites/10/2017/08/nextnews16.png',
						'preview_url'                => 'https://nextnews16.madzathemes.com/',
        )
    );
}
add_filter( 'pt-ocdi/import_files', 'nextnews_import_files' );

function nextnews_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Header', 'nav_menu' );
		$mobile_menu = get_term_by( 'name', 'Mobile Menu', 'nav_menu' );
		$top_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
		$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
						'mobile' => $mobile_menu->term_id,
						'top_menu' => $top_menu->term_id,
						'footer_menu' => $footer_menu->term_id,
        )
    );
		wp_delete_post(1);
    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Homepage 5' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'nextnews_after_import_setup' );
