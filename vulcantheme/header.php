<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<script src="//cdn.optimizely.com/js/78249743.js"></script>
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>


<meta http-equiv="X-UA-Compatible" content="IE=edge" >
<!--[if lte IE 8]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->			
<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS 0.92 Feed" href="<?php bloginfo('rss_url'); ?>">
		
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
		
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>">
		
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">





<!--favicons-->
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" />


<link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/apple-touch-icon-iphone.png" /> 
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('stylesheet_directory'); ?>/images/apple-touch-icon-ipad.png" /> 
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/images/apple-touch-icon-iphone4.png" />
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('stylesheet_directory'); ?>/images/apple-touch-icon-ipad3.png" />


<!--google fonts-->
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300|Fjord+One' rel='stylesheet' type='text/css'>


<!--load stylesheet-->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">


<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/ie_7.css" media="screen" />
<![endif]-->


<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/ie_8.css" media="screen" />
<![endif]-->



<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/ie_9.css" media="screen" />
<![endif]-->



<!--load the jquery and supporting scripts-->
<?php wp_enqueue_script('jquery'); ?>
<?php wp_enqueue_script( 'jquery-ui-sortable' ); ?>


<?php wp_head(); ?>

<script type="text/javascript">
					jQuery(document).ready(function() {

						jQuery.fn.cleardefault = function() {
						return this.focus(function() {
							if( this.value == this.defaultValue ) {
								this.value = "";
							}
						}).blur(function() {
							if( !this.value.length ) {
								this.value = this.defaultValue;
							}
						});
					};
						jQuery(".clearit input, .clearit textarea").cleardefault();

					});

			</script>
<script src="<?php bloginfo("url"); ?>/wp-content/themes/vulcantheme/scripts/modernizr.js" type="text/javascript"></script>


<script src="<?php bloginfo("url"); ?>/wp-content/themes/vulcantheme/scripts/css_browser_selector.js" type="text/javascript"></script>
<script src="<?php bloginfo("url"); ?>/wp-content/themes/vulcantheme/scripts/css_browser_selector.js" type="text/javascript"></script>
<script src="http://cdn.optimizely.com/js/78249743.js"></script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-34591116-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Hotjar Tracking Code for http://www.vulcanind.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:250074,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>

</head>


<body id="index" <?php body_class('home'); ?>>




<!--[if IE]>
<div id="IEonly">
<![endif]-->



<header>

<article id="branding">
 <a href="<?php bloginfo('url');?>/index.php"><img src="<?php bloginfo('url');?>/wp-content/uploads/vulcan_ind-logo_2017.png" width="87" height="411" alt="Vulcan Industries"></a>

</article>

<article id="search_container">
 <?php get_search_form(); ?> 
</article>


<article id="shopping_cart">
<p><?php echo do_shortcode("[ccNECSC_drawActiveCartNotification]"); ?></p>
</article>


<article id="phone_number">
 <h1>1-888-444-4417</h1>
</article>


<div class="fadehover request_info">
 <a href="<?php bloginfo('url');?>/request-information/"><img src="<?php bloginfo('url');?>/wp-content/uploads/button_request_info_normal.png" alt="REQUEST INFO" width="139" height="39" class="a" /></a>
<a href="<?php bloginfo('url');?>/request-information/"><img src="<?php bloginfo('url');?>/wp-content/uploads/button_request_info_hover.png" alt="REQUEST INFO" width="139" height="39" class="b" /></a>
</div> 

<div style="clear:both"></div>




<nav>
 <ul id="access">
 <li><a id="icon_home" href="<?php bloginfo('url');?>/index.php"><img src="<?php bloginfo('url');?>/wp-content/uploads/icon_home.png" /></a></li>
 <?php wp_nav_menu(array('menu' => 'Primary Navigation')); ?>
 </ul>
</nav>


<div style="clear:both"></div>


</header>







				
			