<?php

/*
@package nells
 */

?>

<?php get_header(); ?>
 
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    	<div class="container">
			<script>
			    (function($){
			        $(window).on("load",function(){
			            $(".nells_sidebar_container").mCustomScrollbar();
			        });
			    })(jQuery);
			</script>
			<div class="nells_container container-fluid">
				<div class="row">
					<?php 
						get_template_part('inc/template-parts/nells', 'sidebar');
					?>	
					<div class="col-md-9 col-12 background_gradient offset-md-3">

						<div class="row">
							<div class="col-xl-10 col-md-12 background_solid"> 
								<?php while ( have_posts() ) : the_post(); ?>
								<div class="page_intro">
									<h1 class="intro_title"><?php the_title();?></h1>
									<?php the_content(); ?>
									
								<?php endwhile;?>
								</div> 
							    <?php

							   	 	$meta_key = "rating";	
									
									$wp_query = new WP_Query(
										array(
											'post_type' =>'portfolio-piece',
											'posts_per_page'=> '500',
											'orderby' 	=> 'meta_value',
											'order'		=> 'ASC',
											'meta_key' 	=> 'portfolio_order',
											'meta_type' => 'NUMERIC',
										) 
									);
								?>	
								<div class="portfolio_pieces row">
									<?php
									if( $wp_query->have_posts() ):
										while( $wp_query->have_posts() ): $wp_query->the_post();
											include plugin_dir_path( __FILE__ ) . 'content-portfolio.php';
											//get_template_part('inc/template-parts/content-portfolio');
										endwhile;
									endif;
									wp_reset_postdata();	
								?>
								</div> <!-- portfolio_pieces	 -->
							</div><!-- col-md-10 col-sm-10 -->	
							
						</div> <!-- col-9 -->
					</div> <!-- row -->
				</div><!-- .row -->
					
					
			</div><!-- about_container -->
			  
		</div> <!-- container -->
    </main><!-- .site-main -->

 
</div><!-- .content-area -->
 
<?php get_footer(); ?>

