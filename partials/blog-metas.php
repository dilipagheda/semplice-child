<div class="meta">
	<p>
		<span><?php echo __('Published by: ', 'semplice'); ?><?php the_author(); ?><?php if( has_category() ) : echo __(' in</span> ', 'semplice'); the_category(', '); endif; ?>
		<?php if(get_field('blog_display_tags', 'options') === 'enabled') : ?><?php if(has_tag()) : ?><br /><span><?php the_tags(); ?></span><?php endif; ?><?php endif; ?>
	</p>
</div>
<?php if(get_field('share_visibility', 'options') !== 'disabled' && is_single()) : ?>
<div class="share-box share-box-blog">
	<?php get_template_part('partials/share'); ?>
</div>
<?php endif; ?>