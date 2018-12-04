<script type = "text/javascript">
	var save_method;
	var url;
	var validator;	
	
	var tabel_role;
	var tabel_user;
	
	//Set list of user role
	function multipleSelect_role(){		
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
	
	function modal_tambah(){
		//Set kind of data action
		save_method = "tambah";
		
		//Delete previous alert
		$('#id_form_user')[0].reset();
		validator.resetForm();
		$('#id_form_user').removeClass('error');
		
		//Set Title & Show Modal
		$('.modal-title').text('Tambah User');
		$('#id_modal_form_user').modal('show');
	}
	
	function modal_update(uuid){		
		//Set kind of data action
		save_method = "update";
		
		//Delete previous alert
		$('#id_form_user')[0].reset();
		validator.resetForm();
		$('#id_form_user').removeClass('error');
		
		//Set previous data in modal form
		$.ajax({
			url 		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/satuData_user/" + uuid,
			type		: "GET",
			dataType	: "JSON",
			success		: function(data)
				{						
					$('[name="user_uuid"]').val(data[0].UUID_USER);
					$('[name="user_pwd"]').val(data[0].PWD);
					$('[name="user_full_name"]').val(data[0].USER_NAME);
					$('[name="user_login_id"]').val(data[0].LOGIN_ID);
					$('[name="user_no_ktp"]').val(data[0].NO_KTP);
					$('[name="user_phone"]').val(data[0].PHONE);	
					$('[name="user_email"]').val(data[0].EMAIL);	
					
					if(data[0].IS_ACTIVE == '1'){
						$('[name="user_is_active"]').prop('checked', true);
					}else{
						$('[name="user_is_active"]').prop('checked', false);
					}					
					$('select#id_role_uuid').multipleSelect('setSelects', data[1]);
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
		$('#id_modal_form_user').modal('show');
	}
	
	function setData(){
		if(save_method == 'tambah') {
			//set URL for 'tambah'
			url = "<?= base_url(); ?>admin_lsp/aksiTambahData/satuData_user";	
			
			//Check if the form is valid
			if ($("#id_form_user").valid()) {
				$("#id_form_user").submit();
			}				
		} else {		
			//set URL for 'update'		
			url = "<?= base_url(); ?>admin_lsp/aksiUpdateData/satuData_user";
			
			//Show confirmation box before updating the data
			if ($("#id_form_user").valid()) {
				alertify.confirm('Apakah anda yakin ingin mengupdate data?', function(){
					$("#id_form_user").submit();						
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
		alertify.confirm('Semua data yang berkaitan dengan user ini termasuk form, file yang telah diupload, riwayat proses administrasi dsb akan hilang. Apakah anda yakin ingin menghapus data ini?', function(){
			{
					$.ajax({
					url 		: "<?= base_url(); ?>admin_lsp/aksiHapusData/data_user/"+uuid,
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
	
	function reloadTabel(){
		//Reload Table
		tabel_user.ajax.reload(null,false); 
	}
		
	$(document).ready(function(){
		multipleSelect_role();
		
		//Set Tabel
		tabel_user = $('#id_tabel_user').DataTable({
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
						"targets"	: [0, 6, 8], 
						"orderable"	: false
					}
				],
		});
		
		//Form validation
		validator = $("#id_form_user").validate({
			rules: 
				{
					"role_uuid[]": 
						{
							required	: true
						},
					user_full_name: 
						{
							required	: true,
							maxlength	: 50
						},					
					user_phone: 
						{
							required	: true,
							minlength	: 10,
							maxlength	: 18,
							number		: true,
							remote 		: 
								{ 
									url		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/is_user_phone_valid", 
									type	:"post",
									data	: 
										{
											user_uuid: 
												function() {
													return $('[name="user_uuid"]').val();
												}
										}
								}
						},
					user_email: 
						{
							required	: true,
							maxlength	: 50,
							email		: true,
							remote 		: 
								{ 
									url		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/is_user_email_valid", 
									type	:"post",
									data	: 
										{
											user_uuid: 
												function() {
													return $('[name="user_uuid"]').val();
												}
										}
								}
						},
					user_login_id: 
						{
							required	: true,
							maxlength	: 50,
							remote 		: 
								{ 
									url		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/is_user_loginId_valid", 
									type	:"post",
									data	: 
										{
											user_uuid: 
												function() {
													return $('[name="user_uuid"]').val();
												}
										}
								}
						},
					user_no_ktp: 
						{
							required	: true,
							maxlength	: 16,
							minlength	: 16,
							number		: true,
							remote 		: 
								{ 
									url		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/is_user_noKtp_valid", 
									type	:"post",
									data	: 
										{
											user_uuid: 
												function() {
													return $('[name="user_uuid"]').val();
												}
										}
								}
						},
				}, 
			ignore: [],
			messages:
				{
					user_login_id : 
						{ 
							remote : "Login ID sudah terdaftar." 
						},
					user_no_ktp : 
						{ 
							remote : "No KTP sudah terdaftar." 
						},
					user_phone : 
						{ 
							remote : "No HP sudah terdaftar." 
						},
					user_email : 
						{ 
							remote : "Email sudah terdaftar." 
						}
				},
			submitHandler: function (form)
				{
					$.ajax({
						url			: url,
						type		: 'POST',
						data		: new FormData($("#id_form_user")[0]),
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
	
	//View modal 'Role'
	function modal_role(uuid, param1, param2){			
		tabel_jenis_akun = $('#id_tabel_role').DataTable({ 		
			"processing"		: true, 
			"serverSide"		: true,
			"searching"			: false,
			"paging"			: false,
			"iDisplayLength"	: 10,
			"order"				: [], 
			"bDestroy"			: true,
			"ajax"				: 
				{
					"url"		: "<?= base_url(); ?>admin_lsp/aksiAmbilData/datatabel_modal_role",
					"type"		: "POST",
					"data"		: {
									user_uuid: 
										function() {
											return uuid;
										}
								}
				},
			"columnDefs"		: 
				[
					{ 
						"targets"	: [ 0, 1],
						"orderable"	: false
					}
				],
		});	
		
		$('#id_modal_1_full_name').text(param1);
		$('#id_modal_1_email').text(param2);
		$('.modal-title').text('Daftar Jenis Akun '+param1);
		$('#id_modal_tabel_role').modal('show');
	}
</script>