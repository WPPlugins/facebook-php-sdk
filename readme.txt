=== Plugin Name ===
Contributors: piyushmishra
Tags: facebook, fb, facebook php sdk, facebook sdk
Requires at least: 3.1
Tested up to: 3.1
Stable tag: 2.1.2

Lets other plugins include the facebook-php-sdk library they are compatible with.  Should be used by other plugins as a dependency.

== Description ==

Plugin keeps all versions of facebook php-sdk available on github after 2.1.1
Stricly to be used only as a dependency by other plugins on a WordPress installation.

= For Developers=

Use the following code to load the required facebook sdk version
`add_filter('fb_php_sdk_load','your_filter');
function your_filter($array)
{
	$array[] = '2.1.2'; //exact version number you need
	return $array;
}
`

For latest tagged version use new Facebook
for older versions,
Add the version number replacing '.' with '_' after 'Facebook_' call to use the version needed.
ex:- new Facebook_2_1_3() for version 2.1.3 
= Note =

I run filter at priority 100 so you should either leave the third parameter blank or pick a lower number.

= The filter runs with plugins_loaded hook so donot call the class before that or you'll get errors =

== Installation ==

1. Upload `facebook-php-sdk` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How do I get the plugin to load my required version? =

Use the following code to load the required facebook sdk version
`add_filter('fb_php_sdk_load','your_filter');
function your_filter($array)
{
	$array[] = '2.1.2'; //exact version number you need
	return $array;
}
`

= How do I call the loaded class? =
Load the class after plugins_loaded has run or you will get errors.
For latest tagged version use new Facebook
for older versions,
Add the version number replacing '.' with '_' after 'Facebook_' call to use the version needed.
ex:- new Facebook_2_1_3() for version 2.1.3
