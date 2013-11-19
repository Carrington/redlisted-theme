<?php /* Template Name: Novels Template */ get_header(); ?>
	
	<!-- section -->
	<div role="content" class="content">
	
		<h2><?php the_title(); ?></h2>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
		
			<?php the_content(); ?>
			
    			<br class="clear">
			
			<?php edit_post_link(); ?>
			
		</article>
		<!-- /article -->
		
	<?php endwhile; ?>

        	<div id='novels-posts' class='post-feed'>
			<h3>Recent Posts About Redlisted Novels</h3>
			<?php 
				$id = get_cat_ID('novels');
				$args = array ('category' => $id,
				'orderby' => 'post_date');
				$posts = get_posts($args);
				$max = (count($posts) >= 5) ? 4 : count($posts);
				for ($i = 0; $i<$max; $i++) {
					setup_postdata($posts[$i]);
					echo "<p>\n";
					echo "<a href=\"";
					the_permalink();
					echo "\">";
					the_title();
					echo "</a></p>\n";
				}
					
			?>
 		</div>
	
	<?php else: ?>
	
		<!-- article -->
		<article>
			
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
			
		</article>
		<!-- /article -->
	
	<?php endif; ?>
	
	</div>
	<!-- /section -->
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
