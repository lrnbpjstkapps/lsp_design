<script text="text/javascript">
	var save_method;
	var url;
	var validator;
	
	var tabel_ek;	

	function modal_tambah(){
		//Set kind of data action
		save_method = "tambah";
	
		//Delete previous alert
		$('#id_form_ek')[0].reset();
		validator.resetForm();
		$('#id_form_ek').removeClass('error');
		
		$('[name="uk_uuid"]').val('<?= $uk_uuid; ?>');
		$('[name="uk_kode_judul"]').val('<?= $uk_kode." - ".$uk_judul; ?>');
		$('[name="ek_nomor"]').val('<?= $uk_kode."."; ?>');
		
		$('.modal-title').text('Tambah Elemen Kompetensi');
		$('#id_modal_form_ek').modal('show');
	};

	function modal_update(uuid){
		//Set kind of data action
		save_method = "update";
		
		//Delete previous alert
		$('#id_form_ek')[0].reset();
		validator.resetForm();
		$('#id_form_ek .form-control').removeClass('error');
		
		//Set previous data in modal form
		$.ajax({
			url 		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/satuData_ek/" + uuid,
			type		: "GET",
			dataType	: "JSON",
			success		: function(data)
				{						
					$('[name="uk_kode_judul"]').val('<?= $uk_kode." - ".$uk_judul; ?>');
					
					$('[name="ek_uuid"]').val(data.UUID_EK);
					$('[name="uk_uuid"]').val(data.UUID_UK);
					$('[name="ek_nomor"]').val(data.NOMOR_EK);
					$('[name="ek_nama"]').val(data.NAMA_EK);
					
					if(data.IS_ACTIVE == '1'){
						$('[name="ek_is_active"]').prop('checked', true);
					}else{
						$('[name="ek_is_active"]').prop('checked', false);
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
		$('.modal-title').text('Edit Elemen Kompetensi');
		$('#id_modal_form_ek').modal('show');
	}
	
	function setData(){
		if(save_method == 'tambah') {
			//set URL for 'tambah'
			url = "<?= base_url(); ?>admin_lsp/aksiTambahData/satuData_ek";	
			
			//Check if the form is valid
			if ($("#id_form_ek").valid()) {
				$("#id_form_ek").submit();
			}				
		} else {		
			//set URL for 'update'		
			url = "<?= base_url(); ?>admin_lsp/aksiUpdateData/satuData_ek";
			
			//Show confirmation box before updating the data
			if ($("#id_form_ek").valid()) {
				alertify.confirm('Apakah anda yakin ingin mengupdate data?', function(){
					$("#id_form_ek").submit();						
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
		tabel_ek.ajax.reload(null,false); 
	}

	$(document).ready(function() {
		//Set Tabel
		tabel_ek = $('#id_tabel_ek').DataTable({ 		
			"processing"		: true, 
			"serverSide"		: true,
			"searching"			: false,
			"paging"			: false,
			"iDisplayLength"	: 10,
			"order"				: [], 
			"ajax"				: 
				{
					"url"		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/datatabel_ek",
					"type"		: "POST",
					"data"		: 
								{
									uk_uuid: 
										function() {
											return "<?= $uk_uuid; ?>";
										}
								}
				},
			"columnDefs"		: 
				[
					{ 
						"targets"	: [ 0, 1, 2, 3, 4], 
						"orderable"	: false
					}
				],
		});
		
		//Form validation
		validator = $("#id_form_ek").validate({
			rules: 
				{
					ek_nama: 
						{
							required	: true,
							maxlength	: 100
						},
					ek_nomor: 
						{
							required	: true,
							maxlength	: 50,
							remote : { 
								url		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/is_ek_nomor_valid", 
								type	:"post",
								data	: 
									{
										ek_uuid: 
											function() {
												return $('[name="ek_uuid"]').val();
											}
									}
							}
						}
				}, 
			messages:
				{
					ek_nomor : 
						{ 
							remote : "Nomor Elemen Kompetensi sudah ada." 
						}
				},
			submitHandler: function (form)
				{
					$.ajax({
						url			: url,
						type		: 'POST',
						data		: new FormData($("#id_form_ek")[0]),
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