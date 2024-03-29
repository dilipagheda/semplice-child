<?php 
/*
 * blog index
 * semplice.theme
 */
?>
<?php get_header(); # inlude header ?>

<section id="blog" class="fade-content p-0">
	<?php 
		set_query_var('blog-title', 'Blog');
		get_template_part('partials/blog-header'); 
	?>
	<?php get_template_part('partials/blog-loop'); ?>
	<?php get_template_part('partials/blog-pagination'); ?>

</section>
<?php get_footer(); # inlude footer ?>