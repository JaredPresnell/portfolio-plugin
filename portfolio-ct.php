<?php
	/**
	 * Create a taxonomy
	 *
	 * @uses  Inserts new taxonomy object into the list
	 * @uses  Adds query vars
	 *
	 * @param string  Name of taxonomy object
	 * @param array|string  Name of the object type for the taxonomy object.
	 * @param array|string  Taxonomy arguments
	 * @return null|WP_Error WP_Error if errors, otherwise null.
	 */
	function register_technology() {
	
		$labels = array(
			'name'                  => _x( 'technology', 'technologies', 'text-domain' ),
		'singular_name'         => _x( 'Technology', 'Technologies', 'text-domain' ),
			'search_items'          => __( 'Search Technologies', 'text-domain' ),
			'popular_items'         => __( 'Popular Technologies', 'text-domain' ),
			'all_items'             => __( 'All Technologies', 'text-domain' ),
			'menu_name'             => __( 'Technologies', 'text-domain' ),
		);
	
		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => false,
			'hierarchical'      => false,
			'show_tagcloud'     => true,
			'show_ui'           => true,
			'query_var'         => true,
			'rewrite'           => true,
			'query_var'         => true,
			'capabilities'      => array(),
		);
	
		register_taxonomy( 'technology', array( 'portfolio-piece' ), $args );
	}
	
	add_action( 'init', 'register_technology' );

?>

