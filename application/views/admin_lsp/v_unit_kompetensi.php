<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="#">Beranda</a></li>
	<li class="breadcrumb-item active" aria-current="page">Unit Kompetensi</li>
  </ol>
</nav>

<h3 class="box-title"> Unit Kompetensi </h3>
<button onClick="modal_tambah()" class="btn btn-primary float-right"> Tambah </button>

</br></br>
	  
<!-- Tabel Utama Unit Kompetensi -->
 <table id="id_tabel_uk" class="table table-hover dataTable" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th> # </th>					
			<th> Kode Unit Kompetensi </th>
			<th> Judul Unit Kompetensi </th>
			<th> &nbsp </th>
			<th> Status </th>
			<th> &nbsp </th>
		</tr>
	</thead>
	<tbody>
	</tbody>
 </table>

<!-- Modal Tabel Skema-->
<div class="modal fade" id="id_modal_tabel_ss" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center"> Title </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>	
			
			<div class="modal-body">				
				<dl class="row">
					<dt class="col-md-5"> Kode Unit Kompetensi </dt>
						<dd id="id_uk_kode" class="col-md-7">Text</dd>
					<dt class="col-md-5"> Judul Unit Kompetensi </dt>
						<dd id="id_uk_judul" class="col-md-7">Text</dd>
				</dl>
			  
				<table id="id_tabel_ss" class="table table-hover dataTable" width="100%">
				<thead>
					<tr>
						<th> # </th>
						<th> Nomor </th>
						<th> Judul Skema Sertifikasi </th>
					</tr>
				</thead>
					<tbody>
					</tbody>
				</table>			
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup </button>
			</div>			
		</div>
    </div>
</div>

<!-- Modal Form Unit Kompetensi -->
<div class="modal fade" id="id_modal_form_uk" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<h4 class="modal-title"> Title </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
			
			<div class="modal-body">
				<form id="id_form_uk">           
					<input type="hidden" name="uk_uuid" id="id_uk_uuid"/> 					
					<div class="form-group">
						<label> Kode Unit Kompetensi </label>
						<input name="uk_kode" class="form-control" type="text">
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label> Judul Unit Kompetensi </label>
						<textarea name="uk_judul" class="form-control" rows="2" style="resize:none"></textarea>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label> Skema Sertifikasi </label>
						<select multiple = "multiple" name="ss_uuid[]" id="id_ss_uuid"></select>
					</div>
					<div class="form-group">
						<input name="uk_is_active" type="checkbox" checked>
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