<?php
// Newsfeed Widget
class cc_NewsLetterReg extends WP_Widget 
{
	function cc_NewsLetterReg() 
	{
		parent::WP_Widget(false, 'Register for Newsletter');
	}

	function form($instance) 
	{
		// outputs the options form on admin
		$title              = esc_attr($instance['title']);
		$desc_text          = esc_attr($instance['desc_text']);
		$thank_you_text     = esc_attr($instance['thank_you_text']);
		$recipient_email    = esc_attr($instance['recipient_email']);
		$show_unsubscribe   = esc_attr($instance['show_unsubscribe']);   
		$et_use_et          = esc_attr($instance['et_use_et']);  
		$et_username        = esc_attr($instance['et_username']); 
		$et_password        = esc_attr($instance['et_password']); 
		$et_channelMemberID = esc_attr($instance['et_channelMemberID']);
		$et_listID          = esc_attr($instance['et_listID']);
?>  
		<p><?php _e('Title:'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
			name="<?php echo $this->get_field_name('title'); ?>" 
			type="text" value="<?php echo $title; ?>" />
			</label>
		</p>
		<p><?php _e('Message:'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('desc_text'); ?>" 
			name="<?php echo $this->get_field_name('desc_text'); ?>" 
			type="text" value="<?php echo $desc_text; ?>" />
			</label>
		</p>
		<p><?php _e('Thank You Message:'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('thank_you_text'); ?>" 
			name="<?php echo $this->get_field_name('thank_you_text'); ?>" 
			type="text" value="<?php echo $thank_you_text; ?>" />
			</label>
		</p>
		<p><?php _e('Form Recipient Email:'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('recipient_email'); ?>" 
			name="<?php echo $this->get_field_name('recipient_email'); ?>" 
			type="text" value="<?php echo $recipient_email; ?>" />
			</label>
		</p>
		<!--p><?php _e('Show Unsubscribe:'); ?> 
			<select class="widefat" id="<?php echo $this->get_field_id('show_unsubscribe'); ?>"
			name="<?php echo $this->get_field_name('show_unsubscribe'); ?>">
			<?php echo cc_draw_yesno_options($show_unsubscribe); ?>
			</select>
			</label>
		</p -->
		<p><?php _e('Submit to Exact Target:'); ?> 
			<select class="widefat" id="<?php echo $this->get_field_id('et_use_et'); ?>"
			name="<?php echo $this->get_field_name('et_use_et'); ?>">
			<?php echo cc_draw_yesno_options($et_use_et); ?>
			</select>
			</label>
		</p>
		<p><?php _e('Exact Target Username:'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('et_username'); ?>" 
			name="<?php echo $this->get_field_name('et_username'); ?>" 
			type="text" value="<?php echo $et_username; ?>" />
			</label>
		</p>
		<p><?php _e('Exact Target Password:'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('et_password'); ?>" 
			name="<?php echo $this->get_field_name('et_password'); ?>" 
			type="password" value="<?php echo $et_password; ?>" />
			</label>
		</p>
		<p><?php _e('Exact Target List ID:'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('et_listID'); ?>" 
			name="<?php echo $this->get_field_name('et_listID'); ?>" 
			type="text" value="<?php echo $et_listID; ?>" />
			</label>
		</p>
		<p><?php _e('Exact Target ChannelMember ID:'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('et_channelMemberID'); ?>" 
			name="<?php echo $this->get_field_name('et_channelMemberID'); ?>" 
			type="text" value="<?php echo $et_channelMemberID; ?>" />
			</label>
		</p>
<?php  
	}

	function update($new_instance, $old_instance) 
	{
		// processes widget options to be saved
		return $new_instance;
	}

	function widget($args, $instance) 
	{
		// outputs the content of the widget
		$args['title']              = $instance['title']; 
		$args['desc_text']          = $instance['desc_text'];  
		$args['thank_you_text']     = $instance['thank_you_text'];
		$args['recipient_email']    = $instance['recipient_email']; 
		$args['show_unsubscribe']   = $instance['show_unsubscribe'];  
		$args['et_use_et']          = $instance['et_use_et']; 
		$args['et_username']        = $instance['et_username']; 
		$args['et_password']        = $instance['et_password'];  
		$args['et_channelMemberID'] = $instance['et_channelMemberID']; 
		$args['et_listID']          = $instance['et_listID']; 

		echo "<div class='newsletter'>";

		if(isset($_POST['newsletter']) && is_email($_POST['newsletter'])) 
		{
			$userEmailAddress = mysql_real_escape_string($_POST['newsletter']);
			if($args['et_use_et'] == "Yes")
			{
				if($args['et_username'] != "" & $args['et_password'] != "" && $args['et_listID'] != "")
				{
					$et_Message = cc_add_user_to_exact_target($args['et_username'], $args['et_password'], "$userEmailAddress", "Internet User", $args['et_listID'], $args['et_channelMemberID'], "add");
					//$et_Message = cc_add_user_to_ET_via_WS($args['et_username'], $args['et_password'], "$userEmailAddress", $args['et_listID']);
				}//if
			}
			if($args['recipient_email'] != "" && is_email($args['recipient_email']))
			{
				wp_mail($args['recipient_email'], 'Newsletter Subscription', $userEmailAddress . ' would like to subscribe to the newsletter.');
			}
		echo $args['thank_you_text'];
		}// Form Handling if
		else
		{
?>
		<h2><?php echo $args['title']; ?></h2>
		<div class="formx">
			<form method="post" action="">
				<span class="newsfield">
					<input type="text" onfocus="this.value=''" value="Your Email Address Here" id="newsletter" name="newsletter">
				</span>
				<span class="submit"><input type="submit" value="Subscribe"></span>
			</form>
		</div>
		<p><?php echo $args['desc_text']; ?></p>

<?php
		}// else
		echo "</div>";
	}

} //class
register_widget('cc_NewsLetterReg');



function cc_draw_yesno_options( $show_link )
{
	$out = "";
	$out .= "<option value='Yes' ";
	if("Yes" == $show_link)
		$out .= " selected ";
	$out .= " >Yes</option>";
	$out .= "<option value='No' ";
	if("No" == $show_link || "" == $show_link)
		$out .= " selected ";
	$out .= " >No</option>";
	return $out;
}

function cc_add_user_to_exact_target($etUsername, $etPassword, $emailAddress, $fullName, $listID, $channelMemberID, $etStatus)
{
	$xmlfile = "<?xml version=\"1.0\" ?>";
	$xmlfile .= "<exacttarget><authorization><username>".$etUsername."</username><password>".$etPassword."</password></authorization>";
	$xmlfile .= "<system><system_name>subscriber</system_name>";
	if($etStatus == "" || $etStatus == "add")
		$xmlfile .= "<action>add</action>";
	else
		$xmlfile .= "<action>delete</action>";
	$xmlfile .= "<search_type>listid</search_type>";
	$xmlfile .= "<search_value>" .  $listID . "</search_value>";
	if($etStatus == "" || $etStatus == "add")
		$xmlfile .= "<search_value2></search_value2>"; 
	else
		$xmlfile .= "<search_value2>" . $emailAddress . "</search_value2>"; 
	if($etStatus == "" || $etStatus == "add")
	{
		$xmlfile .= "<values><Email__Address>" . $emailAddress . "</Email__Address>"; 
		$xmlfile .= "<status>active</status>";
		$xmlfile .= "<Full__Name>" . $fullName . "</Full__Name>";     // Required
		$xmlfile .= "<ChannelMemberID>" . $channelMemberID . "</ChannelMemberID>";  // Only in Ent. Exact Target.
		$xmlfile .= "</values><update>true</update>";
	}
	$xmlfile .= "</system></exacttarget>";
	$url ="https://api.dc1.exacttarget.com/integrate.aspx?qf=xml&xml=".urlencode($xmlfile);
	$alternate_opts = array('http'=>array('method'=>"POST",'header'=>"Content-type: application/x-www-form-urlencoded\r\n" . "Content-length: " . strlen("$xmlfile")));
	return wp_remote_retrieve_body(wp_remote_request($url, $alternate_opts));	 
}



// END Newsfeed Widget
?>
