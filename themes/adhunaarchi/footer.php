<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adhunaarchi
 */

?>
<footer id="colophon" class="site-footer pos-rel py-3 bg-gray-1">
	<div class="container">
		<div class="row text-center">
			<div class="col">
				<?php
				printf( esc_html__( 'Made with %1$s by %2$s', 'adhunaarchi' ), ' <i class="fa fa-heart c-red"></i> ', ' <a href="'.esc_url( 'https://adhunabangladesh.com/digital-ict-solution/' ).'">Adhuna IT</a>' );
				?>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
