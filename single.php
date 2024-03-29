<?php 
/*
 * blog single
 * semplice.theme
 */
?>
<?php 

	$obj_id = get_queried_object_id();
	$current_url = get_permalink( $obj_id );
	$post_id = url_to_postid($current_url);
	$post = get_post($post_id);
	$content = $post->post_content;

	$id = $post->ID;
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' ); 
	if(!$image){
		$imageURL = 'https://via.placeholder.com/1200X900';
	}else{
		$imageURL = $image[0];
}
?>
<?php get_header(); # inlude header ?>
<section id="blog" class="fade-content p-0">
<?php 
	set_query_var('blog-title', 'Blog');
	get_template_part('partials/blog-header'); 
?>
<div class="container">
	<div class="row">
		<div class="col-12 mt-3">
			<article class="blog-hero-one">
				<div class="card" style="height:450px">
					<div class="blog-thumbnail" style="background-image:url(<?php echo $imageURL;?>)">
						<div class="blog-overlay"></div>
						<div class="content-container">
							<span class="hero-one-category mb-3">
								<?php echo the_category(' | ','',$id) ?>
							</span>
							<h1 class="h1-size-big">
								<?php echo get_the_title($id) ?>
							</h1>
							<div class="divider margin-bottom-100"></div>
							<div class="content-footer">
									<span>
										<?php echo get_the_author($id) ?>
									</span>
									<div class="content-subfooter">
										<span class="date">
											<?php echo get_the_date('j F Y',$id) ?>
										</span>
										
										<div class="reading-time">
											<img src="<?php echo get_stylesheet_directory_uri() . '/images/clock-white.svg' ?>" > 
											<span>
												<?php 
												$content = get_post_field('post_content', $id);
												echo ceil(str_word_count(trim( strip_tags($content)))/200);
												?> min read
											</span>									
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>

		<div class="col-10 pt-5 pb-5 m-auto">
			<?php //echo $content 
			
					// Remove wpautop
					remove_filter('the_content', 'wpautop');
					
					// get content			
					//$content = get_post_meta( $post_id, 'semplice_ce_content', true );

					// strip out double quotes on bg images
					$content = remove_esc_bg_quotes($content);
					
					// output content
					$output = apply_filters('the_content', $content);

					echo $output;
					
					// reset postdata
					wp_reset_postdata();
			?>
		</div>
	</div>
</div>
</section>
<?php get_footer(); # inlude footer ?>
