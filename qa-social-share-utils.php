<?php

function ami_generate_social_buttons($data , $template = null )
{
	$share_text = '' ;
	if (is_null($template) || $template == 'question') {
		$share_text = qa_opt(qa_sss_opt::SHARE_TEXT) ;
	}elseif (!is_null($template) && $template == 'qa') {
		$share_text = qa_opt(qa_sss_opt::SHARE_TEXT_HOME) ;
	}

	$buttons  = '<div class="qa-sss-buttons">' ;
	$buttons .=		'<div class="qa-sss-text">'.$share_text.' </div>';
	$buttons .=		'<div class="qa-sss-final">';
	$buttons .=			qa_opt(qa_sss_opt::GP_BUTTON)? get_social_button( 'gp',$data ):'';
	$buttons .=			qa_opt(qa_sss_opt::FB_BUTTON)? get_social_button( 'fb',$data ):'';
	$buttons .=			qa_opt(qa_sss_opt::TW_BUTTON)? get_social_button( 'tw',$data ):'';
	$buttons .=			qa_opt(qa_sss_opt::LI_BUTTON)? get_social_button( 'li',$data ):'';
	$buttons .=			qa_opt(qa_sss_opt::RE_BUTTON)? get_social_button( 're',$data ):'';
	$buttons .=			qa_opt(qa_sss_opt::VK_BUTTON)? get_social_button( 'vk',$data , $template):'';
	$buttons .=			qa_opt(qa_sss_opt::EM_BUTTON)? get_social_button( 'em',$data ):'';
	$buttons .=		'</div>'; 
	$buttons .=		'<div class="qa-sss-clear"></div>'; 
	$buttons .=	'</div>' ;
	return $buttons;
}

function get_social_button($type , $data , $template = null )
{
	if ($type == 'vk' && $template == 'question') {
		// if it is a question url for vk.com trim the title from the url as it is not supported 
		$url = qa_opt('site_url').$this->request ;
		$data['{{page_url}}'] = substr($url, 0, strrpos( $url, '/' )+1) ;
	}

	$url       = qa_sss_opt::get_url_subs($type , $data);
	$class     = ami_get_social_class($type);
	$icon      = ami_sss_icon_i($type);
	$title     = qa_lang('sss_lang/'.$type);	
	$text      = qa_lang('sss_lang/'.$type);
	$separator = ami_sss_get_separator($type);
	
	return qa_sss_opt::get_social_btn_sub(qa_opt(qa_sss_opt::SHARE_TYPE_OPTION) , array(
		'{{url}}'       => $url ,
		'{{class}}'     => $class ,
		'{{icon}}'      => $icon ,
		'{{title}}'     => $title ,
		'{{text}}'      => $text ,
		'{{separator}}' => $separator ,
		));	
}

function ami_get_social_class($social_type)
{
	$class = '' ;
	$button_with_text = 'btn btn-social btn-' ;
	$button_with_text_no_icon = 'btn btn-social btn-no-icon btn-' ;
	$button_no_text = 'btn btn-social-icon btn-' ;
	$type = qa_opt(qa_sss_opt::SHARE_TYPE_OPTION) ; 
	switch ($type) {
		case qa_sss_opt::SHARE_TYPE_IMAGE:
			$class .= 'qa-sss-img-'.$social_type ;
			break;
		case qa_sss_opt::SHARE_TYPE_TEXT:
			$class .= 'qa-sss-text-'.$social_type ;
			break;
		case qa_sss_opt::SHARE_TYPE_COLORED_BTNS:
			$class .= $button_with_text_no_icon . $social_type ;
			break;
		case qa_sss_opt::SHARE_TYPE_COLORED_BTNS_WITH_ICON:
			$class .= $button_with_text . $social_type ;
			break;
		case qa_sss_opt::SHARE_TYPE_ANIMATED_FI:
			$class .= $button_no_text . $social_type ;
			$class .= ' btn-sqr-animated' ;
			break;

		case qa_sss_opt::SHARE_TYPE_FI_SQ:
			$class .= $button_no_text . $social_type ;
			$class .= ' btn-sqr' ;
			break;
		case qa_sss_opt::SHARE_TYPE_FI_SEMI_ROUNDED:
			$class .= $button_no_text . $social_type ;
			$class .= ' btn-semi-rounded btn-shadowed' ;
			break;
		case qa_sss_opt::SHARE_TYPE_FI_ROUNDED:
			$class .= $button_no_text . $social_type ;
			$class .= ' btn-rounded' ;
			break;
		default:
			break;
	}
	return $class ;

}

function ami_print_social_buttons($value='')
{
	echo ami_generate_social_buttons();
}

function ami_sss_icon($type)
{
	$icon = "" ;
	switch ($type) {
		case 'fb':
			$icon = 'icon-facebook' ; 
			break;
		case 'gp':
			$icon = 'icon-google-plus' ; 
			break;
		case 'tw':
			$icon = 'icon-twitter' ; 
			break;
		case 'li':
			$icon = 'icon-linkedin-square' ; 
			break;
		case 're':
			$icon = 'icon-reddit' ; 
			break;
		case 'vk':
			$icon = 'icon-vk' ; 
			break;
		case 'em':
			$icon = 'icon-envelope-o' ; 
			break;
		default:
			break;
	}
	return $icon ;
}

function ami_sss_icon_i($type)
{
	return '<i class="'.ami_sss_icon($type).'"></i>';
}

function ami_sss_icon_span($type)
{
	return '<span class="'.ami_sss_icon($type).'"></span>';
}

function ami_sss_class_for_type($class , $social_type)
{
	return $class . '-' . $social_type ;
}

function ami_sss_get_separator( $type )
{
	$all_array = array(
			'gp' => qa_opt(qa_sss_opt::GP_BUTTON ),
			'fb' => qa_opt(qa_sss_opt::FB_BUTTON ),
			'tw' => qa_opt(qa_sss_opt::TW_BUTTON ),
			'li' => qa_opt(qa_sss_opt::LI_BUTTON ),
			're' => qa_opt(qa_sss_opt::RE_BUTTON ),
			'vk' => qa_opt(qa_sss_opt::VK_BUTTON ),
			'em' => qa_opt(qa_sss_opt::EM_BUTTON ),
		);

	$how_many = ami_sss_how_many($all_array) ;
	if (ami_sss_is_first($all_array , $type , $how_many)) {
			return "";
	}
	
	if (ami_sss_is_last($all_array , $type , $how_many)) {
		return qa_lang('sss_lang/or');
	}

	return ",";

}

function ami_sss_is_last( $all_array , $type , $how_many )
{
	if ($how_many <= 1) {
		return true ;
	}
	$last  = false ;
	$found = false ;

	foreach ($all_array as $key => $value) {
		if ($key == $type && !!$value && !$found ) {
			$last  = true ;
			$found = true ;
		}
		if ($found && $key != $type && !!$value) {
				$last = false ;
		} 
	}
	return $last ;
}

function ami_sss_is_first($all_array , $type , $how_many)
{

	$found = false ;
	$first = false  ;
	$found_index = 0 ;
	if ($how_many == 1) {
		return true ;
	}else {
		foreach ($all_array as $key => $value) {
			if (!!$value) {
				if ($found_index==0 && $key == $type) {
					return true ;
				}
				$found_index++ ;
			}
		}
	}
	return false ;
}

function ami_sss_how_many($all_array)
{
	$num = 0 ;
	foreach ($all_array as $key => $value) {
		if (!!$value) {
			$num++ ;
		}
	}
	return $num ;
}
