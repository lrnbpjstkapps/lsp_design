<h3 class="box-title"> Pengelola User </h3>
<button onClick="modal_tambah()" class="btn btn-primary float-right"> Tambah </button>

</br></br>

<table id="id_tabel_user" class="table table-hover dataTable" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th> # </th>	
			<th> No KTP </th>			
			<th> Pegawai </th>
			<th> Login ID </th>
			<th> No Telepon </th>
			<th> Email </th>
			<th> Jenis Akun </th>
			<th> Status </th>
			<th class="sorting_disabled" align = "center"> &nbsp </th>
		</tr>
	</thead>
	
	<tbody>
	</tbody>
</table>

<div class="modal fade" id="id_modal_set_data_pengelola_user" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> (title) </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
			
			<div class="modal-body">
				<form id="id_form_pengelola_user">           
					<input type="hidden" name="user_uuid" id="id_user_uuid"/> 
					<input type="hidden" name="user_pwd" id="id_user_pwd"/> 
					<div class="form-group">
						<label> Jenis User </label>
						<select multiple = "multiple" name="role_uuid[]" id="id_role_uuid"></select>										
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label> No KTP </label>
						<input name="user_no_ktp" class="form-control" type="text">
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label> Pegawai </label>
						<input name="user_full_name" class="form-control" type="text">
						<span class="help-block"></span>
					</div>					
					<div class="form-group">
						<label> Login ID </label>
						<input name="user_login_id" class="form-control" type="text">
						<span class="help-block"></span>
					</div>	
					<div class="form-group">
						<label> No Telepon </label>
						<input name="user_phone" class="form-control" type="text">
						<span class="help-block"></span>
					</div>	
					<div class="form-group">
						<label> Email </label>
						<input name="user_email" class="form-control" type="text">
						<span class="help-block"></span>
					</div>	
					<div class="form-group">
						<input name="user_is_active" type="checkbox" checked>
						<label> IS_ACTIVE </label>
						<span class="help-block"></span>
					</div>	
				</form>		
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="setData()"> Simpan </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup </button>
			</div>			
        </div>
    </div>
</div>

<div class="modal fade" id="id_modal_lihat_jenis_akun" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> (title) </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
			
			<div class="modal-body">
				<div id = "box_lihat_jenis_akun">
					
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup </button>
			</div>			
        </div>
    </div>
</div>
