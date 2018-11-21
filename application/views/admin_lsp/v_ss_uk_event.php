<script type = "text/javascript">
	var save_method;
	var tabel;
	var tabel_lihat;
	var url;
	var validator;	
	
	$(document).ready(function(){		
		//Set Tabel
		tabel = $('#id_tabel_ss_uk').DataTable({
			"processing"		: true, 
			"serverSide"		: true,
			"searching"			: true,
			"paging"			: true,
			"iDisplayLength"	: 10,
			"order"				: [], 
			"ajax"				: 
				{
					"url"		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/datatabel_ss_uk",
					"type"		: "POST"
				},
			"columnDefs"		: 
				[
					{ 
						"targets"	: [0, 5], 
						"orderable"	: false
					}
				],
		});
	});
	
	function reloadTabel(){
		//Reload Table
		tabel.ajax.reload(null,false); 
	}
	
	//View modal 'Unit Kompetensi'
	function modal_unit_kompetensi(uuid, param1, param2){			
		tabel_jenis_akun = $('#id_tabel_unit_kompetensi').DataTable({ 		
			"processing"		: true, 
			"serverSide"		: true,
			"searching"			: false,
			"paging"			: false,
			"iDisplayLength"	: 10,
			"order"				: [], 
			"bDestroy"			: true,
			"ajax"				: 
				{
					"url"		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/datatabel_modal_unitKompetensi",
					"type"		: "POST",
					"data"		: {
									skema_uuid: 
										function() {
											return uuid;
										}
								}
				},
			"columnDefs"		: 
				[
					{ 
						"targets"	: [0],
						"orderable"	: false
					}
				],
		});	
		
		$('#id_modal_1_kodeSkema').text(param1);
		$('#id_modal_1_nomorSkema').text(param2);
		$('.modal-title').text('Daftar Unit Kompetensi '+param1);
		$('#id_modal_unit_kompetensi').modal('show');
	}
</script>