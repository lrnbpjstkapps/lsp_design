<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Get Data from Database
	class AksiAmbilData extends CI_Controller {
		
		//GET ONE DATA
		//Get one data from USER table
		public function satuData_user($uuid){
			//Condition 
			$kondisi		= array('UUID_USER' => $uuid);
			
			//Get data from USER table
			$data_user		= $this->tabel_user->ambil_data($kondisi);
			
			//Initialitation of array data
			$data			= array();
			$data["data_user"] = $data_user->row();
			
			//Get data from USER ROLE table
			$data_user_role	= $this->tabel_user_role->ambil_data($kondisi);
			
			//Set the array of UUID_ROLE 
			$i				= 0;
			foreach($data_user_role->result() as $row){
				$role_uuid[$i++] = $row->UUID_ROLE;
			}
			
			$data["role_uuid"] = $role_uuid;
			
			//Compile arrays
			$data_out		= array_values($data);
			
			echo json_encode($data_out);
		}
		
		//DATATABLES		
		//Datatables for USER table
		public function datatabel_user(){				
			$result				= $this->datatabel_user->get_datatables();				
			$recordsFiltered	= $this->datatabel_user->count_filtered();
			$recordsTotal		= $this->datatabel_user->count_all();

			$data				= $this->datatabel_user->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($data);
		}
		
		//Datatables for SKEMA_UK table
		public function datatabel_ss_uk(){				
			$result				= $this->datatabel_ss_uk->get_datatables();				
			$recordsFiltered	= $this->datatabel_ss_uk->count_filtered();
			$recordsTotal		= $this->datatabel_ss_uk->count_all();

			$data				= $this->datatabel_ss_uk->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($data);
		}
		
		//Datatables for 'modal' JENIS_AKUN table
		public function datatabel_modal_jenisAkun(){
			$result				= $this->datatabel_modal_jenisAkun->get_datatables();				
			$recordsFiltered	= $this->datatabel_modal_jenisAkun->count_filtered();
			$recordsTotal		= $this->datatabel_modal_jenisAkun->count_all();

			$data				= $this->datatabel_modal_jenisAkun->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($data);
		}
		
		//Datatables for 'modal' UNIT_KOMPETENSI table
		public function datatabel_modal_uk(){				
			$result				= $this->datatabel_modal_uk->get_datatables();				
			$recordsFiltered	= $this->datatabel_modal_uk->count_filtered();
			$recordsTotal		= $this->datatabel_modal_uk->count_all();

			$data				= $this->datatabel_modal_uk->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($data);
		}
		
		//Datatables for 'modal' UNIT_KOMPETENSI table (Form 'Urutan Unit Kompetensi')
		public function datatabel_urutan_ss_uk_form(){				
			$result				= $this->datatabel_urutan_ss_uk_form->get_datatables();				
			$recordsFiltered	= $this->datatabel_urutan_ss_uk_form->count_filtered();
			$recordsTotal		= $this->datatabel_urutan_ss_uk_form->count_all();

			$data				= $this->datatabel_urutan_ss_uk_form->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($data);
		}
			
		//MULTIPLE SELECT 
		//Get list of user role		
		public function multipleSelect_role(){
			//Condition 
			$kondisi	= array('IS_ACTIVE' => '1');
			
			//Get data from database
			$data 		= $this->tabel_role->ambil_data($kondisi);
			
			//Set multipleSelect role
			foreach($data->result() as $row){
				echo "<option value='".$row->UUID_ROLE."'> ".$row->ROLE_NAME."</option>";
			}
		}
		
		//CHECK FORM VALIDATION
		//Check input of LOGIN_ID
		public function is_user_loginId_valid(){
			//condition
			$kondisi	= array('LOGIN_ID' => $this->input->post('user_login_id'),
							'UUID_USER !=' => $this->input->post('user_uuid'));
			echo $this->tabel_user->ambil_data($kondisi)->num_rows() == 0 ? "true" : "false";
		}
		
		//Check input of NO_KTP
		public function is_user_noKTP_valid(){
			//condition
			$kondisi	= array('NO_KTP' => $this->input->post('user_no_ktp'),
							'UUID_USER !=' => $this->input->post('user_uuid'));
			echo $this->tabel_user->ambil_data($kondisi)->num_rows() == 0 ? "true" : "false";
		}
		
		//Check input of PHONE
		public function is_user_phone_valid(){
			//condition
			$kondisi	= array('PHONE' => $this->input->post('user_phone'),
							'UUID_USER !=' => $this->input->post('user_uuid'));
			echo $this->tabel_user->ambil_data($kondisi)->num_rows() == 0 ? "true" : "false";
		}
		
		//Check input of EMAIL
		public function is_user_email_valid(){
			//condition
			$kondisi	= array('EMAIL' => $this->input->post('user_email'),
							'UUID_USER !=' => $this->input->post('user_uuid'));
			echo $this->tabel_user->ambil_data($kondisi)->num_rows() == 0 ? "true" : "false";
		}
	}
?>