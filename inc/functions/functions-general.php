<?php

if ( ! function_exists( 'nextnews_paging_nav' ) ) :

function nextnews_paging_nav() {
	global $wp_query,  $nextnews_allowed_html_array;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
		if ( false == get_theme_mod( 't_p_older_posts', false ) ) { $t_p_older_posts = wp_kses(__( '<span class="meta-nav">&larr;</span> Older posts', 'nextnews' ), $nextnews_allowed_html_array );  } else { $t_p_older_posts = get_theme_mod( 't_p_older_posts' ); $t_p_older_posts = wp_kses(( '<span class="meta-nav">&larr;</span> '.$t_p_older_posts), $nextnews_allowed_html_array ); }
		if ( false == get_theme_mod( 't_p_newer_posts', false ) ) { $t_p_newer_posts = wp_kses(__( 'Newer posts <span class="meta-nav">&rarr;</span>', 'nextnews' ), $nextnews_allowed_html_array );  } else { $t_p_newer_posts = get_theme_mod( 't_p_newer_posts' ); $t_p_newer_posts = wp_kses(( $t_p_newer_posts.' <span class="meta-nav">&rarr;</span>'), $nextnews_allowed_html_array ); }

	?>
	<nav class="navigation paging-navigation" role="navigation">

		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous pagination-link"><?php next_posts_link($t_p_older_posts); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next pagination-link"><?php previous_posts_link($t_p_newer_posts); ?></div>
			<?php endif; ?>
			<div class="clear"></div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

$navigation_speed = "5.1";


if ( ! function_exists( 'nextnews_entry_meta' ) ) {
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own _entry_meta() to override in a child theme.
 *
 */
	function nextnews_entry_meta() {
		$nextnews_allowed_html_array = array('a' => array( 'href' => array(), 'title' => array() ), 'br' => array(), 'i' => array('class' => array()),  'em' => array(), 'strong' => array(), 'div' => array('class' => array()), 'span' => array('class' => array()));
		if ( false == get_theme_mod( 't_p_view_all_posts_by', false ) ) { $t_p_view_all_posts_by = esc_html__("View all posts by %s", "nextnews");  } else { $t_p_view_all_posts_by = get_theme_mod( 't_p_view_all_posts_by' ); $t_p_view_all_posts_by = $t_p_view_all_posts_by.' %s'; }
		if ( false == get_theme_mod( 't_p_posted_on', false ) ) { $t_p_posted_on = wp_kses(__( '<div class="mt-meta">Posted on <i class="fa fa-calendar"></i> %3$s </div>', 'nextnews' ), $nextnews_allowed_html_array );  } else { $t_p_posted_on = get_theme_mod( 't_p_posted_on' ); $t_p_posted_on = ' <div class="mt-meta">'.$t_p_posted_on.' <i class="fa fa-calendar"></i> %3$s </div>'; }
		global $nextnews_allowed_html_array;
		// Translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( esc_html__( ', ', 'nextnews' ) );

		// Translators: used between list items, there is a space after the comma.
		$tag_list = get_the_tag_list( '', esc_html__( ', ', 'nextnews' ) );

		$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s"> %4$s</time></a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( $t_p_view_all_posts_by, get_the_author() ) ),
			get_the_author()
		);

		// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
		if ( $tag_list ) {
			$utility_text = wp_kses(__( '<div class="mt-meta"><i class="fa fa-folder-open-o"></i> %1$s <span class="mt_space"></span> <i class="fa fa-tag"></i> %2$s <span class="mt_space"></span> <i class="fa fa-calendar"></i> %3$s </div>', 'nextnews' ), $nextnews_allowed_html_array );
		} elseif ( $categories_list ) {
			$utility_text = wp_kses(__( '<div class="mt-meta"><i class="fa fa-folder-open-o"></i> %1$s <span class="mt_space"></span> <i class="fa fa-calendar"></i> %3$s </div>', 'nextnews' ), $nextnews_allowed_html_array );
		} else {
			$utility_text = $t_p_posted_on;
		}

		printf(
			$utility_text,
			$categories_list,
			$tag_list,
			$date,
			$author
		);
	}
}

