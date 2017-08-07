<?php
/*
Plugin Name: Facebook php SDK
Plugin URI: http://wordpress.org/plugins/facebook-php-sdk
Description: Lets other plugins include the facebook-php-sdk library they are compatible with.  Should be used by other plugins as a dependency.
Author: Piyush Mishra
Author URI: http://www.piyushmishra.com/
Version: 2.1.2
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

/*  Copyright 2010  Piyush Mishra  (email : me@piyushmishra.com)

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
add_filter('fb_php_sdk_load','fb_php_sdk_filter',100);
add_action('plugins_loaded','fb_php_sdk_apply_filter',0);
function fb_php_sdk_apply_filter()
{
	apply_filters('fb_php_sdk_load',array());
}
function fb_php_sdk_filter($array)
{
	if( count( $array ) )
		foreach( $array as $version )
		{
			$ver = str_replace( '.', '_', $version );
			$file = 'facebook-'.$ver.'.php';
			$class = 'Facebook_'.$ver;
			if( file_exists( $file ) )
				if( ! class_exists( $class ) )
					require_once( $file );
		}
	if( ! class_exists( 'Facebook' ) )
		require_once( 'facebook.php' );
	if( ! class_exists( 'FacebookApiException' ) )
		require_once( 'facebook-exception.php' );
	
	return;
}
