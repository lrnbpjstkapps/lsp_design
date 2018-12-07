<?php
class form_uk extends CI_Model {		
		
	// Read data input from uk 
	public function baca_inputan()
		{
			//Input into UK table
			$data["uk_uuid"]	= (!$this->input->post('uk_uuid') ? $this->uuid->v4() : $this->input->post('uk_uuid'));
			$data["uk_kode"]	= $this->input->post('uk_kode');
			$data["uk_judul"]	= $this->input->post('uk_judul');
			$data["uk_is_active"] = (null != $this->input->post('uk_is_active') ? '1' : $this->input->post('uk_is_active'));
		
			//Input into SKEMA UK table
			$data["ss_uuid[]"]		= $this->input->post('ss_uuid[]');
			$data["suk_uuid_uk"]	= $data["uk_uuid"];
			$data["suk_urutan"]		= (!$this->input->post('suk_urutan') ? '10' : $this->input->post('suk_urutan'));
			$data["suk_is_active"] 	= (!$this->input->post('suk_is_active') ? '1' : $this->input->post('suk_is_active'));
			
			return $data;
		}		
}
