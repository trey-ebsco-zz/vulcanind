<?php

//-----------register custom post type
  register_post_type( 'content',
    array(
      'labels' => array(
        'name' => __( 'Content' ), //this name will be used when will will call the content in our theme
        'singular_name' => __( 'Content' ),
		'add_new' => _x('Add New', 'content'),
		'add_new_item' => __('Add New Content'), //custom name to show up instead of Add New Post. Same for the following
		'edit_item' => __('Edit Content'),
		'new_item' => __('New Content'),
		'view_item' => __('View Content'),
      ),
      	'public' => true,
 	'show_ui' => true,
  	'hierarchical' => false, //it means we cannot have parent and sub pages
  	'capability_type' => 'post', //will act like a normal post
  	//'rewrite' => 'Content', //this is used for rewriting the permalinks
  	'query_var' => false,
  	'has_archive' => true,
  	'supports' => array( 'title',	'editor', 'thumbnail', 'excerpts', 'revisions') //the editing regions that will support
    )
  );


//----------------edit custom columns display for back-end 
add_filter("manage_edit-content_columns", "vi_content_columns");
register_taxonomy("contentcategories", array("content"), array("hierarchical" => true, "label" => "Content Categories", "singular_label" => "Content Category", "rewrite" => array("slug" => "slcontentcategories")));
add_action("manage_posts_custom_column", "vi_content_custom_columns");
add_action( 'add_meta_boxes', 'vi_content_add_custom_box' );
add_action( 'save_post', 'vi_save_content' );
add_action( 'save_post', 'vi_save_page_content_options' );
add_shortcode('vi_content_by_category', 'vi_draw_content_by_category');
add_action( 'wp_head' , 'vi_add_content_css_to_header');


function vi_content_columns($columns) //this function display the columns headings
{
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Content Name",
		"contentcategories" => "Content Categories",
		"contentintro" => "Summary",
		"exturl" => "Item Link",
		"displayorder" => "Display Order",
		"contentimage" => "Image",
		"displaycontent" => "Display?"
	);
	return $columns;
}

function vi_content_custom_columns($column)
{
	global $post;
	if ("ID" == $column)               	    echo $post->ID; //displays title
	elseif ("exturl" == $column)       	    echo get_post_meta($post->ID, "contentexturl", true); 
	elseif ("displayorder" == $column) 	  	echo get_post_meta($post->ID, "contentdisplayorder", true); 
	elseif ("contentcategories" == $column) echo get_the_term_list($post->ID, 'contentcategories', '', ', ','');
	elseif ("contentintro" == $column) 	  	echo get_post_meta($post->ID, "vi_content_contentintro", true); 
	elseif ("contentimage" == $column) 	    echo get_content_photo($post, "contentimage");
	elseif ("displaycontent" == $column)    echo get_post_meta($post->ID, "contentdisplaycontent", true); 	
}

/* Adds a box to the main column on the Post and Page edit screens */
function vi_content_add_custom_box() {
	global $post;
    add_meta_box( 'vi_content_contentintro', __( 'Summary', 'vi_content_contentintro_text' ),'vi_content_inner_custom_box_contentintro', 'content', 'normal', 'high');	
    add_meta_box( 'vi_content_displaycontent', __( 'Display?', 'vi_content_displaycontent_text' ),'vi_content_inner_custom_box_displaycontent', 'content', 'side', 'high');	
    add_meta_box( 'vi_content_displayorder', __( 'Display Order', 'vi_content_displayorder_text' ),'vi_content_inner_custom_box_displayorder', 'content', 'side', 'core');
    add_meta_box( 'vi_content_exturl', __( 'Link URL', 'vi_content_exturl_text' ),'vi_content_inner_custom_box_exturl', 'content', 'side', 'core');

  	// check for a template type and post new meta box
	$template_file = get_post_meta($post->ID,'_wp_page_template',TRUE);
  	if ($template_file == 'capabilities.php' || $template_file == 'common_content.php' || $template_file == 'insf_product.php' || $template_file == 'order_summary.php')
	{	
		add_meta_box( 'vi_pageoptions', __( 'Page Content Options', 'vi_add_content_page_content_to_pages_text' ), 'vi_add_content_page_content_to_pages', 'page', 'side', 'default');		
	}

}


