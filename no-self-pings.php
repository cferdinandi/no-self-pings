<?php

/**
 * Plugin Name: No Self Pings
 * Plugin URI: https://github.com/cferdinandi/no-self-pings/
 * Description: Prevents internal links from showing up as pings/trackbacks in your comments.
 * Version: 1.0.0
 * Author: Chris Ferdinandi
 * Author URI: http://gomakethings.com
 * License: MIT
 *
 * Forked from WPMU.
 * http://wpmu.org/daily-tip-3-ways-to-remove-wordpress-self-pings/
 */

	function nsp_no_self_ping( &$links ) {
		$home = get_option( 'home' );
		foreach ( $links as $l => $link ) {
			if ( 0 === strpos( $link, $home ) ) {
				unset($links[$l]);
			}
		}
	}
	add_action( 'pre_ping', 'nsp_no_self_ping' );