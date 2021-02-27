<?php
// Get CodeStar options
$adhunaarchi_social_links = cs_get_option('socials');
$adhunaarchi_contact_details = cs_get_option('contact_details_one');
?>
<div class="top-area">
	
		<header class="site-header">
			<div class="header-top-area pt-2 pb-2">
				<div class="container">
					<div class="row">
						<div class="col-md-12 d-flex justify-content-end small">
							<div class="subnav">
								<?php
								// Iterate through contact details and print them
								foreach($adhunaarchi_contact_details as $contact_detail):
								?>
								<p class="list-inline-item ml-4 mb-0">
									<i class="<?php echo esc_attr($contact_detail['contact_icon']); ?> mr-1"></i> <?php echo esc_html($contact_detail['contact_detail']); ?>
								</p>
								<?php
								endforeach;
								?>
							</div>

							<ul class="mb-0 social-links">
								<?php
								foreach($adhunaarchi_social_links as $social):
								?>
								<li class="list-inline-item mr-0 text-center">
									<a href="<?php echo esc_url($social['link']); ?>" class="rounded p-2"><i class="<?php echo esc_attr($social['icon']); ?>"></i></a>
								</li>
								<?php
								endforeach;
								?>
							</ul>
						</div>
					</div>
				</div>
			</div><!--header-top-area-->

			<div class="header-bottom-area py-1">
				<div class="container">
					<div class="row">
						<div class="col-3 col-sm-2">
							<?php
							// Load header logo
							get_template_part( 'template-parts/common/headers/logo' ); ?>
						</div>
						<div class="col-9 col-sm-10 mainmenu text-right">
							<?php
							wp_nav_menu( 
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div><!--col-md-12-->
							
					</div><!--row-->
					<!--SlickNav-->
					<div class="responsive-menu-wrap"></div>
				</div><!--container-->
			</div><!--header-bottom-area-->
			
		</header><!--site-header-->
	
</div><!--toparea-->

<?php
// Load Hero image
if( is_home() && is_front_page() ):
	get_template_part( 'template-parts/common/headers/hero-1' );
endif;
