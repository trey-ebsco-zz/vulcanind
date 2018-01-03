<?php
/*
Template Name: Ideas & Solutions
*/

get_header(); ?>
	<?php query_posts('post_type=post'); ?>
	<section id="content_content">
		<div id="header_blog">
		<h1><?php the_title(); ?></h1>
		<?php
			$page_id = 2737; // substitute page_id of page you want content included from for "2"
			$page = get_post($page_id);
			echo "<p>$page->post_content</p>";
?>
		</div>		
	<img src="/wp-content/uploads/bg_shadow.png" alt="" class="img_shadow" />	
	<div id="blog_content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" style=" min-height:185px; border-bottom: 1px solid #ccc;">
							
			<div class="img_container"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"></a>
	<?php if(types_render_field( "thumbnail-image", '')) {	
		 echo(types_render_field( "thumbnail-image", ''));
		 } 
		else {
		the_post_thumbnail( array(222,163) );
		}
	?>

<?php // the_post_thumbnail( array(222,163) ); ?></div>
	<div class="content_container">	
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php /*<p class="meta">Posted <?php the_date('F j, Y');?> by <?php the_author_posts_link(); ?> &amp; filed under <?php the_category(', '); ?></p> */ ?>
					
						<section class="post_content clearfix">
							<?php the_excerpt(); ?>

						</section> <!-- end article section -->
	</div><!-- close excerpt -->	
					</article> <!-- end article -->
					<?php endwhile; ?>
					
					<?php else : ?>		
			
					<?php endif; wp_reset_query();?>	

</div>
		</div>	
			<?php get_sidebar(); ?>
	</section><!-- #primary -->
	
<footer>

<?php get_footer(); ?>

</footer>