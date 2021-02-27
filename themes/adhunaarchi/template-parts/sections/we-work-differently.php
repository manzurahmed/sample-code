<?php
// Fetch CodeStar options
$adhunaarchi_wework_subtitle = cs_get_option('wework_section_subtitle');
$adhunaarchi_wework_title = cs_get_option('wework_section_title');
$adhunaarchi_wework_description = cs_get_option('wework_section_description');
$adhunaarchi_wework_works = cs_get_option('wework_details_works');

// Display 2nd words of title in different color
// Postion: 2, 4
$title_parts = explode(" ", esc_html($adhunaarchi_wework_title));
$title_parts[1] = '<span class="prominent">' . esc_html($title_parts[1]) . '</span>';
$title_parts[3] = '<span class="prominent">' . esc_html($title_parts[3]) . '</span>';
$title_parts = isset($title_parts) ? implode(" ", $title_parts) : "";
?>
<div class="bg-whitishgray p-50">
</div>
<div class="section wework wework-bg bg-whitishgray">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 offset-lg-4 col-md-10 offset-md-2 py-5">
                <div class="single-work-box bg-white p-md-5 p-4 my-5">
                    <p class="subtitle dash-true style-dark mb-3"><?php echo esc_html($adhunaarchi_wework_subtitle); ?></p>
                    <h2><?php echo $title_parts; ?></h2>
                    <p class="text-secondary py-3"><?php echo esc_html($adhunaarchi_wework_description); ?></p>
                    
                    <div class="wework-tab">
                        
						<ul class="nav nav-tabs tab-list" id="myTab" role="tablist">
                        <?php if(isset($adhunaarchi_wework_works)): ?>
                        <?php foreach($adhunaarchi_wework_works as $i => $adhunaarchi_wework_work): ?>
                            <li class="nav-item">
                                <a class="nav-link<?php echo (1 == $i) ? ' active' : ''; ?>" id="wework-<?php echo $i; ?>-tab" data-toggle="tab" href="#wework-<?php echo $i; ?>" role="tab" aria-controls="wework-<?php echo $i; ?>" aria-selected="<?php echo (1 == $i) ? 'true' : 'false'; ?>">
                                    <?php echo esc_html($adhunaarchi_wework_work['wework_work_title']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <?php endif; ?>
						</ul>

						<div class="tab-content" id="myTabContent">
                        <?php if(isset($adhunaarchi_wework_works)): ?>
                        <?php foreach($adhunaarchi_wework_works as $i => $adhunaarchi_wework_work): ?>

                            <div class="tab-pane fade show<?php echo (1 == $i) ? ' active' : ''; ?> p-4" id="wework-<?php echo $i; ?>" role="tabpanel" aria-labelledby="wework-<?php echo $i; ?>-tab">
                                <?php echo esc_html($adhunaarchi_wework_work['wework_work_text']); ?>
                            </div>

                        <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--row-->
    </div><!--container-->
</div>
<div class="bg-whitishgray p-50">
</div>