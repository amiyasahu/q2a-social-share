<?php

    class qa_html_theme_layer extends qa_html_theme_base
    {
        public function head_metas()
        {
            parent::head_metas();

            if ( qa_opt( qa_sss_opt::ENABLE_OPEN_GRAPH_SUPPORT ) ) {
                if ( in_array( $this->template, array( 'question', 'blog' ) ) ) {
                    $content = $this->content['q_view']['raw']['content'];
                    $image_url = ami_social_get_first_image_from_html( $content );
                    $description = @$this->content['description'];
                } else if ( $this->template == 'user' ) {
                    $image_html = $this->content['form_profile']['fields']['avatar']['html'];
                    $image_url = ami_social_get_first_image_from_html( $image_html );
                    $description = $this->content['form_profile']['fields']['about']['value'];
                } else {
                    $description = qa_opt( qa_sss_opt::WEBSITE_DESCRIPTION );

                    if ( empty( $description ) )
                        $description = $this->content['sidebar'];
                }

                if ( empty( $image_url ) ) {
                    $image_url = qa_opt( 'logo_url' );
                }

                $site_lang = qa_opt( 'site_language' );
                $locale = $site_lang ? $site_lang : 'en_US';
                $current_url = qa_opt( 'site_url' ) . qa_request();

                $ogp = new OpenGraphProtocol();
                $ogp->setLocale( $locale );
                $ogp->setSiteName( qa_opt( 'site_title' ) );
                $ogp->setTitle( $this->content['title'] );
                $ogp->setDescription( $description );
                $ogp->setType( 'website' );
                $ogp->setURL( $current_url );
                $ogp->setDeterminer( 'the' );

                if ( !empty( $image_url ) ) {
                    $imageOg = new OpenGraphProtocolImage();
                    $imageOg->setURL( $image_url );
                    $imageOg->setWidth( 1200 );
                    $imageOg->setHeight( 630 );
                    $ogp->addImage( $imageOg );
                }

                $this->output( $ogp->toHTML() );
                $facebook_app_id = qa_opt( qa_sss_opt::FACEBOOK_APP_ID );

                if ( !empty( $facebook_app_id ) ) {
                    $this->output( '<meta property="fb:app_id" content="' . $facebook_app_id . '" />' );
                }

                $twitter_username = trim( qa_opt( qa_sss_opt::TWITTER_HANDLE ) );

                if ( !empty( $twitter_username ) ) {
                    if ( strpos( $twitter_username, '@' ) !== 0 )
                        $twitter_username = '@' . $twitter_username;

                    $this->output( '<meta name="twitter:card" content="summary"/>',
                        '<meta name="twitter:site" content=' . $twitter_username . '/>',
                        '<meta name="twitter:creator" content="' . $twitter_username . '"/>'
                    );
                }

            }
        }

        function head_css()
        {
            parent::head_css();

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
                    'style'       => qa_opt( qa_sss_opt::SHARE_TYPE_OPTION ),
                );

                $social_share = new Ami_SocialShare( $args );

                $this->output( '<div class="social-wrapper">' );
                $social_share->generateShareButtons();
                $this->output( '</div>' );
            }
            parent::q_view_buttons( $q_view );
        }

    }

    /*
        Omit PHP closing tag to help avoid accidental output
    */
