<?php
/**
 * Top Header layout template
 *
 * @since 1.0.0
 * @author CodeManas
 * @copyright 2019 CodeManas. All RIghts Reserved !
 */


$top_header_bg = Catmandu_Theme_Options::get_option( 'field-top-header-bg' );

?>

<div id="tophead" class="<?php echo esc_attr( $top_header_bg ); ?>">
	<div class="container">
		
		<?php catmandu_top_header_main(); ?>

	</div> <!-- .container -->
</div> <!-- #tophead -->

