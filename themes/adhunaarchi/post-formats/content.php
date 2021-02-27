<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adhunaarchi
 */
?>

<?php
$borderAroundClass = '';
if(has_post_thumbnail() && !is_single()):
	$borderAroundClass = 'category-blog pos-rel';
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($borderAroundClass); ?>>

	<?php
	/* This section checks if any Featured Image is set in the post.
	   If found any, show it.
	*/
	if( has_post_thumbnail() ): // && !is_single()):
		
		// Load FULL SIZE image on Single page
		if( is_single() ) {
			$featured = get_the_post_thumbnail_url(get_the_ID(), 'full');
		} else {
			// elsewhere, load MEDIUM SIZE image
			$featured = get_the_post_thumbnail_url(get_the_ID(), 'medium');
		}
	$inline = !empty($featured) 
		? ' style="background-image: url(' . $featured . '); background-size: cover; background-position: center; background-color: #333;"' : '';
	
	if ( !is_singular() ) : ?>
		<a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" class="link-overlay"></a>
	<?php
	endif;
	?>
		
	<div class="hbw-featured-content <?php echo apply_filters( "adhunaarchi_featured_img_class", "category-blog-img-featured" ); ?> br-5px"<?php echo $inline; ?>>
		<?php
		if ( !is_singular() ) {
			the_title( '<h2 class="entry-title">', '</h2>' );
		}
		?>
	</div>
	<?php endif; ?>

	<?php
	// is_single() = Whether the query is for an existing single post
	if(!is_single()): ?>
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) :
		?>
		<div class="entry-meta">
			<?php
			adhunaarchi_posted_on();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
		if(is_single())
		{
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'adhunaarchi' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
		}

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'adhunaarchi' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
