
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
		</div>
</div>

