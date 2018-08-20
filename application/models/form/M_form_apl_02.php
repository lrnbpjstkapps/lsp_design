<?php
class M_form_apl_02 extends CI_Model {
		
	public function form_add($data, $form_name)
		{			
			$data["saveMethod"]		= "add";
			$data[$form_name[146]] 	= '-';
			$data[$form_name[163]] 	= '';
			$data[$form_name[140]] 	= '';
			$data[$form_name[134]] 	= '';
			$data[$form_name[150]] 	= '';
			$data[$form_name[148]] 	= '';
			$data[$form_name[169]] 	= '';
			$data[$form_name[170]] 	= '';
			$data[$form_name[171]] 	= '';
			$data[$form_name[172]] 	= '';
			$data[$form_name[115]]	= '';
			$data[$form_name[101]] 	= '';
			$data[$form_name[100]] 	= '';
			
			return $data;
		}
			
	public function form_edit($data, $form_name, $result)
		{
			$data["saveMethod"]		= "edit";
			$data[$form_name[146]] 	= $result->UUID_APL02;
			$data[$form_name[140]] 	= $result->UUID_USER;
			$data[$form_name[134]] 	= $result->UUID_APL01;
			$data[$form_name[150]] 	= $result->NO_ASESMEN;
			$data[$form_name[148]] 	= $result->TUK;
			$data[$form_name[169]] 	= $result->REKOM_1;
			$data[$form_name[170]] 	= $result->REKOM_2;
			$data[$form_name[171]] 	= $result->REKOM_3;
			$data[$form_name[172]] 	= $result->CATATAN;
			$data[$form_name[115]]	= $result->NAMA_LENGKAP;
			$data[$form_name[101]] 	= $result->NOMOR_SKEMA;
			$data[$form_name[100]] 	= $result->NAMA_SKEMA;
			
			return $data;
		}		
}
