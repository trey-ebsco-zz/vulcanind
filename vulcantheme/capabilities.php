<?php
/*
Template Name: Our Capabilities
*/
?>



<?php get_header(); ?>


<section id="capabilities_header">

<article id="capabilities_header_copy">
<h1><?php wp_title("",true); ?></title></h1>


<?php while ( have_posts() ) : the_post(); ?>

<?php the_content(); // grab the page content ?>

<?php endwhile; // end of the loop. ?>




</article><!--close capabilities_header_copy-->


</section><!--close capabilities_header-->



<article id="capabilities_panels">


<div id="capabilities_content"> 

<?php 
 $vi_page_content_category = get_post_meta($post->ID, "vi_page_content_category", true); 
 $vi_page_content_expander = get_post_meta($post->ID, "vi_page_content_expander", true); 
 if($vi_page_content_category != "")
	echo do_shortcode("[vi_content_by_category contentcat='".$vi_page_content_category."' showexpander='Yes']");
?>

							
</div>



<section id="feature_box">

        <?php
			$vi_banner_image = get_post_meta($post->ID, "vi_banner_image_url", true);
			$vi_banner_url = get_post_meta($post->ID, "vi_banner_link_url", true);
			$vi_banner_directurl = get_post_meta($post->ID, "vi_banner_link_directurl", true);			
			if($vi_banner_image != "")
			{
				$vi_banner_image_tag = "<img src='".$vi_banner_image."' alt='ad' />";
				if($vi_banner_directurl != "")
					$vi_banner_image_tag = "<a href='".$vi_banner_directurl."'>" . $vi_banner_image_tag . "</a>";
				else if($vi_banner_url != "")
					$vi_banner_image_tag = "<a href='".$vi_banner_url."'>" . $vi_banner_image_tag . "</a>";
		 		echo $vi_banner_image_tag; 
			} 
		?>

</section><!--close feature_box-->









							
</article><!--close our_capabilities_panels-->












<footer>

<?php get_footer(); ?>

</footer>

<?php wp_footer(); ?> 
</body>
</html>