<div id="post" <?php post_class('row'); ?>>
	<div class="<?php if(get_field('skinoptions_content_width', 'options')) : echo get_field('skinoptions_content_width', 'options'); else : echo 'span8 offset2'; endif; ?>">
		<div class="post-heading <?php if(trim(get_the_content()) === "") : echo 'no-content'; endif; ?> format-image">
			<p><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a> - <?php comments_popup_link(__('No Comments!', 'semplice'), __('1 comment.', 'semplice'), __('% comments', 'semplice')); ?></p>
		</div>
		<div class="wysiwyg no-meta <?php font_sizes(); ?>">
			<?php the_content(__('Read more', 'semplice')); ?>
			<?php if(is_single() || get_field('blog_index_display_metas', 'options') === 'enabled') : ?>
				<?php get_template_part('partials/blog-metas'); ?>
			<?php endif; ?>
		</div>
	</div>
</div>	