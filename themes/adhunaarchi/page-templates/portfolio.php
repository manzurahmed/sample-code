<?php
/*
Template Name: Portfolio
*/

get_header();
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

            <?php
            // Get Categories related to "projects" CPL
            // "get_terms" is using a filter from functions.php file
            // add_filter('terms_clauses', 'my_terms_clauses', 99999, 3);
            $adhunaarchi_portfilio_taxquery_args = get_terms(
                array( 'post_types' => 'projects', 'taxonomy' => 'category' )
            );
            // Reset
            wp_reset_postdata();
            ?>            

            <div class="py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-mas-12">
                            <ul class="portfolio-filter">
                                <li data-filter="*" class="active">All</li>
                                <?php
                                if($adhunaarchi_portfilio_taxquery_args):
                                    foreach($adhunaarchi_portfilio_taxquery_args as $term):
                                ?>
                                <li data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_attr($term->name); ?></li>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                    // Get posts of "projects" CPT
                    $adhunaarchi_projects_args = array(
                        'post_type' => 'projects',
                        'posts_per_page' => -1,
                    );
                    $adhunaarchi_posts = new WP_Query( $adhunaarchi_projects_args );
                    //print_r($adhunaarchi_posts);
                    ?>
                    <div class="row portfolio-list">
                    <?php
                    while($adhunaarchi_posts->have_posts()) {
                    $adhunaarchi_posts->the_post();

                    $post_object = get_post(get_the_ID());
                    $post_category = get_the_category($post_object->ID);

                    //print_r($post_object);
                    ?>
                        <div class="col-md-4 <?php echo esc_html($post_category[0]->slug); ?>">
                            <div class="single-portfolio-item" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url($post_object, 'medium')); ?>');">
                                <div class="portfolio-hover">
                                    <h2><?php
                                    $post_title = esc_html(get_the_title($post_object->ID));
                                    echo $post_title; ?></h2>
                                    <p></p>
                                </div>
                                <a class="link-overlay" href="<?php the_permalink($post_object->ID); ?>"></a>
                            </div>
                        </div><!--col-md-4-->
                    <?php
                    }
                    ?>
                    </div><!--portfolio-list-->
                </div>
            </div>

            <?php
            wp_reset_postdata();
            ?>

            </main><!--main-->
        </div><!--primary-->

        <?php endwhile; ?>
        
    </div>

</div>
<?php
get_footer();
