<?php

	// get cover slider covers
	$covers = get_field('cover_slider');

	// anchors
	$anchor = array();

	// standard vertical dots navigation
	$navigation = 'true';
	$slides_navigation = '';
	$slide_or_section = 'section';
	$has_dots = '';
	$content_after = '';
	$autoplay = '';
	
	if(get_field('coverslider_orientation') === 'horizontal' && get_field('content_after_slider')) {
		$content_after = 'autoScrolling: false, fitToSection: false,';
	}

	// navigation
	if(get_field('coverslider_orientation') === 'horizontal') {
		
		// set slide mode for the cover slider
		$slide_or_section = 'slide';
		
		if(get_field('coverslider_navigation') === 'arrows') {
			// add arrows
			echo '<div class="fp-hor-nav"><a class="prev">' . setIcon('arrow_left') . '</a><a class="next">' . setIcon('arrow_right') . '</a></div>';
			// set vertical dots to true
			$navigation = 'false';
		} else {
			// show slides navigation
			$slides_navigation = 'slidesNavigation: true,';
			// has dots
			$has_dots = 'has-dots';
			// set vertical dots to true
			$navigation = 'false';
		}
		
	} else {
		// vertical navigation with arrows
		if(get_field('coverslider_navigation') === 'arrows') {
			// add arrows
			echo '<div class="fp-vert-nav"><a class="prev">' . setIcon('arrow_up') . '</a><a class="next">' . setIcon('arrow_down') . '</a></div>';
			// set dots to false
			$navigation = 'false';
		}
	}

	if(get_field('coverslider_autoplay') == 'enabled') {

		// check if timout is set
		if(is_numeric(get_field('coverslider_timeout'))) {
			$timeout = get_field('coverslider_timeout');
		} else {
			$timeout = '3000';
		}

		if(get_field('coverslider_orientation') === 'horizontal') {
			$direction = 'moveSlideRight';
		} else {
			$direction = 'moveSectionDown';
		}

		// javascript
		$autoplay = '
			setInterval(function() {
				$.fn.fullpage.' . $direction . '();
			}, ' . $timeout . ');
		';
	}
	
	// slider body
	echo '<div id="cover-slider">';
	
	// horizontal slider section div open
	if(get_field('coverslider_orientation') === 'horizontal') {
		echo '<div class="section">';
	}
	
	if($covers) {

		// output slides
		foreach($covers as $post) {
			
			// setup postdata
			setup_postdata($post);
			
			// get post and look if there is a fullscreen cover
			if(get_field('cover_visibility') === 'visible') {
				
				// check if post name is numeric
				if(is_numeric($post->post_name)) {
					$post_name = 'cs-' . $post->post_name;
				} else {
					$post_name = $post->post_name;
				}
				
				// fill anchor
				$anchor[] = $post_name;

				// vp title
				if(get_field('vp_button_title') && get_field('use_vp_button') === 'enabled') {
					$vp_title = get_field('vp_button_title');
				} elseif(get_field('vp_button_title', 'options')) {
					$vp_title = get_field('vp_button_title', 'options');
				} else {
					$vp_title = 'View Project';
				}
				
				// font weight
				if(get_field('vp_button_font_weight', 'options')) {
					$font_weight = get_field('vp_button_font_weight', 'options');
				} else {
					$font_weight = 'regular';
				}
				
				// start at content
				if(get_field('cs_start_at_content', 'options') === 'enabled') {
					$vp_link = esc_url(add_query_arg('cs', true, get_permalink()));
				} else {
					$vp_link = get_permalink();
				}
				
				// slide or section and link open
				echo '<div class="' . $slide_or_section . '" data-anchor="' . $post->post_name . '">';
				
				echo '<div class="view-project vp-' . $post->ID . ' ' . $font_weight . ' ' . $has_dots . '"><a href="' . $vp_link . '">' . $vp_title . '</a></div>';
				
				// fullscreen cover
				get_template_part('partials/fullscreen-cover');
				
				// slide and link close
				echo '</div>';
			}
		}
		
		// reset postdata
		wp_reset_postdata();
	}
	
	// horizontal slider section div close
	if(get_field('coverslider_orientation') === 'horizontal') {
		echo '</div>';
	}

	// slider close
	echo '</div>';

?>

<script type="text/javascript">
	(function($) {
		$(document).ready( function() {
			$('#cover-slider').fullpage({
				anchors: <?php echo json_encode($anchor); ?>,
				navigation: <?php echo $navigation; ?>,
				<?php echo $slides_navigation; ?>
				<?php echo $content_after; ?>
				navigationPosition: 'right',
				animateAnchor: false,
				scrollingSpeed: 900,
				controlArrows: false,
				normalScrollElements: '#fullscreen-menu, #project-panel-header, .project-panel-thumbs',
				loopBottom: true,
				afterRender: function() {
					$(".cover-video video").mediaelementplayer({
						pauseOtherPlayers: false,
						success: function (mediaElement, domObject) {
							// call the play method
							mediaElement.play();
						}
					});
					<?php echo $autoplay; ?>
				}
			});
		});
	})(jQuery); 
</script>