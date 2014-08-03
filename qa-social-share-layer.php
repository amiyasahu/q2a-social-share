<?php

class qa_html_theme_layer extends qa_html_theme_base
{

	function head_css() 
	{
		qa_html_theme_base::head_css();			
		$this->output('<link rel="stylesheet" href="'.qa_opt('site_url').'qa-plugin/'.SOCIAL_SHARE_PLUGIN_DIR_NAME.'/qa-simple-social-sharing.css">');
		$this->output('<link rel="stylesheet" href="'.qa_opt('site_url').'qa-plugin/'.SOCIAL_SHARE_PLUGIN_DIR_NAME.'/icons.css">');
		
		$style_open = '<style type="text/css">.qa-sss-buttons {height: 16px; margin-top: 25px;}';
		$style_common = ' .qa-sss-buttons .qa-sss-final .qa-sss-img-fb, .qa-sss-buttons .qa-sss-final .qa-sss-img-tw, .qa-sss-buttons .qa-sss-final .qa-sss-img-gp, .qa-sss-buttons .qa-sss-final .qa-sss-img-li, .qa-sss-buttons .qa-sss-final  .qa-sss-img-re, .qa-sss-buttons .qa-sss-final  .qa-sss-img-em {background-image: url('.qa_opt('site_url').'qa-plugin/'.SOCIAL_SHARE_PLUGIN_DIR_NAME.'/images/ma_share_buttons_full_em.png); background-repeat: no-repeat; overflow: hidden; background-color: transparent; width: 16px; height: 16px; display: inline-block; text-indent: -999em; outline: none;} .qa-sss-buttons .qa-sss-final {float: left;} .qa-sss-widget { margin-top: 0 !important; height: auto !important; } .qa-sss-widfinal a{ margin-right: 3px; } ';
		$style_last = ' .qa-sss-clear {clear: both;} .qa-sss-buttons .qa-sss-text {color: #555; font-size: 13px; float: left; margin-right: 5px;} ';
		$style_close = '</style>' ;
		$style_final = $style_open . $style_common . $style_last . qa_opt(qa_sss_opt::CUSTOM_CSS) . $style_close ;
		$this->output($style_final);
		
	}

	function q_view_buttons($q_view)
	{
		if ((int)qa_opt(qa_sss_opt::BUTTON_STATUS)) {
			$page_url = urlencode(qa_opt('site_url').$this->request);
			$page_title = urlencode($q_view['raw']['title']);
			$social_button = ami_generate_social_buttons(array(
					'{{page_url}}'   => $page_url ,
					'{{page_title}}' => $page_title ,
				));
			$this->output($social_button) ;
		}
		qa_html_theme_base::q_view_buttons($q_view);
	}

}

/*
	Omit PHP closing tag to help avoid accidental output
*/
