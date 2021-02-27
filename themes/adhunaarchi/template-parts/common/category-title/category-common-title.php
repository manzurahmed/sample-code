<div <?php echo !empty($catImage) ? ' style="background-image: url('.$catImage.'"' : '';?> class="hbw-page-title-area hbw-breadcrumb p-tb-50px">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->
				<?php if(function_exists('bcn_display')) { bcn_display(); } ?>

			</div><!--col-md-12-->
		</div>
	</div>
</div>