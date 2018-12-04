<script text="text/javascript">
	var save_method;
	var url;
	var validator;
	
	var tabel_ss;
	
	function modal_tambah(){
		//Set kind of data action
		save_method = "tambah";
		
		//Delete previous alert
		$('#id_form_ss')[0].reset();
		validator.resetForm();
		$('#id_form_ss').removeClass('error');
		
		//Set Title & Show Modal
		$('.modal-title').text('Tambah Skema Sertifikasi');
		$('#id_modal_form_ss').modal('show');
	};

	function modal_update(uuid){
		//Set kind of data action
		save_method = "update";
		
		//Delete previous alert
		$('#id_form_ss')[0].reset();
		validator.resetForm();
		$('#id_form_ss').removeClass('error');
		
		//Set previous data in modal form
		$.ajax({
			url 		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/satuData_ss/" + uuid,
			type		: "GET",
			dataType	: "JSON",
			success		: function(data)
				{						
					$('[name="ss_uuid"]').val(data.UUID_SKEMA);
					$('[name="ss_nama"]').val(data.NAMA_SKEMA);
					$('[name="ss_nomor"]').val(data.NOMOR_SKEMA);	
					
					if(data.IS_ACTIVE == '1'){
						$('[name="ss_is_active"]').prop('checked', true);
					}else{
						$('[name="ss_is_active"]').prop('checked', false);
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
		$('.modal-title').text('Edit Skema Sertifikasi');
		$('#id_modal_form_ss').modal('show');
	}
		
	function setData(){	
		if(save_method == 'tambah') {
			//set URL for 'tambah'
			url = "<?= base_url(); ?>admin_lsp/aksiTambahData/satuData_ss";	
			
			//Check if the form is valid
			if ($("#id_form_ss").valid()) {
				$("#id_form_ss").submit();
			}				
		} else {		
			//set URL for 'update'		
			url = "<?= base_url(); ?>admin_lsp/aksiUpdateData/satuData_ss";
			
			//Show confirmation box before updating the data
			if ($("#id_form_ss").valid()) {
				alertify.confirm('Apakah anda yakin ingin mengupdate data?', function(){
					$("#id_form_ss").submit();						
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
		//Reload Table
		tabel_ss.ajax.reload(null,false); 
	}

	$(document).ready(function() {
		tabel_ss = $('#id_tabel_ss').DataTable({ 		
			"processing"		: true, 
			"serverSide"		: true,
			"searching"			: true,
			"paging"			: false,
			"iDisplayLength"	: 10,
			"order"				: [], 
			"bDestroy"			: true,
			"ajax"				: 
				{
					"url"		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/datatabel_ss",
					"type"		: "POST"
				},
			"columnDefs"		: 
				[
					{ 
						"targets"	: [ 0, 4 ], 
						"orderable"	: false
					}
				],
		});
		
		validator = $("#id_form_ss").validate({
			rules: 
				{
					ss_nama: 
						{
							required	: true,
							maxlength	: 50
						},
					ss_nomor: 
						{
							required	: true,
							maxlength	: 50,
							remote : { 
								url		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/is_ss_nomor_valid", 
								type	:"post",
								data	: 
									{
										skema_uuid: 
											function() {
												return $("#id_skema_uuid").val();
											}
									}
							}
						}
				}, 
			messages:
				{
					ss_nomor : 
						{ 
							remote : "Nomor sudah ada." 
						}
				},
			submitHandler: function (form)
				{
					$.ajax({
						url			: url,
						type		: 'POST',
						data		: new FormData($("#id_form_ss")[0]),
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
</script>