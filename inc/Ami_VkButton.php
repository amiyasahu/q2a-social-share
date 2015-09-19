<?php

    class Ami_VkButton extends Ami_SocialButtonBasic
    {

        public function __construct( $params )
        {
            parent::__construct( $params );

            return $this;
        }

        function getName()
        {
            return 'vk';
        }

        function getClass()
        {
            return 'vk';
        }

        function getIcon()
        {
            return 'social-icon-vk';
        }

        function getUrlTemplate()
        {
            return qa_sss_opt::VK_URL_TEMPLATE ;
        }

        function getShareLink( $args )
        {
            $request = qa_request();
            if ( !empty( $request ) ) {
                $args['{{page_url}}'] = urlencode( substr( $args['{{page_url}}'], 0, strrpos( $args['{{page_url}}'], '/' ) + 1 ) );
            }

            return strtr( $this->getUrlTemplate(), $args );
        }

    }
