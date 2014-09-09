<?php
/*
Plugin Name: Pronamic Persons
Plugin URI: http://www.happywp.com/plugins/pronamic-persons/
Description: This plugin adds some persons functionality.

Version: 1.0.0
Requires at least: 3.5

Author: Pronamic
Author URI: http://pronamic.eu/

License: Copyright (c) Pronamic

GitHub URI: https://github.com/pronamic/pronamic-persons
*/

define( 'PRONAMIC_PERSONS_PATH', plugin_dir_path( __FILE__ ) );
define( 'PRONAMIC_PERSONS_URL', plugins_url( '', __FILE__ ) );

/**
 * Global includes
 */
require PRONAMIC_PERSONS_PATH . 'includes/meta-boxes.php';

/**
 * Initialize plugin
 */
function pronamic_persons_init() {
	register_post_type( 'pronamic_person', array( 
		'labels' => array( 
			'name'               => _x( 'Persons', 'post type general name', 'pronamic_persons' ),
			'singular_name'      => _x( 'Person', 'post type singular name', 'pronamic_persons' ),
			'add_new'            => _x( 'Add New', 'person', 'pronamic_persons' ),
			'add_new_item'       => __( 'Add New Person', 'pronamic_persons' ),
			'edit_item'          => __( 'Edit Person', 'pronamic_persons' ),
			'new_item'           => __( 'New Person', 'pronamic_persons' ),
			'view_item'          => __( 'View Person', 'pronamic_persons' ),
			'search_items'       => __( 'Search Persons', 'pronamic_persons' ),
			'not_found'          => __( 'No persons found', 'pronamic_persons' ),
			'not_found_in_trash' => __( 'No persons found in Trash', 'pronamic_persons' ),
			'parent_item_colon'  => __( 'Parent Person:', 'pronamic_persons' ),
			'menu_name'          => __( 'Persons',  'pronamic_persons' )
		), 
		'public'                 => true,
		'publicly_queryable'     => true,
		'show_ui'                => true,
		'show_in_menu'           => true,
		'capability_type'        => 'post',
		'has_archive'            => true,
		'rewrite'                => array( 'slug' => __( 'persons', 'pronamic_persons' ) ),
		'menu_icon'              => 'dashicons-universal-access',
		'supports'               => array( 'title', 'editor', 'thumbnail' ),
	) );
}

add_action( 'init', 'pronamic_persons_init' );

/**
 * Load textdomain
 */
function pronamic_persons_load_textdomain() {
  	load_plugin_textdomain( 'pronamic_persons', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'pronamic_persons_load_textdomain' );
