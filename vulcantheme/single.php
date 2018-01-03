<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<section id="content_content">
			<div id="blog_content" class="other-pages">

				<?php while ( have_posts() ) : the_post(); ?>

					
<!-- content-single.php -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header style="width:100%; background:none; height:auto;">
		<h1 class="post-title"><?php the_title(); ?></h1>

	<?//php the_post_thumbnail( array(243,315) ); ?>
	<?php the_post_thumbnail('full'); ?> 
   <?php if(types_render_field( "caption", '')) { ?>
	<div id="blog-caption">
	<?php echo(types_render_field( "caption", '')); ?>
	</div>	
<?php } ?>		


	</header><!-- .entry-header -->

	<div class="entry-content">

	<?//php the_post_thumbnail( array(243,315) ); ?>
	
	

		<?php the_content(); ?>

		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta" style="display:none;">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
			if ( '' != $tag_list ) {
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} elseif ( '' != $categories_list ) {
				$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} else {
				$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			}

			printf(
				$utility_text,
				$categories_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			);
		?>
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>

		<?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
		<div id="author-info">
			<div id="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 68 ) ); ?>
			</div><!-- #author-avatar -->
			<div id="author-description">
				<h2><?php printf( __( 'About %s', 'twentyeleven' ), get_the_author() ); ?></h2>
				<?php the_author_meta( 'description' ); ?>
				<div id="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyeleven' ), get_the_author() ); ?>
					</a>
				</div><!-- #author-link	-->
			</div><!-- #author-description -->
		</div><!-- #author-info -->
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->


<br />
<div style="padding:1px 5px 0px 0px; font-family:'Oswald', Arial, Tahoma, sans-serif; font-size: .8em; float:left;">SHARE THIS:</div> <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span><span class='st_linkedin' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span><span class='st_pinterest' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>

	<nav id="nav-single" style="margin-top:20px; padding-top:20px; border-top:1px solid #ccc;">
		<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
		<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> older posts', 'twentyeleven' ) ); ?></span>
		<span class="nav-next"><?php next_post_link( '%link', __( 'newer posts<span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
	</nav><!-- #nav-single -->

<!-- end content-single.php -->

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #blog_content -->
			
<div id="secondary" class="widget-area blog_sub" role="complementary">

<a href="/custom-store-fixtures/"><img src="/wp-content/uploads/idea.jpg" class="side_gallery-img" alt="" /></a>

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('main-sidebar') ) : ?><?php endif; ?>
			</div> <!-- close sidebar -->

		</section><!-- #primary -->

<?php get_footer(); ?>