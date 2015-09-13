<?php

    class qa_html_theme_layer extends qa_html_theme_base
    {

        function head_css()
        {
            qa_html_theme_base::head_css();

            $this->output( '<link rel="stylesheet" href="' . qa_opt( 'site_url' ) . 'qa-plugin/' . SOCIAL_SHARE_PLUGIN_DIR_NAME . '/icons.css">' );
            $this->output( '<link rel="stylesheet" href="' . qa_opt( 'site_url' ) . 'qa-plugin/' . SOCIAL_SHARE_PLUGIN_DIR_NAME . '/scss/social-share.css">' );

            $style_open = '<style type="text/css">';
            $style_close = '</style>';
            $style_final = $style_open . qa_opt( qa_sss_opt::CUSTOM_CSS ) . $style_close;
            $this->output( $style_final );

        }

        function q_view_buttons( $q_view )
        {
            if ( (int) qa_opt( qa_sss_opt::BUTTON_STATUS ) ) {
                $page_url = urlencode( qa_opt( 'site_url' ) . $this->request );
                $page_title = urlencode( $q_view['raw']['title'] );

                $args = array(
                    'title'       => $page_title,
                    'url'         => $page_url,
                    'template'    => $this->template,
                    'themeobject' => $this,
                    'target'      => '_blank',
                    'style'       => qa_opt(qa_sss_opt::SHARE_TYPE_OPTION),
                );

                $social_share = new Ami_SocialShare($args);

                $this->output('<div class="social-wrapper">');
                $social_share->generateShareButtons();
                $this->output('</div>');
            }
            qa_html_theme_base::q_view_buttons( $q_view );
        }

    }

    /*
        Omit PHP closing tag to help avoid accidental output
    */
