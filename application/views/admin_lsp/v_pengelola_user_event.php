<script type = "text/javascript">
	var save_method;
	var tabel;
	var url;
	var validator;	
	
	$(document).ready(function(){
		//Set Tabel
		tabel = $('#id_tabel_user').DataTable({
			"processing"		: true, 
			"serverSide"		: true,
			"searching"			: true,
			"paging"			: true,
			"iDisplayLength"	: 10,
			"order"				: [], 
			"ajax"				: 
				{
					"url"		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/datatabel_user",
					"type"		: "POST"
				},
			"columnDefs"		: 
				[
					{ 
						"targets"	: [0, 6, 7], 
						"orderable"	: false
					}
				],
		});
		
		//Form validation
		validator = $("#id_form_pengelola_user").validate({
			rules: 
				{
					user_full_name: 
						{
							required	: true,
							maxlength	: 50
						},
					user_login_id: 
						{
							required	: true,
							maxlength	: 50
						},
					user_phone: 
						{
							required	: true,
							maxlength	: 18
						},
					user_email: 
						{
							required	: true,
							maxlength	: 50
						},
					user_is_online: 
						{
							required	: true
						},
				}, 
			submitHandler: function (form)
				{
					$.ajax({
						url			: url,
						type		: 'POST',
						data		: new FormData($("#<?php echo $form_id[100]; ?>")[0]),
						cache		: false,
						contentType	: false,
						processData	: false,
						success		: function(data){
							$("[data-dismiss=modal]").trigger({ type: "click" });
							reloadDt();		
							
							if(save_method == "add"){
								if(data=="1"){		
									alertify.success('<?php echo $validationMsg[106]; ?>');
								}else{
									alertify.error('<?php echo $validationMsg[107]; ?>');
								}	
							}else{
								if(data=="1"){		
									alertify.success('<?php echo $validationMsg[108]; ?>');
								}else{
									alertify.error('<?php echo $validationMsg[109]; ?>');
								}
							}

							$('#<?php echo $form_id[100]; ?>')[0].reset();	
							validator.resetForm(); 
							$('#<?php echo $form_id[100]; ?> .form-control').removeClass('error');	
						}
					});
					return false;
				}
		});
	});
	
	function reloadTabel()
		{
			//Reload Table
			tabel.ajax.reload(null,false); 
		}
	
	function modal_tambah(){
		//Set kind of data action
		save_method = "tambah";
		
		//Delete previous alert
		$('#id_form_pengelola_user')[0].reset();
		validator.resetForm();
		$('#id_form_pengelola_user').removeClass('error');
		
		//Set Title & Show Modal
		$('.modal-title').text('Tambah User');
		$('#id_modal_set_data_pengelola_user').modal('show');
	}
	
	function modal_update(uuid){
		//Set kind of data action
		save_method = "update";
		
		//Delete previous alert
		$('#id_form_pengelola_user')[0].reset();
		validator.resetForm();
		$('#id_form_pengelola_user').removeClass('error');
		
		//Set previous data in modal form
		$.ajax({
			url 		: "<?= base_url(); ?>admin_lsp/pengelola_user/getOneData/" + uuid,
			type		: "GET",
			dataType	: "JSON",
			success		: function(data)
				{						
					$('[name="usr_uuid"]').val(data.UUID_USER);
					$('[name="usr_login_id"]').val(data.LOGIN_ID);
					$('[name="usr_phone"]').val(data.PHONE);	
					$('[name="usr_email"]').val(data.EMAIL);	
					$('[name="usr_is_online"]').val(data.IS_ONLINE);	
				},
			error		: function (jqXHR, textStatus, errorThrown)
				{
					alert('Terjadi kesalahan saat mengambil data dari admin_lsp/pengelola_user/getOneData');
				}
		});
		
		//Set Title & Show Modal
		$('.modal-title').text('Edit User');
		$('#id_modal_set_data_pengelola_user').modal('show');
		
	}
	
	function setData(){
		if(save_method == 'tambah') {
			//set URL for 'tambah'
			url = "<?= base_url(); ?>admin_lsp/pengelola_user/tambahData";	
			
			//Check if the form is valid
			if ($("#id_form_pengelola_user").valid()) {
				$("#id_form_pengelola_user").submit();
			}				
		} else {		
			//set URL for 'update'		
			url = "<?= base_url(); ?>admin_lsp/pengelola_user/updateData";
			
			//Show confirmation box before updating the data
			if ($("#id_form_pengelola_user").valid()) {
				alertify.confirm('Apakah anda yakin ingin mengupdate data?', function(){
					$("#id_form_pengelola_user").submit();						
				}).setting({
					'labels'	: {
						ok		: 'Ya',
						cancel	: 'Tidak'
					}
				}).setHeader('Konfirmasi Update Data').show();					
			}
		}			
	}

	function hapus_data(uuid){
		//Show confirmation box before deleting the data
		alertify.confirm('Apakah anda yakin ingin menghapus data ini?', function(){
			{
				$.ajax({
					url 		: "<?= base_url(); ?>admin_lsp/pengelola_user/hapusData/"+uuid,
					type		: "POST",
					dataType	: "JSON",
					success		: function(data)
						{	
							//Reload Table
							reloadTabel();
							
							if(data=="1"){
								alertify.success('Data berhasil dihapus');
							}else{
								alertify.error('Data gagal dihapus');
							}							
						},
					error		: function (jqXHR, textStatus, errorThrown)
					{
						//Reload Table
						reloadTabel();
						
						alertify.error('Terjadi kesalahan saat menghapus data: admin_lsp/pengelola_user/deleteData');
					}				
				});

			}
				
			}).setting({
				'labels'	: {
					ok		: 'Ya',
					cancel	: 'Tidak'
				}
			}).setHeader('Konfirmasi Hapus Data').show();
	}
</script>