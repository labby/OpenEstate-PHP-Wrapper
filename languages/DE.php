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
'description' => 'Dieses Modul integriert PHP-Immobilienexporte aus dem OpenEstate-ImmoTool in LEPTON CMS.',
'setup' => 'Anbindung der ImmoTool-Skripte',
'view' => 'Darstellung auf der Webseite',

// Infobox
'info_module' => 'Modul',
'info_version' => 'version',
'info_license' => 'Lizenz',
'info_authors' => 'Autoren',
'info_support_us' => 'Unterstützung',

// Anbindung
'setup_validate' => 'Prüfung der Anbindung',
'setup_success' => 'Die ImmoTool-Skripte sind korrekt eingebunden!',
'setup_problem' => 'Die ImmoTool-Skripte sind NICHT korrekt eingebunden!',
'setup_errors' => 'Fehlermeldungen',
'setup_step_export' => 'Führen Sie einen PHP-Export via ImmoTool auf diesen Webspace durch.',
'setup_step_config' => 'Tragen Sie den Pfad und URL des Exportes ein und klicken Sie zur erneuten Prüfung auf \'Speichern\'.',
'setup_path' => 'Pfad zum ImmoTool-Export',
'setup_path_info' => 'Tragen Sie hier den Pfad des Servers ein, wo die vom ImmoTool erzeugten Skripte abgelegt wurden. Der Serverpfad dieser CMS-Installation lautet:',
'setup_url' => 'URL zum ImmoTool-Export',
'setup_url_info' => 'Tragen Sie hier die Webadresse ein, über welche der ImmoTool-Export aus dem Internet erreichbar ist. Die Webadresse dieser CMS-Installation lautet:',

// Immobilienübersicht
'view_index' => 'Immobilienübersicht / index.php',
'view_index_view' => 'Ansicht',
'view_index_view_summary' => 'Immobilienübersicht',
'view_index_view_fav' => 'Vormerkliste',
'view_index_mode' => 'Darstellung',
'view_index_mode_entry' => 'als Liste',
'view_index_mode_gallery' => 'als Galerie',
'view_index_language' => 'Sprache',
'view_index_order' => 'Sortierung',
'view_index_order_asc' => 'aufsteigend',
'view_index_order_desc' => 'absteigend',
'view_index_filter' => 'Filterkriterium',

// Exposéansicht
'view_expose' => 'Exposéansicht / expose.php',
'view_expose_id' => 'ID der Immobilie',
'view_expose_view' => 'Ansicht',
'view_expose_view_details' => 'Details',
'view_expose_view_texts' => 'Beschreibung',
'view_expose_view_gallery' => 'Galerie',
'view_expose_view_contact' => 'Kontakt',
'view_expose_view_terms' => 'AGB',
'view_expose_language' => 'Sprache',

// Fehler
'error_no_page_found' => 'Kein darstellbarer Seiteninhalt gefunden!',
'error_no_export_path' => 'Bitte tragen Sie einen gültigen Export-Pfad ein!',
'error_no_export_file_found' => 'Die Datei \'%s\' befindet sich nicht im Export-Pfad!',
'error_no_export_version_found' => 'Die Skript-Version konnte nicht ermittelt werden!',
'error_no_translation_found' => 'Übersetzung kann nicht ermittelt werden!',
'error_update_is_running' => '<h3>Der Immobilienbestand wird momentan aktualisiert!</h3><p>Bitte besuchen Sie diese Seite in wenigen Minuten erneut.</p>'
);
