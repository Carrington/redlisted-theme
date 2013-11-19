<?php get_header(); ?>

	<!-- section -->
	<div class='content' role="main">
	
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<h1><?php _e( 'Page not found', 'redlisted' ); ?></h1>
			<h2>
				<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'redlisted' ); ?></a>
			</h2>
			
		</article>
		<!-- /article -->
		
	</div>
	<!-- /section -->
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
