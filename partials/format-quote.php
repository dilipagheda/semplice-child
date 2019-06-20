<div id="post" <?php post_class('row'); ?>>
	<div class="<?php if(get_field('skinoptions_content_width', 'options')) : echo get_field('skinoptions_content_width', 'options'); else : echo 'span8 offset2'; endif; ?>">
		<div class="quote-container light_italic">
			<?php the_content(); ?>
		</div>
		<div class="wysiwyg no-meta <?php if(is_single() ) : echo 'single-quote'; endif; ?> <?php font_sizes(); ?>">
			<p class="quote"><?php the_title(); ?>, <a href="<?php the_permalink(); ?>">#</a></p>
			<?php if(is_single() || get_field('blog_index_display_metas', 'options') === 'enabled') : ?>
				<?php get_template_part('partials/blog-metas'); ?>
			<?php endif; ?>
		</div>
	</div>
</div>