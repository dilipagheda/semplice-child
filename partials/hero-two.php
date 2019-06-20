<?php 
$id = $current_post["ID"];
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' ); 
?>

<div class="col-12 col-lg-8 mt-3">
					<article class="blog-post h-100">
					<div class="card h-100">
						<!-- <img class="card-img" src="<?php echo $image[0]; ?>" alt="Featured image"> -->
						<div class="blog-thumbnail" style="background-image:url(<?php echo $image[0];?>)">
							<div class="blog-overlay"></div>

							<div class="content-container">
								<span>
									<?php echo get_the_category($id)[0]->name ?>
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
												</span>									</div>
											</div>
									</div>
							</div>
							
						</div>
					</div>
					</article>
</div>
