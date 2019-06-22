<?php 
/*
 * blog index
 * semplice.theme
 */
?>
<?php get_header(); # inlude header ?>
<section id="blog" class="fade-content">
	<div class="jumbotron jumbotron-fluid">
		<div class="container d-flex justify-content-between">
			<h1 class="display-4">
				<?php if ( is_month() ) : ?>
					<?php echo __('Archives for ', 'semplice') . get_the_date( __( 'F Y', 'semplice')); ?>
				<?php else : ?>
					<?php echo __('All Posts in ', 'semplice') . single_cat_title( '', false ); ?>
				<?php endif; ?>
			</h1>
			<!-- <h2><?php echo 'admin url:' . admin_url( 'admin-post.php' ); ?></h2> -->
			<!-- Button trigger modal -->
			<button type="button" class="subscribe-button btn btn-primary" data-toggle="modal" data-target="#subscribeModal">
				<span>SUBSCRIBE TO OUR BLOG</span>
			</button>

			<!-- Modal -->
			<div class="modal fade p-5" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModal" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content p-2">
					<div class="p-2">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
						<form id="emailForm" method="post" action="<?php echo admin_url( 'admin-post.php' ) ?>">
							<input type="hidden" name="action" value="process_email_form">
							<div class="modal-body">
								<div class="modal-inside d-flex flex-column align-items-center">
									<h1 class="blog-modal-header m-3 w-100 text-center">Subscribe to our Blog</h1>
									<div class="input m-3 w-100" id="emailDiv">
										<input id="email" class="h-input" type="email" name="email" required="" placeholder="Your email here" value="" autocomplete="email">
									</div>
									<div class="pt-3" id="submitDiv">
										<input id="submit" type="submit" value="Subscribe" class="hs-button primary large">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php get_template_part('partials/blog-loop'); ?>
	<?php get_template_part('partials/blog-pagination'); ?>
</section>
<?php get_footer(); # inlude footer ?>