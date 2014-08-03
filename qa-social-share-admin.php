<?php

	class qa_social_share_admin {

		function allow_template($template)
		{
			return ($template!='admin');
		}

		function option_default($option)
		{
			switch ($option) {
				case qa_sss_opt::SHARE_TEXT:
					return ;
					break;			
				case qa_sss_opt::FB_BUTTON:
				case qa_sss_opt::GP_BUTTON:
				case qa_sss_opt::TW_BUTTON:
				case qa_sss_opt::BUTTON_STATUS:
					return true;
					break;									
				case qa_sss_opt::LI_BUTTON:		
				case qa_sss_opt::RE_BUTTON:	
				case qa_sss_opt::VK_BUTTON:	
				case qa_sss_opt::EM_BUTTON:
					return false;
					break;						
			}
		}

		function admin_form()
		{
			//require_once QA_INCLUDE_DIR.'qa-util-sort.php';
			
			$saved=false;
			
			if (qa_clicked(qa_sss_opt::ADMIN_SAVE_BTN)) {

				$trimchars="=;\"\' \t\r\n"; // prevent common errors by copying and pasting from Javascript
				qa_opt(qa_sss_opt::SHARE_TEXT, trim(qa_post_text(qa_sss_opt::SHARE_TEXT), $trimchars));
				qa_opt(qa_sss_opt::FB_BUTTON,     (bool)qa_post_text(qa_sss_opt::FB_BUTTON));
				qa_opt(qa_sss_opt::GP_BUTTON,     (bool)qa_post_text(qa_sss_opt::GP_BUTTON));			
				qa_opt(qa_sss_opt::TW_BUTTON,     (bool)qa_post_text(qa_sss_opt::TW_BUTTON));
				qa_opt(qa_sss_opt::LI_BUTTON,     (bool)qa_post_text(qa_sss_opt::LI_BUTTON));
				qa_opt(qa_sss_opt::RE_BUTTON,     (bool)qa_post_text(qa_sss_opt::RE_BUTTON));
				qa_opt(qa_sss_opt::VK_BUTTON,     (bool)qa_post_text(qa_sss_opt::VK_BUTTON));
				qa_opt(qa_sss_opt::EM_BUTTON,     (bool)qa_post_text(qa_sss_opt::EM_BUTTON));
				qa_opt(qa_sss_opt::BUTTON_STATUS, (bool)qa_post_text(qa_sss_opt::BUTTON_STATUS));

				qa_opt(qa_sss_opt::SHARE_TYPE_OPTION, qa_post_text(qa_sss_opt::SHARE_TYPE_OPTION));
				qa_opt(qa_sss_opt::CUSTOM_CSS, qa_post_text(qa_sss_opt::CUSTOM_CSS));
																
				$saved=true;
			}
			
			$social_share_types = array(
					qa_sss_opt::SHARE_TYPE_IMAGE                  => qa_sss_opt::SHARE_TYPE_IMAGE ,
					qa_sss_opt::SHARE_TYPE_TEXT                   => qa_sss_opt::SHARE_TYPE_TEXT,
					qa_sss_opt::SHARE_TYPE_COLORED_BTNS           => qa_sss_opt::SHARE_TYPE_COLORED_BTNS,
					qa_sss_opt::SHARE_TYPE_COLORED_BTNS_WITH_ICON => qa_sss_opt::SHARE_TYPE_COLORED_BTNS_WITH_ICON,
					qa_sss_opt::SHARE_TYPE_FI_SQ                  => qa_sss_opt::SHARE_TYPE_FI_SQ ,
					qa_sss_opt::SHARE_TYPE_FI_SEMI_ROUNDED        => qa_sss_opt::SHARE_TYPE_FI_SEMI_ROUNDED ,
					qa_sss_opt::SHARE_TYPE_FI_ROUNDED             => qa_sss_opt::SHARE_TYPE_FI_ROUNDED ,
					qa_sss_opt::SHARE_TYPE_ANIMATED_FI            => qa_sss_opt::SHARE_TYPE_ANIMATED_FI ,
				) ;

			$form=array(
				'ok' => $saved ? qa_lang('sss_lang/sss_settings_saved') : null,

				'fields' => array(
					qa_sss_opt::SHARE_TEXT => array(
								'id'    => qa_sss_opt::SHARE_TEXT,
								'label' => qa_lang('sss_lang/enter_share_text'),
								'value' => qa_html(qa_opt(qa_sss_opt::SHARE_TEXT)),
								'tags'  => 'name="'.qa_sss_opt::SHARE_TEXT.'"',
								'note'  => qa_lang('sss_lang/choose_buttons_from_below'),
							),					
					qa_sss_opt::FB_BUTTON => array(
								'id'    => qa_sss_opt::FB_BUTTON,					
								'label' => qa_lang('sss_lang/fb'),
								'type'  => 'checkbox',
								'value' => (int)qa_opt(qa_sss_opt::FB_BUTTON),
								'tags'  => 'name="'.qa_sss_opt::FB_BUTTON.'"',
							),
					qa_sss_opt::GP_BUTTON => array(
								'id'    => qa_sss_opt::GP_BUTTON,					
								'label' => qa_lang('sss_lang/gp'),
								'type'  => 'checkbox',
								'value' => (int)qa_opt(qa_sss_opt::GP_BUTTON),
								'tags'  => 'name="'.qa_sss_opt::GP_BUTTON.'"',
					),
					qa_sss_opt::TW_BUTTON => array(
								'id'    => qa_sss_opt::TW_BUTTON,					
								'label' =>  qa_lang('sss_lang/tw'),
								'type'  => 'checkbox',
								'value' => (int)qa_opt(qa_sss_opt::TW_BUTTON),
								'tags'  => 'name="'.qa_sss_opt::TW_BUTTON.'"',
					),
					qa_sss_opt::LI_BUTTON => array(
								'id'    => qa_sss_opt::LI_BUTTON,					
								'label' => qa_lang('sss_lang/li'),
								'type'  => 'checkbox',
								'value' => (int)qa_opt(qa_sss_opt::LI_BUTTON),
								'tags'  => 'name="'.qa_sss_opt::LI_BUTTON.'"',
					),
					qa_sss_opt::RE_BUTTON => array(
								'id'    => qa_sss_opt::RE_BUTTON,					
								'label' => qa_lang('sss_lang/reddit'),
								'type'  => 'checkbox',
								'value' => (int)qa_opt(qa_sss_opt::RE_BUTTON),
								'tags'  => 'name="'.qa_sss_opt::RE_BUTTON.'"',
					),
					qa_sss_opt::VK_BUTTON => array(
								'id'    => qa_sss_opt::VK_BUTTON,					
								'label' => qa_lang('sss_lang/vk'),
								'type'  => 'checkbox',
								'value' => (int)qa_opt(qa_sss_opt::VK_BUTTON),
								'tags'  => 'name="'.qa_sss_opt::VK_BUTTON.'"',
					),

					qa_sss_opt::EM_BUTTON => array(
								'id'    => qa_sss_opt::EM_BUTTON,					
								'label' => qa_lang('sss_lang/email'),
								'type'  => 'checkbox',
								'value' => (int)qa_opt(qa_sss_opt::EM_BUTTON),
								'tags'  => 'name="'.qa_sss_opt::EM_BUTTON.'"',
								'note'  => qa_lang('sss_lang/sharing_btn_enable_note'),
					),		
					qa_sss_opt::BUTTON_STATUS => array(
								'id'    => qa_sss_opt::BUTTON_STATUS,					
								'label' => (int)qa_opt(qa_sss_opt::BUTTON_STATUS)? qa_lang('sss_lang/currently_enabled'):qa_lang('sss_lang/currently_disabled'),
								'type'  => 'checkbox',
								'value' => (int)qa_opt(qa_sss_opt::BUTTON_STATUS),
								'tags'  => 'name="'.qa_sss_opt::BUTTON_STATUS.'"',
					),	
					qa_sss_opt::SHARE_TYPE_OPTION => array(
								'id'      => qa_sss_opt::SHARE_TYPE_OPTION,					
								'label'   => qa_lang('sss_lang/choose_share_type') ,
								'type'    => 'select',
								'value'   => qa_opt(qa_sss_opt::SHARE_TYPE_OPTION),
								'tags'    => 'name="'.qa_sss_opt::SHARE_TYPE_OPTION.'"',
								'options' => $social_share_types,
					),	
					qa_sss_opt::CUSTOM_CSS => array(
								'id'    => qa_sss_opt::CUSTOM_CSS,					
								'label' => qa_lang('sss_lang/custom_css') ,
								'type'  => 'textarea',
								'rows'  => 6 ,
								'value' => qa_opt(qa_sss_opt::CUSTOM_CSS),
								'tags'  => 'name="'.qa_sss_opt::CUSTOM_CSS.'"',
					),	

				),

				'buttons' => array(
					array(
						'label' => qa_lang('sss_lang/save_changes'),
						'tags'  => 'name="'.qa_sss_opt::ADMIN_SAVE_BTN.'"',
					),
				),
			);

			return $form;
		}

	}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/