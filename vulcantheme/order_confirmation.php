<?php
/*
Template Name: Order Confirmation
*/
?>



<?php get_header(); ?>



<section id="order_content"> 

<article id="the_content" style="padding-right: 100px;"> 

<h1><?php wp_title("",true); ?></title></h1>




<?php while ( have_posts() ) : the_post(); ?>

<?php the_content(); // grab the page content ?>

<?php endwhile; // end of the loop. ?>


</article><!--close content_header_copy-->















</section><!--close content_header-->








<!--<section id="content_content">

<!--article id="content_container"-->









<!--/article><!--close content_container-->




<!--</section><!--close content_content-->




<footer>

<?php get_footer(); ?>

</footer>


