<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package adhunaarchi
 */

get_header();
?>
<div id="page" class="site">

	<?php get_template_part( 'template-parts/common/headers/header-1' ); ?>

	<div id="content" class="site-content">
		
		<?php while ( have_posts() ): the_post(); ?>

		<div class="hbw-page-title-area hbw-breadcrumb p-tb-50px">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1><?php the_title(); ?></h1>
						<?php if(function_exists('bcn_display')) { bcn_display(); } ?>

						<div class="entry-meta">
							<?php adhunaarchi_posted_by(); ?>
							<?php adhunaarchi_posted_on(); ?>
						</div><!-- .entry-meta -->
					</div><!--col-md-12-->
				</div>
			</div>
		</div>

		<div id="primary" class="content-area hbw-content-area-padding">
			<main id="main" class="site-main">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<?php
							get_template_part( 'post-formats/content', get_post_type() );
							?>
							<div class="row">
								<div class="col-md-12">
							<div class = "s-content__pagenav">
								<div class = "s-content__nav">
									<div class = "s-content__prev">
										<?php
										$adhunaarchi_prev_post = get_previous_post();
										if( $adhunaarchi_prev_post ):
										?>
										<a href="<?php echo get_the_permalink( $adhunaarchi_prev_post ); ?>" rel="prev">
											<span><?php _e( "আগের পোস্ট", "adhunaarchi" ); ?></span>
											<?php echo get_the_title( $adhunaarchi_prev_post ); ?>
										</a>
										<?php
										endif;
										?>
									</div>
									<div class="s-content__next">
										<?php
										$adhunaarchi_next_post = get_next_post();
										if( $adhunaarchi_next_post ):
										?>
											<a href="<?php echo get_the_permalink( $adhunaarchi_next_post ); ?>" rel="next">
												<span><?php _e( "পরের পোস্ট", "adhunaarchi" ) ?></span>
												<?php echo get_the_title( $adhunaarchi_next_post ); ?>
											</a>
										<?php
										endif;
										?>
									</div>
								</div>
							</div> <!-- end s-content__pagenav -->
							</div>
							</div>

							<?php
							// If comments are open or we have at least one comment, load up the comment template.
							 if ( !post_password_required() && (comments_open() || get_comments_number()) ) :
							 	comments_template();
							 endif;

							// TODO: MOVE THIS RELATED POSTS TO NEW PLUGIN
							/*
							*********************** RELATED POSTS BY CATEGORY ***********************
							*/
							$orig_post = $post;
							global $post;
							$categories = get_the_category( $post->ID );
							if ($categories)
							{
								$category_ids = array();
								foreach( $categories as $individual_category )
								{
									$category_ids[] = $individual_category->term_id;
								}

								$args = array(
									'category__in' => $category_ids,
									'post__not_in' => array($post->ID),
									'posts_per_page' => 3, // Number of related posts that will be shown.
									'ignore_sticky_posts' => true
								);

								$my_query = new wp_query( $args );
								if( $my_query->have_posts() )
								{
								?>
								<div class="related_posts mt-50px">
									<h3 class="pos-rel mb-20px">যারা এ পোস্টটি পড়েছেন, তাদের অনেকেই নীচের পোস্টগুলো পড়েছেন</h3>
										<div class="row">
											<?php
											while( $my_query->have_posts() )
											{
												$my_query->the_post();
												// Check if thumbnail exists
												$thumbUri = "";
												if( has_post_thumbnail() ) {
													$thumbUri = get_the_post_thumbnail_url(get_the_ID(), 'medium');
												}

												if( !empty($thumbUri) ) {
													$thumbBG = ' style="background-image: url('. esc_url($thumbUri) .'")';
												}
												?>
												<div class="col-md-4">
													<div class="single-related-box br-5px border-all-1px border-color-ccc">
														<div class="relatedbg quarter-jumbo1 pos-rel br-tl-tr-5px"<?php echo $thumbBG; ?>>
														</div>
														<div class="relatedcontent p-all-10px quarter-jumbo2">
															<h3><?php echo get_the_title(); ?></h3>
															<p class="color-1 mb-0px"><?php the_time('M j, Y') ?></p>
														</div>
														<a class="link-overlay" href="<?php the_permalink()?>" rel="bookmark" title="<?php get_the_title(); ?>"></a>
													</div>
												</div>
											<?php
											} ?>
										</div>
								</div>
								<?php
								}
							}
							$post = $orig_post;
							wp_reset_query();
							?>
						</div><!--col-md-8-->

						<div class="col-md-4">
							<?php get_sidebar(); ?>
						</div><!--col-md-4-->
					</div><!--row-->
				</div><!--container-->
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php endwhile; // End of the loop. ?>

	</div><!-- #content -->
</div><!-- #page -->

<?php
get_footer();
