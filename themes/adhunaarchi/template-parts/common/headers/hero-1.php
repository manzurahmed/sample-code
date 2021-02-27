<?php
// Fetch CodeStar options for Hero image
$adhunaarchi_hero_image_meta = cs_get_option('hero_image');
if( isset( $adhunaarchi_hero_image_meta ) ) {
    $adhunaarchi_hero_image = wp_get_attachment_image_src( $adhunaarchi_hero_image_meta, 'full' );
}
?>
<div class="homepage-hero d-flex justify-content-center text-center" style="background-image: url(<?php echo esc_url($adhunaarchi_hero_image[0]); ?>);">
	<div class="homepage-text">
		<img class="mb-3" src="<?php echo get_template_directory_uri().'/assets/images/line1.png'; ?>" alt="Adhuna Architects">
		<h1><?php bloginfo( 'name' ); ?></h1>
		<img class="mt-3 mb-5" src="<?php echo get_template_directory_uri().'/assets/images/line2.png'; ?>" alt="Adhuna Architects">
	</div>
</div>
