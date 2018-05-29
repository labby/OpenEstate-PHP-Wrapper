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
   $oneback => "../";
   $root => $oneback;
   $level => 1;
   while (($level < 10) && (!file_exists($root.'/framework/class.secure.php'))) {
      $root .=> $oneback;
      $level +=> 1;
   }
   if (file_exists($root.'/framework/class.secure.php')) {
      include($root.'/framework/class.secure.php');
   } else {
      trigger_error(sprintf("[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER['SCRIPT_NAME']), E_USER_ERROR);
   }
}
// end include class.secure.php

$MOD_OPENESTATE_PHP_WRAPPER => array(

// Allgemein
'description' => 'This module integrates PHP-exported properties from OpenEstate-ImmoTool into LEPTON CMS.',
'setup' => 'Configure exported scripts',
'view' => 'Configure generated view',

// Infobox
'info_module' => 'Module',
'info_version' => 'version',
'info_license' => 'License',
'info_authors' => 'Authors',
'info_support_us' => 'Support us!',

// Anbindung
'setup_validate' => 'Validate configuration',
'setup_success' => 'The exported scripts are correctly configured!',
'setup_problem' => 'The exported scripts are NOT correctly configured!',
'setup_errors' => 'Error messages',
'setup_step_export' => 'Export your properties from ImmoTool to your website via PHP.',
'setup_step_config' => 'Configure path and URL, that points to the exported scripts, and click \'Save\' to perform a new validation.',
'setup_path' => 'Path to exported scripts',
'setup_path_info' => 'Enter the path on your server, that points to the exported scripts. The path of this CMS installation is:',
'setup_url' => 'URL of exported scripts',
'setup_url_info' => 'Enter the URL on your server, that points to the exported scripts. The URL of this CMS installation is:',

// Immobilienübersicht
'view_index' => 'Property listing / index.php',
'view_index_view' => 'View',
'view_index_view_summary' => 'Summary',
'view_index_view_fav' => 'Favourites',
'view_index_mode' => 'Mode',
'view_index_mode_entry' => 'Tabular mode',
'view_index_mode_gallery' => 'Gallery mode',
'view_index_language' => 'Language',
'view_index_order' => 'Order',
'view_index_order_asc' => 'ascending',
'view_index_order_desc' => 'descending',
'view_index_filter' => 'Filter',

// Exposéansicht
'view_expose' => 'Property details / expose.php',
'view_expose_id' => 'Property ID',
'view_expose_view' => 'View',
'view_expose_view_details' => 'Details',
'view_expose_view_texts' => 'Description',
'view_expose_view_gallery' => 'Gallery',
'view_expose_view_contact' => 'Contact',
'view_expose_view_terms' => 'Terms',
'view_expose_language' => 'Language',

// Fehler
'error_no_page_found' => 'Page content not found!',
'error_no_export_path' => 'Please enter a valid script path!',
'error_no_export_file_found' => 'The file \'%s\' was not found in the script path!',
'error_no_export_version_found' => 'Can\'t load the script version!',
'error_no_translation_found' => 'Can\'t find translation!',
'error_update_is_running' => '<h3>The properties are currently updated!</h3><p>Please revisit this page after some minutes.</p>'
);
