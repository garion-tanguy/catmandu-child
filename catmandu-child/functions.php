<?php
/**
 * Catmandu Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package catmandu-child
 */

define( 'CODEMANAS_CHILD_THEME_URL', trailingslashit( esc_url( get_stylesheet_directory_uri() ) ) );
define( 'CODEMANAS_CHILD_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );


/**
  * Set up textdomain.
  *
  */
function catmandu_child_setup() {
    load_child_theme_textdomain( 'catmandu-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'catmandu_child_setup' );

/**
 * Enqueue scripts and styles.
 */
function catmandu_child_enqueue_styles() {
	/* Directory and Extension */
	$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';
	$js_uri     = CODEMANAS_THEME_URL . 'assets/scripts/';

	wp_enqueue_style( 'catmandu-style', CODEMANAS_THEME_URL . 'style.css' );
	wp_enqueue_style( 'catmandu-child-style',
		CODEMANAS_CHILD_THEME_URL . 'style.css',
		array( 'catmandu-style' )
	);

}
add_action( 'wp_enqueue_scripts', 'catmandu_child_enqueue_styles' );

function catmandu_child_color_element_selectors() {
	$selectors = [];

	$selectors['color'] = '
		blockquote:before,
		.section-teams .team-position,
		.section-counter .counter-icon i,
		a:hover,
		a:focus,
		a:active,
		.site-title a:hover,
		.site-title a:focus,
		.site-title a:active,
		#header-nav ul li a:hover,
		#header-nav li.current-menu-item a,
		#header-nav li.current_page_item a,
		#header-nav li:hover > a,
		.header-v1 .main-navigation li > a:hover,
		.header-v1 .main-navigation li.current-menu-item > a,
		.header-v1 .main-navigation li.current-page-item > a,
		.header-v1 .main-navigation li:hover > a,
		.header-v1 .main-navigation ul ul li a:hover,
		.header-v1 .header-box-icon,
		.entry-meta a:hover,
		.entry-meta a:focus,
		.entry-meta a:active,
		.entry-title a:hover,
		.entry-title a:focus,
		.entry-title a:active,
		.widget .tagcloud a:hover,
		.sidebar  ul li a:hover,
		.sidebar  ul li a:focus,
		.sidebar  ul li a:active,
		.list-check li:before,
		#footer-navigation li a:hover,
		.section.section-featured-page li:before,
		.section-services .service-block-item a.service-icon,
		.portfolio-filter a.active, .portfolio-filter a:hover,
		.section-plan .pricing-plan-content li i ,#quick-contact li i,
		.main-navigation li li > a:hover, .main-navigation li li.current-menu-item > a, .main-navigation li li.current-page-item > a, .main-navigation li li:hover > a
	';

	$selectors['background'] = '
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		button,
		.custom-button,
		.custom-button:visited,
		a.button,
		.custom-button.custom-primary-button,
		.custom-button.custom-primary-button:visited,
		.custom-button.custom-secondary-button:hover,
		.quick-link a.quick-button-links,
		.skillbar-bar,
		.main-navigation li a:after,
		.pagination .nav-links .current,
		.pagination .nav-links a:hover,
		.pagination .nav-links a:active,
		.pagination .nav-links a:focus,
		.sidebar .widget-title:after,
		.section-plan .pricing-plan-item.pricing-plan-recommended .pricing-plan-header,
		.section-featured-banner .featured-banner > a::after,
		a.scrollup,
		a.scrollup:visited,
		.section-featured-banner .featured-banner > a::after,
		#content .section-title-wrap span.divider:before,
		.section-featured-slider .cycle-pager .cycle-pager-active,
		.section-featured-slider .cycle-prev:hover,
		.section-featured-slider .cycle-next:hover,
		.custom-button:hover,
		a.button:hover,
		button:focus,
		a.button:hover,
		button:focus,
		a.button:focus,h3.contact-title,
		.custom-button:focus,
		.custom-button:active,
		.custom-button.custom-primary-button:hover,
		 .custom-button.custom-primary-button:active,
		 .custom-button.custom-primary-button:focus,
		 .section-carousel-enabled .slick-prev.slick-arrow:hover,
		  .section-carousel-enabled .slick-next.slick-arrow:hover,
		  .woocommerce #respond input#submit,
			.woocommerce a.button,
			.woocommerce button.button,
			.woocommerce input.button,
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt
	';

	$selectors['border'] = '
		.pagination .nav-links .current,
		.pagination .nav-links a:hover,
		.pagination .nav-links a:active,
		.pagination .nav-links a:focus,
		.widget .tagcloud a:hover,
		.portfolio-filter a.active, .portfolio-filter a:hover,
		#content .section-title-wrap span.divider
	';

	$selectors['button-color'] = '
		 .custom-button,
		.custom-button:visited,
		a.button.custom-button,
		a.button.custom-button:visited
		.custom-button.custom-primary-button,
		.custom-button.custom-primary-button:visited,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.catmandu-btn-mediu a.more-link,
		.catmandu-btn-mediu .pagination .nav-links .page-numbers,
		.catmandu-btn-mediu .catmandu-pagination button
		.catmandu-btn-mediu .catmandu-pagination > a,
		.catmandu-btn-mediu .slider-buttons .custom-button
	';

	return $selectors;
}

add_filter( 'catmandu_filter_homepage_sort_fields', function( $homepage_sort_fields ) {

	$homepage_sort_fields['Showcases'] = esc_html__( 'Showcases', 'catmandu-child' );

	return $homepage_sort_fields;

});

add_filter( 'catmandu_filter_slider_text_alignments', function( $slider_text_alignments ) {

	$slider_text_alignments['center'] = esc_html__( 'Center', 'catmandu-child' );

	return $slider_text_alignments;

});

// Adding extra fields
add_filter( 'catmandu_customizer_configs', function( $configs ) {
	$defaults = Catmandu_Theme_Options::load_defaults();

	$customize_home_obj =  new Catmandu_Customizer_Register_Homepage();

	$homepage_showcase_section = array(
		array(
				'name'               => 'section-showcase',
				'category'           => 'section',
				'priority'           => 60,
				'title'              => __( 'Showcases', 'catmandu-child' ),
				'description_hidden' => true,
				'panel'				 => 'panel-homepage'
			),
	);

	$primary_header_field = array(
		//Header design layout
		array(
			'category'  => 'field',
			'type'      => 'radio-buttonset',
			'settings'  => 'field-header-design',
			'label'    => esc_html__( 'Header layout', 'catmandu-child' ),
			'section'   => 'section-header-primary',
			'default'   => $defaults['field-header-design'],
			'choices'   => array(
				'header-1'   => esc_attr__( 'Header 1', 'catmandu-child' ),
				'header-2' => esc_attr__( 'Header 2', 'catmandu-child' ),
			)
		),
		//Header design layout
		array(
			'category'  => 'field',
			'type'      => 'radio-buttonset',
			'settings'  => 'field-top-header-bg',
			'label'    => esc_html__( 'Top header background', 'catmandu-child' ),
			'section'   => 'section-header-top',
			'default'   => $defaults['field-top-header-bg'],
			'choices'   => array(
				'dark'   => esc_attr__( 'Dark', 'catmandu-child' ),
				'light' => esc_attr__( 'Light', 'catmandu-child' ),
			)
		),
	);

	$selectors = catmandu_child_color_element_selectors();
	$color_sections = array(
		array(
			'category'  => 'field',
			'type'      => 'color',
			'settings'  => 'field-global-theme-color',
			'label'     => __( 'Theme Color', 'catmandu-child' ),
			'section'   => 'section-global-colors',
			'default'   => $defaults['field-global-theme-color'],
			'transport' => 'auto',
			'choices'   => [
				'alpha' => true,
			],
			'output'    => [
				[
					'element'  => $selectors['background'],
					'property' => 'background-color'
				],
				[
					'element'  => $selectors['color'],
					'property' => 'color'
				],
				[
					'element'  => $selectors['border'],
					'property' => 'border-color'
				],
			],
		),
	);

	$showcase_sections = array(
		array(
			'category'  => 'field',
			'type'      => 'toggle',
			'settings'  => 'homepage-showcase-enable',
			'label'     => esc_html__( 'Enable Showcases ?', 'catmandu-child' ),
			'section'   => 'section-showcase',
			'default'   => $defaults['homepage-showcase-enable'],
			'transport' => 'refresh',
		),
		array(
			'category'  => 'field',
			'type'      => 'text',
			'settings'  => 'homepage-showcase-title',
			'label'     => esc_html__( 'Title', 'catmandu-child' ),
			'section'   => 'section-showcase',
			'default'   => $defaults['homepage-showcase-title'],
			'active_callback' => $customize_home_obj->section_enable_active_cb( 'homepage-showcase-enable' ),
			'partial_refresh'    => [
				'homepage-showcase-title' => [
					'selector'        => '.page-template-tmpl-home .section-showcase .section-title',
					'render_callback' => function() {
						return 	Catmandu_Theme_Options::get_option( 'homepage-showcase-title' );
					},
				],
			],
		),
		array(
			'category'  => 'field',
			'type'      => 'text',
			'settings'  => 'homepage-showcase-btn-txt',
			'label'     => esc_html__( 'Button text', 'catmandu-child' ),
			'section'   => 'section-showcase',
			'default'   => $defaults['homepage-showcase-btn-txt'],
			'active_callback' => $customize_home_obj->section_enable_active_cb( 'homepage-showcase-enable' ),
			'partial_refresh'    => [
				'homepage-showcase-btn-txt' => [
					'selector'        => '.page-template-tmpl-home .section-showcase .custom-button',
					'render_callback' => function() {
						return 	Catmandu_Theme_Options::get_option( 'homepage-showcase-btn-txt' );
					},
				],
			],
		),
		array(
			'category'  => 'field',
			'type'      => 'link',
			'settings'  => 'homepage-showcase-btn-url',
			'label'     => esc_html__( 'Button link', 'catmandu-child' ),
			'section'   => 'section-showcase',
			'default'   => $defaults['homepage-showcase-btn-url'],
			'active_callback' => $customize_home_obj->section_enable_active_cb( 'homepage-showcase-enable' ),
		),
		array(
			'category'    => 'field',
			'type'        => 'repeater',
			'label'       => esc_html__( 'Post showcase:', 'catmandu-child' ),
			'section'     => 'section-showcase',
			
			'row_label' => [
				'type'  => 'text',
				'value' => esc_html__( 'Showcases', 'catmandu-child' ),
			],
			'choices' => [
				'limit' => 2
			],
			'button_label' => esc_html__('Add showcase', 'catmandu-child' ),
			'settings'     => 'homepage-showcase-post-repeater',
			'default'	  => $defaults['homepage-showcase-post-repeater'],
			'fields' => [
				'post' => [
					'type'        => 'select',
					'label'       => esc_html__( 'Post', 'catmandu-child' ),
					'choices' 	  => Kirki_Helper::get_posts( array( 'post_type' => 'post', 'posts_per_page' => 999 ) ),
				],
			]
		),
	);

	return array_merge( $configs, $homepage_showcase_section, $primary_header_field, $color_sections, $showcase_sections );
} );

// Adding theme default values
add_filter( 'catmandu_theme_defaults', function( $defaults ) {

	$defaults['field-top-header-bg'] = 'light';
	$defaults['field-header-design'] = 'header-2';
	$defaults['field-global-theme-color'] = '#1e73be';

	$defaults['field-identity-site-title-typography'] = array(
		'color'          => '#1e73be',
	);

	$defaults['field-homepage-sort'] = [
		'Slider',
		'Features',
		'News',
		'Showcases',
		'Video',
		'Projects',
		'Newsletter',
		'CTA',
	];

	// Showcase
	$defaults['homepage-showcase-enable'] = false;
	$defaults['homepage-showcase-title'] = esc_html__( 'Let\'s Make Something Great together.', 'catmandu-child' );
	$defaults['homepage-showcase-btn-txt'] = esc_html__( 'Know More', 'catmandu-child' );
	$defaults['homepage-showcase-btn-url'] = '#';
	$defaults['homepage-showcase-post-repeater'] = [
			[
				'post' => 1,
			],
			[
				'post' => 1,
			],
		];

	return $defaults;
});

// Override parent theme functions
function catmandu_header_design_layout_cb() {

	$header_design = Catmandu_Theme_Options::get_option( 'field-header-design' );

	if ( 'header-2' === $header_design ) {
		add_action( 'catmandu_before_header', 'catmandu_masthead_nav', 5 );
		add_action( 'catmandu_masthead_content', 'catmandu_masthead_logo', 10 );
		add_action( 'catmandu_masthead_content', 'catmandu_child_top_header_quick_contacts', 20 );
	} else {
		add_action( 'catmandu_masthead_content', 'catmandu_masthead_logo', 10 );
		add_action( 'catmandu_masthead_content', 'catmandu_header_right_wrapper_start', 15 );
		add_action( 'catmandu_masthead_content', 'catmandu_masthead_nav', 20 );
		add_action( 'catmandu_masthead_content', 'catmandu_masthead_mini_cart', 30 );
		add_action( 'catmandu_masthead_content', 'catmandu_masthead_search', 40 );
		add_action( 'catmandu_masthead_content', 'catmandu_header_right_wrapper_end', 45 );
	}

	if ( 'header-1' === $header_design ) {
		add_action( 'catmandu_before_header', array( 'Catmandu_Template_Functions', 'top_header' ), 20 );
	}

	if ( 'header-2' === $header_design ) {
		add_action( 'catmandu_after_main_nav', 'catmandu_top_header_right_wrapper_start', 5 );
		add_action( 'catmandu_after_main_nav', 'catmandu_top_header_social_connects', 10 );
		add_action( 'catmandu_after_main_nav', 'catmandu_masthead_search', 20 );
		add_action( 'catmandu_after_main_nav', 'catmandu_masthead_mini_cart', 30 );
		add_action( 'catmandu_after_main_nav', 'catmandu_top_header_right_wrapper_end', 35 );
	} else {
		add_action( 'catmandu_top_header_main', 'catmandu_child_top_header_quick_contacts', 10 );
		add_action( 'catmandu_top_header_main', 'catmandu_top_header_social_connects', 20 );
	}
}

function catmandu_masthead_nav() {
		
	$header_design = Catmandu_Theme_Options::get_option( 'field-header-design' );

	$disable_menu = Catmandu_Theme_Options::get_option( 'field-header-menu-disable' );
	if ( ! $disable_menu ) { ?>

		<div id ="main-navigation" class=<?php echo esc_attr( catmandu_sticky_main_nav() ); ?> >

			<?php

			if ( 'header-2' === $header_design ) {
				echo '<div class="container">';
			}

			catmandu_before_main_nav();

			?>

			<nav class="main-navigation">

					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary-menu',
						'menu_class'  => 'primary-menu',
						'menu' => 'primary-menu'
					) );
					?>

			</nav> <!-- .site-navigation -->

			<?php

			catmandu_after_main_nav();

			if ( 'header-2' === $header_design ) {
				echo '</div>';
			}

			?>

		</div> <!-- #main-navigation -->
		<?php
	}
}

add_filter( 'catmandu_body_class', function( $classes ) {

	$header_design = Catmandu_Theme_Options::get_option( 'field-header-design' );

	if ( 'header-2' === $header_design ) {
		$classes[] = 'header-v2';
	} else {
		$classes[] = 'header-v1';
	}

	return $classes;
});

/**
 * Render Top Header quick contacts
 *
 * @return void
 */
function catmandu_child_top_header_quick_contacts() {
	$quick_contacts = Catmandu_Theme_Options::get_option( 'top-quick-contact' );
	if ( empty( $quick_contacts ) ) {
		return;
	}
	?>
	<div id="quick-contact">
		<ul>

			<?php foreach( $quick_contacts as $contact ) :
				$icon = $contact['icon'];
				$text = $contact['contact'];
				$title = $contact['title'];
				?>

				<li class="quick-call">

					<?php
					
					$header_design = Catmandu_Theme_Options::get_option( 'field-header-design' );
					// $header_design = 'header-1';
					if ( 'header-2' === $header_design ) {
						echo '<div class="header-box-icon">';
					}
					?>

					<?php if ( ! empty( $icon ) ) : ?>
						<i class="<?php echo esc_attr( $icon ); ?>"></i>
					<?php endif; ?>

					<?php
					if ( 'header-2' === $header_design ) {
						echo '
								</div>
							<div class="header-box-info">';
					}
					?>
						<?php if ( ! empty( $title ) ) : ?>
							<strong><?php echo esc_html( $title ); ?></strong>
						<?php endif; ?>

					<?php if ( ! empty( $text ) ) :

						if ( strpos( $icon, 'phone') ) :
							echo '<a href="tel:' . esc_attr( $text ) . '" >';
						elseif ( strpos( $icon, 'mail') || strpos( $icon, 'envelope') ) :
						    echo '<a href="mailto:' . sanitize_email( $text ) . '" >';
						endif; ?>

							<?php echo esc_html( $text );

						if ( strpos( $icon, 'phone') || strpos( $icon, 'mail') || strpos( $icon, 'envelope') ) :
							echo '</a>';
						endif; ?>

					<?php endif; ?>

					<?php
					if ( 'header-2' === $header_design ) {
						echo '</div>';
					}
					?>

				</li>

			<?php endforeach; ?>

		</ul>
	</div> <!-- .quick-contact -->
<?php
}

// Adding extra homepage sections
require_once CODEMANAS_CHILD_THEME_DIR . 'class-catmandu-homepage.php';
require_once CODEMANAS_CHILD_THEME_DIR . 'class-catmandu-child-showcases-section.php';
