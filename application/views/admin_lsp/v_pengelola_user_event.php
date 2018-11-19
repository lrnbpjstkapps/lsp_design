<script type = "text/javascript">
	var save_method;
	var tabel;
	var url;
	var validator;	
	
	$(document).ready(function(){
		multipleSelect_jenis_user();
		
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
						"targets"	: [0, 7, 8], 
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
						data		: new FormData($("#id_form_pengelola_user")[0]),
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
			url 		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/satuData_user/" + uuid,
			type		: "GET",
			dataType	: "JSON",
			success		: function(data)
				{						
					$('[name="user_uuid"]').val(data.UUID_USER);
					$('[name="user_full_name"]').val(data.USER_NAME);
					$('[name="user_login_id"]').val(data.LOGIN_ID);
					$('[name="user_phone"]').val(data.PHONE);	
					$('[name="user_email"]').val(data.EMAIL);	
					$('[name="user_is_online"]').val(data.IS_ONLINE);	
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
		$('#id_modal_set_data_pengelola_user').modal('show');
		
	}
	
	function setData(){
		if(save_method == 'tambah') {
			//set URL for 'tambah'
			url = "<?= base_url(); ?>admin_lsp/aksiTambahData/satuData_user";	
			
			//Check if the form is valid
			if ($("#id_form_pengelola_user").valid()) {
				$("#id_form_pengelola_user").submit();
			}				
		} else {		
			//set URL for 'update'		
			url = "<?= base_url(); ?>admin_lsp/aksiUpdateData/satuData_user";
			
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

	function hapus_data(uuid_user){
		//Show confirmation box before deleting the data
		alertify.confirm('Apakah anda yakin ingin menghapus data ini?', function(){
			{
					$.ajax({
					url 		: "<?= base_url(); ?>admin_lsp/aksiHapusData/data_user/"+uuid_user,
					type		: "POST",
					dataType	: "JSON",
					success		: function(data)
						{	
							//Reload Table
							reloadTabel();
							
							//Show the result
							if(data.hasil == "sukses"){	
								alertify.success(data.pesan);
							}else{
								alertify.error(data.pesan);
							}						
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
	
	//Set list of user role
	function multipleSelect_jenis_user(){		
		if ($("#id_role_uuid").hasClass("error")) {
			$('#id_role_uuid').removeClass('error');
			$("#id_role_uuid").css("display", "block");
		}
		
		$.ajax({
			type: "POST",
			dataType: "html",
			url: "<?= base_url(); ?>admin_lsp/aksiAmbilData/multipleSelect_role",
			success: function(msg){
				$('select#id_role_uuid').multipleSelect('destroy');
				$("select#id_role_uuid").html(msg);
				$('select#id_role_uuid').multipleSelect({width: '100%'});                        
			}
		});						
	}
</script>