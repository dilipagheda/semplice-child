
<?php 
$title = get_query_var('blog-title');
if ( !$title ) {
	$title='Blog';
}
?>

<div class="jumbotron jumbotron-fluid">
		<div class="container m-auto">
			<div class="row">
				<div class="col-12 col-md-9 m-auto blog-header">
					<?php if($title=='Blog'): ?>
						<a style="text-decoration:none" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
							<h1 class="display-4">
								<?php echo $title ?>
							</h1>
						</a>
					<?php else: ?>
						<h1 class="display-3">
							<?php echo $title ?>
						</h1>
						<a style="text-decoration:none" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
							<div class="pt-2 pb-2">
								<img style="height:30px;width:30px" src="<?php echo get_stylesheet_directory_uri() . '/images/back.png' ?>">Back
							</div>
						</a>
					<?php endif; ?>
				</div>
				<div class="col-12 col-md-3 m-auto d-flex subscribe-button-container">
					<!-- Button trigger modal -->
					<button type="button" class="subscribe-button btn btn-primary" data-toggle="modal" data-target="#subscribeModal">
						<span>SUBSCRIBE TO OUR BLOG</span>
					</button>
				</div>
			</div>

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

