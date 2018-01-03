<?php
/*
Template Name: SteelStrong Sub Category 
*/
?>



<?php get_header(); ?>


<section id="steelstrong_product">


<section id="steelstrong_image_rotator_container">



<section id="steelstrong_image_rotator">

<?php 
$sliderProSlideDeckId = get_post_meta($post->ID, "productpagesliderprodeck", true);
if($sliderProSlideDeckId != "")
	echo slider_pro($sliderProSlideDeckId); 
?>

</section><!--close gallery_image_rotator-->

<article id="additional_info">
<p><a href="/warranty-information/">View our product warranty information.</a></p>


</article><!--close additional_info-->

</section><!-- close steelstrong_image_rotator_container-->

<section id="instock_details">

<h1><?php wp_title("",true); ?></h1>


<?php while ( have_posts() ) : the_post(); ?>

<?php the_content(); // grab the page content ?>

<?php endwhile; // end of the loop. ?>





<?php 
 $vi_page_content_tabs_category = get_post_meta($post->ID, "vi_page_content_tabs_category", true); 
 if($vi_page_content_tabs_category != "")
 {
?>
<article class="steelstrong_specs_container">
<?php 
	echo do_shortcode("[vi_drawtabs tabcat='" . $vi_page_content_tabs_category . "']"); 
?>
</article><!--close steelstrong_specs_inside-->
<?php
 }
?>


<div class="fadehover request_info_ss">
<a href="<?php bloginfo('url');?>/request-information/"><img src="<?php bloginfo('url');?>/wp-content/uploads/button_request_info_normal.png" alt="REQUEST INFO" width="139" height="39" class="a" /></a>
<a href="<?php bloginfo('url');?>/request-information/"><img src="<?php bloginfo('url');?>/wp-content/uploads/button_request_info_hover.png" alt="REQUEST INFO" width="139" height="39" class="b" /></a>
</div> 


</article><!--close steelstrong_specs_container-->

</section><!--close steelstrong_details-->






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



</section><!--close steelstrong_product-->





<script type="text/javascript">
  jQuery(document).ready(function(){
    // setup ul.tabs to work as tabs for each div directly under div.panes
    jQuery("ul.tabs").tabs("div.panes > div");
}); 
 </script>








<footer>

<?php get_footer(); ?>

</footer>

<?php wp_footer(); ?> 
</body>
</html>