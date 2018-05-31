<?php

/**
 * @module          OpenEstate PHP-Wrapper
 * @author          Andreas Rudolph, Walter Wagner, cms-lab
 * @copyright       2010-2018 Andreas Rudolph, Walter Wagner, cms-lab
 * @link            http://www.cms-lab.com
 * @license         GNU General Public License version 3
 * @license_terms   see info.php of addon
 *
 */
 
// include class.secure.php to protect this file and the whole CMS!
if (defined('LEPTON_PATH')) {   
   include(LEPTON_PATH.'/framework/class.secure.php');
} else {
   $oneback = "../";
   $root = $oneback;
   $level = 1;
   while (($level < 10) && (!file_exists($root.'/framework/class.secure.php'))) {
      $root .= $oneback;
      $level += 1;
   }
   if (file_exists($root.'/framework/class.secure.php')) {
      include($root.'/framework/class.secure.php');
   } else {
      trigger_error(sprintf("[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER['SCRIPT_NAME']), E_USER_ERROR);
   }
}
// end include class.secure.php


//get instance of own module class
$oOPW = openestate_php_wrapper::getInstance();
$oOPW->init_page( $page_id, $section_id );
$page_created = $oOPW->page_link;
$settings =  $oOPW->settings;

if(isset ($_POST['job']) && ($_POST['job']== 'show_info') ) {
	
	$support_link = "<a href=\"#\">NO Live-Support / FAQ</a>";
	
	// Additional marker settings
	$form_values = array(
		'oOPW'			=> $oOPW,
		'section_id'	=> $section_id,
		'page_id'		=> $page_id,
		'SUPPORT'		=> $support_link,
		'image_url'		=> 'https://cms-lab.com/_documentation/media/openestate/openestate.png',	
		'leptoken'		=> get_leptoken()
	);

	/**	
	 *	get the template-engine.
	 */
	$oTwig = lib_twig_box::getInstance();
	$oTwig->registerModule('openestate_php_wrapper');
		
	echo $oTwig->render( 
		"@openestate_php_wrapper/info.lte",	//	template-filename
		$form_values				//	template-data
	);	
} else {
	
	load_default_immotool_settings($settings);

	// init script environment
	$environmentErrors = array();
	$environmentFiles = array('config.php', 'private.php', 'include/functions.php', 'data/language.php');
	if (!is_dir($settings['immotool_base_path'])) {
	  $environmentErrors[] = $oOPW->language['error_no_export_path'];
	}
	else {
	  define('IMMOTOOL_BASE_PATH', $settings['immotool_base_path']);
	  foreach ($environmentFiles as $file) {
		if (!is_file(IMMOTOOL_BASE_PATH . $file)) {
		  $environmentErrors[] = str_replace('%s', $file, $oOPW->language['error_no_export_file_found']);
		}
	  }
	  if (count($environmentErrors) == 0) {
		define('IN_WEBSITE', 1);
		foreach ($environmentFiles as $file) {
		  include(IMMOTOOL_BASE_PATH . $file);
		}
		if (!defined('IMMOTOOL_SCRIPT_VERSION')) {
		  $environmentErrors[] = $oOPW->language['error_no_export_version_found'];
		}
	  }
	}
	$environmentIsValid = count($environmentErrors) == 0;	
//die(LEPTON_tools::display($environmentErrors,'pre','ui message'));	
	// Additional marker settings
	$form_values = array(
		'oOPW'			=> $oOPW,
		'section_id'	=> $section_id,
		'page_id'		=> $page_id,
		'valid'			=> $environmentIsValid,
		'errors'		=> $environmentErrors,
		'immotool_version' => IMMOTOOL_SCRIPT_VERSION,
		'readme'		=> 'https://cms-lab.com/_documentation/openestate-php-wrapper/readme.php',			
		'leptoken'		=> get_leptoken()
	);

	/**	
	 *	get the template-engine.
	 */
	$oTwig = lib_twig_box::getInstance();
	$oTwig->registerModule('openestate_php_wrapper');
		
	echo $oTwig->render( 
		"@openestate_php_wrapper/modify.lte",	//	template-filename
		$form_values				//	template-data
	);		
	
}





