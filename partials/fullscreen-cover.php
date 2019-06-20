<?php

// add mobile detection
$detect = new Mobile_Detect;

// muted video
$muted = 'muted';

// is linked to a project?
if(filter_var(get_field('cover_link'), FILTER_VALIDATE_BOOLEAN) === TRUE) {
	$is_link = true;
	$link = '<a class="cover-link" href="' . get_field('link') . '"></a>';
} else {
	$is_link = false;
}

// bg data
if(get_field('cover_bg_image') && get_field('cover_bg_type') === 'image') {
	$bg_data = 'image';
} elseif (get_field('cover_bg_type') === 'video') {
	$bg_data = 'video';
} else {
	$bg_data = 'color';
}

// unmute video
if(get_field('cover_bg_type') === 'video' && get_field('video_mute') === 'no') {
	$muted = false;
}

if($is_link) : echo $link; endif;
echo '<div class="cover-' . get_the_id() . ' fullscreen-cover" data-bg-type="' . $bg_data . '" data-cover-id="' . get_the_id() . '">';?>
	<?php if(get_field('cover_bg_type') === 'image') : ?>
		<?php if(get_field('cover_bg_zoom') === 'enabled') : ?><div class="cover-zoom"><?php endif; ?>
			<div class="cover-image" data-parallax-scrolling="<?php if(get_field('cover_parallax')) : echo get_field('cover_parallax'); else : echo 'enabled'; endif; ?>" <?php if(get_field('cover_bg_zoom') === 'enabled') { echo 'data-image-zoom="zoom"'; } ?> <?php if(get_field('cover_bg_image_scale') === 'actual-size') : echo 'data-bg-align="' . get_field('cover_bg_image_align') . '"'; endif; ?>></div>
		<?php if(get_field('cover_bg_zoom') === 'enabled') : ?></div><?php endif; ?>
	<?php else : ?>
		<?php if($detect->isMobile()) : ?>
			<div class="cover-video-responsive" data-has-bg="true"></div>
		<?php else : ?>
		<?php $video_type = get_field('cover_videotype'); ?>
			<div class="video-fadein"></div>
			<div class="cover-video">
				<video width="<?php echo get_field('video_width'); ?>" height="<?php echo get_field('video_height'); ?>" preload="none" autoplay loop <?php echo $muted; ?>>
					<?php if(get_field($video_type . '_mp4')) : ?><source src="<?php echo get_field($video_type . '_mp4'); ?>" type="video/mp4"><?php endif; ?>
					<?php if(get_field($video_type . '_ogv')) : ?><source src="<?php echo get_field($video_type . '_ogv'); ?>" type="video/ogg"><?php endif; ?>
					<p>If you are reading this, it is because your browser does not support the HTML5 video element.</p>
				</video>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	<?php if(filter_var(get_field('hide_cover_headline'), FILTER_VALIDATE_BOOLEAN) !== TRUE) : ?>
		<?php if(get_field('cover_headline') && trim(get_field('cover_headline')) !== '' || get_field('cover_headline_image')) : ?>
			<div class="container">
				<div class="row">
					<div class="cover-headline span12 <?php echo get_field('cover_headline_ver_align'); ?> <?php echo get_field('cover_headline_hor_align'); ?>" data-headline-format="<?php echo get_field('cover_headline_format'); ?>">
						<?php if(get_field('cover_headline_format') === 'text') : ?>
							<h1 class="<?php echo get_field('cover_headline_weight'); ?>"><?php echo get_field('cover_headline'); ?></h1>
						<?php else: ?>
							<?php
							
								// get image src
								$headline_img = wp_get_attachment_image_src(get_field('cover_headline_image'), 'full');
							
							?>
							<img class="headline-image" src="<?php echo $headline_img[0]; ?>" alt="<?php the_title(); ?>" />
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	<?php if(get_field('cover_scroll') === 'visible') : ?>
		<div class="see-more">
			<div class="icon"><?php echo setIcon('arrow_down'); ?></div>
		</div>
	<?php endif; ?>
</div>