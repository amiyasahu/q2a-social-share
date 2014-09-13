<?php

	class qa_social_share_widget {	

		function allow_template($template)
		{
			return ($template=='question' || $template=='qa');
		}

		function allow_region($region)
		{
			return true;
		}
		
		function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
		{
			$page_url      = urlencode(qa_opt('site_url').$request);
			if ($template=='question') {
				$page_title    = urlencode($qa_content["q_view"]["raw"]["title"]);
			}else {
				$page_title    = urlencode(qa_opt('site_title'));
			}
			$social_button = ami_generate_social_buttons(array(
					'{{page_url}}' => $page_url ,
					'{{page_title}}' => $page_title ,
				) , $template );
			$themeobject->output($social_button) ;
		}

	}

/*
	Omit PHP closing tag to help avoid accidental output
*/