function vi_add_content_page_content_to_pages( $post ) 
{
	global $post;
	// Use nonce for verification
	wp_nonce_field( plugin_basename( __FILE__ ), 'vi_content_nonce_pagecontent' );


  	echo '<label for="vi_page_content_category_field"><strong>Highlight Category</strong></label><br>';
  	echo "&nbsp;&nbsp;<select id='vi_page_content_category_field' name='vi_page_content_category_field' >";
  	echo "<option value=''>No Caterogy</option>";
  	$vi_page_content_category = get_post_meta($post->ID, "vi_page_content_category", true);  
  	$hlCategories = get_categories( array('type'=>'post', 'taxonomy'=>'contentcategories', 'hide_empty'=>0) );
  	foreach($hlCategories as $hlCat)
    {
		echo "<option value='" . $hlCat->cat_name . "' " . selected($hlCat->cat_name,$vi_page_content_category, false) . " >";
		echo $hlCat->cat_name . "</option>";
    }  
	echo "</select><br><br>";
	
	$template_file = get_post_meta($post->ID,'_wp_page_template',TRUE);
	if($template_file == 'insf_product.php')
	{
		$slider_pro_slidedecks = get_slider_pro_entries();
		if(sizeof($slider_pro_slidedecks) > 0)
		{
			echo '<label for="vi_product_slidreprodeck_field"><strong>Slider Pro Slide Deck</strong></label> ';
			$savedValue = get_post_meta($post->ID, "productpagesliderprodeck", true);
			echo "<br>&nbsp;&nbsp;<select id='vi_product_slidreprodeck_field' name='vi_product_slidreprodeck_field'>";
			echo "<option value=''>None</option>";
			//$form->id
			//$form->is_active
			//$form->title
			foreach($slider_pro_slidedecks as $slider_pro_slidedeck)
			{
				//if($form->is_active)
					echo "<option value='".$slider_pro_slidedeck->id."' ".selected($slider_pro_slidedeck->id, $savedValue, false).">".$slider_pro_slidedeck->name."</option>";					
			}
			echo "</select><br><br>";	
		}		
	}
	
	echo '<label for="vi_content_customcss_field"><strong>Custom CSS File</strong></label> ';
	$savedValue = get_post_meta($post->ID, "contentpagecss", true);
	echo "<br>&nbsp;&nbsp;<select id='vi_content_customcss_field' name='vi_content_customcss_field'>";
	echo "<option value=''>None</option>";
	foreach (glob(get_stylesheet_directory()."/pagecss/*.css") as $filename)
	{
		$urlBase = get_stylesheet_directory()."/pagecss/";
		$cssFileName = substr($filename,strlen($urlBase));
		//$filename = str_replace(get_stylesheet_directory(),bloginfo('stylesheet_directory'),$filename);
		//$cssFileName = substr($cssFileName, 0, strpos($cssFileName, ".css"));
		echo "<option value='".$cssFileName."' ".selected($cssFileName, $savedValue, false).">".$cssFileName."</option>";
	} 	
	echo "</select><br><br>";	
	//add_action( 'wp_head' , 'vi_add_css_to_header');
	
	echo '<label for="vi_banner_field"><strong>Footer Banner</strong></label> ';
	  // get saved value
  $vi_banner_image = get_post_meta($post->ID, "vi_banner_image_url", true);
  $vi_banner_url = get_post_meta($post->ID, "vi_banner_link_url", true);
  $vi_banner_directurl = get_post_meta($post->ID, "vi_banner_link_directurl", true);
  
  // The actual fields for data entry
  echo '<br>&nbsp;&nbsp;<label for="vi_banner_field">Select an image to display</label> <br>';
  echo "&nbsp;&nbsp;<select id='vi_banner_field' name='vi_banner_field'";
  echo " onchange=\"if(this.options[this.selectedIndex].value != ''){document.getElementById('vi_banner_preview').style.display='block';document.getElementById('vi_banner_preview').src=this.options[this.selectedIndex].value;} ";
  echo " else { document.getElementById('vi_banner_preview').style.display='none'; } \" ";
  echo ">";
  echo "<option value=''>No Banner</option>";
  $query_images_args = array('post_type' => 'attachment', 'post_mime_type'=>'image', 'post_status'=>'inherit', 'posts_per_page'=>-1);
  $query_images = new WP_Query($query_images_args);
  foreach($query_images->posts as $image)
  {
	$raq_fileName = substr($image->guid, strrpos($image->guid,'/')+1);
	if (substr($raq_fileName,0,7) == 'banner_')
	{
		echo "<option value='" . $image->guid . "'";
		if ( $image->guid==$vi_banner_image)
			echo " selected ";
		echo ">";
		echo $raq_fileName . "</option>";
	}
  }
  echo "</select>";
  echo "<br><img style='padding:5px;' id='vi_banner_preview' src='".$vi_banner_image."' ";
  if($vi_banner_image == "")
  	echo "style='display:none;'";
  echo " width='250'><br>";
  echo '&nbsp;&nbsp;<label for="vi_banner_url_field">Select a page to link to</label> ';
  echo "&nbsp;&nbsp;<select id='vi_banner_url_field' name='vi_banner_url_field'>";
  echo "<option value=''>Do Not Link</option>";
  
  foreach(get_pages() as $page)
  {
	$pageURL = get_page_link( $page->ID );
	echo "<option value='" . $pageURL . "'";
	if ( $pageURL==$vi_banner_url)
		echo " selected ";
	echo ">";
	echo $page->post_title . "</option>";
  }
  echo "</select>";  

  echo '<br><br>&nbsp;&nbsp;<label for="vi_banner_directurl_field">Direct link</label> ';
  echo "&nbsp;&nbsp;<input size=35 type='textbox' id='vi_banner_directurl_field' name='vi_banner_directurl_field' value='".$vi_banner_directurl."'><br>";

	
}


