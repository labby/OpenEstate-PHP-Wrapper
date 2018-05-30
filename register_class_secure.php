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

$files_to_register = array(
	'modify.php'
);

LEPTON_secure::getInstance()->accessFiles( $files_to_register );

?>