<?php
class form_kuk extends CI_Model {		
		
	// Read data input from kuk
	public function baca_inputan(){
		//Input into EK table
		$data["kuk_uuid"]	= (!$this->input->post('kuk_uuid') ? $this->uuid->v4() : $this->input->post('kuk_uuid'));
		$data["ek_uuid"]	= (!$this->input->post('ek_uuid') ? $this->uuid->v4() : $this->input->post('ek_uuid'));
		$data["kuk_nomor"]	= $this->input->post('kuk_nomor');
		$data["kuk_pernyataan"]	= $this->input->post('kuk_pernyataan');
		$data["kuk_pertanyaan"]	= $this->input->post('kuk_pertanyaan');
		$data["kuk_is_active"] = (null != $this->input->post('kuk_is_active') ? '1' : $this->input->post('kuk_is_active'));
		
		return $data;
	}		
}
