<?php
if( !defined( 'ABSPATH' )) {
	exit;
}
// If there is no post, do nothing.
if( $r->post_count == 0 ) {
	return;
}
?>
<?php echo $args[ 'before_widget' ]; ?>

	<?php
	while ($r->have_posts()) : $r->the_post();

		// Get "CodeStar fields which are attached to the custom post type as metabox
		$adhuna_post_meta = get_post_meta ( get_the_ID(), 'adhunaarchi-projects-type', true);
		// Now, get portfolio images from meta data
		$adhuna_portfolio_images = $adhuna_post_meta['portfolio'];
		// Get custom-sized image
		$adhuna_item_image = wp_get_attachment_image_src( $adhuna_portfolio_images[1]['image'], 'adhunaarchi_project_portrait' );
	?>
		<div class="single-project-box overflow-hidden position-relative" style="background-image: url(<?php echo esc_url($adhuna_item_image[0]); ?>" alt="<?php echo esc_html(get_the_title($r->ID)); ?>);">

				<div class="project-title text-center p-4">
					<?php echo get_the_title($r->ID); ?>
				</div>
				
				<div class="read-more">
					<i class="fa fa-plus"></i>
				</div>

				<a href="<?php echo get_the_permalink(); ?>" class="link-overlay"></a>
				
		</div><!--single-project-box-->
	<?php
	endwhile;
	?>

<?php echo $args[ 'after_widget' ]; ?>
