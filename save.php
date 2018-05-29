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

// load current page configuration
$settings = array();
$query_content = $database->query("SELECT * FROM " . TABLE_PREFIX . "mod_$module_directory WHERE section_id = '$section_id'");
if ($query_content->numRows() > 0) {
  $fetch_content = $query_content->fetchRow();
  $settings = unserialize($fetch_content['wrapper_settings']);
}

// put changes into configuration of the current page
load_default_immotool_settings($settings);
$settings['immotool_base_path'] = trim($admin->get_post('immotool_base_path'));
$settings['immotool_base_url'] = trim($admin->get_post('immotool_base_url'));
$settings['immotool_wrap_script'] = $admin->get_post('immotool_wrap_script');
$settings['immotool_index'] = $admin->get_post('immotool_index');
$settings['immotool_index']['filter'] = $admin->get_post(IMMOTOOL_PARAM_INDEX_FILTER);
$settings['immotool_expose'] = $admin->get_post('immotool_expose');

// make sure, that the path ends with an /
$len = strlen($settings['immotool_base_path']);
if ($len > 0 && $settings['immotool_base_path'][$len - 1] != '/') {
  $settings['immotool_base_path'] .= '/';
}

// make sure, that the URL ends with an /
$len = strlen($settings['immotool_base_url']);
if ($len > 0 && $settings['immotool_base_url'][$len - 1] != '/') {
  $settings['immotool_base_url'] .= '/';
}

//echo '<pre>' . print_r($settings, true) . '</pre>';

// save modified page configuration
$query = "UPDATE " . TABLE_PREFIX . "mod_$module_directory SET "
    . "wrapper_settings = '" . serialize($settings) . "' "
    . "WHERE section_id = '$section_id'";
$database->query($query);

// check if there is a database error, otherwise say successful
if ($database->is_error()) {
  $admin->print_error($database->get_error(), $js_back);
}
else {
  $admin->print_success($MESSAGE['PAGES']['SAVED'], ADMIN_URL . '/pages/modify.php?page_id=' . $page_id);
}

// print admin footer
$admin->print_footer();
