<?php /* Template Name: Novels Template */ get_header(); ?>
	
	<!-- section -->
	<div role="content" class="content">
	
		<h2 class='page-title'><?php the_title(); ?></h2>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
		
			<?php the_content(); ?>
			
    			<br class="clear">
			
			<?php edit_post_link(); ?>
			
		</article>
		<!-- /article -->
		
	<?php endwhile; ?>
	<?php $widgetNL = new WYSIJA_NL_Widget(true);
	echo $widgetNL->widget(array('form' => 1, 'form_type' => 'php'));
	?>
	<?php else: ?>
	
		<!-- article -->
		<article>
			
			<h2><?php _e( 'Sorry, nothing to display.', 'redlisted' ); ?></h2>
			
		</article>
		<!-- /article -->
	
	<?php endif; ?>
	
	</div>
	<!-- /section -->
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
