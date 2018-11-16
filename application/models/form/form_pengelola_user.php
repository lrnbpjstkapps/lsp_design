<?php
class form_pengelola_user extends CI_Model {		
		
	// Read data input from user 
	public function baca_inputan()
		{
			$data["usr_uuid"]		= (!$this->input->post('usr_uuid') ? $this->uuid->v4() : $this->input->post('usr_uuid'));
			$data["usr_full_name"]	= $this->input->post('usr_full_name');
			$data["usr_login_id"]	= $this->input->post('usr_login_id');
			$data["usr_phone"]		= $this->input->post('usr_phone');
			$data["usr_email"]		= $this->input->post('usr_email');
			$data["usr_is_online"]	= (!$this->input->post('usr_is_online') ? "0" : $this->input->post('usr_is_online'));
			$data["usr_pwd"]		= (!$this->input->post('usr_pwd') ? md5('welcome1') : $this->input->post('usr_pwd'));
			$data["usr_is_active"]	= (!$this->input->post('usr_is_active') ? '1' : $this->input->post('usr_is_active'));
			
			return $data;
		}		
}
