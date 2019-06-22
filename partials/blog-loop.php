<?php
	global $count;
?>
<?php if(have_posts()) : ?>
	
<div class="container">
	<div class="row eq-posts-container">
		<?php $count=0; while(have_posts()) : the_post(); 
			render($count);
			$count++;
			endwhile; 
			wp_reset_postdata();
		?>
	</div>
</div>
<?php endif; ?>
