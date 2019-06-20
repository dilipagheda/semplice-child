
<?php 
$id = $current_post["ID"];
?>

<div class="col-sm-12 col-md-6 col-lg-4 mt-3">
					<article class="blog-normal h-100">
						<div class="card p-3 h-100">
								<div class="content-container-normal">
									<span class="category">
										<?php echo get_the_category($id)[0]->name ?>
									</span>
									<h1 class="size-small">
										<?php echo get_the_title($id) ?>
									</h1>
									<div class="divider mb-5"></div>

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
												</span>									</div>
											</div>
									</div>
								</div>
								
						</div>
					</article>
</div>
