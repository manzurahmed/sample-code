<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package adhunaarchi
 */

get_header();
the_post();
// Fetch CodeStar options
$adhunaarchi_post_id = get_the_ID();
$adhunaarchi_post_meta = get_post_meta ( $adhunaarchi_post_id, 'adhunaarchi-projects-type', true);
$adhunaarchi_category_array = get_the_category( $adhunaarchi_post_id );
$adhunaarchi_title = get_the_title( $adhunaarchi_post_id );
$adhunaarchi_excerpt = get_the_content( $adhunaarchi_post_id );
$adhunaarchi_post_meta = get_post_meta ( get_the_ID(), 'adhunaarchi-projects-type', true);
// Now, get portfolio images from meta data
$adhunaarchi_architect_1 = esc_html( $adhunaarchi_post_meta['architect1'] );
$adhunaarchi_architect_2 = esc_html( $adhunaarchi_post_meta['architect2'] );
$adhunaarchi_designer_1 = esc_html( $adhunaarchi_post_meta['designer1'] );
$adhunaarchi_designer_2 = esc_html( $adhunaarchi_post_meta['designer2'] );
?>
<div id="page" class="site">

	<?php get_template_part( 'template-parts/common/headers/header-1' ); ?>

	<?php
	// Now, get portfolio images from meta data from CodeStar options
	$adhunaarchi_portfolio_images = $adhunaarchi_post_meta['portfolio'];
	// Get custom-sized image
	if( count( $adhunaarchi_portfolio_images ) > 0 ):
	?>
	<div class="project-container">
		<div class="owl-carousel project-slides pos-rel">
			<?php
			// Iterate Portfolio images and construct OwlCarousel slider
			foreach($adhunaarchi_portfolio_images as $adhunaarchi_portfolio_image):
			$adhunaarchi_item_image = wp_get_attachment_image_src( $adhunaarchi_portfolio_image['image'], 'full' );
			?>
			<div class="single-project-item" style="background-image: url(<?php echo esc_url($adhunaarchi_item_image[0]);?>);">
			</div>
			<?php endforeach; ?>
		</div>

		<div class="project-meta">
			<div class="container-fluid">
				<div class="row no-gutters">
					<div class="col-md-6 offset-md-6">
						<div class="meta-container bg-white p-5">
							<h3 class="subtitle dash-false mb-4"><?php echo $adhunaarchi_category_array[0]->name; ?></h3>
							<h2><?php echo esc_html( $adhunaarchi_title ); ?></h2>
							<div class="dash style-dark default"></div>
							<p><?php echo esc_html( $adhunaarchi_excerpt ); ?></p>

							<div class="row border-top mt-5 no-gutters">
								<?php if( !empty($adhunaarchi_architect_1) ): ?>
								<div class="col-md-6">
									<div class="container">
										<div class="row">
											<div class="col-md-4 text-dark p-3">
												<strong><?php echo esc_html__('Architect', 'adhunaarchi'); ?></strong>
											</div>
											<div class="col-md-8 text-muted p-3">
												<?php echo $adhunaarchi_architect_1; ?>
											</div>
										</div>
									</div>
								</div>
								<?php endif; ?>

								<?php if( !empty( $adhunaarchi_architect_2 ) ): ?>
								<div class="col-md-6">
									<div class="container">
										<div class="row">
											<div class="col-md-4 text-dark p-3">
												<strong><?php echo esc_html__('Architect', 'adhunaarchi'); ?></strong>
											</div>
											<div class="col-md-8 text-muted p-3">
												<?php echo esc_html( $adhunaarchi_architect_2 ); ?>
											</div>
										</div>
									</div>
								</div>
								<?php endif; ?>
							</div>
							<div class="row border-top border-bottom no-gutters">
								<?php if( !empty( $adhunaarchi_designer_1 ) ): ?>
								<div class="col-md-6 text-dark">
									<div class="container">
										<div class="row">
											<div class="col-md-4 text-dark p-3">
												<strong><?php echo esc_html__('Designer', 'adhunaarchi'); ?></strong>
											</div>
											<div class="col-md-8 text-muted p-3">
												<?php echo esc_html( $adhunaarchi_designer_1 ); ?>
											</div>
										</div>
									</div>
								</div>
								<?php endif; ?>
								<?php if( !empty( $adhunaarchi_designer_2 ) ): ?>
								<div class="col-md-6">
									<div class="container">
										<div class="row">
											<div class="col-md-4 text-dark p-3">
												<strong><?php echo esc_html__('Designer', 'adhunaarchi'); ?></strong>
											</div>
											<div class="col-md-8 text-muted p-3">
												<?php echo esc_html( $adhunaarchi_designer_2 ); ?>
											</div>
										</div>
									</div>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<?php
	endif;
	?>

	<?php get_template_part( 'template-parts/sections/call-for-action' ); ?>
	<?php get_template_part( 'template-parts/sections/footer-menu' ); ?>

</div><!-- #page -->

<?php
get_footer();
