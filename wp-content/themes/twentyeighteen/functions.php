<?php

//header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
//header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
//header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
//header("Cache-Control: post-check=0, pre-check=0", false);
//header("Pragma: no-cache");

require_once 'theme_functions.php';
// Enqueue theme stylesheet and javascript
function add_theme_scripts() {
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );



// Enables Titles
function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );

function load_translation() {
	load_theme_textdomain( 'TimWe', get_template_directory() . DIRECTORY_SEPARATOR . 'languages' );
}
add_action( 'after_setup_theme', 'load_translation' );



// Enables post thumbnails
add_theme_support( 'post-thumbnails' );

// Enables ACF Pro Options Page (change 'TIMWE' to theme name)
if( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(array(
		'page_title' => 'TIMWE Options',
		'position' => 3,
	));
}



// Redirect to homepage after headers sent
function redirect_to_homepage() {
	$home_url = home_url();
	echo "<script type=\"text/javascript\">document.location = '$home_url';</script>";
	exit();
}