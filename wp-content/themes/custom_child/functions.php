<?php
/**
 *
 * @package [Parent Theme]
 * @author  gaviasthemes <gaviasthemes@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * 
 */

function krowd_child_scripts() {
   wp_enqueue_style( 'krowd-parent-style', get_template_directory_uri(). '/style.css');
   wp_enqueue_style( 'krowd-child-style', get_stylesheet_uri());
	wp_enqueue_style( 'homestyle', get_stylesheet_directory_uri(). '/assets/home.css');
		wp_enqueue_style( 'commonstyle', get_stylesheet_directory_uri(). '/assets/common.css');


}
add_action( 'wp_enqueue_scripts', 'krowd_child_scripts', 9999 );