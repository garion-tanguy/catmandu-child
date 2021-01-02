<?php
if ( ! class_exists( 'Catmandu_Showcases_Section' ) ) {
	/**
	 * Constructor
	 */

	class Catmandu_Showcases_Section extends Catmandu_Homepage {

		static $data_arr = [];
		
		public static function render_from_post() {
			$showcases_posts = Catmandu_Theme_Options::get_option( 'homepage-showcase-post-repeater' );


			foreach ( $showcases_posts as $showcases ) {
				$post_id = absint( $showcases['post'] );

				$post_arr['title'] = get_the_title( $post_id );
				$post_arr['url'] = get_permalink( $post_id );
				$post_arr['img'] = get_the_post_thumbnail( $post_id );

				array_push( self::$data_arr, $post_arr );
			}

			return apply_filters( 'catmandu_child_showcases_post_data_arr', self::$data_arr );
		}

		public static function render_content() {
			$showcases_enable = Catmandu_Theme_Options::get_option( 'homepage-showcase-enable' );

			if ( ! $showcases_enable ) {
				return;
			}

			$title = Catmandu_Theme_Options::get_option( 'homepage-showcase-title' );
			$content = Catmandu_Theme_Options::get_option( 'homepage-showcase-content' );
			$btn_txt = Catmandu_Theme_Options::get_option( 'homepage-showcase-btn-txt' );
			$btn_url = Catmandu_Theme_Options::get_option( 'homepage-showcase-btn-url' );

			$showcase_content_sort = array( 'content', 'showcases' );
			$content_sort_class = ( array( 'content', 'showcases' ) === $showcase_content_sort ) ? 'showcases-content-first ' : 'showcases-content-second ';
			$background = Catmandu_Theme_Options::get_option( 'showcase-bg' );

			$data_arr = self::render_data( self::render_from_post() );

			?>
	 		
			<aside class="section section-showcase <?php echo esc_attr( $content_sort_class ) . esc_attr( $background ); ?>-background">
				<div class="container">
					<div class="inner-wrapper">
						<div class="featured-page-section">
	 				
	 						<?php ob_start(); ?>
							<div class="col-grid-4">
				 				<div class="section-title-wrap text-alignleft">

				 					<?php if ( ! empty( $title ) ) { ?>
				 						<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
				 					<?php } ?>

				 					<span class="divider"></span>

				 					<?php if ( ! empty( $content ) ) { ?>
				 						<h5><?php echo esc_html( $content ); ?></h5>
				 					<?php } ?>
				 				</div>
				 				
				 				<?php if ( ! empty( $btn_txt ) ) { ?>
					 				<a href="<?php echo esc_url( $btn_url ); ?>"  class="custom-button button-curved"><?php echo esc_html( $btn_txt ); ?></a>
				 				<?php } ?>

							</div>
							<?php 
							$content = ob_get_contents();
							ob_end_clean();
							?>
							
	 						<?php ob_start(); ?>
							<div class="col-grid-8">
								<div class="inner-wrapper">
									<div class="features-wrapper">
					
										<?php foreach ( $data_arr  as $data ) : ?>
											
											<div class="col-grid-6 no-margin features-item">
												<div  class="feature-thumb">

													<?php if ( ! empty( $data['img'] ) ) { ?>
														<a href="<?php echo esc_url( $data['url'] ); ?>"><?php echo $data['img']; ?></a>
				 									<?php } ?>

													<?php if ( ! empty( $data['title'] ) ) { ?>
														<h3 class="feature-title"><a href="<?php echo esc_url( $data['url'] ); ?>"><?php echo esc_html( $data['title'] ); ?></a></h3>
				 									<?php } ?>

												</div>
											</div>

										<?php endforeach; ?>

									</div><!-- .features-wrapper -->
								</div><!-- .inner-wrapper -->
							</div> <!-- .service-block-list -->
							<?php 
							$showcases = ob_get_contents();
							ob_end_clean();


							foreach( $showcase_content_sort as $value ) {
							   	echo $$value;
							}
							?>

						</div><!-- .featured-page-section -->
					</div> <!-- .inner-wrapper -->
	 			</div> <!-- .container -->
			</aside> <!-- .section section-services -->
		
		<?php
		}
	}

	new Catmandu_Showcases_Section();
}
