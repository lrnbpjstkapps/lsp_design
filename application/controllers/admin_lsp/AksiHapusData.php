<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Delete Data from Database
	class AksiHapusData extends CI_Controller {
		
		//Delete data from USER table && USER_ROLE table
		public function data_user($uuid_user, $uuid_user_role){
			//Condition
			$kondisi_user_role 	= array('UUID_USER_ROLE' => $uuid_user_role);
			$kondisi_user 		= array('UUID_USER' => $uuid_user);
				
			//Return result
			$result_user_role	= $this->tabel_user_role->hapus_data($kondisi_user_role);
			if($result_user_role == '1'){
				echo $this->tabel_user->hapus_data($kondisi_user);
			}else{
				echo $result_user_role;
			}
		}
	}
?>