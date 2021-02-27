<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adhunaarchi
 */

get_header();
?>
	<div id="page" class="site">

		<?php get_template_part( 'template-parts/common/headers/header-1' ); ?>
		<?php get_template_part( 'template-parts/sections/services' ); ?>
		<?php get_template_part( 'template-parts/sections/quote' ); ?>

		<?php
		// Latest Projects Widget
		if(is_active_sidebar('adhuna-lat-proj')): ?>
			<?php dynamic_sidebar('adhuna-lat-proj'); ?>
		<?php endif; ?>

		<?php get_template_part( 'template-parts/sections/we-work-differently' ); ?>
		<?php get_template_part( 'template-parts/sections/how-we-work' ); ?>
		<?php get_template_part( 'template-parts/sections/stats' ); ?>
		<?php get_template_part( 'template-parts/sections/clients' ); ?>
		<?php get_template_part( 'template-parts/sections/call-for-action' ); ?>
		<?php get_template_part( 'template-parts/sections/footer-menu' ); ?>

	</div><!--page-site-->

<?php
//get_sidebar();
get_footer();
