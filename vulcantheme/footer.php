<section id="footer">

<article id="footer_nav">
<h3>Go To</h3>
<ul class="nav_col_1">
<li><a href="<?php bloginfo('url');?>/index.php">Home</a></li>
<li><a href="<?php bloginfo('url');?>/faqs/">FAQ&#8217;s</a></li>
<li><a href="<?php bloginfo('url');?>/warranty-information/">Warranty Info</a></li>
<li><a href="<?php bloginfo('url');?>/return-policy/">Return Policy</a></li>

</ul>

<ul class="nav_col_2">
<li><a href="<?php bloginfo('url');?>/contact-us/">Contact Us</a></li>
<li><a href="http://ebscoind.com/privacy-policy/" target="_blank">Privacy Policy</a></li>
<li><a href="<?php bloginfo('url');?>/site-map/">Site Map</a></li>
</ul>

</article><!--close footer_nav-->

<article class="divider"></article>

<article id="associations">
<h3>Proud Members of</h3>
<a href="http://www.nasfm.org/" target="_blank"><img src="<?php bloginfo('url');?>/wp-content/uploads/logo_member_are.jpg" alt="ARE" width="130" height="70" /></a>
<a href="http://www.nkba.org/" target="_blank"><img src="<?php bloginfo('url');?>/wp-content/uploads/logo_member_nkba.jpg" alt="NKBA" width="130" height="70" /></a>

</article><!--close associations-->

<article class="divider"></article>

<article id="email_container">
<h3>Stay in Touch</h3>

						<?php if ( !function_exists('dynamic_sidebar')
						|| !dynamic_sidebar('newsletter') ) : ?>
						<?php endif; ?>
  
        
 <div style="clear:float;"></div>       
<p>&copy; <?php echo date("Y"); ?> EBSCO Industries, Inc. All rights reserved.</p>        
              
</article><!--close email_container-->




<article class="divider"></article>

<article id="rep_login">
<h3>Sales Rep</h3>

<div class="fadehover login">
<a href="http://sales.vulcanind.com"><img border="0" src="<?php bloginfo('url');?>/wp-content/uploads/button_login_normal.png" alt="" class="a" />
<img src="<?php bloginfo('url');?>/wp-content/uploads/button_login_hover.png" alt="" class="b" /></a>
</div> 

</article><!--close rep_login-->

<div class="clear"></div>

<p class="tagline">Vulcan Industries, custom point of purchase displays since 1946.</p>


</section><!--close footer-->

<div class="clear"></div>

<!--load supporting js-->



<script src="<?php bloginfo("url"); ?>/wp-content/themes/vulcantheme/scripts/jquery.misc.js" type="text/javascript"></script>


<script src="<?php bloginfo("url"); ?>/wp-content/themes/vulcantheme/scripts/jquery.tools.min.js" type="text/javascript"></script>







<!--[if IE]>
</div>
<![endif]-->
<?php wp_footer(); ?>
</body>
</html>