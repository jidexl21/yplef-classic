<?php
/**
 * Yplef Classic Customizer functionality
 *
 * @package WordPress
 * @subpackage Yplef_Classic
 * @since Yplef Classic 1.0
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Yplef Classic 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function yplefclassic_customize_register( $wp_customize ) {
	$color_scheme = yplefclassic_get_color_scheme();

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'            => '.site-title a',
				'container_inclusive' => false,
				'render_callback'     => 'yplefclassic_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'            => '.site-description',
				'container_inclusive' => false,
				'render_callback'     => 'yplefclassic_customize_partial_blogdescription',
			)
		);
	}

	// Add color scheme setting and control.
	$wp_customize->add_setting(
		'color_scheme',
		array(
			'default'           => 'default',
			'sanitize_callback' => 'yplefclassic_sanitize_color_scheme',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'color_scheme',
		array(
			'label'    => __( 'Base Color Scheme', 'yplefclassic' ),
			'section'  => 'colors',
			'type'     => 'select',
			'choices'  => yplefclassic_get_color_scheme_choices(),
			'priority' => 1,
		)
	);

	// Add custom header and sidebar text color setting and control.
	$wp_customize->add_setting(
		'sidebar_textcolor',
		array(
			'default'           => $color_scheme[4],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'sidebar_textcolor',
			array(
				'label'       => __( 'Header and Sidebar Text Color', 'yplefclassic' ),
				'description' => __( 'Applied to the header on small screens and the sidebar on wide screens.', 'yplefclassic' ),
				'section'     => 'colors',
			)
		)
	);

	// Remove the core header textcolor control, as it shares the sidebar text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// Add custom header and sidebar background color setting and control.
	$wp_customize->add_setting(
		'header_background_color',
		array(
			'default'           => $color_scheme[1],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_background_color',
			array(
				'label'       => __( 'Header and Sidebar Background Color', 'yplefclassic' ),
				'description' => __( 'Applied to the header on small screens and the sidebar on wide screens.', 'yplefclassic' ),
				'section'     => 'colors',
			)
		)
	);

	// Add an additional description to the header image section.
	$wp_customize->get_section( 'header_image' )->description = __( 'Applied to the header on small screens and the sidebar on wide screens.', 'yplefclassic' );

/**  Page Top settings */

  $wp_customize->add_section( 'yplef_page_top' , array(

	'title'      => __( 'Page Top Section', 'yplef' ),
	
	'priority'   => 30,
	
	) );

	$wp_customize->add_setting(
		'yplef_page_top[display_section]',
		array(
			'default'           => 1,
			// 'sanitize_callback' => 'yplefclassic_sanitize_color_scheme',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_setting(
		'yplef_page_top[contact_phone]',
		array(
			'default'           => '+2348012345678',
			// 'sanitize_callback' => 'yplefclassic_sanitize_color_scheme',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_setting(
		'yplef_page_top[contact_email]',
		array(
			'default'           => 'default',
			// 'sanitize_callback' => 'yplefclassic_sanitize_color_scheme',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_setting(
		'yplef_page_top[contact_address]',
		array(
			'default'           => 'default',
			// 'sanitize_callback' => 'yplefclassic_sanitize_color_scheme',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_setting(
		'yplef_page_top[facebook_link]',
		array(
			'default'           => '#',
			// 'sanitize_callback' => 'yplefclassic_sanitize_color_scheme',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_setting(
		'yplef_page_top[instagram_link]',
		array(
			'default'           => '#',
			// 'sanitize_callback' => 'yplefclassic_sanitize_color_scheme',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_setting(
		'yplef_page_top[twitter_link]',
		array(
			'default'           => '#',
			// 'sanitize_callback' => 'yplefclassic_sanitize_color_scheme',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'display_section',
		array(
			'label'    => __( 'Enable Section', 'yplefclassic' ),
			'section'  => 'yplef_page_top',
			'settings' => 'yplef_page_top[display_section]',
			'type'     => 'checkbox',
			// 'choices'  => yplefclassic_get_color_scheme_choices(),
			'priority' => 1,
		)
	);	

	$wp_customize->add_control(
		'contact_email',
		array(
			'label'    => __( 'Contact email', 'yplefclassic' ),
			'section'  => 'yplef_page_top',
			'settings'  => 'yplef_page_top[contact_email]',
			'type'     => 'text',
			// 'choices'  => yplefclassic_get_color_scheme_choices(),
			'priority' => 1,
		)
	);	
	
	$wp_customize->add_control(
		'contact_phone',
		array(
			'label'    => __( 'Contact phone', 'yplefclassic' ),
			'section'  => 'yplef_page_top',
			'settings'  => 'yplef_page_top[contact_phone]',
			'type'     => 'text',
			// 'choices'  => yplefclassic_get_color_scheme_choices(),
			'priority' => 1,
		)
	);

		
	$wp_customize->add_control(
		'contact_address',
		array(
			'label'    => __( 'Contact Address', 'yplefclassic' ),
			'section'  => 'yplef_page_top',
			'settings'  => 'yplef_page_top[contact_address]',
			'type'     => 'text',
			// 'choices'  => yplefclassic_get_color_scheme_choices(),
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
		'facebook_link',
		array(
			'label'    => __( 'Facebook social link', 'yplefclassic' ),
			'section'  => 'yplef_page_top',
			'settings'  => 'yplef_page_top[facebook_link]',
			'type'     => 'text',
			// 'choices'  => yplefclassic_get_color_scheme_choices(),
			'priority' => 1,
		)
	);
	$wp_customize->add_control(
		'twitter_link',
		array(
			'label'    => __( 'Twitter social link', 'yplefclassic' ),
			'section'  => 'yplef_page_top',
			'settings'  => 'yplef_page_top[twitter_link]',
			'type'     => 'text',
			// 'choices'  => yplefclassic_get_color_scheme_choices(),
			'priority' => 1,
		)
	);
	$wp_customize->add_control(
		'instagram_link',
		array(
			'label'    => __( 'Instagram social link', 'yplefclassic' ),
			'section'  => 'yplef_page_top',
			'settings'  => 'yplef_page_top[instagram_link]',
			'type'     => 'text',
			// 'choices'  => yplefclassic_get_color_scheme_choices(),
			'priority' => 1,
		)
	);

	/***
	 * Toggle Site Sections
	 */
	$wp_customize->add_section( 'yplef_content_sections' , array(

		'title'      => __( 'Enabled Content Sections', 'yplef' ),
		
		'priority'   => 30,
		
		) );

	//Define the sections of the Template
	$sections =	array(
			array('label'=>'banner', 'name'=>'banner', 'desc'=>'Displays a banner. Create a post and add a category of Banner'),
			array('label'=>'services', 'name'=>'services', 'desc'=>'Displays a list of services'),
			array('label'=>'about',  'name'=>'About', 'desc'=>'Displays a list of posts categorized as about'),
			array('label'=>'counter',  'name'=>'Counter', 'desc'=>'Displays a counter'),
			array('label'=>'courses',  'name'=>'Courses', 'desc'=>'Displays a list of posts categorized as courses'),
			array('label'=>'instructors',  'name'=>'Instructors', 'desc'=>'Displays a list of instructors'),
			array('label'=>'testimonial',  'name'=>'Testimonial', 'desc'=>'Displays a list of posts tagged as testimonials'),
			array('label'=>'packages',  'name'=>'Packages', 'desc'=>'Displays a list of packages'),
			array('label'=>'news_events',  'name'=>'News and events', 'desc'=>'Displays a list posts categorizd as news_events'),
			array('label'=>'call_to_action',  'name'=>'Call to Action', 'desc'=>'Call to action button'),
			array('label'=>'blog_article',  'name'=>'Blog articles', 'desc'=>'Displays a list of blog articles'),
			array('label'=>'newsletter',  'name'=>'Subscribe to our Newsletter', 'desc'=>'Displays a newsletter form')
	);
	
	foreach( $sections as $section){
		$curr = $section['name'];

		$wp_customize->add_setting(
			"yplef_content_sections[$curr]",
			array(
				'default'           => 1,
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			$curr,
			array(
				'label'    => __(  $section['label'], 'yplefclassic' ),
				'section'  => 'yplef_content_sections',
				'settings'  => "yplef_content_sections[$curr]",
				'type'     => 'checkbox',
				'priority' => 1,
			)
		);
	}

}
add_action( 'customize_register', 'yplefclassic_customize_register', 11 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Yplef Classic 1.5
 *
 * @see yplefclassic_customize_register()
 *
 * @return void
 */
function yplefclassic_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Yplef Classic 1.5
 *
 * @see yplefclassic_customize_register()
 *
 * @return void
 */
function yplefclassic_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Register color schemes for Yplef Classic.
 *
 * Can be filtered with {@see 'yplefclassic_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Main Background Color.
 * 2. Sidebar Background Color.
 * 3. Box Background Color.
 * 4. Main Text and Link Color.
 * 5. Sidebar Text and Link Color.
 * 6. Meta Box Background Color.
 *
 * @since Yplef Classic 1.0
 *
 * @return array An associative array of color scheme options.
 */
function yplefclassic_get_color_schemes() {
	/**
	 * Filters the color schemes registered for use with Yplef Classic.
	 *
	 * The default schemes include 'default', 'dark', 'yellow', 'pink', 'purple', and 'blue'.
	 *
	 * @since Yplef Classic 1.0
	 *
	 * @param array $schemes {
	 *     Associative array of color schemes data.
	 *
	 *     @type array $slug {
	 *         Associative array of information for setting up the color scheme.
	 *
	 *         @type string $label  Color scheme label.
	 *         @type array  $colors HEX codes for default colors prepended with a hash symbol ('#').
	 *                              Colors are defined in the following order: Main background, sidebar
	 *                              background, box background, main text and link, sidebar text and link,
	 *                              meta box background.
	 *     }
	 * }
	 */
	return apply_filters(
		'yplefclassic_color_schemes',
		array(
			'default' => array(
				'label'  => __( 'Default', 'yplefclassic' ),
				'colors' => array(
					'#f1f1f1',
					'#ffffff',
					'#ffffff',
					'#333333',
					'#333333',
					'#f7f7f7',
				),
			),
			'dark'    => array(
				'label'  => __( 'Dark', 'yplefclassic' ),
				'colors' => array(
					'#111111',
					'#202020',
					'#202020',
					'#bebebe',
					'#bebebe',
					'#1b1b1b',
				),
			),
			'yellow'  => array(
				'label'  => __( 'Yellow', 'yplefclassic' ),
				'colors' => array(
					'#f4ca16',
					'#ffdf00',
					'#ffffff',
					'#111111',
					'#111111',
					'#f1f1f1',
				),
			),
			'pink'    => array(
				'label'  => __( 'Pink', 'yplefclassic' ),
				'colors' => array(
					'#ffe5d1',
					'#e53b51',
					'#ffffff',
					'#352712',
					'#ffffff',
					'#f1f1f1',
				),
			),
			'purple'  => array(
				'label'  => __( 'Purple', 'yplefclassic' ),
				'colors' => array(
					'#674970',
					'#2e2256',
					'#ffffff',
					'#2e2256',
					'#ffffff',
					'#f1f1f1',
				),
			),
			'blue'    => array(
				'label'  => __( 'Blue', 'yplefclassic' ),
				'colors' => array(
					'#e9f2f9',
					'#55c3dc',
					'#ffffff',
					'#22313f',
					'#ffffff',
					'#f1f1f1',
				),
			),
		)
	);
}

if ( ! function_exists( 'yplefclassic_get_color_scheme' ) ) :
	/**
	 * Get the current Yplef Classic color scheme.
	 *
	 * @since Yplef Classic 1.0
	 *
	 * @return array An associative array of either the current or default color scheme hex values.
	 */
	function yplefclassic_get_color_scheme() {
		$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
		$color_schemes       = yplefclassic_get_color_schemes();

		if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
			return $color_schemes[ $color_scheme_option ]['colors'];
		}

		return $color_schemes['default']['colors'];
	}
endif; // yplefclassic_get_color_scheme()

if ( ! function_exists( 'yplefclassic_get_color_scheme_choices' ) ) :
	/**
	 * Returns an array of color scheme choices registered for Yplef Classic.
	 *
	 * @since Yplef Classic 1.0
	 *
	 * @return array Array of color schemes.
	 */
	function yplefclassic_get_color_scheme_choices() {
		$color_schemes                = yplefclassic_get_color_schemes();
		$color_scheme_control_options = array();

		foreach ( $color_schemes as $color_scheme => $value ) {
			$color_scheme_control_options[ $color_scheme ] = $value['label'];
		}

		return $color_scheme_control_options;
	}
endif; // yplefclassic_get_color_scheme_choices()

if ( ! function_exists( 'yplefclassic_sanitize_color_scheme' ) ) :
	/**
	 * Sanitization callback for color schemes.
	 *
	 * @since Yplef Classic 1.0
	 *
	 * @param string $value Color scheme name value.
	 * @return string Color scheme name.
	 */
	function yplefclassic_sanitize_color_scheme( $value ) {
		$color_schemes = yplefclassic_get_color_scheme_choices();

		if ( ! array_key_exists( $value, $color_schemes ) ) {
			$value = 'default';
		}

		return $value;
	}
endif; // yplefclassic_sanitize_color_scheme()

/**
 * Enqueues front-end CSS for color scheme.
 *
 * @since Yplef Classic 1.0
 *
 * @see wp_add_inline_style()
 */
function yplefclassic_color_scheme_css() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );

	// Don't do anything if the default color scheme is selected.
	if ( 'default' === $color_scheme_option ) {
		return;
	}

	$color_scheme = yplefclassic_get_color_scheme();

	// Convert main and sidebar text hex color to rgba.
	$color_textcolor_rgb         = yplefclassic_hex2rgb( $color_scheme[3] );
	$color_sidebar_textcolor_rgb = yplefclassic_hex2rgb( $color_scheme[4] );
	$colors                      = array(
		'background_color'            => $color_scheme[0],
		'header_background_color'     => $color_scheme[1],
		'box_background_color'        => $color_scheme[2],
		'textcolor'                   => $color_scheme[3],
		'secondary_textcolor'         => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_textcolor_rgb ),
		'border_color'                => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.1)', $color_textcolor_rgb ),
		'border_focus_color'          => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.3)', $color_textcolor_rgb ),
		'sidebar_textcolor'           => $color_scheme[4],
		'sidebar_border_color'        => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.1)', $color_sidebar_textcolor_rgb ),
		'sidebar_border_focus_color'  => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.3)', $color_sidebar_textcolor_rgb ),
		'secondary_sidebar_textcolor' => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_sidebar_textcolor_rgb ),
		'meta_box_background_color'   => $color_scheme[5],
	);

	$color_scheme_css = yplefclassic_get_color_scheme_css( $colors );

	wp_add_inline_style( 'yplefclassic-style', $color_scheme_css );
}
add_action( 'wp_enqueue_scripts', 'yplefclassic_color_scheme_css' );

/**
 * Binds JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 * @since Yplef Classic 1.0
 */
function yplefclassic_customize_control_js() {
	wp_enqueue_script( 'color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20141216', array( 'in_footer' => true ) );
	wp_localize_script( 'color-scheme-control', 'colorScheme', yplefclassic_get_color_schemes() );
}
add_action( 'customize_controls_enqueue_scripts', 'yplefclassic_customize_control_js' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Yplef Classic 1.0
 */
function yplefclassic_customize_preview_js() {
	wp_enqueue_script( 'yplefclassic-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', array( 'in_footer' => true ) );
}
add_action( 'customize_preview_init', 'yplefclassic_customize_preview_js' );

/**
 * Returns CSS for the color schemes.
 *
 * @since Yplef Classic 1.0
 *
 * @param array $colors Color scheme colors.
 * @return string Color scheme CSS.
 */
function yplefclassic_get_color_scheme_css( $colors ) {
	$colors = wp_parse_args(
		$colors,
		array(
			'background_color'            => '',
			'header_background_color'     => '',
			'box_background_color'        => '',
			'textcolor'                   => '',
			'secondary_textcolor'         => '',
			'border_color'                => '',
			'border_focus_color'          => '',
			'sidebar_textcolor'           => '',
			'sidebar_border_color'        => '',
			'sidebar_border_focus_color'  => '',
			'secondary_sidebar_textcolor' => '',
			'meta_box_background_color'   => '',
		)
	);

	$css = <<<CSS
	/* Color Scheme */

	/* Background Color */
	body {
		background-color: {$colors['background_color']};
	}

	/* Sidebar Background Color */
	body:before,
	.site-header {
		background-color: {$colors['header_background_color']};
	}

	/* Box Background Color */
	.post-navigation,
	.pagination,
	.secondary,
	.site-footer,
	.hentry,
	.page-header,
	.page-content,
	.comments-area,
	.widecolumn {
		background-color: {$colors['box_background_color']};
	}

	/* Box Background Color */
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.pagination .prev,
	.pagination .next,
	.widget_calendar tbody a,
	.widget_calendar tbody a:hover,
	.widget_calendar tbody a:focus,
	.page-links a,
	.page-links a:hover,
	.page-links a:focus,
	.sticky-post {
		color: {$colors['box_background_color']};
	}

	/* Main Text Color */
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.pagination .prev,
	.pagination .next,
	.widget_calendar tbody a,
	.page-links a,
	.sticky-post {
		background-color: {$colors['textcolor']};
	}

	/* Main Text Color */
	body,
	blockquote cite,
	blockquote small,
	a,
	.dropdown-toggle:after,
	.image-navigation a:hover,
	.image-navigation a:focus,
	.comment-navigation a:hover,
	.comment-navigation a:focus,
	.widget-title,
	.entry-footer a:hover,
	.entry-footer a:focus,
	.comment-metadata a:hover,
	.comment-metadata a:focus,
	.pingback .edit-link a:hover,
	.pingback .edit-link a:focus,
	.comment-list .reply a:hover,
	.comment-list .reply a:focus,
	.site-info a:hover,
	.site-info a:focus {
		color: {$colors['textcolor']};
	}

	/* Main Text Color */
	.entry-content a,
	.entry-summary a,
	.page-content a,
	.comment-content a,
	.pingback .comment-body > a,
	.author-description a,
	.taxonomy-description a,
	.textwidget a,
	.entry-footer a:hover,
	.comment-metadata a:hover,
	.pingback .edit-link a:hover,
	.comment-list .reply a:hover,
	.site-info a:hover {
		border-color: {$colors['textcolor']};
	}

	/* Secondary Text Color */
	button:hover,
	button:focus,
	input[type="button"]:hover,
	input[type="button"]:focus,
	input[type="reset"]:hover,
	input[type="reset"]:focus,
	input[type="submit"]:hover,
	input[type="submit"]:focus,
	.pagination .prev:hover,
	.pagination .prev:focus,
	.pagination .next:hover,
	.pagination .next:focus,
	.widget_calendar tbody a:hover,
	.widget_calendar tbody a:focus,
	.page-links a:hover,
	.page-links a:focus {
		background-color: {$colors['secondary_textcolor']};
	}

	/* Secondary Text Color */
	blockquote,
	a:hover,
	a:focus,
	.main-navigation .menu-item-description,
	.post-navigation .meta-nav,
	.post-navigation a:hover .post-title,
	.post-navigation a:focus .post-title,
	.image-navigation,
	.image-navigation a,
	.comment-navigation,
	.comment-navigation a,
	.widget,
	.author-heading,
	.entry-footer,
	.entry-footer a,
	.taxonomy-description,
	.page-links > .page-links-title,
	.entry-caption,
	.comment-author,
	.comment-metadata,
	.comment-metadata a,
	.pingback .edit-link,
	.pingback .edit-link a,
	.post-password-form label,
	.comment-form label,
	.comment-notes,
	.comment-awaiting-moderation,
	.logged-in-as,
	.form-allowed-tags,
	.no-comments,
	.site-info,
	.site-info a,
	.wp-caption-text,
	.gallery-caption,
	.comment-list .reply a,
	.widecolumn label,
	.widecolumn .mu_register label {
		color: {$colors['secondary_textcolor']};
	}

	/* Secondary Text Color */
	blockquote,
	.logged-in-as a:hover,
	.comment-author a:hover {
		border-color: {$colors['secondary_textcolor']};
	}

	/* Border Color */
	hr,
	.dropdown-toggle:hover,
	.dropdown-toggle:focus {
		background-color: {$colors['border_color']};
	}

	/* Border Color */
	pre,
	abbr[title],
	table,
	th,
	td,
	input,
	textarea,
	.main-navigation ul,
	.main-navigation li,
	.post-navigation,
	.post-navigation div + div,
	.pagination,
	.comment-navigation,
	.widget li,
	.widget_categories .children,
	.widget_nav_menu .sub-menu,
	.widget_pages .children,
	.site-header,
	.site-footer,
	.hentry + .hentry,
	.author-info,
	.entry-content .page-links a,
	.page-links > span,
	.page-header,
	.comments-area,
	.comment-list + .comment-respond,
	.comment-list article,
	.comment-list .pingback,
	.comment-list .trackback,
	.comment-list .reply a,
	.no-comments {
		border-color: {$colors['border_color']};
	}

	/* Border Focus Color */
	a:focus,
	button:focus,
	input:focus {
		outline-color: {$colors['border_focus_color']};
	}

	input:focus,
	textarea:focus {
		border-color: {$colors['border_focus_color']};
	}

	/* Sidebar Link Color */
	.secondary-toggle:before {
		color: {$colors['sidebar_textcolor']};
	}

	.site-title a,
	.site-description {
		color: {$colors['sidebar_textcolor']};
	}

	/* Sidebar Text Color */
	.site-title a:hover,
	.site-title a:focus {
		color: {$colors['secondary_sidebar_textcolor']};
	}

	/* Sidebar Border Color */
	.secondary-toggle {
		border-color: {$colors['sidebar_border_color']};
	}

	/* Sidebar Border Focus Color */
	.secondary-toggle:hover,
	.secondary-toggle:focus {
		border-color: {$colors['sidebar_border_focus_color']};
	}

	.site-title a {
		outline-color: {$colors['sidebar_border_focus_color']};
	}

	/* Meta Background Color */
	.entry-footer {
		background-color: {$colors['meta_box_background_color']};
	}

	@media screen and (min-width: 38.75em) {
		/* Main Text Color */
		.page-header {
			border-color: {$colors['textcolor']};
		}
	}

	@media screen and (min-width: 59.6875em) {
		/* Make sure its transparent on desktop */
		.site-header,
		.secondary {
			background-color: transparent;
		}

		/* Sidebar Background Color */
		.widget button,
		.widget input[type="button"],
		.widget input[type="reset"],
		.widget input[type="submit"],
		.widget_calendar tbody a,
		.widget_calendar tbody a:hover,
		.widget_calendar tbody a:focus {
			color: {$colors['header_background_color']};
		}

		/* Sidebar Link Color */
		.secondary a,
		.dropdown-toggle:after,
		.widget-title,
		.widget blockquote cite,
		.widget blockquote small {
			color: {$colors['sidebar_textcolor']};
		}

		.widget button,
		.widget input[type="button"],
		.widget input[type="reset"],
		.widget input[type="submit"],
		.widget_calendar tbody a {
			background-color: {$colors['sidebar_textcolor']};
		}

		.textwidget a {
			border-color: {$colors['sidebar_textcolor']};
		}

		/* Sidebar Text Color */
		.secondary a:hover,
		.secondary a:focus,
		.main-navigation .menu-item-description,
		.widget,
		.widget blockquote,
		.widget .wp-caption-text,
		.widget .gallery-caption {
			color: {$colors['secondary_sidebar_textcolor']};
		}

		.widget button:hover,
		.widget button:focus,
		.widget input[type="button"]:hover,
		.widget input[type="button"]:focus,
		.widget input[type="reset"]:hover,
		.widget input[type="reset"]:focus,
		.widget input[type="submit"]:hover,
		.widget input[type="submit"]:focus,
		.widget_calendar tbody a:hover,
		.widget_calendar tbody a:focus {
			background-color: {$colors['secondary_sidebar_textcolor']};
		}

		.widget blockquote {
			border-color: {$colors['secondary_sidebar_textcolor']};
		}

		/* Sidebar Border Color */
		.main-navigation ul,
		.main-navigation li,
		.widget input,
		.widget textarea,
		.widget table,
		.widget th,
		.widget td,
		.widget pre,
		.widget li,
		.widget_categories .children,
		.widget_nav_menu .sub-menu,
		.widget_pages .children,
		.widget abbr[title] {
			border-color: {$colors['sidebar_border_color']};
		}

		.dropdown-toggle:hover,
		.dropdown-toggle:focus,
		.widget hr {
			background-color: {$colors['sidebar_border_color']};
		}

		.widget input:focus,
		.widget textarea:focus {
			border-color: {$colors['sidebar_border_focus_color']};
		}

		.sidebar a:focus,
		.dropdown-toggle:focus {
			outline-color: {$colors['sidebar_border_focus_color']};
		}
	}
CSS;

	return $css;
}

/**
 * Output an Underscore template for generating CSS for the color scheme.
 *
 * The template generates the css dynamically for instant display in the Customizer
 * preview.
 *
 * @since Yplef Classic 1.0
 */
function yplefclassic_color_scheme_css_template() {
	$colors = array(
		'background_color'            => '{{ data.background_color }}',
		'header_background_color'     => '{{ data.header_background_color }}',
		'box_background_color'        => '{{ data.box_background_color }}',
		'textcolor'                   => '{{ data.textcolor }}',
		'secondary_textcolor'         => '{{ data.secondary_textcolor }}',
		'border_color'                => '{{ data.border_color }}',
		'border_focus_color'          => '{{ data.border_focus_color }}',
		'sidebar_textcolor'           => '{{ data.sidebar_textcolor }}',
		'sidebar_border_color'        => '{{ data.sidebar_border_color }}',
		'sidebar_border_focus_color'  => '{{ data.sidebar_border_focus_color }}',
		'secondary_sidebar_textcolor' => '{{ data.secondary_sidebar_textcolor }}',
		'meta_box_background_color'   => '{{ data.meta_box_background_color }}',
	);
	?>
	<script type="text/html" id="tmpl-yplefclassic-color-scheme">
		<?php echo yplefclassic_get_color_scheme_css( $colors ); ?>
	</script>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'yplefclassic_color_scheme_css_template' );
