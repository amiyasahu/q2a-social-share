<?php

/*
	Plugin Name: Simple Social Sharing v2.0
	Plugin URI: http://www.question2answer.org/qa/31585
	Plugin Description: Adds Simple Clickable Social Sharing Buttons Below Questions
	Plugin Version: 1.3
	Plugin Date: 2014-02-01
	Plugin Author: Digitizor Media + Amiya Sahu 
	Plugin Author URI: http://amiyasahu.com
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Update Check URI: 
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

define('SOCIAL_SHARE_PLUGIN_DIR', dirname(__FILE__));
define('SOCIAL_SHARE_PLUGIN_DIR_NAME', basename(dirname(__FILE__)));


require_once SOCIAL_SHARE_PLUGIN_DIR . '/qa-simple-social-sharing-utils.php' ;
require_once SOCIAL_SHARE_PLUGIN_DIR.'/qa-simple-social-sharing-options.php';

qa_register_plugin_layer('qa-simple-social-sharing-layer.php', 'Simple Social Sharing Layer');
qa_register_plugin_module('module', 'qa-simple-social-sharing-admin.php', 'qa_simple_social_sharing_admin', 'Simple Social Sharing Admin');
qa_register_plugin_module('widget', 'qa-simple-social-sharing-widget.php', 'qa_simple_social_sharing_widget', 'Simple Social Sharing Widget');
// qa_register_plugin_module('module', 'qa-simple-social-sharing-options.php', 'qa_sss_opt', 'Simple Social Sharing Widget options ');
qa_register_plugin_phrases('qa-simple-social-sharing-lang-*.php', 'sss_lang');

/*
	Omit PHP closing tag to help avoid accidental output
*/
