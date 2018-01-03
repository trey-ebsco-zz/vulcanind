<?php
/*
Template Name: In-Stock Store Fixtures Category
*/
?>



<?php get_header(); ?>


<section id="instock_store_header">

<article id="instock_store_header_copy">
<h1><?php wp_title("",true); ?></title></h1>


<?php while ( have_posts() ) : the_post(); ?>

<?php the_content(); // grab the page content ?>

<?php endwhile; // end of the loop. ?>




</article><!--close instock_store_header_copy-->


</section><!--close instock_store_header-->


<section id="instock_store_category">


<article class="instock_store_category_container">
<h1 class="instock_store"><a href="#">Gondolas and Gondola Accessories</a></h1>
<article class="instock_store_category_inside">

<img src="<?php bloginfo('url');?>/wp-content/uploads/category_tn_isf_gga.jpg" alt="Gondolas and Gondola Accessories"  class="tn_floatright" />

<p>By utilizing our standard retail store displays for presentation of your products, gondolas can help you display an array of items in your store.</p>

<p><a href="#"><strong>>></strong> View Gondolas and Gondola Accessories</a></p>

</article><!--close instock_store_category_inside-->
</article><!--close instock_store_category_container-->


<article class="instock_store_category_container">
<h1 class="instock_store"><a href="#">Wire Baskets and Dividers</a></h1>
<article class="instock_store_category_inside">

<img src="<?php bloginfo('url');?>/wp-content/uploads/category_tn_isf_wbd.jpg" alt="Wire Baskets and Dividers"  class="tn_floatright" />

<p>Wow your customers with our custom electronic store fixtures and retail displays that can easily demonstrate your products while keeping them safe. </p>

<p><a href="#"><strong>>></strong> View Wire Baskets and Dividers</a></p>

</article><!--close instock_store_category_inside-->
</article><!--close instock_store_category_container-->


<article class="instock_store_category_container">
<h1 class="instock_store"><a href="#">Snack Food Merchandiser</a></h1>
<article class="instock_store_category_inside">

<img src="<?php bloginfo('url');?>/wp-content/uploads/category_tn_isf_sfm.jpg" alt="Snack Food Merchandiser"  class="tn_floatright" />

<p>Retail wire baskets are perfect to successfully sell your loose and bulk products. Easily attached to one of our gondola store fixtures, wire baskets make it easy to display a sundry of items.</p>

<p><a href="#"><strong>>></strong> View Snack Food Merchandiser</a></p>

</article><!--close instock_store_category_inside-->
</article><!--close instock_store_category_container-->


<article class="instock_store_category_container">
<h1 class="instock_store"><a href="#">Flooring Spinner Displays</a></h1>
<article class="instock_store_category_inside">

<img src="<?php bloginfo('url');?>/wp-content/uploads/category_tn_isf_fsd.jpg" alt="Flooring Spinner Displays"  class="tn_floatright" />

<p>This display is a custom home center display for one of the largest "big-box" home centers. We created custom store fixtures to display hardware for better point-of-purchase marketing.</p>

<p><a href="#"><strong>>></strong> View Flooring Spinner Displays</a></p>

</article><!--close instock_store_category_inside-->
</article><!--close instock_store_category_container-->


<article class="instock_store_category_container">
<h1 class="instock_store"><a href="instock_store_fixtures_sfd.html">Stock Flooring Displays</a></h1>
<article class="instock_store_category_inside">

<a href="instock_store_fixtures_sfd.html"><img src="<?php bloginfo('url');?>/wp-content/uploads/category_tn_isf_sfd.jpg" alt="Stock Flooring Displays"  class="tn_floatright" /></a>

<p>Our stock offering of high quality, uniquely designed displays provide the look of a custom-designed display at a fraction of the cost! Avoid high inventory carrying costs and order just the quantities you need.</p>

<p><a href="instock_store_fixtures_sfd.html"><strong>>></strong> View Stock Flooring Displays</a></p>

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