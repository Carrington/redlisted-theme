<?php get_header(); ?>
	
	<!-- section -->
	<div class="content">
	
		<h1><?php the_title(); ?></h1>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
			<?php the_content(); ?>
		
			<br class="clear">
			
			<?php edit_post_link(); ?>
			
		</article>
		<!-- /article -->
		
	<?php endwhile; ?>
	
	<?php else: ?>
	
		<!-- article -->
		<article>
			
			<h2><?php _e( 'The content you were looking for doesn\'t exist. At least, that's what we want you to think.', 'redlisted' ); ?></h2>
			
		</article>
		<!-- /article -->
	
	<?php endif; ?>
	
	</div>
	<!-- /section -->
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
