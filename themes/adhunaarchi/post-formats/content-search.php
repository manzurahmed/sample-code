<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adhunaarchi
 */
?>

<?php
$borderAroundClass = '';
if(has_post_thumbnail() && !is_single()):
	$borderAroundClass = 'category-blog';
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($borderAroundClass); ?>>
	<?php
	/* This section checks if any Featured Image is set in the post.
	   If found any, show it.
	*/
	if( has_post_thumbnail() ): // && !is_single()):
	$featured = get_the_post_thumbnail_url(get_the_ID(), 'full');
	$inline = !empty($featured) 
		? ' style="background-image: url(' . $featured . '); background-size: cover; background-position: center; background-color: #333;"' : '';
	?>
	<div class="hbw-featured-content category-blog-img-featured br-5px mb-20px"<?php echo $inline; ?>>
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
		
		
	</div>
	<?php endif; ?>
	
	<?php if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta">
		<?php
		adhunaarchi_posted_on();
		adhunaarchi_posted_by();
		?>
	</div><!-- .entry-meta -->
	<?php endif; ?>
	

	<footer class="entry-footer">
		<?php adhunaarchi_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
