<?php

// Custom types
require_once(get_stylesheet_directory()."/customtypes/vi_product.php");
require_once(get_stylesheet_directory()."/customtypes/vi_commoncontent.php");
require_once(get_stylesheet_directory()."/customtypes/vi_tabs.php");

// Include reference to all widgets in the widgets directory
foreach (glob(get_stylesheet_directory()."/widgets/*.php") as $filename)
{
    require_once($filename);
} 

function SearchFilter($query) {
if ($query->is_search && !is_admin()) {
$query->set('post_type', 'page');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');




if ( ! function_exists( 'twentyeleven_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function twentyeleven_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> more results', 'twentyeleven' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'more results <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif; // twentyeleven_content_nav

if ( !session_id() )
	add_action( 'init', 'session_start' );
	
	
	
	register_sidebar( array(
		'name' => __( 'Newsletter area', 'vulcantheme' ),
		'id' => 'newsletter',
		'description' => __( 'Newsletter footer signup area', 'msc' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	
	
	


/**
 * Fix Gravity Form Tabindex Conflicts
 * http://gravitywiz.com/fix-gravity-form-tabindex-conflicts/
 */
add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}	
	
	
	



?>