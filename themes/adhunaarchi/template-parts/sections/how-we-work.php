<?php
// Fetch CodeStar options
$adhunaarchi_section_subtitle = cs_get_option('contact_section_subtitle');
$adhunaarchi_section_title = cs_get_option('contact_section_title');
$adhunaarchi_title_wposition = cs_get_option('contact_title_wposition');
$adhunaarchi_contact_work1_title = cs_get_option('contact_work1_title');
$adhunaarchi_contact_work1_text = cs_get_option('contact_work1_text');
$adhunaarchi_contact_work2_title = cs_get_option('contact_work2_title');
$adhunaarchi_contact_work2_text = cs_get_option('contact_work2_text');
$adhunaarchi_contact_work3_title = cs_get_option('contact_work3_title');
$adhunaarchi_contact_work3_text = cs_get_option('contact_work3_text');
$adhunaarchi_contact_work4_title = cs_get_option('contact_work4_title');
$adhunaarchi_contact_work4_text = cs_get_option('contact_work4_text');
?>
<div class="section how-we-work p-100 bg-lavender-light-1 bg-dotted-1">
    <div class="container">

        <div class="row text-center">
            <div class="col">
                <p class="subtitle dash-true style-dark mb-0"><?php echo isset($adhunaarchi_section_subtitle) ? $adhunaarchi_section_subtitle : ""; ?></p>
                <h2>
                    <?php
                        $word_position = esc_attr($adhunaarchi_title_wposition);
                        
                        if(isset($word_position)) {
                            $word_position = $word_position -1;
                            $title_parts = explode(" ", $adhunaarchi_section_title);
                            $title_parts[$word_position] = '<span class="prominent">' . esc_html($title_parts[$word_position]) . '</span>';

                            echo isset($title_parts) ? implode(" ", $title_parts) : "";
                        }
                    ?>
                </h2>
                <div class="dash style-dark centered"></div>
            </div>
        </div>

        <div class="row mt-5 justify-content-center">

            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="number-box-container mb-3 mb-md-0">
                    <div class="number-box">
                        01
                    </div>
                    <div class="number-box-text mt-3">
                        <h3><?php echo isset($adhunaarchi_contact_work1_title) ? esc_html($adhunaarchi_contact_work1_title) : ""; ?></h3>
                        <p class="text-body"><?php echo isset($adhunaarchi_contact_work1_text) ? esc_html($adhunaarchi_contact_work1_text) : ""; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="number-box-container mb-3 mb-md-0">
                    <div class="number-box">
                        02
                    </div>
                    <div class="number-box-text mt-3">
                        <h3><?php echo isset($adhunaarchi_contact_work2_title) ? esc_html($adhunaarchi_contact_work2_title) : ""; ?></h3>
                        <p class="text-body"><?php echo isset($adhunaarchi_contact_work2_text) ? esc_html($adhunaarchi_contact_work2_text) : ""; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="number-box-container mb-3 mb-md-0">
                    <div class="number-box">
                        03
                    </div>
                    <div class="number-box-text mt-3">
                    <h3><?php echo isset($adhunaarchi_contact_work3_title) ? esc_html($adhunaarchi_contact_work3_title) : ""; ?></h3>
                        <p class="text-body"><?php echo isset($adhunaarchi_contact_work3_text) ? esc_html($adhunaarchi_contact_work3_text) : ""; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="number-box-container mb-3 mb-md-0">
                    <div class="number-box">
                        04
                    </div>
                    <div class="number-box-text mt-3">
                        <h3><?php echo isset($adhunaarchi_contact_work4_title) ? esc_html($adhunaarchi_contact_work4_title) : ""; ?></h3>
                        <p class="text-body"><?php echo isset($adhunaarchi_contact_work4_text) ? esc_html($adhunaarchi_contact_work4_text) : ""; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
