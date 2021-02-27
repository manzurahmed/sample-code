<?php
// Fetch CodeStar options
$adhunaarchi_expertise_subtitle = cs_get_option('expertise_section_subtitle');
$adhunaarchi_expertise_title = cs_get_option('expertise_section_title');
$adhunaarchi_expertise_n1_number = cs_get_option('expertise_number1_number');
$adhunaarchi_expertise_n1_text = cs_get_option('expertise_number1_text');
$adhunaarchi_expertise_n2_number = cs_get_option('expertise_number2_number');
$adhunaarchi_expertise_n2_text = cs_get_option('expertise_number2_text');
$adhunaarchi_expertise_n3_number = cs_get_option('expertise_number3_number');
$adhunaarchi_expertise_n3_text = cs_get_option('expertise_number3_text');
?>
<div class="section projects bg-deep-green-1">
    <div class="container">

        <div class="row">

            <div class="col-sm-12 col-md-3">
                <div class="single-stat-box mb-md-0 mb-4">
                    <p class="subtitle dash-true style-light text-white mb-3">
                        <?php echo isset($adhunaarchi_contact_work1_title) ? esc_html($adhunaarchi_contact_work1_title) : ""; ?>
                    </p>
                    <h2 class="text-white"><?php echo isset($adhunaarchi_expertise_title) ? esc_html($adhunaarchi_expertise_title) : ""; ?></h2>
                </div>
            </div><!--col-sm-3-->

            <div class="col-sm-4 col-md-3">
                <div class="single-stat-box d-flex align-items-center justify-content-center text-center rounded mb-3 mb-md-0">
                    <p class="mb-0">
                        <span class="counter"><?php echo isset($adhunaarchi_expertise_n1_number) ? esc_html($adhunaarchi_expertise_n1_number) : ""; ?></span>
                        <span><?php echo isset($adhunaarchi_expertise_n1_text) ? esc_html($adhunaarchi_expertise_n1_text) : ""; ?></span>
                    </p>
                </div>
            </div><!--col-sm-3-->

            <div class="col-sm-4 col-md-3">
                <div class="single-stat-box d-flex align-items-center justify-content-center text-center rounded mb-3 mb-md-0">
                    <p class="mb-0">
                        <span class="counter"><?php echo isset($adhunaarchi_expertise_n2_number) ? esc_html($adhunaarchi_expertise_n2_number) : ""; ?></span>
                        <span><?php echo isset($adhunaarchi_expertise_n2_text) ? esc_html($adhunaarchi_expertise_n2_text) : ""; ?></span>
                    </p>
                </div>
            </div><!--col-sm-3-->

            <div class="col-sm-4 col-md-3">
                <div class="single-project-box d-flex align-items-center justify-content-center text-center rounded mb-3 mb-md-0">
                    <p class="mb-0">
                        <span class="counter"><?php echo isset($adhunaarchi_expertise_n3_number) ? esc_html($adhunaarchi_expertise_n3_number) : ""; ?></span>
                        <span><?php echo isset($adhunaarchi_expertise_n3_text) ? esc_html($adhunaarchi_expertise_n3_text) : ""; ?></span>
                    </p>
                </div>
            </div><!--col-sm-3-->

        </div><!--row-->
    </div>
</div>
