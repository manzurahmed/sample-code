<?php
// Fetch CodeStar options
$adhunaarchi_quotes_1 = cs_get_option('contact_quotes_1');
$adhunaarchi_quotes_author = cs_get_option('contact_quotes_author');
$adhunaarchi_quotes_2 = cs_get_option('contact_quotes_2');
?>
<div class="section quote pos-rel bg-gray-1">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-5">
                <h2 class="mb-3 text-white"><?php echo isset($adhunaarchi_quotes_1) ? esc_html($adhunaarchi_quotes_1) : ""; ?></h2>
                <p class="mb-4 mb-md-0 subtitle dash-true style-light text-white"><?php echo isset($adhunaarchi_quotes_author) ? esc_html($adhunaarchi_quotes_author) : ""; ?></p>
            </div>
            <div class="col-sm-6 col-md-7">
                <p class="m-0 text-white"><?php echo isset($adhunaarchi_quotes_2) ? esc_html($adhunaarchi_quotes_2) : ""; ?></p>
            </div>
        </div><!--row-->
    </div><!--container-->
</div><!--section-->