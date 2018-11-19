<?php
class form_pengelola_user extends CI_Model {		
		
	// Read data input from user 
	public function baca_inputan()
		{
			//Input into USER table
			$data["user_uuid"]		= (!$this->input->post('user_uuid') ? $this->uuid->v4() : $this->input->post('user_uuid'));
			$data["user_full_name"]	= $this->input->post('user_full_name');
			$data["user_login_id"]	= $this->input->post('user_login_id');
			$data["user_phone"]		= $this->input->post('user_phone');
			$data["user_email"]		= $this->input->post('user_email');
			$data["user_is_online"]	= (!$this->input->post('user_is_online') ? "0" : $this->input->post('user_is_online'));
			$data["user_pwd"]		= (!$this->input->post('user_pwd') ? md5('welcome1') : $this->input->post('user_pwd'));
			$data["user_is_active"]	= (!$this->input->post('user_is_active') ? '1' : $this->input->post('user_is_active'));
			
			//Input into USER ROLE table
			$data["role_uuid"]		= $this->input->post('role_uuid');
			$data["user_role_uuid"]	= (!$this->input->post('user_role_uuid') ? $this->uuid->v4() : $this->input->post('user_role_uuid'));
			$data["user_role_is_active"] = (!$this->input->post('user_role_is_active') ? '1' : $this->input->post('user_role_is_active'));
			
			return $data;
		}		
}