if ( ! function_exists( 'nextnews_content_nav' ) ) {
/**
 * Displays navigation to next/previous pages when applicable.
 *
 */
	function nextnews_content_nav( $nav_id ) {
		global $wp_query,  $nextnews_allowed_html_array;
		if ( false == get_theme_mod( 't_p_older_posts', false ) ) { $t_p_older_posts = wp_kses(__( '<span class="meta-nav">&larr;</span> Older posts', 'nextnews' ), $nextnews_allowed_html_array );  } else { $t_p_older_posts = get_theme_mod( 't_p_older_posts' ); $t_p_older_posts = wp_kses(( '<span class="meta-nav">&larr;</span> '.$t_p_older_posts), $nextnews_allowed_html_array ); }
		if ( false == get_theme_mod( 't_p_newer_posts', false ) ) { $t_p_newer_posts = wp_kses(__( 'Newer posts <span class="meta-nav">&rarr;</span>', 'nextnews' ), $nextnews_allowed_html_array );  } else { $t_p_newer_posts = get_theme_mod( 't_p_newer_posts' ); $t_p_newer_posts = wp_kses(( $t_p_newer_posts.' <span class="meta-nav">&rarr;</span>'), $nextnews_allowed_html_array ); }

		if ( $wp_query->max_num_pages > 1 ) : ?>
			<nav id="<?php echo esc_attr($nav_id); ?>" class="navigation" role="navigation">
				<div class="nav-links">
					<div class="nav-previous alignleft"><?php next_posts_link( $t_p_older_posts ); ?></div>
					<div class="nav-next alignright"><?php previous_posts_link( $t_p_newer_posts ); ?></div>
					<div class="clear"></div>
				</div>
			</nav><!-- #<?php echo esc_attr($nav_id); ?> .navigation -->
		<?php endif;
	}
}

/** Theme Speed Improve **/
global $wp_version; if (version_compare($wp_version, $navigation_speed, '>=')) { function_speed(); }

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function nextnews_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
		if ( false == get_theme_mod( 't_p_page', false ) ) { $t_p_page = esc_html__("Page %s", "nextnews");  } else { $t_p_page = get_theme_mod( 't_p_page' ); $t_p_page = $t_p_page.' %s'; }
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( $t_p_page, max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'nextnews_wp_title', 10, 2 );


/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 */
function nextnews_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'nextnews_page_menu_args' );

/**
 * Enqueues scripts and styles for front-end.
 *
 */
function nextnews_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );


}
add_action( 'wp_enqueue_scripts', 'nextnews_scripts_styles' );

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This is a wrapper class for Kirki.
 * If the Kirki plugin is installed, then all CSS & Google fonts
 * will be handled by the plugin.
 * In case the plugin is not installed, this acts as a fallback
 * ensuring that all CSS & fonts still work.
 * It does not handle the customizer options, simply the frontend CSS.
 */
class NextNews_Kirki {

	/**
	 * @static
	 * @access protected
	 * @var array
	 */
	protected static $config = array();

	/**
	 * @static
	 * @access protected
	 * @var array
	 */
	protected static $fields = array();

