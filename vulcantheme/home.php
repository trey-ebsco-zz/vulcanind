<?php
/*
Template Name: Home Template
*/
?>



<?php get_header(); ?>


<section id="home_marquee">

<article id="marquee_copy">

<h1>We provide custom<br /> merchandising solutions!</h1>


<p>Meet your most challenging merchandising goals with full-service solutions from Vulcan Industries. From in-house design and engineering to logistics support and more, Vulcan Industries delivers everything you need for creative retail store fixtures, POP displays, and merchandising impact.</p>


<div class="fadehover view_custom">
<a href="<?php bloginfo('url');?>/custom-store-fixtures/"><img src="<?php bloginfo('url');?>/wp-content/uploads/button_view_custom_normal.png" alt="" class="a" />
<img src="<?php bloginfo('url');?>/wp-content/uploads/button_view_custom_hover.png" alt="" class="b" /></a>
</div> 

</article><!--close marquee_copy-->



<article id="home_rotator">

<?php echo slider_pro(1); ?>

</article><!--close home_rotator-->


</section><!--close home_marquee-->


<section id="our_creative_process_boxes">

<h2>Our Creative Process</h2>

<article id="step_1">

<h3><a href="<?php bloginfo('url');?>/creative-process/"><span class="white_text">1. </span>Listen <span class="arrows_home">>></span></a></h3>

<article class="box">
<!--<p class="sound_out">verb  -ten-ed, -ten-ing,</p>-->
<p class="definition"><a href="<?php bloginfo('url');?>/creative-process/">We listen and ask questions to ensure we understand your specific marketing objectives and display goals.</a> </p>
</article>


</article><!--close step1-->


<article id="step_2">
   
<h3><a href="<?php bloginfo('url');?>/creative-process/"><span class="white_text">2. </span>Design <span class="arrows_home">>></span></a></h3>

<article class="box">
<!--<p class="sound_out">verb  -ten-ed, -ten-ing,</p>-->
<p class="definition"><a href="<?php bloginfo('url');?>/creative-process/">We develop merchandising concepts, arising from the initial ideas, sketches, and collaborative brainstorming, and creatively conceptualize those concepts in 3D color renderings. </a></p>
</article>

</article><!--close step2-->



<article id="step_3">

<h3><a href="<?php bloginfo('url');?>/creative-process/"><span class="white_text">3. </span>Create <span class="arrows_home">>></span></a></h3>

<article class="box">
<!--<p class="sound_out">verb  -ten-ed, -ten-ing,</p>-->
<p class="definition"><a href="<?php bloginfo('url');?>/creative-process/">Our professional design team, engineers, estimators, and production team turn concepts into reality.</a></p>
</article>

</article><!--close step3-->

<article id="step_4">
  
<h3><a href="<?php bloginfo('url');?>/creative-process/"><span class="white_text">4. </span>Deliver <span class="arrows_home">>></span></a></h3>

<article class="box">
<!--<p class="sound_out">verb  -ten-ed, -ten-ing,</p>-->
<p class="definition"><a href="<?php bloginfo('url');?>/creative-process/">Our project management and logistics support teams serve you throughout the life of your merchandising effort.</a></p>
</article>


</article><!--close step4-->


<section id="feature_box" style="padding-top:10px;">

<a href="<?php bloginfo('url');?>/our-capabilities/"><img src="<?php bloginfo('url');?>/wp-content/uploads/banner_capabilities.png" alt="Our Capabilities" /></a>

</section><!--close feature_box-->



</section><!--close our_creative_process_boxes-->



<footer>

<?php get_footer(); ?>

</footer>

<?php wp_footer(); ?> 
</body>
</html>