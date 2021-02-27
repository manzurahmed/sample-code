<?php
/*
 * Template name: Contact US Page
 */

get_header();

// Fetch CodeStar Framework options for Theme
$adhunaarchi_contact_details = cs_get_option('contact_details_one');
$adhunaarchi_contact_address = cs_get_option('contact_details_address');
$adhunaarchi_contact_callus = cs_get_option('contact_details_callus');
$adhunaarchi_contact_emailus = cs_get_option('contact_details_emailus');
$adhunaarchi_contact_schedulemeeting = cs_get_option('contact_details_schedulemeeting');
?>
<div id="page" class="site">
    
    <?php get_template_part( 'template-parts/common/headers/header-1' ); ?>

    <div id="content" class="site-content">

        <?php while ( have_posts() ) : the_post(); ?>

        <div <?php if(has_post_thumbnail()): ?>style="background-image: url(<?php the_post_thumbnail_url('large'); ?>);" <?php endif; ?> class="adhuna-page-title-area adhuna-breadcrumb p-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-white text-center font-weight-bold"><?php the_title(); ?></h1>
                    </div><!--col-md-12-->
                </div>
            </div>
        </div>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <div class="contact-box text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="single-contact-box rounded">
                                    <div class="contact-icon-box mb-3">
                                        <i class="fa fa-mobile"></i>
                                    </div>
                                    <div class="contact-meta">
                                        <h3 class="mb-3"><?php echo esc_html($adhunaarchi_contact_details[1]['contact_detail']); ?></h3>
                                        <p class="text-black-50"><?php echo esc_html($adhunaarchi_contact_callus); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-contact-box rounded">
                                    <div class="contact-icon-box  mb-3">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="contact-meta">
                                        <h3 class="mb-3"><?php echo esc_html($adhunaarchi_contact_details[2]['contact_detail']); ?></h3>
                                        <p class="text-black-50"><?php echo esc_html($adhunaarchi_contact_emailus); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-contact-box rounded">
                                    <div class="contact-icon-box  mb-3">
                                        <i class="fa fa-building-o"></i>
                                    </div>
                                    <div class="contact-meta">
                                        <h3 class="mb-3"><?php echo esc_html($adhunaarchi_contact_address); ?></h3>
                                        <p class="text-black-50"><?php echo esc_html($adhunaarchi_contact_schedulemeeting); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div><!--row-->
                    </div><!--container-->
                </div>

                <div class="mb-5"></div>
                <div class="contact-map"></div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-4">
                        <?php
                            get_template_part( 'post-formats/content', get_post_type() );
                        ?>
                        </div>
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
