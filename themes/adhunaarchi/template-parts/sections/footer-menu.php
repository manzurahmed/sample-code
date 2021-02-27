<div class="section footer-menu py-5 bg-whitishgray">
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <?php
				if(is_active_sidebar( 'footer-left' ))
				{
					dynamic_sidebar( 'footer-left' );
				}
				?>
            </div>

            <div class="col-md-3 offset-md-1">
                <?php
				if(is_active_sidebar( 'quick-links' ))
				{
					dynamic_sidebar( 'quick-links' );
				}
				?>
            </div>

            <div class="col-md-4">
                <div class="footer-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-link">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php echo esc_html(bloginfo('name')); ?>">
                    </a>
                </div>

                <div class="contact text-center text-md-left">
                    <?php
                    // Fetch CodeStar options
                    $adhunaarchi_contact_details = cs_get_option('contact_details_one');
                    $adhunaarchi_contact_address = cs_get_option('contact_details_address');
                    ?>
                    <p>
                        <strong>Phone:</strong> <?php echo esc_html($adhunaarchi_contact_details[1]['contact_detail']); ?>
                    </p>
                    <hr />
                    <p>
                        <strong>Cell:</strong> <?php echo esc_html($adhunaarchi_contact_details[2]['contact_detail']); ?>
                    </p>
                    <hr />
                    <p>
                        <strong>Email:</strong> <?php echo esc_html($adhunaarchi_contact_details[3]['contact_detail']); ?>
                    </p>
                    <hr />
                    <p>
                        <strong>Address:</strong> <?php echo esc_html($adhunaarchi_contact_address); ?>
                    </p>
                </div>
                
            </div>
        </div><!--row-->
    
    </div><!--container-->
</div><!--section-->