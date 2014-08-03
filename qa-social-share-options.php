<?php 

class qa_sss_opt {	
	const PREFIX         = 'ami_sss_' ;
	const SHARE_TEXT     = 'ami_sss_text'  ;
	const CUSTOM_CSS     = 'ami_sss_costum_css'  ;
	const ADMIN_SAVE_BTN = 'ami_sss_save_button'  ;
	const FB_BUTTON      = 'ami_sss_btn_fb'  ;
	const GP_BUTTON      = 'ami_sss_btn_gp'  ;
	const TW_BUTTON      = 'ami_sss_btn_tw'  ;
	const LI_BUTTON      = 'ami_sss_btn_li'  ;
	const RE_BUTTON      = 'ami_sss_btn_re'  ;
	const EM_BUTTON      = 'ami_sss_btn_em'  ;
	const VK_BUTTON      = 'ami_sss_btn_vk'  ;
	const BUTTON_STATUS  = 'ami_sss_btn_status'  ;

	const GP_URL_TEMPLATE = 'https://plus.google.com/share?url={{page_url}}" ' ;
	const FB_URL_TEMPLATE = 'https://www.facebook.com/sharer/sharer.php?u={{page_url}}&amp;ref=fbshare&amp;t={{page_title}}" ' ;
	const TW_URL_TEMPLATE = 'https://twitter.com/intent/tweet?original_referer={{page_url}}&amp;text={{page_title}}&amp;url={{page_url}}" ' ;
	const LI_URL_TEMPLATE = 'http://www.linkedin.com/shareArticle?mini=true&amp;url={{page_url}}&amp;title={{page_title}}&amp;summary={{page_title}}" ' ;
	const RE_URL_TEMPLATE = 'http://www.reddit.com/submit?url={{page_url}}&amp;title={{page_title}}" ' ;
	const VK_URL_TEMPLATE = 'http://vkontakte.ru/share.php?url={{page_url}}&amp;title={{page_title}}" ' ;
	const EM_URL_TEMPLATE = 'mailto: ?subject={{page_title}}&amp;body=Check this out: {{page_title}} - {{page_url}}" ' ;

	/*constants for the types of the social buttons */

	const SHARE_TYPE_OPTION                 = 'ami_sss_type_opt' ;
	const SHARE_TYPE_IMAGE                  = 'Default Image Style' ;
	const SHARE_TYPE_TEXT                   = 'Textual Sharing' ;
	const SHARE_TYPE_COLORED_BTNS           = 'Colored Buttons' ;
	const SHARE_TYPE_COLORED_BTNS_WITH_ICON = 'Colored Buttons with Icon' ;
	const SHARE_TYPE_FI_SQ                  = 'Squared Icons' ;
	const SHARE_TYPE_FI_SEMI_ROUNDED        = 'Semi Rounded Icons' ;
	const SHARE_TYPE_FI_ROUNDED             = 'Rounded Icons' ;
	const SHARE_TYPE_ANIMATED_FI            = 'Animated Icons' ;

	/*templates depending which type we are using */
	const SHARE_TYPE_NORMAL_TEMPLATE       = '{{separator}} <a href="{{url}}" target="_blank" rel="external nofollow" class="{{class}}" title="{{title}}">{{text}}</a>' ;
	const SHARE_TYPE_IMAGE_TEMPLATE        = '<a href="{{url}}" target="_blank" rel="external nofollow" class="{{class}}" title="{{title}}"></a>' ;
	const SHARE_TYPE_ICON_TEXT_TEMPLATE    = '<a href="{{url}}" target="_blank" rel="external nofollow" class="{{class}}" title="{{title}}">{{icon}} {{text}}</a>' ;
	const SHARE_TYPE_ICON_ONLY_TEMPLATE    = '<a href="{{url}}" target="_blank" rel="external nofollow" class="{{class}}" title="{{title}}">{{icon}}</a>' ;
	const SHARE_TYPE_COLORED_TEXT_TEMPLATE = '<a href="{{url}}" target="_blank" rel="external nofollow" class="{{class}}" title="{{title}}">{{text}}</a>' ;

	public static function get_url_subs($type , $subs)
	{
		return strtr(self::get_url_template($type) , $subs);
	}

	public static function get_social_btn_sub($type , $subs )
	{
		return strtr(self::get_social_btn_template($type) , $subs);
	}

	public static function get_url_template($type )
	{
		$template = "" ;
		switch ($type) {
			case 'fb':
				$template = self::FB_URL_TEMPLATE ; 
				break;
			case 'gp':
				$template = self::GP_URL_TEMPLATE ; 
				break;
			case 'tw':
				$template = self::TW_URL_TEMPLATE ; 
				break;
			case 'li':
				$template = self::LI_URL_TEMPLATE ; 
				break;
			case 're':
				$template = self::RE_URL_TEMPLATE ; 
				break;
			case 'vk':
				$template = self::VK_URL_TEMPLATE ; 
				break;
			case 'em':
				$template = self::EM_URL_TEMPLATE ; 
				break;
			default:
				break;
		}
		return $template ;
	}

	public static function get_social_btn_template($type)
	{
		$template  = "" ;
		switch ($type) {
			case self::SHARE_TYPE_IMAGE :
				$template = self::SHARE_TYPE_IMAGE_TEMPLATE ;
				break;
			case self::SHARE_TYPE_TEXT :
				$template = self::SHARE_TYPE_NORMAL_TEMPLATE ;
				break;
			case self::SHARE_TYPE_COLORED_BTNS :
				$template = self::SHARE_TYPE_COLORED_TEXT_TEMPLATE ;
				break;
			case self::SHARE_TYPE_FI_SQ :
			case self::SHARE_TYPE_FI_SEMI_ROUNDED :
			case self::SHARE_TYPE_FI_ROUNDED :
			case self::SHARE_TYPE_ANIMATED_FI :
				$template = self::SHARE_TYPE_ICON_ONLY_TEMPLATE ;
				break;
			case self::SHARE_TYPE_COLORED_BTNS_WITH_ICON :
				$template = self::SHARE_TYPE_ICON_TEXT_TEMPLATE ;
				break;
			default:
				
				break;
		}
		return $template;
	}

}

/*
	Omit PHP closing tag to help avoid accidental output
*/
