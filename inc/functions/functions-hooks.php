<?php
function nextnews_css() {

	wp_enqueue_style('nextnews-style', get_stylesheet_uri());

	$custom_styles = '';
	$options = get_option("nextnews_theme_options");

	// Menu Spacing
	$p = get_theme_mod( 'mt_bar_top_padding', array('top' => '0px', 'bottom' => '0px', 'left' => '20px', 'right' => '20px',));
	if($p["top"] != "0px" or $p["bottom"] != "0px" or $p["left"] != "20px" or $p["right"] != "20px"){ $custom_styles .='.mt-top-bar.box .mt-bar-in, .mt-top-bar.ful .container { padding: '. esc_attr($p['top']) .' '. esc_attr($p['right']) .' '. esc_attr($p['bottom']) .' '. esc_attr($p['left']) .' } '; }

	$p = get_theme_mod( 'mt_bar_head_padding', array('top' => '10px', 'bottom' => '10px', 'left' => '20px', 'right' => '20px',));
	if($p["top"] != "10px" or $p["bottom"] != "10px" or $p["left"] != "20px" or $p["right"] != "20px"){ $custom_styles .='.mt-head-bar.box .mt-bar-in, .mt-head-bar.ful .container { padding: '. esc_attr($p['top']) .' '. esc_attr($p['right']) .' '. esc_attr($p['bottom']) .' '. esc_attr($p['left']) .' } '; }

	$p = get_theme_mod( 'mt_bar_menu_padding', array('top' => '0px', 'bottom' => '0px', 'left' => '20px', 'right' => '20px',));
	if($p["top"] != "0px" or $p["bottom"] != "0px" or $p["left"] != "20px" or $p["right"] != "20px"){ $custom_styles .='.mt-menu-bar.box .mt-bar-in, .mt-menu-bar.ful .container { padding: '. esc_attr($p['top']) .' '. esc_attr($p['right']) .' '. esc_attr($p['bottom']) .' '. esc_attr($p['left']) .' } '; }


	$p = get_theme_mod( 'mt_bar_fixed_padding', array('top' => '0px', 'bottom' => '0px', 'left' => '20px', 'right' => '20px',));
	if($p["top"] != "0px" or $p["bottom"] != "0px" or $p["left"] != "20px" or $p["right"] != "20px"){ $custom_styles .='.fixed-on.fixed-padding  .mt-menu-bar.box .mt-bar-in,.fixed-on.fixed-padding  .mt-menu-bar.ful .container { padding: '. esc_attr($p['top']) .' '. esc_attr($p['right']) .' '. esc_attr($p['bottom']) .' '. esc_attr($p['left']) .' } '; }


	if(get_theme_mod( 'mt_bar_top_margin_top', '0px') != "0px"){ $custom_styles .='.mt-top-bar { padding-top: '. get_theme_mod( 'mt_bar_top_margin_top', '0px') .' } '; }

	if(get_theme_mod( 'mt_bar_head_margin_top', '0px') != "0px"){ $custom_styles .='.mt-head-bar { padding-top: '. get_theme_mod( 'mt_bar_head_margin_top', '0px') .' } '; }

	if(get_theme_mod( 'mt_bar_menu_margin_top', '0px') != "0px"){ $custom_styles .='.mt-menu-bar { padding-top: '. get_theme_mod( 'mt_bar_menu_margin_top', '0px') .' } '; }


	if(get_theme_mod( 'mt_fixed_menu_logo_w', '200px') != "200px") { $custom_styles .='.fix-menu.fixed-logo-active .mt-menu-bar-brand-hidde.mt-menu-bar-brand > a.logo-fixed > img { width: '.get_theme_mod( 'mt_fixed_menu_logo_w', '200px').' !important; }'; }


	$options_in = get_option("mt_colors_default");
	if(!empty($options_in)){
		if(!empty($options_in['color'])){
			$custom_styles .='
			.mt-theme-text,
			.fixed-top-menu ul li a:hover,
			a:hover,
			.nav-single .next div:after,
			.nav-single .previous div:before,
			.mt-top-followers strong,
			.header-mt-container-wrap a:hover { color:'. esc_attr($options_in['color']) .'; }
			.mt-theme-background,
			button:hover,
			input[type="submit"]:hover,
			input[type="button"]:hover,
			.sf-menu > li.current_page_item > a::before,
			.sf-menu > li > a::before,
			ul.sf-menu ul li.current-cat > a, div.sf-menu ul ul ul li.current-cat > a,
			ul.sf-menu ul li.current-menu-item > a, div.sf-menu ul ul ul li.current-menu-item > a,
			ul.sf-menu ul li.current_page_item > a, div.sf-menu ul ul ul li.current_page_item > a,
			ul.sf-menu ul li.current-menu-ancestor > a, div.sf-menu ul ul ul li.current-menu-ancestor > a,
			ul.sf-menu ul li a:hover, div.sf-menu ul ul li a:hover,
			.head-bookmark a:hover,
			.hover-menu a:hover,
			.nav-links a:hover,
			.poster-next:hover,
			.poster-prev:hover,
			.post-gallery-nav .slick-arrow.slick-prev:hover:before,
			.post-gallery-nav .slick-arrow.slick-next:hover:before,
			.single-cat-wrap .post-categories li a,
			.mt-load-more:hover,
			.mt-tabc:before,
			.mt-subscribe-footer input.mt-s-b:hover,
			.poster:hover h2, .poster-small:hover h4, .poster-small-bottom:hover h4,
			.poster-cat span {';
			if(!empty($options_in['textinbackground'])){
				$custom_styles .=' color: '. esc_attr($options_in['textinbackground']) .'!important; ';
			}
			$custom_styles .=' background: '. esc_attr($options_in['color']) .'; }';
			if(!empty($options_in['textinbackground'])){
				$custom_styles .=' .footer-scroll-to-top:before,
				.top-nav a:hover,
				.sf-menu > li.current_page_item > a,
				.poster.size-normal .poster-cat span, .poster.trending-normal .poster-cat span, .poster.trending-carousel .poster-cat span { color: '. esc_attr($options_in['textinbackground']) .'!important; }';
			}
	 }
	} else {

		// Default Color
		if(!empty($options['colors_default'])){
				$custom_styles .='
				.mt-theme-text,
				.fixed-top-menu ul li a:hover,
				a:hover,
				.nav-single .next div:after,
				.nav-single .previous div:before { color:'. esc_attr($options['colors_default']) .'; }
				.mt-theme-background,
				button:hover,
				input[type="submit"]:hover,
				input[type="button"]:hover,
				.sf-menu > li.current_page_item > a::before,
				.sf-menu > li > a::before,
				ul.sf-menu ul li.current-cat > a, div.sf-menu ul ul ul li.current-cat > a,
				ul.sf-menu ul li.current-menu-item > a, div.sf-menu ul ul ul li.current-menu-item > a,
				ul.sf-menu ul li.current_page_item > a, div.sf-menu ul ul ul li.current_page_item > a,
				ul.sf-menu ul li.current-menu-ancestor > a, div.sf-menu ul ul ul li.current-menu-ancestor > a,
				ul.sf-menu ul li a:hover, div.sf-menu ul ul li a:hover,
				.head-bookmark a:hover,
				.hover-menu a:hover,
				.nav-links a:hover,
				.poster-next:hover,
				.poster-prev:hover,
				.post-gallery-nav .slick-arrow.slick-prev:hover:before,
				.post-gallery-nav .slick-arrow.slick-next:hover:before,
				.single-cat-wrap .post-categories li a,
				.mt-load-more:hover,
				.mt-tabc:before,
				.mt-subscribe-footer input.mt-s-b:hover { background: '. esc_attr($options['colors_default']) .'; }';
		 }
	 }

	 // Button Color
	 if(!empty($options['colors_button'])){
 			$custom_styles .='
			button,
			input[type="submit"],
			input[type="button"],
			.head-bookmark a,
			.mt-subscribe-footer input.mt-s-b { background:'. esc_attr($options['colors_button']) .'; }';
 	 }

	 // Background Color
	 $style = get_post_meta(get_the_ID(), "magazin_background_color", true);
	if (!empty($options['background_color'])) {
	 		$custom_styles .='body { background-color: '. esc_attr($options['background_color']) .'; }';
	 }

	 // Background Color
	 if(!empty($options['background_color_content'])){
	 		$custom_styles .='.post-content-wrap, .post-style-6 .post-media-wrap, .post-style-4 .post-media-wrap, .header-wrap, .footer-wrap, .mt-container-wrap, .single-top, .post-media-wrap { background-color: '. esc_attr($options['background_color_content']) .'!important }';
	 }

	 // Logo Margin
	 if(!empty($options['logo_top'])){
	 		$custom_styles .='.head-logo { padding-top: '. esc_attr($options['logo_top']) .'px }';
	 }
	 if(!empty($options['logo_bottom'])){
	 		$custom_styles .='.head-logo { padding-bottom: '. esc_attr($options['logo_bottom']) .'px } ';
	 }

	 // Social Icon
	 if(!empty($options['colors_social_hover'])){
		 $custom_styles .='.socials a:after { background:'. esc_attr($options['colors_social_hover']) .'!important; }';
	 }

	 // Menu
	 if(!empty($options['colors_menu_bg'])){
		 $custom_styles .='.header-menu { background:'. esc_attr($options['colors_menu_bg']) .'!important; }';
	 }


	 if(!empty($options['colors_menu_hover']) or !empty($options['colors_menu_hover_text'])){
		 	$custom_styles .='.sf-menu li a:hover,
		 	.sf-menu > li:hover > a,
		 	.sf-menu li.sfHover,
		 	ul.sf-menu li.current-cat > a, div.sf-menu ul ul li.current-cat > a,
		 	ul.sf-menu li.current_page_item > a, div.sf-menu ul ul li.current_page_item > a,
		 	ul.sf-menu li.current-menu-item > a, div.sf-menu ul ul li.current-menu-item > a,
		 	ul.sf-menu li.current-menu-ancestor > a, div.sf-menu ul ul li.current-menu-ancestor > a,
		 	.sf-menu li.current_page_item::before, .sf-menu li:hover::before {';
		 		if(!empty($options['colors_menu_hover'])){ $custom_styles .='background: '. esc_attr($options['colors_menu']); }
		 		if(!empty($options['colors_menu_hover_text'])){ $custom_styles .='color: '. esc_attr($options['colors_menu']); }
		 $custom_styles .='}';
		}

	$options_in = get_option("mt_colors_header");
 	if(!empty($options_in['background'])){ $custom_styles .='.header-mt-container-wrap { background-color:'. esc_attr($options_in['background']) .'!important; }'; }
	if(!empty($options_in['link'])){ $custom_styles .='.header-mt-container-wrap, .header-mt-container-wrap a{ color:'. esc_attr($options_in['link']) .'!important; }'; }
	if(!empty($options_in['hover'])){ $custom_styles .='.header-mt-container-wrap a:hover { color:'. esc_attr($options_in['hover']) .'!important; }'; }
	if(!empty($options_in['bold'])){  $custom_styles .='.mt-top-followers strong { color:'. esc_attr($options_in['bold']) .'!important; }'; }


	 // Menu Links
	$options_in = get_option("mt_colors_menu_link");
	if(!empty($options_in['text'])){
		$custom_styles .='.top-nav a, .top-nav { color:'. esc_attr($options_in['text']) .'!important; }';
		$custom_styles .='.mt-m-cool-button-line, .mt-m-cool-button-line:after, .mt-m-cool-button-line:before { background:'. esc_attr($options_in['text']) .'!important; }';
	} else if(!empty($options['colors_menu'])){
		$custom_styles .='.top-nav a, .top-nav { color:'. esc_attr($options['colors_menu']) .'!important; }';
	}

	if(!empty($options_in['text_hover'])){
		$custom_styles .='.sf-menu li a:hover,
		.sf-menu > li:hover > a,
		.sf-menu li.sfHover,
		ul.sf-menu li.current-cat > a, div.sf-menu ul ul li.current-cat > a,
		ul.sf-menu li.current_page_item > a, div.sf-menu ul ul li.current_page_item > a,
		ul.sf-menu li.current-menu-item > a, div.sf-menu ul ul li.current-menu-item > a,
		ul.sf-menu li.current-menu-ancestor > a, div.sf-menu ul ul li.current-menu-ancestor > a,
		.sf-menu li.current_page_item::before, .sf-menu li:hover::before { color: '. esc_attr($options_in['text_hover']) .'!important}';
	} else if(!empty($options['colors_menu_hover_text'])){
		 $custom_styles .='.sf-menu li a:hover,
		 .sf-menu > li:hover > a,
		 .sf-menu li.sfHover,
		 ul.sf-menu li.current-cat > a, div.sf-menu ul ul li.current-cat > a,
		 ul.sf-menu li.current_page_item > a, div.sf-menu ul ul li.current_page_item > a,
		 ul.sf-menu li.current-menu-item > a, div.sf-menu ul ul li.current-menu-item > a,
		 ul.sf-menu li.current-menu-ancestor > a, div.sf-menu ul ul li.current-menu-ancestor > a,
		 .sf-menu li.current_page_item::before, .sf-menu li:hover::before { color: '. esc_attr($options['colors_menu_hover_text']) .'!important}';
	 }
		if(!empty($options_in['text'])){
			$custom_styles .='.sf-menu > li.current_page_item > a::before, .sf-menu > li > a::before { background: '. esc_attr($options_in['border']) .'!important}';
		} else if(!empty($options['colors_menu_hover'])){
		 $custom_styles .='.sf-menu > li.current_page_item > a::before, .sf-menu > li > a::before { background: '. esc_attr($options['colors_menu_hover']) .'!important}';
	 }

	 // Menu Links Sub
	 $options_in = get_option("mt_colors_menu_link_sub");
	 if(!empty($options_in)){
			if(!empty($options_in['text'])){
				$custom_styles .='.sf-menu ul li a { color:'. esc_attr($options_in['text']) .'!important; }';
				$custom_styles .='.megamenu-span h4 { color:'. esc_attr($options_in['text']) .'!important; }';
			}
			if(!empty($options_in['background'])){ $custom_styles .='.sf-menu ul li a, .sf-menu ul li, .df-is-megamenu ul, .df-is-megamenu ul li .mega-post-in a:hover { background-color:'. esc_attr($options_in['background']) .'!important; }'; }

		} else if(!empty($options['colors_menu_sub']) or !empty($options['colors_menu_sub_background'])){
		 $custom_styles .='.sf-menu ul li a {';
				 if(!empty($options['colors_menu_sub'])){ $custom_styles .=' color: '. esc_attr($options['colors_menu_sub']).'!important;'; }
				 if(!empty($options['colors_menu_sub_background'])){ $custom_styles .=' background: '. esc_attr($options['colors_menu_sub_background']).'!important;'; }
		 $custom_styles .='}';
			 if(!empty($options['colors_menu_sub_background'])){ $custom_styles .=' .sf-menu ul li, .df-is-megamenu ul { background:'. esc_attr($options['colors_menu_sub_background']).'!important}'; }
	 }

	 if(!empty($options_in)){
			if(!empty($options_in['text_hover']) and !empty($options_in['background_hover'])){
				$custom_styles .='ul.sf-menu ul li.current-cat > a, div.sf-menu ul ul ul li.current-cat > a,
			 ul.sf-menu ul li.current-menu-item > a, div.sf-menu ul ul ul li.current-menu-item > a,
			 ul.sf-menu ul li.current_page_item > a, div.sf-menu ul ul ul li.current_page_item > a,
			 ul.sf-menu ul li.current-menu-ancestor > a, div.sf-menu ul ul ul li.current-menu-ancestor > a,
			 ul.sf-menu ul li a:hover, div.sf-menu ul ul li a:hover { ';
					if(!empty($options_in['background_hover'])){ $custom_styles .='background:'. esc_attr($options_in['background_hover']) .'!important;'; }
					if(!empty($options_in['text_hover'])){ $custom_styles .='color:'. esc_attr($options_in['text_hover']) .'!important;'; }
			 $custom_styles .='}';
		 }
	 } else if(!empty($options['colors_menu_sub_hover']) or !empty($options['colors_menu_sub_hover_background'])){
		 $custom_styles .='ul.sf-menu ul li.current-cat > a, div.sf-menu ul ul ul li.current-cat > a,
		 ul.sf-menu ul li.current-menu-item > a, div.sf-menu ul ul ul li.current-menu-item > a,
		 ul.sf-menu ul li.current_page_item > a, div.sf-menu ul ul ul li.current_page_item > a,
		 ul.sf-menu ul li.current-menu-ancestor > a, div.sf-menu ul ul ul li.current-menu-ancestor > a,
		 ul.sf-menu ul li a:hover, div.sf-menu ul ul li a:hover {';
				if(!empty($options['colors_menu_sub_hover_background'])){ $custom_styles .='background:'. esc_attr($options['colors_menu_sub_hover_background']) .'!important;'; }
				if(!empty($options['colors_menu_sub_hover'])){ $custom_styles .='color:'. esc_attr($options['colors_menu_sub_hover']) .'!important;'; }
		 $custom_styles .='}';
	 }

	 if(!empty($options['colors_menu_sub'])){
		 $custom_styles .='.megamenu-span h4 { color:'. esc_attr($options['colors_menu_sub']) .'!important; }';
	 }

	 $options_in = get_option("mt_colors_menu_button");
	 	 if(!empty($options_in['text'])){
	 		 $custom_styles .='.mt-m-cool-button-line:after, .mt-m-cool-button-line:before, .mt-m-cool-button-line{ background-color:'. esc_attr($options_in['text']) .'!important; }';
	 	 }
	 	 if(!empty($options_in['text_hover'])){
	 		 $custom_styles .='.nav-button:hover .mt-m-cool-button-line:after, .nav-button:hover .mt-m-cool-button-line:before, .nav-button:hover .mt-m-cool-button-line{ background-color:'. esc_attr($options_in['text_hover']) .'!important; }';
	 	 }

	 $options_in = get_option("mt_colors_menu_smart");
		 if(!empty($options_in['background'])){
	 		 $custom_styles .='.mt-smart-menu { background-color:'. esc_attr($options_in['background']) .'!important; }';
	 	 }
	 	 if(!empty($options_in['link'])){
	 		 $custom_styles .='.mt-smart-menu a, .mt-smart-menu .close:before, .mt-smart-menu .menu-item-has-children:after { color:'. esc_attr($options_in['link']) .'!important; }';
	 	 }
		 if(!empty($options_in['hover'])){
	 		 $custom_styles .='.mt-smart-menu a:hover, .mt-smart-menu .close:hover:before { color:'. esc_attr($options_in['hover']) .'!important; }';
	 	 }
		 if(!empty($options_in['out'])){
	 		 $custom_styles .='.mobile-menu-active  .mt-smart-menu-out { background-color:'. esc_attr($options_in['out']) .'!important; }';
	 	 }
		 $options_in = get_option("mt_colors_menu_search");
 	 	 if(!empty($options_in['background'])){
 	 		 $custom_styles .='.nav-search-wrap .nav-search-input { background-color:'. esc_attr($options_in['background']) .'!important; }';
 	 	 }
 	 	 if(!empty($options_in['text'])){
 	 		 $custom_styles .='.mt-header-mobile .nav-search-input:before, .search-close:before, .nav-search-input input{ color:'. esc_attr($options_in['text']) .'!important; }';
 			 $custom_styles .='
 			 .nav-search-input input,.nav-search-input:before { color:'. esc_attr($options_in['text']) .'!important; }
 			 .nav-search-input input::-webkit-input-placeholder { color:'. esc_attr($options_in['text']) .'!important; }
 			 .nav-search-input input:-moz-placeholder { color:'. esc_attr($options_in['text']) .'!important; }
 			 .nav-search-input input::-moz-placeholder { color:'. esc_attr($options_in['text']) .'!important; }
 			 .nav-search-input input:-ms-input-placeholder { color:'. esc_attr($options_in['text']) .'!important; }';
 	 	 }

	// Other
	$options_in = get_option("colors_post_view");
	if(!empty($options_in['text'])){
		$custom_styles .='.post-statistic .stat-views { color:'. esc_attr($options_in['text']) .'!important; }';
	}
	if(!empty($options_in['text_dark'])){
		$custom_styles .='.post-bgphoto .post-statistic .stat-views { color:'. esc_attr($options_in['text_dark']) .'!important; }';
	}
	if(!empty($options_in['icon'])){
		$custom_styles .='.post-statistic .stat-views:before { color:'. esc_attr($options_in['icon']) .'!important; }';
	}
	if(!empty($options_in['icon_dark'])){
		$custom_styles .='.post-bgphoto .post-statistic .stat-views:before { color:'. esc_attr($options_in['icon_dark']) .'!important; }';
	}
	$options_in = get_option("colors_post_share");
	if(!empty($options_in['text'])){
		$custom_styles .='.post-statistic .stat-shares { color:'. esc_attr($options_in['text']) .'!important; }';
	}
	if(!empty($options_in['text_dark'])){
		$custom_styles .='.post-bgphoto .post-statistic .stat-shares { color:'. esc_attr($options_in['text_dark']) .'!important; }';
	}
	if(!empty($options_in['icon'])){
		$custom_styles .='.post-statistic .stat-shares:before { color:'. esc_attr($options_in['icon']) .'!important; }';
	}
	if(!empty($options_in['icon_dark'])){
		$custom_styles .='.post-bgphoto .post-statistic .stat-shares:before { color:'. esc_attr($options_in['icon_dark']) .'!important; }';
	}

	$options_in = get_option("mt_colors_cat");
	if(!empty($options_in['background'])){
		$custom_styles .='.df-is-megamenu ul .poster-cat, .poster-cat span, .single-cat-wrap .post-categories li a, .grid-post .poster-cat span, .poster-large-cat span, .poster-info { background-color:'. esc_attr($options_in['background']) .'!important; }';
	}
	if(!empty($options_in['text'])){
		$custom_styles .='.df-is-megamenu ul .poster-cat span, .poster-cat span, .single-cat-wrap .post-categories li a, .grid-post .poster-cat span, .poster-large-cat span, .poster-info, .poster-info, .poster.size-normal .poster-cat span, .poster.trending-normal .poster-cat span, .poster.trending-carousel .poster-cat span { color:'. esc_attr($options_in['text']) .'!important; }';
	}


	// Footer Colors
		$options_in = get_option("mt_colors_footer_bottom");
		if(!empty($options_in)){
			if(!empty($options_in['background'])){ $custom_styles .='.footer-bottom, .footer-top { background:'. esc_attr($options_in['background']) .'!important; }'; }
			if(!empty($options_in['text'])){  $custom_styles .='.footer-bottom p { color:'. esc_attr($options_in['text']) .'!important; }'; }
			if(!empty($options_in['link'])){ $custom_styles .='.footer-bottom a { color:'. esc_attr($options_in['link']) .'!important; }'; }
			if(!empty($options_in['hover'])){ $custom_styles .='.footer-bottom a:hover { color:'. esc_attr($options_in['hover']) .'!important; }'; }
		} else {
			if(!empty($options['colors_footer_bottom_background'])){ $custom_styles .=' .footer-bottom { background: '. esc_attr($options['colors_footer_bottom_background']) .'; } '; }
			if(!empty($options['colors_footer_bottom_text'])){ $custom_styles .=' .footer-bottom p { color: '. esc_attr($options['colors_footer_bottom_text']) .'; } '; }
			if(!empty($options['colors_footer_bottom_link'])){ $custom_styles .=' .footer-bottom a { color: '. esc_attr($options['colors_footer_bottom_link']) .'; } '; }
			if(!empty($options['colors_footer_bottom_link_hover'])){ $custom_styles .=' .footer-bottom a:hover { color: '. esc_attr($options['colors_footer_bottom_link_hover']) .'; } '; }
		}

		$options_in = get_option("mt_colors_footer_social");
		if(!empty($options_in)){
			if(!empty($options_in['icon'])){ $custom_styles .='.footer .social li a { color:'. esc_attr($options_in['icon']) .'!important; }'; }
			if(!empty($options_in['hover'])){ $custom_styles .='.footer .social li a:hover { color:'. esc_attr($options_in['hover']) .'!important; }'; }
			if(!empty($options_in['background'])){ $custom_styles .='.footer .social li a { background:  { color:'. esc_attr($options_in['background']) .'!important; }'; }
			if(!empty($options_in['background_hover'])){ $custom_styles .='.footer .social li a:hover { background:'. esc_attr($options_in['background_hover']) .'!important; }';  }
		} else {
			if(!empty($options['colors_footer_social_icon'])){ $custom_styles .=' .footer .social li a { color: '. esc_attr($options['colors_footer_social_icon']) .'; } '; }
			if(!empty($options['colors_footer_social_background'])){ $custom_styles .=' .footer .social li a { background: '. esc_attr($options['colors_footer_social_background']) .'; } '; }
			if(!empty($options['colors_footer_social_icon_hover'])){ $custom_styles .=' .footer .social li a:hover { color: '. esc_attr($options['colors_footer_social_icon_hover']) .'; } '; }
			if(!empty($options['colors_footer_social_background_hover'])){ $custom_styles .=' .footer .social li a:hover { background: '. esc_attr($options['colors_footer_social_background_hover']) .'; } '; }
		}

		if(is_single()){
			$next_post = get_next_post();
			if (!empty( $next_post )) {
			 	if ( has_post_thumbnail( $next_post->ID ) ) {
					$custom_styles .='.nav-single .next { background-image: url("'.get_the_post_thumbnail_url($next_post->ID,  $size = 'medium' ).'") }';
				}
		 	}
			$next_post = get_previous_post();
			if (!empty( $next_post )) {
			 	if ( has_post_thumbnail( $next_post->ID ) ) {
					$custom_styles .='.nav-single .previous { background-image: url("'.get_the_post_thumbnail_url($next_post->ID, $size = 'medium' ).'") }';
				}
		 	}
		}

	 if ( $custom_styles != '' ) {
	  $css = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $custom_styles);
		wp_add_inline_style( 'nextnews-style', $css );
	}

}
add_action( 'wp_enqueue_scripts', 'nextnews_css');

function nextnews_header_script() {

		$option = get_option("nextnews_theme_options");

		wp_enqueue_script( 'nextnews_script', get_template_directory_uri(). '/inc/js/scripts.js', array( 'jquery'), '', true );
		wp_localize_script( 'nextnews_script', 'ajax_posts', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'noposts' => esc_html__('No older posts found', 'nextnews'), ));

		// Third party scripts/ styles don't need to be prefixed to avoid double loading
		wp_enqueue_script('jquery-html5shiv', get_template_directory_uri() . '/inc/js/html5shiv.js', array('jquery'), '1.0', true);
		wp_script_add_data( 'jquery-_html5shiv', 'conditional', 'lt IE 9' );
		wp_enqueue_script('jquery-respondmin', get_template_directory_uri() . '/inc/js/respond.js', array('jquery'), '1.0', true);
		wp_script_add_data( 'jquery-respondmin', 'conditional', 'lt IE 9' );

		$p = get_theme_mod( 'mt_typogrpahys', 'on');
		if( $p != "off"){

	    function nextnews_fonts_url() {

	      $theme_font = "Lato:400,900,700";

	        /*
	        Translators: If there are characters in your language that are not supported
	        by chosen font(s), translate this to 'off'. Do not translate into your own language.
	         */
	        if ( 'off' !== _x( 'on', 'Google font: on or off', 'nextnews' ) ) {
	            $font_url = add_query_arg( 'family', urlencode( ''. esc_attr($theme_font) .'' ), "//fonts.googleapis.com/css" );
	        }
	        return $font_url;
	    }
		}
    wp_enqueue_style( 'nextnews-fonts', nextnews_fonts_url(), array(), '1.0.0' );


}
add_action('wp_enqueue_scripts', 'nextnews_header_script');

function nextnews_admin_script() {
	wp_enqueue_style('nextnews-admin', get_template_directory_uri().'/inc/css/admin.css');
}
add_action('admin_enqueue_scripts', 'nextnews_admin_script');


add_filter('body_class','nextnews_class');
function nextnews_class($classes) {

	$body_class = "";

	$options = get_option("nextnews_theme_options");

	if(!empty( $options['mt_menu_fix'])){
		if( $options['mt_menu_fix']=="1") {
			$body_class .= 'mt-fixed ';
		}  else {
			$body_class .= ' mt-fixed-no ';
		}
	} else {
		$body_class .= ' mt-fixed-no ';
	}

	if(!empty( $options['menu_fixed'])){
		if($options['menu_fixed']=="mt-fixed-up") {
			$body_class .= ' mt-fixed-up ';
		}  else if($options['menu_fixed']=="mt-fixed-always") {
			$body_class .= ' mt-fixed-always ';
		} else if($options['menu_fixed']=="mt-fixed-disabled") {
			$body_class .= ' mt-fixed-disabled ';
		}
	} else {
		$body_class .= ' mt-fixed-up ';
	}


	$style = get_post_meta(get_the_ID(), "magazin_post_style", true);
	if(!empty($style)){
		$body_class .= ' post-style-'.$style;
		if($style=="8" and is_single()) {
			$body_class .= ' boxed-layout-on';
			$body_class .= ' post-bgphoto';
		}
		if($style=="7" and is_single()) {
			$body_class .= ' post-bgphoto';
		}
		if($style=="6" and is_single()) {
			$body_class .= ' post-bgphoto';
		}
	} else if (!empty($options['post_style'])) {
		$body_class .= ' post-style-'.$options['post_style'];
		if($options['post_style']=="8" and is_single()) {
			$body_class .= ' boxed-layout-on';
			$body_class .= ' post-bgphoto';
		}
		if($options['post_style']=="7" and is_single()) {
			$body_class .= ' post-bgphoto';
		}
		if($options['post_style']=="6" and is_single()) {
			$body_class .= ' post-bgphoto';
		}

	}

	$layout = get_post_meta(get_the_ID(), "magazin_subtitle", true);
	if(!empty($layout)){
		$body_class .= ' subtitle';
	}

	$layout = get_post_meta(get_the_ID(), "magazin_layout", true);
	if(!empty($layout)){
		$body_class .= ' boxed-layout-on';
	} else if (!empty($options['boxed'])) {
		if ($options['boxed']=="1") {
			$body_class .= ' boxed-layout-on';
		}
	}

	if(!empty($options['menu_random'])) {
		if($options['menu_random']!="1") {
			$body_class .= ' random-off';
		}
	} else {
		$body_class .= ' random-off';
	}

	if(!empty($options['fixed_logo']) or !empty($options['fixed_logo2']) ) {
		if($options['fixed_logo']!="" or $options['fixed_logo']!="") {
			$body_class .= ' fixed-logo-active';
		}
	}

	if(!empty($options['menu_top_ad'])) {
		if($options['menu_top_ad']=="ad") {
			$body_class .= ' menu-ad-on';
		}
	} else {
		$body_class .= ' menu-ad-off';
	}

	if(!empty($options['header_top'])) {
		$body_class .= ' header-top-on';
	} else {
		$body_class .= ' header-top-off';
	}

	if(!empty($options['themecolor'])) {
		$body_class .= ' mt-tc-'.$options['themecolor'];
	}

	if(!empty($options['themecolor'])) {

		if($options['themecolor'] == " black" or $options['themecolor'] == "color" ) {
			$body_class .= ' mt-lt mt-tc-1';
		}
	}


	$page_space = get_post_meta(get_the_ID(), "magazin_page_padding", true);
	if(!empty($page_space)){
		$body_class .= ' remove-page-padding ';
	}

	$classes[] =  $body_class;
	return $classes;
}

?>
