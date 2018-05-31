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

$module_directory     = "openestate_php_wrapper";
$module_name          = "OpenEstate PHP-Wrapper";
$module_function      = "page";
$module_version       = "1.0.0";
$module_platform      = "4.x";
$module_author        = "Andreas Rudolph, Walter Wagner, cms-lab";
$module_license       = "<a href='https://cms-lab.com/_documentation/openestate-php-wrapper/license.php' target='-blank'>GNU General Public License version 3</a>";
$module_license_terms = "-";
$module_description   = "This module integrates PHP-exported properties from OpenEstate-ImmoTool into LEPTON cms.";
$module_guid		  = "5ae336d6-441b-403a-bb19-191b551f5feb";


// define name of URL parameters for the wrapped scripts
if (!defined('IMMOTOOL_PARAM_LANG')) {
  define('IMMOTOOL_PARAM_LANG', 'wrapped_lang');
}
if (!defined('IMMOTOOL_PARAM_FAV')) {
  define('IMMOTOOL_PARAM_FAV', 'wrapped_fav');
}
if (!defined('IMMOTOOL_PARAM_INDEX_PAGE')) {
  define('IMMOTOOL_PARAM_INDEX_PAGE', 'wrapped_page');
}
if (!defined('IMMOTOOL_PARAM_INDEX_RESET')) {
  define('IMMOTOOL_PARAM_INDEX_RESET', 'wrapped_reset');
}
if (!defined('IMMOTOOL_PARAM_INDEX_ORDER')) {
  define('IMMOTOOL_PARAM_INDEX_ORDER', 'wrapped_order');
}
if (!defined('IMMOTOOL_PARAM_INDEX_FILTER')) {
  define('IMMOTOOL_PARAM_INDEX_FILTER', 'wrapped_filter');
}
if (!defined('IMMOTOOL_PARAM_INDEX_FILTER_CLEAR')) {
  define('IMMOTOOL_PARAM_INDEX_FILTER_CLEAR', 'wrapped_clearFilters');
}
if (!defined('IMMOTOOL_PARAM_INDEX_VIEW')) {
  define('IMMOTOOL_PARAM_INDEX_VIEW', 'wrapped_view');
}
if (!defined('IMMOTOOL_PARAM_INDEX_MODE')) {
  define('IMMOTOOL_PARAM_INDEX_MODE', 'wrapped_mode');
}
if (!defined('IMMOTOOL_PARAM_EXPOSE_ID')) {
  define('IMMOTOOL_PARAM_EXPOSE_ID', 'wrapped_id');
}
if (!defined('IMMOTOOL_PARAM_EXPOSE_VIEW')) {
  define('IMMOTOOL_PARAM_EXPOSE_VIEW', 'wrapped_view');
}
if (!defined('IMMOTOOL_PARAM_EXPOSE_IMG')) {
  define('IMMOTOOL_PARAM_EXPOSE_IMG', 'wrapped_img');
}
if (!defined('IMMOTOOL_PARAM_EXPOSE_CONTACT')) {
  define('IMMOTOOL_PARAM_EXPOSE_CONTACT', 'wrapped_contact');
}
if (!defined('IMMOTOOL_PARAM_EXPOSE_CAPTCHA')) {
  define('IMMOTOOL_PARAM_EXPOSE_CAPTCHA', 'wrapped_captchacode');
}
if (!defined('OPENESTATE_WRAPPER')) {
  define('OPENESTATE_WRAPPER', '1');
}

if (!function_exists('load_default_immotool_settings')) {

  /**
   * Load default settings for a wrapped page.
   */
  function load_default_immotool_settings(&$settings) {

    if (!isset($settings['immotool_wrap_script']) || !is_string($settings['immotool_wrap_script'])) {
      $settings['immotool_wrap_script'] = 'index';
    }
    if (!isset($settings['immotool_base_path']) || !is_string($settings['immotool_base_path'])) {
      $settings['immotool_base_path'] = LEPTON_PATH . MEDIA_DIRECTORY .'/immotool/';
    }
    if (!isset($settings['immotool_base_url']) || !is_string($settings['immotool_base_url'])) {
      $settings['immotool_base_url'] = LEPTON_URL .  MEDIA_DIRECTORY .'/immotool/';
    }
    if (!isset($settings['immotool_index']) || !is_array($settings['immotool_index'])) {
      $settings['immotool_index'] = array();
    }
    if (!isset($settings['immotool_index']['view']) || !is_string($settings['immotool_index']['view'])) {
      $settings['immotool_index']['view'] = 'index';
    }
    if (!isset($settings['immotool_index']['mode']) || !is_string($settings['immotool_index']['mode'])) {
      $settings['immotool_index']['mode'] = 'entry';
    }
    if (!isset($settings['immotool_index']['order']) || !is_string($settings['immotool_index']['order'])) {
      $settings['immotool_index']['order'] = 'id-asc';
    }
    if (!isset($settings['immotool_index']['filter']) || !is_array($settings['immotool_index']['filter'])) {
      $settings['immotool_index']['filter'] = array();
    }
    if (!isset($settings['immotool_expose']) || !is_array($settings['immotool_expose'])) {
      $settings['immotool_expose'] = array();
    }
  }

}
?>

