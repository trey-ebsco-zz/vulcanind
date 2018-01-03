<?php
/*
Template Name: In-Stock Store Fixtures - Product
*/
?>



<?php get_header(); ?>


<section id="instock_store_product">


<section id="instock_image_rotator_container">


<section id="instock_image_rotator">

<?php 
$sliderProSlideDeckId = get_post_meta($post->ID, "productpagesliderprodeck", true);
if($sliderProSlideDeckId != "")
	echo slider_pro($sliderProSlideDeckId); 
?>



</section><!--close gallery_image_rotator-->

<article id="additional_info">

<p>Most orders ship next-day. | <a href="/warranty-information/">View our product warranty information.</a></p>


</article><!--close additional_info-->

</section><!-- close instock_image_rotator_container-->

<section id="instock_details">

<h1><?php wp_title("",true); ?></h1>


<?php while ( have_posts() ) : the_post(); ?>

<?php the_content(); // grab the page content ?>
<?php
  	$ccNECSC_page_content_shoppingcart = get_post_meta($post->ID, "ccNECSC_page_content_shoppingcart", true);  
	if($ccNECSC_page_content_shoppingcart != "")
	{
		$ccNECSC_page_content_shoppingcart = str_replace("ccNECSC_group_", "", $ccNECSC_page_content_shoppingcart);
		echo do_shortcode("[ccNECSC_drawCart groupid=".$ccNECSC_page_content_shoppingcart."]");		
	}
	
?>

<?php endwhile; // end of the loop. ?>




<!--article class="instock_store_specs_container">


<!--<h1 id="instock_store_specs">Waterfall Display <span class="specs">[Specs]</span></h1>
<article class="instock_store_specs_inside">

<div class="specs_list">
<h3 class="specs_header">Color</h3>
<ul>
<li>Almond / Black</li>
<li>Almond / Black</li>
<li>Almond / Black</li>
</ul>
</div><!--close specs_list-->

<!--<<div class="specs_list">
<h3 class="specs_header">Size Variants</h3>
<ul>
<li>24" w x</li>
<li>14" d x</li>
<li>54" h </li>
</ul>
</div><!--close specs_list-->

<!--<<div class="specs_list">
<h3 class="specs_header">Price</h3>
<ul>
<li>$70.13</li>
<li>$88.58</li>
<li>$102.29</li>
</ul>
</div><!--close specs_list-->


<!--
<table width="400" border="0" cellspacing="0" cellpadding="0" class="specs_container">
  <tr>
    <td colspan="4"><h1 id="instock_store_specs">Gondola Shelves <span class="specs">[Specs]</span></h1></td>
    
  </tr>
  <tr>
  <td>
  
  <table width="400" border="0" cellspacing="0" cellpadding="0" class="specs_table">
  
  <tr>
    <td width="130"><h3 class="specs_header">Color</h3></td>
    <td width="100"><h3 class="specs_header">Size</h3></td>
    <td width="100"><h3 class="specs_header">Price</h3></td>
    <td width="80"><h3 class="specs_header">Quantity</h3></td>
  </tr>
  <tr>
    <td>
    <div class="styled-select">
    <select>
     <option value="almond">Almond</option>
     <option value="black">Black</option>
   </select></div>
   </td>
    <td>12"d x 24"w</td>
    <td>$18.84</td>
    <td>
    <form>
	<input type="text" name="quantity" style="width: 30px; padding: 2px; border: 1px solid #ccc;" />
	</form>
    </td>
  </tr>
  <tr>
    <td>
    <div class="styled-select">
    <select>
     <option value="almond">Almond</option>
     <option value="black">Black</option>
   </select></div>
   </td>
    <td>12"d x 36"w</td>
    <td>$23.35</td>
    <td>
    <form>
	<input type="text" name="quantity" style="width: 30px; padding: 2px; border: 1px solid #ccc;" />
	</form>
    </td>
  </tr>
  <tr>
    <td>
    <div class="styled-select">
    <select>
     <option value="almond">Almond</option>
     <option value="black">Black</option>
   </select></div>
   </td>
    <td>12"d x 48"w</td>
    <td>$25.00</td>
    <td>
    <form>
	<input type="text" name="quantity" style="width: 30px; padding: 2px; border: 1px solid #ccc;" />
	</form>
    </td>
  </tr>
</table>

</td>
</tr>
</table>

























</article><!--close instock_store_specs_inside-->









</article><!--close instock_store_specs_container-->

</section><!--close instock_details-->



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



</section><!--close instock_store_product-->





<footer>

<?php get_footer(); ?>

</footer>

