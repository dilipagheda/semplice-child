<?php if(!is_search()) : echo '<div class="blog-search">'; endif; ?>
	<div class="container">
		<div class="row">
			<div class="span12"><?php get_search_form(); ?></div>
		</div>
		<?php if(is_search()) : ?>
		<div class="row">
			<div class="<?php if(get_field('skinoptions_content_width', 'options')) : echo get_field('skinoptions_content_width', 'options'); else : echo 'span8 offset2'; endif; ?> result-header">
				<h3 class="light"><?php echo __('Results for ', 'semplice'); ?>"<?php the_search_query(); ?>"</h3>
			</div>
		</div>
		<?php endif; ?>
	</div>
<?php if(!is_search()) : echo '<div class="post-divider search-divider"></div></div>'; endif; ?>