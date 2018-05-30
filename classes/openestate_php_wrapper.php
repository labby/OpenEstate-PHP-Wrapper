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

class openestate_php_wrapper extends LEPTON_abstract
{
	public $database = 0;
	public $page_link = 0;
	public $settings = array();
	public $addon_color = 'olive';
	public $action_url = LEPTON_URL.'/modules/openestate_php_wrapper/';	
	public $view_url = LEPTON_URL.PAGES_DIRECTORY;
	public $support_link = "<a href=\"https://cms-lab.com/live-support/livehelp.php?department=2\" onclick=\"window.open(this.href,'','resizable=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,fullscreen=no,dependent=no,width=650,height=450,status'); return false\">Live-Support / FAQ</a>";	
	public $readme_link = "<a href=\"https://cms-lab.com/_documentation/openestate_php_wrapper/readme.php\" target=\"_blank\">Readme</a>";	
	
	public static $instance;

	public function initialize() 
	{
		$this->database = LEPTON_database::getInstance();
		$this->init_page();
	}
	
	public function init_page( $iPageID = 0, $iSectionID = 0 )
	{
		$this->page_link = $this->database->get_one("SELECT link FROM ".TABLE_PREFIX."pages WHERE page_id=". $iPageID."");
		
		//get settings
		$this->settings = array();
		$this->database->execute_query(
			"SELECT * FROM ".TABLE_PREFIX."mod_openestate_php_wrapper WHERE section_id=". $iSectionID."  " ,
			true,
			$this->settings,
			false
		);			
		
	}

} // end of class
?>