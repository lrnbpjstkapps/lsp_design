<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'email', 'session');
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = array('database', 'session', 'uuid');

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| These classes are located in system/libraries/ or in your
| application/libraries/ directory, but are also placed inside their
| own subdirectory and they extend the CI_Driver_Library class. They
| offer multiple interchangeable driver options.
|
| Prototype:
|
|	$autoload['drivers'] = array('cache');
|
| You can also supply an alternative property name to be assigned in
| the controller:
|
|	$autoload['drivers'] = array('cache' => 'cch');
|
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array('html', 'form', 'text', 'url', 'directory', 'download', 'string', 'file');

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array(
		"common/m_globalval"		=> "m_globalval",
		
		//BEGIN OF DATATABLES
		//#1
		"datatables/datatabel_user" 						=> "datatabel_user",
		"datatables/datatabel_modal_role"	 				=> "datatabel_modal_role", 
		
		//#2
		"datatables/datatabel_modal_uk" 					=> "datatabel_modal_uk", 
		"datatables/datatabel_form_ss_uk"					=> "datatabel_form_ss_uk",	
		"datatables/datatabel_ss_uk" 						=> "datatabel_ss_uk",
		
		//#3
		"datatables/datatabel_ss"	 						=> "datatabel_ss",
		
		//#4
		"datatables/datatabel_uk"							=> "datatabel_uk",
		"datatables/datatabel_modal_ss"						=> "datatabel_modal_ss",
		
		"datatables/M_list_apl01"	=> "M_list_apl01",
		"datatables/M_list_apl02"	=> "M_list_apl02",		
		"datatables/M_list_mma" 	=> "M_list_mma",
		"datatables/M_list_verif_apl01" 					=> "M_list_verif_apl01", 
		"datatables/M_list_verif_apl02_admlsp" 				=> "M_list_verif_apl02_admlsp", 
		"datatables/M_list_verif_apl02_sso" 				=> "M_list_verif_apl02_sso", 
		//END OF DATATABLES
		
		//BEGIN OF FORM
		//#1
		"form/form_user"									=> "form_user",
		
		//#2
		"form/form_ss"										=> "form_ss",
		
		//#3
		"form/form_uk"										=> "form_uk",
			
		"form/M_form_apl_01"		=> "M_form_apl_01", 
		"form/M_form_apl_02"		=> "M_form_apl_02", 
		"form/M_form_mma"			=> "M_form_mma", 
		"form/M_form_mma_kuk"		=> "M_form_mma_kuk",  
		//END OF FORM
		
		//BEGIN OF TABLE		
		//#1
		"table/tabel_role" 									=> "tabel_role",
		"table/tabel_user" 									=> "tabel_user",
		"table/tabel_user_role"								=> "tabel_user_role",
		
		//#2
		"table/tabel_skema_uk" 								=> "tabel_ss_uk",
		
		//#3
		"table/tabel_skema" 								=> "tabel_ss",
		
		//#4
		"table/tabel_uk"									=> "tabel_uk",
		
		"table/M_administrasi"		=> "M_administrasi",
		"table/M_answer_apl_02"		=> "M_ans_apl02",
		"table/M_apl01_bukti"		=> "M_apl01_bukti",
		"table/M_apl01_uk" 			=> "M_apl01_uk",
		"table/M_bukti" 			=> "M_bukti",
		"table/M_ek" 				=> "M_ek",
		"table/M_fr_apl_01" 		=> "M_apl_01",
		"table/M_fr_apl_02" 		=> "M_apl_02",
		"table/M_fr_mma" 			=> "M_fr_mma",
		"table/M_kuk" 				=> "M_kuk",
		"table/M_mma_kuk" 			=> "M_mma_kuk",
		"table/M_status_administrasi" => "M_sa",
		"table/M_unit_kompetensi" 	=> "M_unit_kompetensi"
		//END OF TABLE
	);
