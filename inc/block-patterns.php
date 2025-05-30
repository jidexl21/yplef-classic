<?php
/**
 * Block Patterns
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern/
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern_category/
 *
 * @package WordPress
 * @subpackage Yplef_Classic
 * @since Yplef Classic 3.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'yplefclassic',
		array( 'label' => esc_html__( 'Yplef Classic', 'yplefclassic' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	// Gallery and Description.
	register_block_pattern(
		'yplefclassic/gallery-description',
		array(
			'title'      => esc_html__( 'Gallery and Description', 'yplefclassic' ),
			'categories' => array( 'yplefclassic' ),
			'content'    => '<!-- wp:columns {"verticalAlignment":"top"} --><div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"70%"} --><div class="wp-block-column is-vertically-aligned-top" style="flex-basis:70%"><!-- wp:gallery {"ids":[null,null,null],"columns":2,"linkTo":"none"} --><figure class="wp-block-gallery columns-2 is-cropped"><ul class="blocks-gallery-grid"><li class="blocks-gallery-item"><figure><img src="' . esc_url( get_template_directory_uri() ) . '/assets/pier-seagull.jpg" alt="' . esc_attr__( 'A pier with a seagull.', 'yplefclassic' ) . '" data-full-url="' . esc_url( get_template_directory_uri() ) . '/assets/pier-seagull.jpg" data-link="#"/></figure></li><li class="blocks-gallery-item"><figure><img src="' . esc_url( get_template_directory_uri() ) . '/assets/pier-seagulls.jpg" alt="' . esc_attr__( 'A pier with seagulls.', 'yplefclassic' ) . '" data-full-url="' . esc_url( get_template_directory_uri() ) . '/assets/pier-seagulls.jpg" data-link="#"/></figure></li><li class="blocks-gallery-item"><figure><img src="' . esc_url( get_template_directory_uri() ) . '/assets/pier-sunset.jpg" alt="' . esc_attr__( 'A pier at sunset', 'yplefclassic' ) . '" data-full-url="' . esc_url( get_template_directory_uri() ) . '/assets/pier-sunset.jpg" data-link="#"/></figure></li></ul></figure><!-- /wp:gallery --></div><!-- /wp:column --><!-- wp:column {"verticalAlignment":"top"} --><div class="wp-block-column is-vertically-aligned-top"><!-- wp:paragraph {"fontSize":"small"} --><p class="has-small-font-size"><em>' . esc_html__( 'Our default 2015 theme is clean, blog-focused, and designed for clarity. Yplef Classic’s simple, straightforward typography is readable on a wide variety of screen sizes, and suitable for multiple languages.', 'yplefclassic' ) . '</em></p><!-- /wp:paragraph --><!-- wp:separator {"color":"dark-gray","className":"is-style-wide"} --><hr class="wp-block-separator has-text-color has-background has-dark-gray-background-color has-dark-gray-color is-style-wide"/><!-- /wp:separator --></div><!-- /wp:column --></div><!-- /wp:columns -->',
		)
	);

	// Contact Area.
	register_block_pattern(
		'yplefclassic/contact-area',
		array(
			'title'      => esc_html__( 'Contact area', 'yplefclassic' ),
			'categories' => array( 'yplefclassic' ),
			'content'    => '<!-- wp:group {"backgroundColor":"light-gray","textColor":"dark-gray"} --><div class="wp-block-group has-dark-gray-color has-light-gray-background-color has-text-color has-background"><div class="wp-block-group__inner-container"><!-- wp:columns --><div class="wp-block-columns"><!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph --><p><strong>' . esc_html__( 'Email', 'yplefclassic' ) . '</strong><br><a href="mailto:#">' . esc_html__( 'example@example.com', 'yplefclassic' ) . '</a></p><!-- /wp:paragraph --><!-- wp:paragraph --><p><strong>' . esc_html__( 'Follow us', 'yplefclassic' ) . '</strong></p><!-- /wp:paragraph --><!-- wp:social-links --><ul class="wp-block-social-links"><!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /--><!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /--><!-- wp:social-link {"url":"https://instagram.com","service":"instagram"} /--><!-- wp:social-link {"url":"https://youtube.com","service":"youtube"} /--></ul><!-- /wp:social-links --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph --><p><strong>' . esc_html__( 'Phone', 'yplefclassic' ) . '</strong><br>' . esc_html__( '(123) 555-5555', 'yplefclassic' ) . '</p><!-- /wp:paragraph --><!-- wp:paragraph --><p><strong>' . esc_html__( 'Address', 'yplefclassic' ) . '</strong><br>' . esc_html__( '123 Main Street', 'yplefclassic' ) . '<br>' . esc_html__( 'City, State, 00000', 'yplefclassic' ) . '</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --></div></div><!-- /wp:group -->',
		)
	);

	// Two Columns with Images.
	register_block_pattern(
		'yplefclassic/two-columns-with-images',
		array(
			'title'      => esc_html__( 'Two Columns with Images', 'yplefclassic' ),
			'categories' => array( 'yplefclassic' ),
			'content'    => '<!-- wp:columns --><div class="wp-block-columns"><!-- wp:column --><div class="wp-block-column"><!-- wp:image {"id":null,"sizeSlug":"large","linkDestination":"none"} --><figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/pier-seagull.jpg" alt="' . esc_attr__( 'A pier with a seagull.', 'yplefclassic' ) . '"/></figure><!-- /wp:image --><!-- wp:heading --><h2>' . esc_html__( 'Adventure', 'yplefclassic' ) . '</h2><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html__( 'I faced about again, and rushed towards the approaching Martian, rushed right down the gravelly beach and headlong into the water. Others did the same.', 'yplefclassic' ) . '</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:image {"id":null,"sizeSlug":"large","linkDestination":"none"} --><figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/pier-seagulls.jpg" alt="' . esc_attr__( 'A pier with seagulls.', 'yplefclassic' ) . '"/></figure><!-- /wp:image --><!-- wp:heading --><h2>' . esc_html__( 'Travels', 'yplefclassic' ) . '</h2><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html__( 'A boatload of people putting back came leaping out as I rushed past. The stones under my feet were muddy and slippery, and the river was so low.', 'yplefclassic' ) . '</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns -->',
		)
	);

	// Columns with a list.
	register_block_pattern(
		'yplefclassic/columns-with-list',
		array(
			'title'      => esc_html__( 'Columns with a List', 'yplefclassic' ),
			'categories' => array( 'yplefclassic' ),
			'content'    => '<!-- wp:heading --><h2>' . esc_html__( 'What to pack for the beach', 'yplefclassic' ) . '</h2><!-- /wp:heading --><!-- wp:paragraph {"style":{"color":{"text":"#707070"}}} --><p class="has-text-color" style="color:#707070"><em>' . esc_html__( 'You don’t need a lot, trust us!', 'yplefclassic' ) . '</em></p><!-- /wp:paragraph --><!-- wp:columns --><div class="wp-block-columns"><!-- wp:column {"width":"65%"} --><div class="wp-block-column" style="flex-basis:65%"><!-- wp:paragraph --><p>' . esc_html__( 'As I watched, the planet seemed to grow larger and smaller and to advance and recede, but that was simply that my eye was tired. Forty millions of miles it was from us — more than forty millions of miles of void. Few people realize the immensity of vacancy in which the dust of the material universe swims.', 'yplefclassic' ) . '</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column {"width":"5%"} --><div class="wp-block-column" style="flex-basis:5%"></div><!-- /wp:column --><!-- wp:column {"width":"30%"} --><div class="wp-block-column" style="flex-basis:30%"><!-- wp:list --><ul><li>' . esc_html__( 'Towels', 'yplefclassic' ) . '</li><li>' . esc_html__( 'Camera', 'yplefclassic' ) . '</li><li>' . esc_html__( 'Water Bottle', 'yplefclassic' ) . '</li><li>' . esc_html__( 'Swimsuit', 'yplefclassic' ) . '</li><li>' . esc_html__( 'Snacks', 'yplefclassic' ) . '</li></ul><!-- /wp:list --></div><!-- /wp:column --></div><!-- /wp:columns -->',
		)
	);
}
