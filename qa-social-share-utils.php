<?php

    function get_social_button( $type, $data, $template = null )
    {
        if ( $type == 'vk' && ( $template == 'question' || $template == 'blog' ) ) {
            // if it is a question url for vk.com trim the title from the url as it is not supported
            $url = qa_opt( 'site_url' ) . qa_request();
            $data['{{page_url}}'] = urlencode( substr( $url, 0, strrpos( $url, '/' ) + 1 ) );
        }

    }

    function ami_social_icon( $icon )
    {
        return '<i class="' . $icon . '"></i>';
    }

    if ( !function_exists( 'last_key' ) ) {
        // Returns the key at the end of the array
        function last_key( $array )
        {
            end( $array );

            return key( $array );
        }
    }

    if ( !function_exists( 'first_key' ) ) {
        // Returns the key at the start of the array
        function first_key( $array )
        {
            reset( $array );

            return key( $array );
        }
    }

    if ( !function_exists( 'is_last_key' ) ) {
        function is_last_key( $array, $key )
        {
            return $key == last_key( $array );
        }
    }

    if ( !function_exists( 'first_key' ) ) {
        function first_key( $array, $key )
        {
            return $key == first_key( $array );
        }
    }

    if ( !function_exists( 'dd' ) ) {
        function dd( $data )
        {
            echo '<pre>';
            print_r( $data );
            echo '</pre>';
        }
    }

    /**
     * Returns the language html value as defined in lang file
     *
     * @param      $indentifier
     * @param null $subs
     *
     * @return mixed|string
     */
    function ami_social_share_lang( $indentifier, $subs = null )
    {
        if ( !is_array( $subs ) )
            return empty( $subs ) ? qa_lang_html( 'sss_lang/' . $indentifier ) : qa_lang_html_sub( 'sss_lang/' . $indentifier, $subs );
        else
            return strtr( qa_lang_html( 'sss_lang/' . $indentifier ), $subs );
    }
