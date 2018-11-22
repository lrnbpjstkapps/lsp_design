<script type = "text/javascript">
	var save_method;
	var tabel_unit_kompetensi;
	var tabel_urutan_unitKompetensi;
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
		
		//Form validation
		validator = $("#id_form_urutan_unitKompetensi").validate({
			rules: 
				{
					"uuid_suk[]": 
						{
							number	: true
						}
				}, 
			ignore: [],
			submitHandler: function (form)
				{
					$.ajax({
						url			: url,
						type		: 'POST',
						data		: new FormData($("#id_form_urutan_unitKompetensi")[0]),
						cache		: false,
						contentType	: false,
						processData	: false,
						dataType	: "JSON",
						success		: function(data){
							//Close the modal
							$("[data-dismiss=modal]").trigger({ type: "click" });
							
							//Refresh datatables
							reloadTabel();		
							
							//Show the result
							if(data.hasil == "sukses"){	
								alertify.success(data.pesan);
							}else{
								alertify.error(data.pesan);
							}
						}
					});
					return false;
				}
		});
	});
	
	function reloadTabel(){
		//Reload Table
		tabel_jenis_akun.ajax.reload(null,false); 
	}
	
	//View modal 'Unit Kompetensi'
	function modal_unit_kompetensi(uuid, param1, param2){			
		tabel_unit_kompetensi = $('#id_tabel_unit_kompetensi').DataTable({ 		
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
	
	function modal_urutan_unitKompetensi(uuid, param1, param2){			
		/*tabel_urutan_unitKompetensi = $('#id_tabel_urutan_unitKompetensi').DataTable({ 		
			"processing"		: true, 
			"serverSide"		: true,
			"searching"			: false,
			"paging"			: false,
			"iDisplayLength"	: 10,
			"order"				: [], 
			"bDestroy"			: true,
			"ajax"				: 
				{
					"url"		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/datatabel_modal_urutan_unitKompetensi",
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
						"targets"	: [0, 3],
						"orderable"	: false
					}
				],
		});	*/
		
		$('#id_modal_2_kodeSkema').text(param1);
		$('#id_modal_2_nomorSkema').text(param2);
		$('.modal-title').text('Daftar Unit Kompetensi '+param1);
		$('#id_modal_urutan_unitKompetensi').modal('show');
	}
	
	function setData(){	
		//set URL for 'update'		
		url = "<?= base_url(); ?>admin_lsp/aksiUpdateData/data_skema_uk";
		
		//Show confirmation box before updating the data
		if ($("#id_form_urutan_unitKompetensi").valid()) {
			alertify.confirm('Apakah anda yakin ingin mengupdate data?', function(){
				$("#id_form_urutan_unitKompetensi").submit();						
			}).setting({
				'labels'	: {
					ok		: 'Ya',
					cancel	: 'Tidak'
				}
			}).setHeader('Konfirmasi Update Data').show();					
		}			
	}
</script>