<?php
/*
Template Name: Custom Store Fixtures Sub Category
*/
?>



<?php get_header(); ?>


<section id="custom_store_gallery">

<section id="gallery_image_rotator">

<?php 
$sliderProSlideDeckId = get_post_meta($post->ID, "productpagesliderprodeck", true);
if($sliderProSlideDeckId != "")
	echo slider_pro($sliderProSlideDeckId); 
?>

<article id="additional_info_custom">
<p><a href="/warranty-information/">View our product warranty information.</a></p>

</article><!--close additional_info-->

</section><!--close gallery_image_rotator-->





<section id="gallery_details">

<h1><?php wp_title("",true); ?></title></h1>


<?php while ( have_posts() ) : the_post(); ?>

<?php the_content(); // grab the page content ?>

<?php endwhile; // end of the loop. ?>



<section id="custom_form">

<?php 
$gravityFormId = get_post_meta($post->ID, "productpagegravityform", true);
if($gravityFormId != "")
	echo do_shortcode( "[gravityform id=".$gravityFormId." name=Custom Store Fixtures title=false description=true]" ); 
?>


</section><!--close form-->



</section><!--close gallery_details-->


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




</section><!--close _custom_store_gallery-->






<footer>

<?php get_footer(); ?>

</footer>

<?php wp_footer(); ?> 
</body>
</html>