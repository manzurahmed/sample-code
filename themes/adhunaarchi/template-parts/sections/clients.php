<?php
// Fetch CodeStar options
$adhunaarchi_clients_profiles = cs_get_option('clients');
?>
<div class="section clients p-100 bg-whitishgray">
    <div class="container">

        <div class="row">

            <div class="col-sm-12 col-md-3 mb-3 mb-md-0">
                <div class="single-client-box">
                    <p class="subtitle dash-true style-dark mb-3">Who We Work With</p>
                    <h2>We work with top <span class="prominent">clients.</span></h2>
                </div>
            </div><!--col-sm-3-->

            <div class="col-sm-12 col-md-9">

                <div class="row d-flex align-items-center">

                    <?php
                    if( isset($adhunaarchi_clients_profiles) ):
                    foreach( $adhunaarchi_clients_profiles as $adhunaarchi_client_profile):

                        if( isset( $adhunaarchi_client_profile['logo'] ) ) {
                            $adhunaarchi_client_logo = wp_get_attachment_image_src( $adhunaarchi_client_profile['logo'], 'full' );
                        }
                    ?>
                    <div class="col-6 col-sm-4 col-md-3 mb-3">
                        <div class="single-client-box">
                            <img class="img-hover" src="<?php echo esc_url($adhunaarchi_client_logo[0]); ?>" alt="<?php echo esc_html($adhunaarchi_client_profile['title']) ?>" />
                        </div>
                    </div>

                    <?php
                    endforeach;
                    endif;
                    ?>
                </div><!--row-->

            </div><!--col-sm-3-->

        </div><!--row-->
    </div>
</div>
