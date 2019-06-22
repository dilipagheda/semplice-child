
<?php if(have_posts()) : ?>
	
<div class="container">
	<div class="row eq-posts-container">
		<?php $count=0;while(have_posts()) : the_post(); 
			render($count,null);
			$count++;
			endwhile; 
		?>
	</div>
</div>
<?php 			
wp_reset_postdata();
endif; ?>
