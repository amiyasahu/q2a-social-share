<?php

    class Ami_LinkedInButton extends Ami_SocialButtonBasic
    {

        public function __construct( $params )
        {
            parent::__construct( $params );

            return $this;
        }

        function getName()
        {
            return 'li';
        }

        function getClass()
        {
            return 'li';
        }

        function getIcon()
        {
            return 'icon-linkedin-square';
        }

        function getUrlTemplate()
        {
            return qa_sss_opt::LI_URL_TEMPLATE ;
        }
    }
