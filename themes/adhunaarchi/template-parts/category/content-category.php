<?php
/**
 * Template part for displaying posts in Category view
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
	 * If found any, show it.
	*/
	if( has_post_thumbnail() ): // && !is_single()):
	$featured = get_the_post_thumbnail_url(get_the_ID(), 'full');
	$inline = !empty($featured) 
		? ' style="background-image: url(' . $featured . '); background-size: cover; background-position: center; background-color: #333;"' : '';
	?>
	<div class="hbw-featured-content category-img-featured br-5px mb-20px"<?php echo $inline; ?>>
		<?php
		if ( !is_singular() ) {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
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

</article><!-- #post-<?php the_ID(); ?> -->
