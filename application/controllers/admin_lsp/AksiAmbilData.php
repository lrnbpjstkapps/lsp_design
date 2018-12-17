<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Get Data from Database
	class AksiAmbilData extends CI_Controller {
		
		//GET ONE DATA
		//Get one data from USER table
		public function satuData_user($uuid){
			//Get data from USER table 
			$kondisi		= array('UUID_USER' => $uuid);
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
		
		//Get one data from SKEMA table
		public function satuData_ss($uuid){
			//Get data from SKEMA table
			$kondisi		= array('UUID_SKEMA' => $uuid);
			$data_skema		= $this->tabel_ss->ambil_satu_data($kondisi);
			
			echo json_encode($data_skema);
		}
		
		//Get one data from UK table
		public function satuData_uk($uuid){
			//Get data from UK table 
			$kondisi		= array('UUID_UK' => $uuid);
			$data_uk		= $this->tabel_uk->ambil_data($kondisi);
			
			//Initialitation of array data
			$data			= array();
			$data["data_uk"]= $data_uk->row();
			
			//Get data from SS_UK table
			$data_ss_uk		= $this->tabel_ss_uk->ambil_data($kondisi);
			
			//Set the array of UUID_SKEMA 
			$i				= 0;
			foreach($data_ss_uk->result() as $row){
				$ss_uuid[$i++] = $row->UUID_SKEMA;
			}			
			$data["ss_uuid"] = $ss_uuid;
			
			//Compile arrays
			$data_out		= array_values($data);
			
			echo json_encode($data_out);
		}
		
		//Get one data from EK table
		public function satuData_ek($uuid){
			//Get data from EK table
			$kondisi		= array('UUID_EK' => $uuid);
			$data_ek		= $this->tabel_ek->ambil_satu_data($kondisi);
			
			echo json_encode($data_ek);
		}
		
		//Get one data from KUK table
		public function satuData_kuk($uuid){
			//Get data from KUK table
			$kondisi		= array('UUID_KUK' => $uuid);
			$data_kuk		= $this->tabel_kuk->ambil_satu_data($kondisi);
			
			echo json_encode($data_kuk);
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
		
		//Datatables for SKEMA table
		public function datatabel_ss(){				
			$result				= $this->datatabel_ss->get_datatables();				
			$recordsFiltered	= $this->datatabel_ss->count_filtered();
			$recordsTotal		= $this->datatabel_ss->count_all();

			$data				= $this->datatabel_ss->get_json($result, $recordsTotal, $recordsFiltered);
			
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
		
		//Datatables for UK table
		public function datatabel_uk(){				
			$result				= $this->datatabel_uk->get_datatables();				
			$recordsFiltered	= $this->datatabel_uk->count_filtered();
			$recordsTotal		= $this->datatabel_uk->count_all();

			$data				= $this->datatabel_uk->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($data);
		}
		
		//Datatables for EK table()
		public function datatabel_ek(){
			$result				= $this->datatabel_ek->get_datatables();				
			$recordsFiltered	= $this->datatabel_ek->count_filtered();
			$recordsTotal		= $this->datatabel_ek->count_all();

			$data				= $this->datatabel_ek->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($data);
		}
		
		//Datatables for KUK table()
		public function datatabel_kuk(){
			$result				= $this->datatabel_kuk->get_datatables();				
			$recordsFiltered	= $this->datatabel_kuk->count_filtered();
			$recordsTotal		= $this->datatabel_kuk->count_all();

			$data				= $this->datatabel_kuk->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($data);
		}
		
		//Datatables for 'modal' ROLE table
		public function datatabel_modal_role(){
			$result				= $this->datatabel_modal_role->get_datatables();				
			$recordsFiltered	= $this->datatabel_modal_role->count_filtered();
			$recordsTotal		= $this->datatabel_modal_role->count_all();

			$data				= $this->datatabel_modal_role->get_json($result, $recordsTotal, $recordsFiltered);
			
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
		
		//Datatables for 'modal' SKEMA table
		public function datatabel_modal_ss(){
			$result				= $this->datatabel_modal_ss->get_datatables();				
			$recordsFiltered	= $this->datatabel_modal_ss->count_filtered();
			$recordsTotal		= $this->datatabel_modal_ss->count_all();

			$data				= $this->datatabel_modal_ss->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($data);
		}
		
		//Datatables for 'modal' UNIT_KOMPETENSI table (Form 'Urutan Unit Kompetensi')
		public function datatabel_form_ss_uk(){				
			$result				= $this->datatabel_form_ss_uk->get_datatables();				
			$recordsFiltered	= $this->datatabel_form_ss_uk->count_filtered();
			$recordsTotal		= $this->datatabel_form_ss_uk->count_all();

			$data				= $this->datatabel_form_ss_uk->get_json($result, $recordsTotal, $recordsFiltered);
			
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
		
		//Get list of ss		
		public function multipleSelect_ss(){
			//Condition 
			$kondisi	= array('IS_ACTIVE' => '1');
			
			//Get data from database
			$data 		= $this->tabel_ss->ambil_data($kondisi);
			
			//Set multipleSelect ss
			foreach($data->result() as $row){
				echo "<option value='".$row->UUID_SKEMA."'> ".$row->NAMA_SKEMA."</option>";
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
		
		//Check input of NOMOR_SKEMA
		public function is_ss_nomor_valid(){
			//condition
			$kondisi	= array('NOMOR_SKEMA' => $this->input->post('ss_nomor'),
							'UUID_SKEMA !=' => $this->input->post('ss_uuid'));
			echo $this->tabel_ss->ambil_data($kondisi)->num_rows() == 0 ? "true" : "false";
		}
		
		//Check input of KODE_UK
		public function is_uk_kode_valid(){
			//condition
			$kondisi	= array('KODE_UK' => $this->input->post('uk_kode'),
							'UUID_UK !=' => $this->input->post('uk_uuid'));
			echo $this->tabel_uk->ambil_data($kondisi)->num_rows() == 0 ? "true" : "false";
		}
		
		//Check input of NOMOR_EK
		public function is_ek_nomor_valid(){
			//condition
			$kondisi	= array('NOMOR_EK' => $this->input->post('ek_nomor'),
							'UUID_EK !=' => $this->input->post('ek_uuid'));
			echo $this->tabel_ek->ambil_data($kondisi)->num_rows() == 0 ? "true" : "false";
		}
		
		//Check input of NOMOR_KUK
		public function is_kuk_nomor_valid(){
			//condition
			$kondisi	= array('NOMOR_KUK' => $this->input->post('kuk_nomor'),
							'UUID_KUK !=' => $this->input->post('kuk_uuid'));
			echo $this->tabel_kuk->ambil_data($kondisi)->num_rows() == 0 ? "true" : "false";
		}
		
		//Dropdown Elemen Kompetensi by Unit Kompetensi
		public function dropdown_ek(){
			//Get data from ELEMEN_KOMPETENSI table 
			$kondisi				= array('UUID_UK' => $this->input->post('uk_uuid'));
			$lis_ek					= $this->tabel_ek->ambil_data($kondisi);
			$data["lis_ek"]			= $lis_ek;
			 
			if($lis_ek->num_rows()>0){
			foreach($lis_ek->result() as $row){
				echo "<option value='".$row->UUID_EK."'>  ".$row->NOMOR_EK." - ".$row->NAMA_EK."</option>";
			}
		}
		}
	}
?>