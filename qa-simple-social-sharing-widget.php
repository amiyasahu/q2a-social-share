<?php

	class qa_simple_social_sharing_widget {	

		function allow_template($template)
		{
			return ($template=='question');
		}

		function allow_region($region)
		{
			return true;
		}
		
		function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
		{
			$page_url      = urlencode(qa_opt('site_url').$request);
			$page_title    = urlencode($qa_content["q_view"]["raw"]["title"]);
			$social_button = ami_generate_social_buttons(array(
					'{{page_url}}' => $page_url ,
					'{{page_title}}' => $page_title ,
				));
			$themeobject->output($social_button) ;
		}

	}

/*
	Omit PHP closing tag to help avoid accidental output
*/
