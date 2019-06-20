
<?php 
$id = $current_post["ID"];
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $current_post["ID"] ), 'single-post-thumbnail' ); 
?>

<div class="col-12 col-lg-4 mt-3">
					<article class="blog-post h-100">
					<div class="card h-100">
						<img class="card-img" src="<?php echo $image[0]; ?>" alt="Featured image">

							<div class="content-container-normal">
								<span class="category">
									<?php echo get_the_category($id)[0]->name ?>
								</span>
								<h1 class="size-small">
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