function vi_add_content_css_to_header()
{
	global $post;
	// Get current Template file name
	//$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	$savedCSSFileName = get_post_meta($post->ID, "contentpagecss", true);
	if($savedCSSFileName != "")
	{
		//$template_file = get_post_meta($post->ID,'_wp_page_template',TRUE);
		//if ($template_file == 'capabilities.php' || $template_file == 'common_content.php') 
		{
			echo "<link rel='stylesheet' id='msc_tabs_main'  href='";
			//echo bloginfo('stylesheet_directory')."/pagecss/test.css";
			echo bloginfo('stylesheet_directory')."/pagecss/".$savedCSSFileName;
			echo "' type='text/css' media='screen' />";
		}
	}
}

function vi_content_inner_custom_box_contentintro( $post )
{
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'vi_content_nonce_contentintro' );

  // The actual fields for data entry
  echo '<label for="vi_content_contentintro_field">';
       _e("Summary Sentence", 'vi_content_contentintro_text' );
  echo '</label> ';
  $savedValue = get_post_meta($post->ID, "vi_content_contentintro", true);
  echo "<input type='textbox' id='vi_content_contentintro_field' name='vi_content_contentintro_field' value='" . $savedValue . "' size='100' >";
}

function vi_content_inner_custom_box_displaycontent( $post ) 
{
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'vi_content_nonce_displaycontent' );

  // The actual fields for data entry
  echo '<label for="vi_content_displaycontent_field">';
       _e("Display Content?", 'vi_content_displaycontent_text' );
  echo '</label> ';
  $savedValue = get_post_meta($post->ID, "contentdisplaycontent", true);
  echo "<input type='checkbox' id='vi_content_displaycontent_field' name='vi_content_displaycontent_field' value='Yes' ";
  if($savedValue == "Yes")// || $savedValue == "")
	echo " checked ";
  echo ">";

}

function vi_content_inner_custom_box_exturl( $post ) 
{
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'vi_content_nonce_exturl' );

  // The actual fields for data entry
  echo '<label for="vi_content_exturl_field">';
       _e("Content link URL", 'vi_content_exturl_text' );
  echo '</label> ';
  $savedValue = get_post_meta($post->ID, "contentexturl", true);
  echo "<input type='textbox' id='vi_content_exturl_field' name='vi_content_exturl_field' value='" . $savedValue . "' >";
}

function vi_content_inner_custom_box_displayorder( $post ) 
{
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'vi_content_nonce_displayorder' );

  // The actual fields for data entry
  echo '<label for="vi_content_displayorder_field">';
       _e("In Category Display Order", 'vi_content_displayorder_text' );
  echo '</label> ';
  echo "<select id='vi_content_displayorder_field' name='vi_content_displayorder_field'>";
  $contentdisplayorder = get_post_meta($post->ID, "contentdisplayorder", true);
  for($i=1;$i<25;$i++)
  {
	echo "<option value='" . $i . "'";
	if($contentdisplayorder == "" && $i==5)
		echo " selected ";
	elseif ( $i==$contentdisplayorder)
		echo " selected ";
	echo ">" . $i . "</option>";
  }
  echo "</select>";
}

function get_content_photo( $post )
{
	$contentIndex = 0;

	if (has_post_thumbnail( $post->ID ) )
	{
		$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		echo "<img src='".$featuredImage[0]."'>";
	}
	else
	{
		$contentImages = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&orderby=menu_order ASC, ID ASC", ARRAY_A);
		$contentImageArray = array_values($contentImages);
		echo wp_get_attachment_link($contentImageArray[$contentIndex]['ID'], 'thumbnail', true);
	}
}


