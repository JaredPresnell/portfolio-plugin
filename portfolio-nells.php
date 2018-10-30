<?php 
/*
 @package portfolio-nells
 */
 /*
 Plugin Name: Nells Portfolio
 Plugin URI: https://jaredpresnell.me
 Description: A plugin to register portfolio piece custom post type and display portfolio
 Version: 1.0.0
 Author: Jared Presnell
 Author URI: https://jaredpresnell.me
 License: GPLv3
 Text Domain: nells-portfolio
 */
defined('ABSPATH') or die('stop that');

include plugin_dir_path( __FILE__ ) . 'portfolio-cpt.php';
include plugin_dir_path( __FILE__ ) . 'create-template.php';
include plugin_dir_path( __FILE__ ) . 'portfolio-ct.php';

function portfolio_enqueue(){
	if(is_page_template('page-portfolio.php'))
	{
		wp_enqueue_style( 'portfolio-css', plugin_dir_url(__FILE__) . 'css/style.min.css', array(), '1.0.0', 'all' );
	}
}
add_action( 'wp_enqueue_scripts', 'portfolio_enqueue' );
