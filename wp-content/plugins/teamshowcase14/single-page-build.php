<?php

//
//Single Member Page Check

function tshowcase_member_page($content) {
	
	$html = "";
	$infodiv = array();
	
	global $post;
	global $ts_display_order;
	
	$options = get_option('tshowcase-settings');
		
	if(is_singular( 'tshowcase' ) && $options['tshowcase_single_page_style']!="none") {

	add_action('wp_footer', 'tshowcase_custom_css');
		
	$truesocial = false; 
	if(isset($options['tshowcase_single_show_social']))	{
		$truesocial = true;
	}

	//if rich snippet for person is ON
	$itemscope = "itemscope itemtype='http://data-vocabulary.org/Person'";
	
	$html = "<div id='tshowcase-single-wrap' ".$itemscope." >";
	
	tshowcase_add_global_css();		
		
					
		//RESPONSIVE
		if($options['tshowcase_single_page_style']=="responsive") {		
			$html .=  '<div class="tshowcase-row-fluid">';		
			$html .=  '<div class="ts-col_3">';			
			$html .= tshowcase_get_image($post->ID);	//image	
			//$html .= '<div class="tshowcase-single-title">'.get_the_title($post->ID).'</div>';	// title		
			$html .= tshowcase_get_information($post->ID,true,array(),true);	//Information
			$html .= '<div class="tshowcase-box-social">';
			$html .= tshowcase_get_social($post->ID,$truesocial);	//social links	
			//$html .= tshowcase_get_twitter($post->ID);	//twitter
			$html .= '</div></div><div class="ts-col_3c">';						
			$html .= $content;					
			$html .= tshowcase_latest_posts($post->ID); //show latest posts
			$html .= '</div></div>';
			}
		
		//VCARD
		if($options['tshowcase_single_page_style']=="vcard") {		
			$html .=  '<div class="tshowcase-vcard">';	
			$html .= '<div class="tshowcase-vcard-left">';	
			$html .= tshowcase_get_image($post->ID);	//image	
			$html .= '</div>';
						
			$html .=  '<div class="tshowcase-vcard-right">';						
			
			$infodiv['details'] = tshowcase_get_information($post->ID,true,array(),true);	//Information	
			$infodiv['social'] = '<div class="tshowcase-box-social">';
			$infodiv['social'] .= tshowcase_get_social($post->ID,$truesocial);	//social links		
			$infodiv['social'] .= '</div>';
			
			//ordering
			foreach ($ts_display_order as $info) {
					if(isset($infodiv[$info])) {
					$html.=$infodiv[$info];
					}
				}
			
			
			$html .= '</div>';	
			$html .= '<div class="ts-clear-both">&nbsp;</div></div>';								
			$html .= $content;	
			//$html .= tshowcase_get_twitter($post->ID);	//twitter - currently not working			
			$html .= tshowcase_latest_posts($post->ID); //show latest posts			
			}
		
		
			
			
		$html .= "</div>";	
		return $html;
	}

	else {
		return $content;
	}
	
	
	
}

add_filter( 'the_content', 'tshowcase_member_page' );





?>