function vi_save_page_content_options( $post_id )
{
  // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

  if ( !wp_verify_nonce( $_POST['vi_content_nonce_pagecontent'], plugin_basename( __FILE__ ) ) )
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

  
  update_post_meta($post_id, "contentpagecss", $_POST['vi_content_customcss_field']);
  update_post_meta($post_id, "vi_page_content_category", $_POST['vi_page_content_category_field']);  	
  update_post_meta($post_id, "vi_banner_image_url", $_POST['vi_banner_field']);
  update_post_meta($post_id, "vi_banner_link_url", $_POST['vi_banner_url_field']);
  update_post_meta($post_id, "vi_banner_link_directurl", $_POST['vi_banner_directurl_field']);
  update_post_meta($post_id, "productpagesliderprodeck", $_POST['vi_product_slidreprodeck_field']);

}

function vi_save_content( $post_id ) {
  // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

  //if ( !wp_verify_nonce( $_POST['vi_content_nonce_displayorder'], plugin_basename( __FILE__ ) ) )
  //    return;

  
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

  $vi_content_exturl = $_POST['vi_content_exturl_field'];
  update_post_meta($post_id, "contentexturl", $vi_content_exturl);

  $vi_content_displayorder = $_POST['vi_content_displayorder_field'];
  update_post_meta($post_id, "contentdisplayorder", $vi_content_displayorder);
  
  $vi_content_displaycontent = $_POST['vi_content_displaycontent_field'];
  update_post_meta($post_id, "contentdisplaycontent", $vi_content_displaycontent);
    
  update_post_meta($post_id, "vi_content_contentintro", $_POST['vi_content_contentintro_field']);  		
}

/////////////////  SHORT CODE FXNS /////////////////////

function vi_draw_content_by_category( $atts )
{
	global $post;
	$out = "";
	//$out .= get_post_meta( $post->ID, '_wp_page_template', true ); 
	// contentid: content id, e.g. "113", to show single content.  0 to not display a single content
	// contentcat: category name, e.g. 'Air Force Coins', to display - ignored with contenttitle set.
	// showgallery: show Lightbox gallery on click.  If 'false' then uses URL in content as link.
	// poststoshow: number of content to show - ignored with contenttitle set.
	// postsperrow: number of content to show per row - ignored with contenttitle set.
	// showtags: hide/show the 'New' and 'Hot' tags.
	// showonlystandard: if 'true' shows the Flagship Coin from each category
	// sectiontitle: banner text.
	//
	// order of priority: contenttitle, showonlystandard, contentcat
	extract(shortcode_atts(
		array(
			'contentid' => 0,
			'contentcat'  => '', 
			'showgallery' => 'false', 
			'poststoshow' => -1, 
			'postsperrow' => 0,
			'showtags' => 'all', 
			'showonlystandard' => 'false',
			'sectiontitle' => '',
			'showexpander' => 'No'
		), $atts));
	setup_postdata($post);

	// Get Top X content by category where Display Coin = Yes Order by Display Order
	if($contentid != 0)
	{
		$args = array(
			'post_type' => 'content',
			'posts_per_page' => 1,
			'p' => $contentid
	 	);
	}
	else 
	{
		$args = array(
			'post_type' => 'content',
			'posts_per_page' => $poststoshow,
			'contentcategories' => get_term_by('name',$contentcat,'contentcategories')->slug,
			'meta_key' => 'contentdisplayorder',
			'orderby' => 'meta_value_num',
			'order' => 'ASC',
			'meta_query' => array(
				array(
					'key'     => 'contentdisplaycontent',
					'value'   => 'Yes',
					'compare' => '='
				)
			)
	 	);
	}
	
	query_posts($args);
	$contentDisplayed = 0;
	while (have_posts()) : the_post();
		$contentExtURL = get_post_meta($post->ID, "contentexturl", true);
		$contentIntroSentence = get_post_meta($post->ID, "vi_content_contentintro", true);
		$contentName = get_the_title();
		$contentName_lower = strtolower(str_replace(" ", "", $contentName));
		if (has_post_thumbnail( $post->ID ) )
		{
			$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			$contentImageURL = $featuredImage[0];
		}
		else
		{
			$contentImages = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&orderby=menu_order ASC, ID ASC", ARRAY_A);
			$contentImageArray = array_values($contentImages);
			$contentImageURL = wp_get_attachment_url($contentImageArray[0]['ID'], 'thumbnail', true);
		}
		$contentDisplayed++;

		if($showexpander == "Yes")
		{
			$out .= "<div class='".$contentName_lower."'>";
			$out .= "<h1><a id='".$contentName_lower."_trigger' href='#' >".$contentName." <span class='arrows'>>></span></a></h1>";
			$out .= "</div>";
			$out .= "<div class='".$contentName_lower."_intro'>";
			$out .= "<img src='".$contentImageURL."' width='100' height='100' alt='design' />";
			$out .= "<p class='intro_sentence'>".$contentIntroSentence."</p>";
			$out .= "<a id='".$contentName_lower."_trigger2' href='#' >Read More About ".$contentName."</a>";
			$out .= "</div><!--close intro-->";
			$out .= "<div id='".$contentName_lower."_target'>";
			$out .= get_the_content();
			$out .= "<div class='clear'></div>";
			$out .= "<p><a id='".$contentName_lower."_trigger3' href='#' >X CLOSE </a></p>";
			$out .= "</div>";
			$out .= "<div class='clear'></div>";
		}
		else
		{
			$out .= "<article id='content_container'>";	
			$out .= "<h1>" . $contentName . "</h1>";
			$out .= "<p>".get_the_content()."</p>";
			$out .= "</article>";
		}
	endwhile;
	wp_reset_query();
	return $out;
}

