<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	<section id="content_header_404">

<article id="content_header_copy_404">
<h1>404 Error - Page Not Found</h1>




</article><!--close content_header_copy-->


</section><!--close content_header-->



<section id="content_content">

<!--article id="content_container"-->

<h2 style="margin: 20px 400px 20px 20px;">We apologize, but the page you are looking for does not exist.

Let&#8217;s head <a href="<?php bloginfo('url');?>/index.php">home</a> in order to get back on track.</h2>

<?php 
 $vi_page_content_category = get_post_meta($post->ID, "vi_page_content_category", true); 
 if($vi_page_content_category != "")
	echo do_shortcode("[vi_content_by_category contentcat='".$vi_page_content_category."' showexpander='No']");
?>





<!--/article><!--close content_container-->




</section><!--close content_content-->




<footer>

<?php get_footer(); ?>

</footer>


