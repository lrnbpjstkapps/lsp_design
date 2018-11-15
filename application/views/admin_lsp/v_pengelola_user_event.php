<script type = "text/javascript">
	var setMethod;
	var tabel;
	var url;
	var validator;	
	
	$(document).ready(function(){
		//Set Tabel
		tabel = $('#id_tabel_user').Datatable({
			"processing"		: true, 
			"serverSide"		: true,
			"searching"			: true,
			"paging"			: true,
			"iDisplayLength"	: 10,
			"order"				: [], 
			"ajax"				: 
				{
					"url"		: "admin_lsp/pengelola_user/getTabel",
					"type"		: "POST"
				},
			"columnDefs"		: 
				[
					{ 
						"targets"	: [], 
						"orderable"	: true
					}
				],
		})
	});
	
	function modal_tambah(){
		//Set kind of data action
		setMethod = "tambah";
		
		//Delete previous alert
		$('#id_form_pengelola_user')[0].reset();
		validator.resetForm();
		$('#id_form_pengelola_user').removeClass('error');
		
		//Set Title & Show Modal
		$('.modal-title').text('Tambah User');
		$('#id_modal_set_data_pengelola_user').modal('show');
	}
	
	function modal_update(){
		//Set kind of data action
		setMethod = "update";
		
		//Delete previous alert
		$('#id_form_pengelola_user')[0].reset();
		validator.resetForm();
		$('#id_form_pengelola_user').removeClass('error');
		
		//Set previous data in modal form
		$.ajax({
			url 		: "admin_lsp/pengelola_user/getOneData/" + uuid,
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
			url = "admin_lsp/pengelola_user/tambahData";	
			
			//Check if the form is valid
			if ($("#id_form_pengelola_user").valid()) {
				$("#id_form_pengelola_user").submit();
			}				
		} else {		
			//set URL for 'update'		
			url = "admin_lsp/pengelola_user/updateData";
			
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

	function delete_data(){
		//Show confirmation box before deleting the data
		alertify.confirm('<?php echo $validationMsg[113]; ?>', function(){
			{
				$.ajax({
					url 		: "<?php echo $ajax_url[104]; ?>"+uuid,
					type		: "POST",
					dataType	: "JSON",
					success		: function(data)
						{	
							reloadDt();
							
							if(data=="1"){
								alertify.success('<?php echo $validationMsg[114]; ?>');
							}else{
								alertify.error('<?php echo $validationMsg[110]; ?>');
							}							
						},
					error		: function (jqXHR, textStatus, errorThrown)
					{
						alertify.error('<?php echo $validationMsg[110]; ?>');
						reloadDt();
					}				
				});

			}
				
			}).setting({
				'labels'	: {
					ok		: '<?php echo $form_button[102]; ?>',
					cancel	: '<?php echo $form_button[103]; ?>'
				}
			}).setHeader('<?php echo $form_title[104]; ?>').show();
	}
</script>