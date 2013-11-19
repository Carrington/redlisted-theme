<?php get_header(); ?>
	
	<!-- section -->
	<div class="content">
	
		<h1><?php _e( 'Latest Posts', 'redlisted' ); ?></h1>
	
		<?php get_template_part('loop'); ?>
		
		<?php get_template_part('pagination'); ?>
	
                <?php get_footer(); ?>

	</div>
	<!-- /section -->
	
<?php get_sidebar(); ?>

