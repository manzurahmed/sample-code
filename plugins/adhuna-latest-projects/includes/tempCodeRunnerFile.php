<?php
// Fetch post meta for Projects
$adhuna_post_meta = get_post_meta ( get_the_ID(), 'adhunaarchi-projects-type', true);
// Now, get portfolio images from meta data
$adhuna_portfolio_images = $adhuna_post_meta['portfolio'];