<script text="text/javascript">
	var save_method;
	var url;
	var validator;
	
	var tabel_ss;
	var tabel_uk;
		
	//Set list of ss
	function multipleSelect_ss(){		
		if ($("#id_ss_uuid").hasClass("error")) {
			$('#id_ss_uuid').removeClass('error');
			$("#id_ss_uuid").css("display", "block");
		}
		
		$.ajax({
			type: "POST",
			dataType: "html",
			url: "<?= base_url(); ?>admin_lsp/aksiAmbilData/multipleSelect_ss",
			success: function(msg){
				$('select#id_ss_uuid').multipleSelect('destroy');
				$("select#id_ss_uuid").html(msg);
				$('select#id_ss_uuid').multipleSelect({width: '100%'});                        
			}
		});						
	}
	
	function modal_tambah(){
		//Set kind of data action
		save_method = "tambah";
		
		//Delete previous alert
		$('#id_form_uk')[0].reset();
		validator.resetForm();
		$('#id_form_uk').removeClass('error');
		
		//Delete previous multiple select data
		$('select#id_ss_uuid').multipleSelect('destroy');
		$('select#id_ss_uuid').multipleSelect({width: '100%'});
		
		//Set Title & Show Modal
		$('.modal-title').text('Tambah Unit Kompetensi');
		$('#id_modal_form_uk').modal('show');
	};
	
	function modal_update(uuid){
		//Set kind of data action
		save_method = "update";
		
		//Delete previous alert
		$('#id_form_uk')[0].reset();
		validator.resetForm();
		$('#id_form_uk').removeClass('error');
		
		//Delete previous multiple select data
		$('select#id_ss_uuid').multipleSelect('destroy');
		$('select#id_ss_uuid').multipleSelect({width: '100%'});
		
		//Set previous data in modal form
		$.ajax({
			url 		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/satuData_uk/" + uuid,
			type		: "GET",
			dataType	: "JSON",
			success		: function(data)
				{						
					$('[name="uk_uuid"]').val(data[0].UUID_UK);
					$('[name="uk_kode"]').val(data[0].KODE_UK);
					$('[name="uk_judul"]').val(data[0].JUDUL_UK);
					//$('#id_ss_uuid').val(data[1].UUID_SKEMA).trigger('change');
					$('select#id_ss_uuid').multipleSelect('setSelects', data[1]);
					
					if(data[0].IS_ACTIVE == '1'){
						$('[name="uk_is_active"]').prop('checked', true);
					}else{
						$('[name="uk_is_active"]').prop('checked', false);
					}					
				},
			error		: function (jqXHR, exception)
				{
					var msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.\n Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					alert(msg);
				}
		});
		
		//Set Title & Show Modal
		$('.modal-title').text('Edit User');
		$('#id_modal_form_uk').modal('show');
	}
		
	function setData(){	
		if(save_method == 'tambah') {
			//set URL for 'tambah'
			url = "<?= base_url(); ?>admin_lsp/aksiTambahData/satuData_uk";	
			
			//Check if the form is valid
			if ($("#id_form_uk").valid()) {
				$("#id_form_uk").submit();
			}				
		} else {		
			//set URL for 'update'		
			url = "<?= base_url(); ?>admin_lsp/aksiUpdateData/satuData_uk";
			
			//Show confirmation box before updating the data
			if ($("#id_form_uk").valid()) {
				alertify.confirm('Apakah anda yakin ingin mengupdate data?', function(){
					$("#id_form_uk").submit();						
				}).setting({
					'labels'	: {
						ok		: 'Ya',
						cancel	: 'Tidak'
					}
				}).setHeader('Konfirmasi Update Data').show();					
			}
		}						
	}
		
	function reloadTabel(){
		tabel_uk.ajax.reload(null,false); 
	}

	$(document).ready(function() {
		multipleSelect_ss();
		
		// Set Tabel
		tabel_uk = $('#id_tabel_uk').DataTable({ 		
			"processing"		: true, 
			"serverSide"		: true,
			"searching"			: true,
			"paging"			: true,
			"iDisplayLength"	: 10,
			"order"				: [], 
			"ajax"				: 
				{
					"url"		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/datatabel_uk",
					"type"		: "POST"
				},
			"columnDefs"		: 
				[
					{ 
						"targets"	: [ 0, 3, 5],
						"orderable"	: false
					}
				],
		});
		
		// Form validation
		validator = $("#id_form_uk").validate({
			rules: 
				{
					'ss_uuid[]': 
						{
							required	: true
						},
					'uk_judul': 
						{
							required	: true,
							maxlength	: 100
						},
					'uk_kode': 
						{
							required	: true,
							maxlength	: 50,
							remote : { 
								url		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/is_uk_kode_valid", 
								type	:"post",
								data	: 
									{
										'uk_uuid': 
											function() {
												return $("#id_uk_uuid").val();
											}
									}
							}
						}
				}, 
			ignore: [],
			messages:
				{
					uk_kode : 
						{ 
							remote : "Kode Unit Kompetensi sudah ada." 
						}
				},
			submitHandler: function (form)
				{
					$.ajax({
						url			: url,
						type		: 'POST',
						data		: new FormData($("#id_form_uk")[0]),
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
	
	//View modal 'Skema Sertifikasi'
	function modal_ss(uuid, param1, param2){			
		tabel_ss = $('#id_tabel_ss').DataTable({ 		
			"processing"		: true, 
			"serverSide"		: true,
			"searching"			: false,
			"paging"			: false,
			"iDisplayLength"	: 10,
			"order"				: [], 
			"bDestroy"			: true,
			"ajax"				: 
				{
					"url"		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/datatabel_modal_ss",
					"type"		: "POST",
					"data"		: {
									uk_uuid: 
										function() {
											return uuid;
										}
								}
				},
			"columnDefs"		: 
				[
					{ 
						"targets"	: [ 0, 1, 2],
						"orderable"	: false
					}
				],
		});	
		
		$('#id_uk_kode').text(param1);
		$('#id_uk_judul').text(param2);
		$('.modal-title').text('Daftar Skema Sertifikasi '+param1);
		$('#id_modal_tabel_ss').modal('show');			
	}
</script>