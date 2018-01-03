<?php
/*
Template Name: In-Stock Store Fixtures Sub Category
*/
?>



<?php get_header(); ?>


<section id="store_header_subcat">


<h1><?php wp_title("",true); ?></title></h1>


<?php while ( have_posts() ) : the_post(); ?>

<?php the_content(); // grab the page content ?>

<?php endwhile; // end of the loop. ?>


</section><!--close store_header_subcat-->


<section id="custom_store_categories">

<article class="instock_store_category_container">
<h1 class="instock_store"><a href="instock_store_fixtures_waterfall.html">18" Wide Waterfall Display</a></h1>
<article class="instock_store_category_inside">

<a href="instock_store_fixtures_waterfall.html"><img src="<?php bloginfo('url');?>/wp-content/uploads/category_tn_isf_gga.jpg" alt="18inch Wide Waterfall Display"  class="tn_floatright" /></a>

<p>By utilizing our standard retail store displays for presentation of your products, gondolas can help you display an array of items in your store.</p>

<p><a href="instock_store_fixtures_waterfall.html"><strong>>></strong> View 18" Wide Waterfall Display</a></p>

</article><!--close instock_store_category_inside-->
</article><!--close instock_store_category_container-->


<article class="instock_store_category_container">
<h1 class="instock_store"><a href="#">Adjustable Width Waterfall Display</a></h1>
<article class="instock_store_category_inside">

<img src="<?php bloginfo('url');?>/wp-content/uploads/category_tn_isf_wbd.jpg" alt="Adjustable Width Waterfall Display"  class="tn_floatright" />

<p>Wow your customers with our custom electronic store fixtures and retail displays that can easily demonstrate your products while keeping them safe. </p>

<p><a href="#"><strong>>></strong> View Adjustable Width Waterfall Display</a></p>

</article><!--close instock_store_category_inside-->
</article><!--close instock_store_category_container-->


<article class="instock_store_category_container">
<h1 class="instock_store"><a href="#">Wood Step Display</a></h1>
<article class="instock_store_category_inside">

<img src="<?php bloginfo('url');?>/wp-content/uploads/category_tn_isf_sfm.jpg" alt="Wood Step Display"  class="tn_floatright" />

<p>Wow your customers with our custom electronic store fixtures and retail displays that can easily demonstrate your products while keeping them safe. </p>

<p><a href="#"><strong>>></strong> View Wood Step Display</a></p>

</article><!--close instock_store_category_inside-->
</article><!--close instock_store_category_container-->


<article class="instock_store_category_container">
<h1 class="instock_store"><a href="#">Metal Step Display</a></h1>
<article class="instock_store_category_inside">

<img src="<?php bloginfo('url');?>/wp-content/uploads/category_tn_isf_fsd.jpg" alt="Metal Step Display"  class="tn_floatright" />

<p>This display is a custom home center display for one of the largest "big-box" home centers. We created custom store fixtures to display hardware for better point-of-purchase marketing.</p>

<p><a href="#"><strong>>></strong> View Metal Step Display</a></p>

</article><!--close instock_store_category_inside-->
</article><!--close instock_store_category_container-->


<article class="instock_store_category_container">
<h1 class="instock_store"><a href="#">Floor Care Display</a></h1>
<article class="instock_store_category_inside">

<img src="<?php bloginfo('url');?>/wp-content/uploads/category_tn_isf_sfd.jpg" alt="Floor Care Display"  class="tn_floatright" />

<p>Our stock offering of high quality, uniquely designed displays provide the look of a custom-designed display at a fraction of the cost! Avoid high inventory carrying costs and order just the quantities you need.</p>

<p><a href="#"><strong>>></strong> View Floor Care Display</a></p>

</article><!--close instock_store_category_inside-->
</article><!--close instock_store_category_container-->


<section id="feature_box">

<a href="#"><img src="<?php bloginfo('url');?>/wp-content/uploads/feature_custom_fixtures.jpg" alt="" /></a>


</section><!--close feature_box-->


</section><!--close custom_store_categories-->




<footer>

<?php get_footer(); ?>

</footer>

<?php wp_footer(); ?> 
</body>
</html>
