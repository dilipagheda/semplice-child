<?php 
/*
 * blog single
 * semplice.theme
 */
?>
<?php get_header(); # inlude header ?>


<?php 

	$obj_id = get_queried_object_id();
	$current_url = get_permalink( $obj_id );
	$post_id = url_to_postid($current_url);
	$post = get_post($post_id);
	$content = $post->post_content;
?>

<div class="container">
	<div class="row">
		<div class="col-8 m-auto">
			<?php echo $content ?>
		</div>
	</div>
</div>

<?php get_footer(); # inlude footer ?>