	/**
	 * The class constructor
	 */
	public function __construct() {
		// If Kirki exists then there's no reason to procedd
		if ( class_exists( 'Kirki' ) ) {
			return;
		}
		// Add our CSS
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 20 );
		// Add google fonts
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_fonts' ) );
	}

	/**
	 * Get the value of an option from the db.
	 *
	 * @param    string    $config_id    The ID of the configuration corresponding to this field
	 * @param    string    $field_id     The field_id (defined as 'settings' in the field arguments)
	 *
	 * @return 	mixed 	the saved value of the field.
	 */
	public static function get_option( $config_id = '', $field_id = '' ) {
		// if Kirki exists, use it.
		if ( class_exists( 'Kirki' ) ) {
			return Kirki::get_option( $config_id, $field_id );
		}
		// Kirki does not exist, continue with our custom implementation.
		// Get the default value of the field
		$default = '';
		if ( isset( self::$fields[ $field_id ] ) && isset( self::$fields[ $field_id ]['default'] ) ) {
			$default = self::$fields[ $field_id ]['default'];
		}
		// Make sure the config is defined
		if ( isset( self::$config[ $config_id ] ) ) {
			if ( 'option' == self::$config[ $config_id ]['option_type'] ) {
				// check if we're using serialized options
				if ( isset( self::$config[ $config_id ]['option_name'] ) && ! empty( self::$config[ $config_id ]['option_name'] ) ) {
					// Get all our options
					$all_options = get_option( self::$config[ $config_id ]['option_name'], array() );
					// If our option is not saved, return the default value.
					if ( ! isset( $all_options[ $field_id ] ) ) {
						return $default;
					}
					// Option was set, return its value unserialized.
					return maybe_unserialize( $all_options[ $field_id ] );
				}
				// If we're not using serialized options, get the value and return it.
				// We'll be using a dummy default here to check if the option has been set or not.
				// We'll be using md5 to make sure it's randomish and impossible to be actually set by a user.
				$dummy = md5( $config_id . '_UNDEFINED_VALUE' );
				$value = get_option( $field_id, $dummy );
				// setting has not been set, return default.
				if ( $dummy == $value ) {
					return $default;
				}
				return $value;
			}
			// We're not using options so fallback to theme_mod
			return get_theme_mod( $field_id, $default );
		}
	}

	/**
	 * Create a new panel
	 *
	 * @param   string      the ID for this panel
	 * @param   array       the panel arguments
	 */
	public static function add_panel( $id = '', $args = array() ) {
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_panel( $id, $args );
		}
		// If Kirki does not exist then there's no reason to add any panels.
	}

	/**
	 * Create a new section
	 *
	 * @param   string      the ID for this section
	 * @param   array       the section arguments
	 */
	public static function add_section( $id, $args ) {
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_section( $id, $args );
		}
		// If Kirki does not exist then there's no reason to add any sections.
	}


	/**
	 * Sets the configuration options.
	 *
	 * @param    string    $config_id    The configuration ID
	 * @param    array     $args         The configuration arguments
	 */
	public static function add_config( $config_id, $args = array() ) {
		// if Kirki exists, use it.
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_config( $config_id, $args );
			return;
		}
		// Kirki does not exist, set the config arguments
		$config[ $config_id ] = $args;
		// Make sure an option_type is defined
		if ( ! isset( self::$config[ $config_id ]['option_type'] ) ) {
			self::$config[ $config_id ]['option_type'] = 'theme_mod';
		}
	}

	/**
	 * Create a new field
	 *
	 * @param    string    $config_id    The configuration ID
	 * @param    array     $args         The field's arguments
	 */
	public static function add_field( $config_id, $args ) {
		// if Kirki exists, use it.
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_field( $config_id, $args );
			return;
		}
		// Kirki was not located, so we'll need to add our fields here.
		// check that the "settings" & "type" arguments have been defined
		if ( isset( $args['settings'] ) && isset( $args['type'] ) ) {
			// Make sure we add the config_id to the field itself.
			// This will make it easier to get the value when generating the CSS later.
			if ( ! isset( $args['kirki_config'] ) ) {
				$args['kirki_config'] = $config_id;
			}
			// Background fields need to be built separately
			if ( 'background' == $args['type'] && isset( $args['output'] ) ) {
				if ( isset( $args['default'] ) && is_array( $args['default'] ) ) {
					foreach ( $args['default'] as $default_property => $default_value ) {
						$subfield = $args;
						// No need to process the opacity, it is factored in the color control.
						if ( 'opacity' == $key ) {
							continue;
						}
						$key             = esc_attr( $key );
						$setting         = $key;
						$output_property = 'background-' . $key;
						if ( 'attach' == $key ) {
							$output_property = 'background-attachment';
						}
						if ( is_string( $subfield['output'] ) ) {
							$subfield['output'] = array( array(
								'element'  => $args['output'],
								'property' => $output_property,
							) );
						} else {
							foreach ( $subfield['output'] as $key => $output ) {
								$subfield['output'][ $key ]['property'] = $output_property;
							}
						}
						$type = 'select';
						if ( in_array( $key, array( 'color', 'image' ) ) ) {
							$type = $key;
						}
						$property_setting = esc_attr( $args['settings'] ) . '_' . $setting;
						self::$fields[ $property_setting ] = $subfield;
					}
				}
			}
			self::$fields[ $args['settings'] ] = $args;
		}
	}

	/**
	 * Enqueues the stylesheet
	 */
	public function enqueue_styles() {
		// If Kirki exists there's no need to proceed any further
		if ( class_exists( 'Kirki' ) ) {
			return;
		}
		// Get our inline styles
		$styles = $this->get_styles();
		// If we have some styles to add, add them now.
		if ( ! empty( $styles ) ) {
			// enqueue the theme's style.css file
			$current_theme = ( wp_get_theme() );
			wp_enqueue_style( $current_theme->stylesheet . '_no-kirki', get_stylesheet_uri(), null, null );
			wp_add_inline_style( $current_theme->stylesheet . '_no-kirki', $styles );
		}
	}

	/**
	 * Gets all our styles and returns them as a string.
	 */
	public function get_styles() {
		// Get an array of all our fields
		$fields = self::$fields;
		// Check if we need to exit early
		if ( empty( self::$fields ) || ! is_array( $fields ) ) {
			return;
		}
		// initially we're going to format our styles as an array.
		// This is going to make processing them a lot easier
		// and make sure there are no duplicate styles etc.
		$css = array();
		// start parsing our fields
		foreach ( $fields as $field ) {
			// No need to process fields without an output, or an improperly-formatted output
			if ( ! isset( $field['output'] ) || empty( $field['output'] ) || ! is_array( $field['output'] ) ) {
				continue;
			}
			// Get the value of this field
			$value = self::get_option( $field['kirki_config'], $field['settings'] );
			// start parsing the output arguments of the field
			foreach ( $field['output'] as $output ) {
				$defaults = array(
					'element'       => '',
					'property'      => '',
					'media_query'   => 'global',
					'prefix'        => '',
					'units'         => '',
					'suffix'        => '',
					'value_pattern' => '$',
					'choice'        => '',
				);
				$output = wp_parse_args( $output, $defaults );
				// If element is an array, convert it to a string
				if ( is_array( $output['element'] ) ) {
					$output['element'] = array_unique( $output['element'] );
					sort( $output['element'] );
					$output['element'] = implode( ',', $output['element'] );
				}
				// Simple fields
				if ( ! is_array( $value ) ) {
					$value = str_replace( '$', $value, $output['value_pattern'] );
					if ( ! empty( $output['element'] ) && ! empty( $output['property'] ) ) {
						$css[ $output['media_query'] ][ $output['element'] ][ $output['property'] ] = $output['prefix'] . $value . $output['units'] . $output['suffix'];
					}
				} else {
					if ( 'typography' == $field['type'] ) {
						foreach ( $value as $key => $subvalue ) {
							// exclude subsets as a property
							if ( 'subsets' == $key ) {
								continue;
							}
							// add double quotes if needed to font-families
							if ( 'font-family' == $key && false !== strpos( $subvalue, ' ' ) && false === strpos( $subvalue, '"' ) ) {
								$css[ $output['media_query'] ][ $output['element'] ]['font-family'] = '"' . $subvalue . '"';
							}
							// variants contain both font-weight & italics
							if ( 'variant' == $key ) {
								$font_weight = str_replace( 'italic', '', $subvalue );
								$font_weight = ( in_array( $font_weight, array( '', 'regular' ) ) ) ? '400' : $font_weight;
								$css[ $output['media_query'] ][ $output['element'] ]['font-weight'] = $font_weight;
								// Is this italic?
								$is_italic = ( false !== strpos( $subvalue, 'italic' ) );
								if ( $is_italic ) {
									$css[ $output['media_query'] ][ $output['element'] ]['font-style'] = 'italic';
								}
							} else {
								$css[ $output['media_query'] ][ $output['element'] ][ $key ] = $subvalue;
							}
						}
					} elseif ( 'spacing' == $field['type'] ) {
						foreach ( $value as $key => $subvalue ) {
							if ( empty( $output['property'] ) ) {
								$output['property'] = $key;
							} elseif ( false !== strpos( $output['property'], '%%' ) ) {
								$output['property'] = str_replace( '%%', $key, $output['property'] );
							} else {
								$output['property'] = $output['property'] . '-' . $key;
							}
							$css[ $output['media_query'] ][ $output['element'] ][ $output['property'] ] = $subvalue;
						}
					} elseif ( 'multicolor' == $field['type'] ) {
						if ( ! empty( $output['element'] ) && ! empty( $output['property'] ) && ! empty( $output['choice'] ) ) {
							$css[ $output['media_query'] ][ $output['element'] ][ $output['property'] ] = $output['prefix'] . $value[ $output['choice'] ] . $output['units'] . $output['suffix'];
						}
					}
				}
			}
		}
		// Process the array of CSS properties and produce the final CSS
		$final_css = '';
		if ( ! is_array( $css ) || empty( $css ) ) {
			return '';
		}
		// Parse the generated CSS array and create the CSS string for the output.
		foreach ( $css as $media_query => $styles ) {
			// Handle the media queries
			$final_css .= ( 'global' != $media_query ) ? $media_query . '{' : '';
			foreach ( $styles as $style => $style_array ) {
				$final_css .= $style . '{';
					foreach ( $style_array as $property => $value ) {
						$value = ( is_string( $value ) ) ? $value : '';
						// Make sure background-images are properly formatted
						if ( 'background-image' == $property ) {
							if ( false === strrpos( $value, 'url(' ) ) {
								$value = 'url("' . esc_url_raw( $value ) . '")';
							}
						} else {
							$value = esc_textarea( $value );
						}
						$final_css .= $property . ':' . $value . ';';
					}
				$final_css .= '}';
			}
			$final_css .= ( 'global' != $media_query ) ? '}' : '';
		}
		return $final_css;
	}

	public function enqueue_fonts() {
		// Check if we need to exit early
		if ( empty( self::$fields ) || ! is_array( self::$fields ) ) {
			return;
		}
		foreach ( self::$fields as $field ) {
			// Process typography fields
			if ( isset( $field['type'] ) && 'typography' == $field['type'] ) {
				// Check if we've got everything we need
				if ( ! isset( $field['kirki_config'] ) || ! isset( $field['settings'] ) ) {
					continue;
				}
				$value = self::get_option( $field['kirki_config'], $field['settings'] );
				if ( isset( $value['font-family'] ) ) {
					$url = '//fonts.googleapis.com/css?family=' . str_replace( ' ', '+', $value['font-family'] );
					if ( ! isset( $value['variant'] ) ) {
						$value['variant'] = '';
					}
					if ( ! empty( $value['variant'] ) ) {
						$url .= ':' . $value['variant'];
					}
					if ( ! isset( $value['subset'] ) ) {
						$value['subset'] = '';
					}
					if ( ! empty( $value['subset'] ) ) {
						if ( is_array( $value['subset'] ) ) {
							$value['subset'] = implode( ',', $value['subsets'] );
						}
						$url .= '&subset=' . $value['subset'];
					}
					$key = md5( $value['font-family'] . $value['variant'] . $value['subset'] );
					// check that the URL is valid. we're going to use transients to make this faster.
					$url_is_valid = get_transient( $key );
					if ( false === $url_is_valid ) { // transient does not exist
						$response = wp_remote_get( 'https:' . $url );
						if ( ! is_array( $response ) ) {
							// the url was not properly formatted,
							// cache for 12 hours and continue to the next field
							set_transient( $key, null, 12 * HOUR_IN_SECONDS );
							continue;
						}
						// check the response headers.
						if ( isset( $response['response'] ) && isset( $response['response']['code'] ) ) {
							if ( 200 == $response['response']['code'] ) {
								// URL was ok
								// set transient to true and cache for a week
								set_transient( $key, true, 7 * 24 * HOUR_IN_SECONDS );
								$url_is_valid = true;
							}
						}
					}
					// If the font-link is valid, enqueue it.
					if ( $url_is_valid ) {
						wp_enqueue_style( $key, $url, null, null );
					}
				}
			}
		}
	}
}
new NextNews_Kirki();

?>
