<?php
/**
 * Plugin Name: Tabs
 * Description: JavaScript tabs for WordPress. Use in templates or with shortcodes.
 */

class TP_Tabs {
	function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_shortcode( 'tabs', array( $this, 'tabs' ) );
		add_shortcode( 'tab', array( $this, 'tab' ) );
	}
	
	/**
	 * Enqueue scripts
	 */
	function enqueue_scripts() {
		wp_enqueue_script( 'tp-tabs', plugins_url( 'assets/js/tabs.js', __FILE__ ), array( 'jquery' ) );
		wp_enqueue_style( 'tp-tabs', plugins_url( 'assets/sass/tabs.css', __FILE__ ) );
	}
	
	/**
	 * Shortcode: Tabs
	 */
	function tabs( $args, $content ) {
		global $tabs;
		$tabs = array();
		
		//Tab labels
		$return = '<div class="tabs">';
		$return .= strip_tags( do_shortcode( $content ), '<a>' );
		$return .= '</div>';
		
		//Tab content
		$return .= '<div class="tab-content-wrapper">';
		foreach( $tabs as $tab => $text ) :
			$return .= '<div id="' . $tab . '" class="tab-content">' . do_shortcode($text) . '</div>';
		endforeach;
		$return .= '</div>';
		
		return $return;
	}
	
	/**
	 * Shortcode: Tab
	 */
	function tab( $args, $content ) {
		global $tabs;
		
		if( ! isset( $args['link'] ) ) :
			$tabs[ sanitize_title( $args['label'] ) ] = $content;
			return '<a class="tab" href="#' . sanitize_title( $args['label'] ) . '">' . $args['label'] . '</a>';
		else :
			return '<a class="tab" rel="' . $args['rel'] . '" href="' . esc_url( $args['link'] ) . '">' . $args['label'] . '</a>';	
		endif;
	}
} new TP_Tabs;
