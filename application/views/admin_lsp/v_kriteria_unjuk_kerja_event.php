<script text="text/javascript">
	var save_method;
	var url;
	var validator;
	
	var tabel_kuk;
	
	function modal_tambah(){
		//Set kind of data action
		save_method = "tambah";
		
		//Delete previous alert
		$('#id_form_kuk')[0].reset();
		validator.resetForm();
		$('#id_form_kuk').removeClass('error');
		
		$('[name="ek_uuid"]').val('<?= $ek_uuid; ?>');
		$('[name="uk_kode_judul"]').val('<?= $uk_kode." - ".$uk_judul; ?>');
		$('[name="ek_nomor_nama"]').val('<?= $ek_nomor." - ".$ek_nama; ?>');
		$('[name="ek_nomor"]').val('<?= $ek_nomor."."; ?>');
		
		$('.modal-title').text('Tambah Kriteria Unjuk Kerja');
		$('#id_modal_form_kuk').modal('show');
	};
	
	function modal_update(uuid){
		//Set kind of data action
		save_method = "update";		
		
		//Delete previous alert
		$('#id_form_kuk')[0].reset();	
		validator.resetForm(); 
		$('#id_form_kuk .form-control').removeClass('error');	
		
		//Set previous data in modal form		
		$.ajax({
			url 		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/satuData_kuk/" + uuid,
			type		: "GET",
			dataType	: "JSON",
			success		: function(data)
				{	
					$('[name="ek_uuid"]').val('<?= $ek_uuid; ?>');
					$('[name="uk_kode_judul"]').val('<?= $uk_kode." - ".$uk_judul; ?>');
					$('[name="ek_nomor_nama"]').val('<?= $ek_nomor." - ".$ek_nama; ?>');
					$('[name="ek_nomor"]').val('<?= $ek_nomor."."; ?>');
					
					$('[name="kuk_uuid"]').val(data.UUID_KUK);						
					$('[name="kuk_nomor"]').val(data.NOMOR_KUK);	
					$('[name="kuk_pernyataan"]').val(data.PERNYATAAN);
					$('[name="kuk_pertanyaan"]').val(data.PERTANYAAN);
					
					if(data.IS_ACTIVE == '1'){
						$('[name="kuk_is_active"]').prop('checked', true);
					}else{
						$('[name="kuk_is_active"]').prop('checked', false);
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
		$('.modal-title').text('Edit Kriteria Unjuk Kerja');
		$('#id_modal_form_kuk').modal('show'); 
	}

	function setData(){	
		if(save_method == 'tambah') {
			//set URL for 'tambah'
			url = "<?= base_url(); ?>admin_lsp/aksiTambahData/satuData_kuk";	
			
			//Check if the form is valid
			if ($("#id_form_kuk").valid()) {
				$("#id_form_kuk").submit();
			}				
		} else {		
			//set URL for 'update'		
			url = "<?= base_url(); ?>admin_lsp/aksiUpdateData/satuData_kuk";
			
			//Show confirmation box before updating the data
			if ($("#id_form_kuk").valid()) {
				alertify.confirm('Apakah anda yakin ingin mengupdate data?', function(){
					$("#id_form_kuk").submit();						
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
		tabel_kuk.ajax.reload(null,false); 
	}

	$(document).ready(function() {
		//Set Tabel
		tabel_kuk = $('#id_tabel_kuk').DataTable({ 		
			"processing"		: true, 
			"serverSide"		: true,
			"searching"			: false,
			"paging"			: false,
			"iDisplayLength"	: 10,
			"order"				: [], 
			"ajax"				: 
				{
					"url"		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/datatabel_kuk",
					"type"		: "POST",
					"data"		: 
								{
									ek_uuid: 
										function() {
											return "<?= $ek_uuid; ?>";
										}
								}
				},
			"columnDefs"		: 
				[
					{ 
						"targets"	: [ 0, 1, 2, 3, 4, 5], 
						"orderable"	: false
					}
				],
		});
		
		//Form Validation
		validator = $("#id_form_kuk").validate({
			rules: 
				{					
					kuk_nomor: 
						{
							required	: true,
							maxlength	: 50,
							remote : { 
								url		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/is_kuk_nomor_valid", 
								type	:"post",
								data	: 
									{
										kuk_uuid: 
											function() {
												return $("#id_kuk_uuid").val();
											}
									}
							}
						},
					kuk_pernyataan: 
						{
							required	: true,
							maxlength	: 200
						},
					kuk_pertanyaan: 
						{
							required	: true,
							maxlength	: 300
						}
				}, 
			messages:
				{
					kuk_nomor : 
						{ 
							remote : "Nomor Kriteria Unjuk Kerja sudah ada." 
						}
				},
			submitHandler: function (form)
				{
					$.ajax({
						url			: url,
						type		: 'POST',
						data		: new FormData($("#id_form_kuk")[0]),
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
