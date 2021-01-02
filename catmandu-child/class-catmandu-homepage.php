<?php
/**
 * Homepage class
 *
 * Overriding parent theme parent class.
 *
 * Catmandu Pro
 * @since 1.0.0
 * @author CodeManas 2020. All Rights reserved.
 */

class Catmandu_Homepage {

	public static $data_arr = array();
	/**
	 * Constructor
	 */
	public function __construct() {
		apply_filters( 'catmandu_homepage_data', self::$data_arr );
	}

	/**
	 * Homepage
	 *
	 * @author CodeManas
	 * @since 1.0.0
	 */
	static function render_data( $data_arr ) {
		return $data_arr;
	}

}

new Catmandu_Homepage();