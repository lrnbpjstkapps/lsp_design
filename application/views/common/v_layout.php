<?php
	$data["dummy"] 	= "dummy";
	$this->load->view("common/v_layout_header", $data);	
	$this->load->view($dlayoutMenu, $data);	
	$this->load->view("common/v_layout_title", $data);	
	if($dview!="")
		{
			$this->load->view($dview, $data);
		}
	$this->load->view($dviewEvent, $data);
	$this->load->view("common/v_layout_footer", $data);
?>