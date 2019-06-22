<?php 
/*
 * blog index
 * semplice.theme
 */
?>
<?php get_header(); # inlude header ?>
<section id="blog" class="fade-content">
	<?php 
		if ( is_month() ) : 
			$title =  __('Archives for ', 'semplice') . get_the_date( __( 'F Y', 'semplice')); 
		else :
			$title =  __('All Posts in ', 'semplice') . single_cat_title( '', false ); 
		endif; 
		set_query_var('blog-title', $title);
		get_template_part('partials/blog-header'); 
	?>

	<?php get_template_part('partials/blog-loop'); ?>
	<?php get_template_part('partials/blog-pagination'); ?>
</section>
<?php get_footer(); # inlude footer ?>