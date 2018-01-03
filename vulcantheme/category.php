<?php
/**
 * Template for displaying Category Archive pages
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
	<section id="content_content">
		<div id="blog_content">

<h1 class="page-title"><?php printf( __( 'Category Archives: %s', 'twentyeleven' ), '<span>' . single_cat_title( '', false ) . '</span>' );?></h1>
			<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" style=" min-height:185px; border-bottom: 1px solid #ccc;">

<div class="img_container"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(222,163) ); ?></a></div>

<div class="content_container">	
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

					
						<section class="post_content clearfix">
							<?php the_excerpt(); ?>
						</section> <!-- end article section -->


	</div><!-- close excerpt -->

					</article> <!-- end article -->

			
			<?php endwhile; ?>
			<?php endif; ?>
			
		</div><!-- #content -->
			
<?php get_sidebar(); ?>

	</section><!-- #primary -->

<?php get_footer(); ?>