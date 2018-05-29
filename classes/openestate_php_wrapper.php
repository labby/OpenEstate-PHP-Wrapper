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
	public $page_title = 0;
	public $action_url = LEPTON_URL.'/modules/openestate_php_wrapper/';	
	public $view_url = LEPTON_URL.PAGES_DIRECTORY;
	public $support_link = "<a href=\"http://cms-lab.com/live-support/livehelp.php?department=2\" onclick=\"window.open(this.href,'','resizable=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,fullscreen=no,dependent=no,width=650,height=450,status'); return false\">Live-Support / FAQ</a>";	
	public $readme_link = "<a href=\"http://cms-lab.com/_documentation/salesform/readme.php\" target=\"_blank\">Readme</a>";	
	
	public static $instance;

	public function initialize() 
	{
		$this->database = LEPTON_database::getInstance();
		$this->init_page();
	}
	
	public function init_page( $iPageID = 0 )
	{
		$this->page_title = $this->database->get_one("SELECT page_title FROM ".TABLE_PREFIX."pages WHERE page_id=". $iPageID."");
	}

} // end of class
?>