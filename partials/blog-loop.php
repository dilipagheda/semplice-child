<?php 



if(have_posts()) : 
	$args = array(
		'numberposts' => 13,
		'offset' => 0,
		'orderby' => 'post_date',
		'order' => 'DESC',
		'post_type' => 'post',
		'post_status' => 'publish'	
	);
	
	$recent_posts = wp_get_recent_posts($args);
?>
<div class="container">
	<div class="row">
		<?php for($x = 0; $x < count($recent_posts); $x++) { 
			
			// echo '<pre>';
			// print_r($recent_posts[$x]);
			// echo '</pre>';
			set_query_var( 'current_post', $recent_posts[$x] );
			if($x==0) : 
				get_template_part('partials/hero-one');
			else :  
				if($x==1) : 
					get_template_part('partials/hero-two');
				else:
					if($x==2):
						get_template_part('partials/hero-three');
					else:
						if($x==9):
							get_template_part('partials/hero-one');
						else:
							get_template_part('partials/blog-normal');
						endif;
					endif;
				endif;		
			?>
				
			<?php endif; } ?>

	</div>
<?php else :  ?>
	<?php if(is_search()) : ?>
	<div class="container">
		<div class="row">
			<div class="span12"><p class="no-results"><?php echo __('No results were found. Please try a different search.', 'semplice'); ?></p></div>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
</div>