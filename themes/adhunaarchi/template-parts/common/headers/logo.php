<?php
// On Home/Front Page, surround Logo image with H1 tag. SEO matters
if( is_home() || is_front_page() ): ?>
<h1 class="site-title">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-link">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php echo esc_html(bloginfo('name')); ?>">
	</a>
</h1>
<?php else: ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-link">
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php echo esc_html(bloginfo('name')); ?>">
</a>
<?php endif; ?>
