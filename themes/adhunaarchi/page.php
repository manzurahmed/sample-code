<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adhunaarchi
 */

get_header();
?>
<div id="page" class="site">
	
	<?php get_template_part( 'template-parts/common/headers/header-1' ); ?>

	<?php //get_post_meta(the_ID(), '_thumbnail_id', false) ?>

	<div id="content" class="site-content">

		<?php while ( have_posts() ) : the_post(); ?>

		<div <?php if(has_post_thumbnail()): ?>style="background-image: url(<?php the_post_thumbnail_url('large'); ?>);" <?php endif; ?> class="adhuna-page-title-area adhuna-breadcrumb py-5 py-md-5">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-white font-weight-bold"><?php the_title(); ?></h1>
						<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
					</div><!--col-md-12-->
				</div>
			</div>
		</div>

		<div id="primary" class="content-area">
			<main id="main" class="site-main py-5">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php
								//echo get_post_type(); // page
								get_template_part( 'post-formats/content', get_post_type() );
							?>
						</div><!--col-md-8-->
					</div>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php endwhile; // End of the loop. ?>
		
	</div><!-- #content -->

	<?php get_template_part( 'template-parts/sections/footer-menu' ); ?>

</div><!-- #page -->

<?php
get_footer();
