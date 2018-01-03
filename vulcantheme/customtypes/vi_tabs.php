<?php

//-----------register custom post type
  register_post_type( 'tab',
    array(
      'labels' => array(
        'name' => __( 'Tabs' ), //this name will be used when will will call the tabs in our theme
        'singular_name' => __( 'Tab' ),
		'add_new' => _x('Add New', 'tab'),
		'add_new_item' => __('Add New Tab'), //custom name to show up instead of Add New Post. Same for the following
		'edit_item' => __('Edit Tab'),
		'new_item' => __('New Tab'),
		'view_item' => __('View Tab'),
      ),
      	'public' => true,
 	'show_ui' => true,
  	'hierarchical' => false, //it means we cannot have parent and sub pages
  	'capability_type' => 'post', //will act like a normal post
  	//'rewrite' => 'Tab', //this is used for rewriting the permalinks
  	'query_var' => false,
  	'has_archive' => true,
  	'supports' => array( 'title',	'editor', 'thumbnail', 'excerpts', 'revisions') //the editing regions that will support
    )
  );

add_filter("manage_edit-tab_columns", "vi_tab_columns");
register_taxonomy("tabcategories", array("tab"), array("hierarchical" => true, "label" => "Tab Groups", "singular_label" => "Tab Group", "rewrite" => array("slug" => "sltabcategories")));
add_action("manage_posts_custom_column", "vi_tab_custom_columns");
add_action( 'add_meta_boxes', 'vi_tab_add_custom_box' );
add_action( 'save_post', 'vi_save_tab' );
add_shortcode('vi_drawtabs','vi_draw_tabs');

function vi_tab_columns($columns) //this function display the columns headings
{
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Tab Text",
		"tabcategories" => "Tab Groups",
		"displayorder" => "Sort Order",
		"displaytab" => "Display Tab?"
	);
	return $columns;
}

function vi_tab_custom_columns($column)
{
	global $post;
	if ("ID" == $column) echo $post->ID; //displays title
	elseif ("tabcategories" == $column)    echo get_the_term_list($post->ID, 'tabcategories', '', ', ','');
	elseif ("displayorder" == $column) echo get_post_meta($post->ID, "tabdisplayorder", true);
	elseif ("displaytab" == $column) echo get_post_meta($post->ID, "tabdisplaytab", true);  
}

/* Adds a box to the main column on the Post and Page edit screens */
function vi_tab_add_custom_box() 
{
    add_meta_box( 'vi_tab_displayorder', __( 'Display Order', 'vi_tab_displayorder_text' ),'vi_tab_inner_custom_box_displayorder', 'tab', 'side', 'core');
    add_meta_box( 'vi_tab_displaytab', __( 'Display Tab?', 'vi_tab_displaytab_text' ),'vi_tab_inner_custom_box_displaytab', 'tab', 'side', 'core');
}

function vi_tab_inner_custom_box_displayorder( $post ) 
{
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'vi_tab_nonce_displayorder' );

  // The actual fields for data entry
  echo '<label for="vi_tab_displayorder_field">';
       _e("Display Order", 'vi_tab_displayorder_text' );
  echo '</label> ';
  echo "<select id='vi_tab_displayorder_field' name='vi_tab_displayorder_field'>";
  $tabdisplayorder = get_post_meta($post->ID, "tabdisplayorder", true);
  for($i=1;$i<25;$i++)
  {
	echo "<option value='" . $i . "'";
	if($tabdisplayorder == "" && $i==5)
		echo " selected ";
	elseif ( $i==$tabdisplayorder)
		echo " selected ";
	echo ">" . $i . "</option>";
  }
  echo "</select>";
}

function vi_tab_inner_custom_box_displaytab( $post ) 
{
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'vi_tab_nonce_displaytab' );

  // The actual fields for data entry
  echo '<label for="vi_tab_displaytab_field">';
       _e("Display Tab", 'vi_tab_displaytab_text' );
  echo '</label> ';
  echo "<select id='vi_tab_displayorder_field' name='vi_tab_displaytab_field'>";
  echo "";
  $tabdisplaytab = get_post_meta($post->ID, "tabdisplaytab", true);
  echo "<option value='Yes'";
  if($tabdisplaytab == "Yes" || $i=="")
  	echo " selected ";
  echo ">Yes</option>";
  echo "<option value='No'";
  if($tabdisplaytab == "No")
  	echo " selected ";
  echo ">No</option>";
  echo "</select>";
}

function vi_save_tab( $post_id ) {
  // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

  if ( !wp_verify_nonce( $_POST['vi_tab_nonce_displayorder'], plugin_basename( __FILE__ ) ) )
      return;

  
  // Check permissions
  if ( 'page' == $_POST['post_type'] ) 
  {
    if ( !current_user_can( 'edit_page', $post_id ) )
        return;
  }
  else
  {
    if ( !current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // OK, we're authenticated: we need to find and save the data

  update_post_meta($post->ID, "categories", $_POST["categories"]);

  $vi_tab_displayorder = $_POST['vi_tab_displayorder_field'];
  $vi_tab_displaytab = $_POST['vi_tab_displaytab_field'];
  update_post_meta($post_id, "tabdisplayorder", $vi_tab_displayorder);
  update_post_meta($post_id, "tabdisplaytab", $vi_tab_displaytab);


  
}


/////////////////////////////////////////////////////////////////////
////////////////////////  SHORT CODE  ///////////////////////////////
/////////////////////////////////////////////////////////////////////

function vi_draw_tabs( $atts )
{
	global $post;
	$out = "";
	extract(shortcode_atts(
		array(
			'tabcat'  => '' 
		), $atts));
	
	setup_postdata($post);

	if(get_term_by('name',$tabcat,'tabcategories')!=='false' && $tabcat != '')
	{
		$args = array(
			'post_type' => 'tab',
			'posts_per_page' => -1,
			'tabcategories' => get_term_by('name',$tabcat,'tabcategories')->slug,
			'meta_key' => 'tabdisplayorder',
			'orderby' => 'meta_value_num',
			'order' => 'ASC',
			'meta_query' => array(
				array(
					'key'     => 'tabdisplaytab',
					'value'   => 'Yes',
					'compare' => '='
				)
			)
		);
		//		'cat' => get_cat_ID($coincat),
		query_posts( $args );
		$numPostsDisplayed = 0;
		$out = "<div class='panes'>";
		$tabButtonUL = "<ul class='tabs'>";
		while (have_posts()) : the_post();
			if($numPostsDisplayed == 0)
				$tabButtonUL .= "<li style='margin-left:0;'><a href='#'>" . get_the_title() . "</a></li>";
			else
				$tabButtonUL .= "<li><a href='#'>" . get_the_title() . "</a></li>";
			$out .= "<div>" . get_the_content() . "</div>";
							
			$numPostsDisplayed++;
		endwhile;
		$tabButtonUL .= "</ul>";
		if($numPostsDisplayed > 0)
		{
			$out .= '</div>';
			$out = $tabButtonUL . $out;
		}
	}
	wp_reset_query();
	return $out;



}

?>