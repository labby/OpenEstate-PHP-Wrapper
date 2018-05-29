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
$module_license       = "GNU General Public License version 3";
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
      $settings['immotool_base_path'] = WB_PATH . '/media/immotool/';
    }
    if (!isset($settings['immotool_base_url']) || !is_string($settings['immotool_base_url'])) {
      $settings['immotool_base_url'] = WB_URL . '/media/immotool/';
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

// load translations for the module
$module_i18n = array();
foreach (array(LANGUAGE, DEFAULT_LANGUAGE, 'EN') as $lang) {
  $i18n_file = WB_PATH . '/modules/' . $module_directory . '/lang/' . $lang . '.php';
  if (!is_file($i18n_file)) {
    continue;
  }
  $module_i18n = include( $i18n_file );
  if (is_array($module_i18n)) {
    break;
  }
}
if (!is_array($module_i18n)) {
  echo 'Can\'t load module translation!<hr/>';
}
else {
  $module_description = $module_i18n['description'];
}
?>

