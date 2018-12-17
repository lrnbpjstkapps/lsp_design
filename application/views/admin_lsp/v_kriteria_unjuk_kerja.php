<button onClick="modal_tambah()" class="btn btn-primary float-right"> Tambah </button>		

<dl class="row">
	<dt class="col-md-3"> Kode Unit Kompetensi </dt>
		<dd class="col-md-9"> <?= $uk_kode; ?> </dd>
	<dt class="col-md-3"> Judul Unit Kompetensi </dt>
		<dd class="col-md-9"> <?= $uk_judul; ?> </dd>
	<dt class="col-md-3"> Nomor Elemen Kompetensi </dt>
		<dd class="col-md-9"> <?= $ek_nomor; ?> </dd>
	<dt class="col-md-3"> Nama Elemen Kompetensi </dt>
		<dd class="col-md-9"> <?= $ek_nama; ?> </dd>
</dl>

<table id="id_tabel_kuk" class="table table-hover dataTable" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th> # </th>					
			<th> Nomor Kriteria Unjuk Kerja </th>
			<th> Pernyataan </th>
			<th> Pertanyaan </th>
			<th> Status </th>
			<th> &nbsp </th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<div class="modal fade" id="id_modal_form_kuk" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">				
				<h4 class="modal-title"> Title </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
			
			<div class="modal-body">
				<form id="id_form_kuk">
					<div class="modal-body form">                
						<input type="hidden" name="uk_uuid"/>
						<input type="hidden" name="ek_uuid"/>
						<input type="hidden" name="kuk_uuid" id = "id_kuk_uuid"/>		
						
						<div class="form-body">
							<!-- Unit Kompetensi -->
							<div class="form-group">
								<label> Unit Kompetensi </label>
								<input name="uk_kode_judul" id="id_uk_kode_judul" class="form-control" type="text" readonly>
								<span class="help-block"></span>
							</div>
							
							<!-- Elemen Kompetensi -->
							<div class="form-group">
								<label> Elemen Kompetensi </label>
								<input name="ek_nomor_nama" id="id_ek_nomor_nama" class="form-control" type="text" readonly>
								<span class="help-block"></span>
							</div>
							
							<!-- Nomor Kriteria Unjuk Kerja -->
							<div class="form-group">
								<label> Nomor Kriteria Unjuk Kerja </label>
								<input name="kuk_nomor" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
							
							<!-- Pernyataan -->
							<div class="form-group">
								<label> Pernyataan </label>
								<textarea name="kuk_pernyataan" class="form-control" rows="3" style="resize:none"></textarea>
								<span class="help-block"></span>
							</div>	
							
							<!-- Pertanyaan -->
							<div class="form-group">
								<label> Pertanyaan </label>
								<textarea name="kuk_pertanyaan" class="form-control" rows="3" style="resize:none"></textarea>
								<span class="help-block"></span>
							</div>	

							<div class="form-group">
								<input name="kuk_is_active" type="checkbox" checked>
								<label> IS_ACTIVE </label>
								<span class="help-block"></span>
							</div>	
						</div>                
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