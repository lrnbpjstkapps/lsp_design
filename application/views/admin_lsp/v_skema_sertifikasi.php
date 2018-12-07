<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="#">Beranda</a></li>
	<li class="breadcrumb-item active" aria-current="page">Skema Sertifikasi</li>
  </ol>
</nav>
	
<h3 class="box-title"> Skema Sertifikasi </h3>
<button onClick="modal_tambah()" class="btn btn-primary float-right"> Tambah </button>

</br></br>

<!-- Tabel Utama Skema Sertifikasi -->
 <table id="id_tabel_ss" class="table table-hover dataTable" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th> # </th>
			<th> Nomor </th>
			<th> Judul Skema Sertifikasi </th>
			<th> Status </th>
			<th class="sorting_disabled" align = "center"> &nbsp </th>
		</tr>
	</thead>
	<tbody>
	</tbody>
 </table>
   
  <!-- Modal Form Skema Sertifikasi -->
<div class="modal fade" id="id_modal_form_ss" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Title </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
			
			<div class="modal-body">
				<form id="id_form_ss">           
					<input type="hidden" name="ss_uuid" id="id_ss_uuid"/> 
					<div class="form-group">
						<label> Nomor Skema Sertifikasi </label>
						<input name="ss_nomor" class="form-control" type="text">
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label> Judul Skema Sertifikasi </label>
						<input name="ss_nama" class="form-control" type="text">
						<span class="help-block"></span>
					</div>	
					<div class="form-group">
						<input name="ss_is_active" type="checkbox" checked>
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