<?php
//portfolio_piece CPT
add_action( 'init', 'add_portfolio_piece' );
add_action('admin_init', 'add_portfolio_piece_fields');
add_action('save_post', 'save_portfolio_meta');	

function add_portfolio_piece(){
	$args = array(
		'labels' => array(
			'name' => __( 'Portfolio' ),
			'singular_name' => __( 'Portfolio Piece' ),
		),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio-piece' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author',  'excerpt',)
	);
	register_post_type( 'portfolio-piece', $args );
}

function add_portfolio_piece_fields(){
	add_meta_box( 'portfolio_cover', 'Portfolio Cover', 'portfolio_meta_options_callback', 'portfolio-piece' );
}
function portfolio_meta_options_callback(){
	global $post;
	$portfolio = get_post_custom($post->ID);

    (isset($portfolio["portfolio_cover"][0])) ? $portfolio_cover = $portfolio["portfolio_cover"][0] : $portfolio_cover = "";
    (isset($portfolio["portfolio_piece_link"][0])) ? $portfolio_piece_link = $portfolio["portfolio_piece_link"][0] : $portfolio_piece_link = "";
    (isset($portfolio["portfolio_order"][0])) ? $portfolio_order = $portfolio["portfolio_order"][0] : $portfolio_order = "";
	?>
	<input name="portfolio_piece_link" class="portfolio_piece_link" type="text" value="<?php echo $portfolio_piece_link; ?>" placeholder="link" />
	<input name="portfolio_cover" class="portfolio_cover" type="hidden" value="<?php echo $portfolio_cover; ?>" />
	<input id="upload-button-portfolio-cover" type="button" value="Upload Image" /><br/>
	<input name="portfolio_order" class="portfolio_order" type="text" value="<?php echo $portfolio_order; ?>" placeholder="order" />
	<?php
}
function save_portfolio_meta(){
	global $post;
	if(! isset($post->ID)) {return;}
    update_post_meta($post->ID, "portfolio_cover", $_POST["portfolio_cover"]);
    update_post_meta($post->ID, "portfolio_piece_link", $_POST["portfolio_piece_link"]);
    update_post_meta($post->ID, "portfolio_order", $_POST["portfolio_order"]);

}
?>