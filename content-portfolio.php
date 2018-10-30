<?php

/*
@package nells
*/

?>

<div class="col-xl-4 col-sm-6 col-12 portfolio_col">
	<div class="portfolio_piece">
		<a class="" href="<?php echo $post->portfolio_piece_link; ?>" target="_blank"><img class="portfolio_cover" src="<?php echo $post->portfolio_cover; ?>"></a>
		<?php the_content();?>
		<?php //the_terms($post->ID, 'technology', '<div class="portfolio_tags">',', ', '</div>');
			$terms = get_the_terms($post->ID, 'technology');
			echo '<div class="portfolio_tags">';
			if($terms){
				foreach($terms as $term){
					echo '<div class="portfolio_tag_group"><span class="portfolio_tag">' . $term->name . '</span>';
					echo '<span class="portfolio_tag_description">' . $term->description . '</span>';	 //hidden
					echo '</div>';
				}
			}
			echo '</div>';	
		?>
	</div>
</div><!-- .entry-content -->
	

