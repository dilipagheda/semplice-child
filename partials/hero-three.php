
<?php 
$id = $post->ID;
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' ); 
if(!$image){
	$imageURL = 'https://via.placeholder.com/1200X900';
}else{
	$imageURL = $image[0];
}
?>

<div class="col-12 col-lg-4 mt-3">
					<article class="blog-post h-100">
					<div class="card h-100">
						<img style="height:200px;width:100%;object-fit:cover" class="card-img" src="<?php echo $imageURL; ?>" alt="Featured image">
						<div class="content-container-normal">
							<span class="hero-three-category">
								<?php echo the_category('','',$id) ?>
							</span>
							<h1 class="size-small">
								<a href="<?php echo get_permalink($id)?>">
									<?php echo get_the_title($id) ?>
								</a>								</h1>
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
											<img src="<?php echo get_stylesheet_directory_uri() . '/images/clock-black.svg' ?>" > 
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
					</article>
</div>
