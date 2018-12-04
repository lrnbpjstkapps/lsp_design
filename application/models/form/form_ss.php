<?php
class form_ss extends CI_Model {		
		
	// Read data input from user 
	public function baca_inputan()
		{
			//Input into USER table
			$data["ss_uuid"]		= (!$this->input->post('ss_uuid') ? $this->uuid->v4() : $this->input->post('ss_uuid'));
			$data["ss_nama"]		= $this->input->post('ss_nama');
			$data["ss_nomor"]		= $this->input->post('ss_nomor');
			$data["ss_is_active"]	= (null != $this->input->post('ss_is_active') ? '1' : $this->input->post('ss_is_active'));			
			
			return $data;
		}		
}
