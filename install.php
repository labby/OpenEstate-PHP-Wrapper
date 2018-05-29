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

$table_fields="
	`section_id` INT NOT NULL DEFAULT 0,
	`page_id` INT NOT NULL DEFAULT 0,
	`wrapper_settings` TEXT,	
	 PRIMARY KEY ( `section_id` )
	";
LEPTON_handle::install_table("mod_openestate_php_wrapper", $table_fields);

// Insert info into the search table
// Module query info
$field_info = array();
$field_info['page_id'] = 'page_id';
$field_info['title'] = 'page_title';
$field_info['link'] = 'link';
$field_info['description'] = 'description';
$field_info['modified_when'] = 'modified_when';
$field_info['modified_by'] = 'modified_by';
$field_info = serialize($field_info);

// Query start
$query_start_code = "SELECT [TP]pages.page_id, [TP]pages.page_title,	[TP]pages.link, [TP]pages.description, [TP]pages.modified_when, [TP]pages.modified_by	FROM [TP]mod_openestate_php_wrapper, [TP]pages WHERE ";

// Query body
$query_body_code =  " [TP]pages.page_id = [TP]mod_openestate_php_wrapper.page_id AND [TP]mod_openestate_php_wrapper.simple_output [O] \'[W][STRING][W]\' AND [TP]pages.searching = \'1\'";
	
$field_values="
	(NULL,'module', 'openestate_php_wrapper', '".$field_info."'),	
	(NULL,'query_start', '".$query_start_code."', 'openestate_php_wrapper'),
	(NULL,'query_body', '".$query_body_code."', 'openestate_php_wrapper'),
	(NULL,'query_end', '', 'openestate_php_wrapper')
";
LEPTON_handle::insert_values('search', $field_values);
?>


