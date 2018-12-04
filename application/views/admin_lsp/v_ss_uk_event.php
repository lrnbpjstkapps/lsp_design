<script type = "text/javascript">
	var save_method;
	var url;
	var validator;	
	var formData_json;
	
	var tabel_ss_uk;
	var tabel_uk;
	var tabel_form_ss_uk;
	
	function setData(){	
		//set URL for 'update'		
		url 		= "<?= base_url(); ?>admin_lsp/aksiUpdateData/data_ss_uk";
		
		//Initiate formData
		var formData 	= new FormData($("#id_form_ss_uk")[0]);
		
		//formData to JSON
		var object = {};
		formData.forEach(function(value, key){
			object[key] = value;
		});
		formData_json = JSON.stringify(object);
		
		//Show confirmation box before updating the data
		if ($("#id_form_ss_uk").valid()) {
			alertify.confirm('Apakah anda yakin ingin mengupdate data?', function(){
				$("#id_form_ss_uk").submit();						
			}).setting({
				'labels'	: {
					ok		: 'Ya',
					cancel	: 'Tidak'
				}
			}).setHeader('Konfirmasi Update Data').show();					
		}					
	}
	
	function reloadTabel(){
		//Reload Table
		tabel_ss_uk.ajax.reload(null,false); 
	}
	
	$(document).ready(function(){		
		//Tabel Utama Skema Sertifikasi - Unit Kompetensi
		tabel_ss_uk = $('#id_tabel_ss_uk').DataTable({
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
		
		//Validation: Modal Form SS - UK
		validator = $("#id_form_ss_uk").validate({
			rules: 
				{
					
				},
			submitHandler: function (form)
				{
					$.ajax({
						url			: url,
						type		: 'POST',
						data		: formData_json,
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
	
	//Modal Tabel Unit Kompetensi
	function modal_tabel_uk(uuid, param1, param2){			
		tabel_uk = $('#id_tabel_uk').DataTable({ 		
			"processing"		: true, 
			"serverSide"		: true,
			"searching"			: false,
			"paging"			: false,
			"iDisplayLength"	: 10,
			"order"				: [], 
			"bDestroy"			: true,
			"ajax"				: 
				{
					"url"		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/datatabel_modal_uk",
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
		$('#id_modal_tabel_uk').modal('show');
	}
	
	//Modal Form SS - UK
	function modal_form_ss_uk(uuid, param1, param2){			
		tabel_form_ss_uk = $('#id_tabel_form_ss_uk').DataTable({ 		
			"processing"		: true, 
			"serverSide"		: true,
			"searching"			: false,
			"paging"			: false,
			"iDisplayLength"	: 10,
			"order"				: [], 
			"bDestroy"			: true,
			"ajax"				: 
				{
					"url"		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/datatabel_form_ss_uk",
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
		});	
		
		$('#id_modal_2_kodeSkema').text(param1);
		$('#id_modal_2_nomorSkema').text(param2);
		$('.modal-title').text('Daftar Unit Kompetensi '+param1);
		$('#id_modal_form_ss_uk').modal('show');
	}
</script>