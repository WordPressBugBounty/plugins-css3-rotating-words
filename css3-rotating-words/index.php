<?php
		/*
	Plugin Name: CSS3 Rotating Words - WordPress Plugin
	Description: This plugin will allow you to use multiple words in a sentence that will change randomly in a sentence.
	Plugin URI: http://webdevocean.com/css3-rotating-words-demo/
	Author: Labib Ahmed
	Author URI: http://webdevocean.com
	Version: 5.7
	License: GPL2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	Text Domain: la-wordsrotator
	*/
	
	/*
	
	    Copyright (C) 2024  Labib Ahmed webdevocean@gmail.com
	
	    This program is free software; you can redistribute it and/or modify
	    it under the terms of the GNU General Public License, version 2, as
	    published by the Free Software Foundation.
	
	    This program is distributed in the hope that it will be useful,
	    but WITHOUT ANY WARRANTY; without even the implied warranty of
	    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	    GNU General Public License for more details.
	
	    You should have received a copy of the GNU General Public License
	    along with this program; if not, write to the Free Software
	    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/

	/**
	 * Activation redirect after plugin activation.
	 */
	function wdo_activation_redirect_rotator() {
	    // Check if the plugin being activated is the current plugin and nonce is set
	    if( isset( $_GET['activate'] ) && ! empty( $_GET['activate'] ) && is_plugin_active( plugin_basename( __FILE__ ) ) && isset( $_GET['_wpnonce'] ) && wp_verify_nonce( $_GET['_wpnonce'], 'activate-plugin_' . plugin_basename( __FILE__ ) ) ) {
	        // Redirect to the plugin settings page
	        $redirect_url = add_query_arg( array( 'page' => 'word_rotator' ), admin_url( 'admin.php' ) );
	        wp_safe_redirect( $redirect_url );
	        exit();
	    }
	}
	add_action( 'admin_init', 'wdo_activation_redirect_rotator' );


	/**
	 * Include the plugin class file.
	 */
	include_once( plugin_dir_path( __FILE__ ) . 'plugin.class.php' );

	// Instantiate the plugin class if it exists.
	if ( class_exists( 'LA_Words_Rotator' ) ) {
	    $object = new LA_Words_Rotator;
	}
 ?>