function vi_draw_single_content( $atts )
{
	global $post;
	$out = "";
	extract(shortcode_atts(array('contentid' => 0, 'contenttitle' => '', 'contentcat'  => '', 'showgallery' => 'false', 'showonlystandard' => 'false', 'poststoshow' => -1), $atts));
	setup_postdata($post);
	if($contenttitle != "")
		query_posts( array('post_type'=>'Content','post__in'=> array($contenttitle)));
	else if($contentid > 0)
		query_posts( 'post_type=Content&p=' . $contentid );
	else // array of categories
	{
		if($showonlystandard == "false")
		{
			query_posts( array('post_type'=>'Content','cat' => get_cat_ID($contentcat),'meta_key' => 'contentdisplayorder', 'orderby' => 'meta_value_num', 'order'=>'ASC'));
		}
		else
		{
			
			$args = array(
				'post_type' => 'Content',
				'posts_per_page' => $poststoshow,
				'cat' => get_cat_ID($contentcat),
				'meta_key' => 'contentdisplayorder',
				'orderby' => 'meta_value_num',
				'order' => 'ASC',
				'meta_query' => array(
					array(
						'key'     => 'contentisflagship',
						'value'   => 'Yes',
						'compare' => '='
					)
				)
		 	);
			query_posts( $args );
		}
	}

	while (have_posts()) : the_post();
		$contentIsHot = get_post_meta($post->ID, "contentishot", true);
		$contentExtURL = get_post_meta($post->ID, "contentexturl", true);
		$contentName = the_title('','',false);
		$contentImages = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&orderby=menu_order ASC, ID ASC", ARRAY_A);
		$contentImageArray = array_values($contentImages);
		$contentImageURL = wp_get_attachment_url($contentImageArray[0]['ID'], 'thumbnail', true);

		$out .= "<div style='position:relative;display:inline-block;'>";
		if($showgallery == 'false')
		{
			$out .= "<a href='" . $contentExtURL . "' border=0 >";
		}
		else
		{
			$out .= "<a href='#content_content_" . $post->ID . "' border=0 rel='content_content_" . $post->ID . "' class='colorbox-link'>";
		}
		$out .= "<img id='" . $post->ID . "_content' src='".$contentImageURL."'><br>";
		$out .= $contentName;
		$out .= "</a>";
	
		if($showgallery == 'true')
		{
			$out .= "<div style='display:none;'>";
			$out .= "<div style='width:600px;height:300px;' id='content_content_" . $post->ID . "' >";
			$out .= "<div style='width:340px;height:100%;float:left;'>";
			for($i=1;$i<count($contentImageArray);$i++)
			{
				$out .= "<img src='" . wp_get_attachment_url($contentImageArray[$i]['ID'], 'thumbnail', true) . "'><br>";
			}
			$out .= "</div>";
			$out .= "<div style='width:240px;height:100%;float:left;border:1px solid black;'>";
			$out .= str_replace("\r","<br />",get_the_content());
			$out .= "</div>";
			$out .= "</div>";
			$out .= "</div>";
		}
		if($contentIsHot == "Yes")
		{
			$isHotImageURL = get_bloginfo('stylesheet_directory') . "/customtypes/images/IsHot.png";
			$out .= "<span style='position:absolute;top:1px;left:1px;'><img src='$isHotImageURL'></span>";
		}
		$out .= "</div>";
	endwhile;
	wp_reset_query();
	return $out;



}

///////////////  END SHORT CODE FXNS ///////////////////
?>

