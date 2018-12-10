<button onClick="modal_tambah()" class="btn btn-primary float-right"> Tambah </button>		

<dl class="row">
	<dt class="col-md-2"> Kode Unit Kompetensi </dt>
		<dd class="col-md-10"> <?= $uk_kode; ?> </dd>
	<dt class="col-md-2"> Judul Unit Kompetensi </dt>
		<dd class="col-md-10"> <?= $uk_judul; ?> </dd>
</dl>

<table id="id_tabel_ek" class="table table-hover dataTable" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th> # </th>					
			<th> Nomor Elemen Kompetensi </th>
			<th> Nama Elemen Kompetensi </th>
			<th> Status </th>
			<th> &nbsp </th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<div class="modal fade" id="id_modal_form_ek" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">				
				<h4 class="modal-title"> Title </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
			
			<div class="modal-body">
				<form id="id_form_ek" class="form-horizontal">            
					<input type="hidden" name="uk_uuid"/>
					<input type="hidden" name="ek_uuid"/>						
					
					<div class="form-group">
						<label> Unit Kompetensi </label>
						<input name="uk_kode_judul" class="form-control" type="text" readonly>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label> Nomor Elemen Kompetensi </label>
						<input name="ek_nomor" class="form-control" type="text">
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label> Nama Elemen Kompetensi </label>
						<textarea name="ek_nama" class="form-control" rows="2" style="resize:none"></textarea>
						<span class="help-block"></span>
					</div>	
					<div class="form-group">
						<input name="ek_is_active" type="checkbox" checked>
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