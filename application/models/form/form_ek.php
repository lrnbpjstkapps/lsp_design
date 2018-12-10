<?php
class form_ek extends CI_Model {		
		
	// Read data input from ek
	public function baca_inputan()
		{
			//Input into EK table
			$data["ek_uuid"]	= (!$this->input->post('ek_uuid') ? $this->uuid->v4() : $this->input->post('ek_uuid'));
			$data["uk_uuid"]	= (!$this->input->post('uk_uuid') ? $this->uuid->v4() : $this->input->post('uk_uuid'));
			$data["ek_nomor"]	= $this->input->post('ek_nomor');
			$data["ek_nama"]	= $this->input->post('ek_nama');
			$data["ek_is_active"] = (null != $this->input->post('ek_is_active') ? '1' : $this->input->post('ek_is_active'));
			
			return $data;
		}		
}
