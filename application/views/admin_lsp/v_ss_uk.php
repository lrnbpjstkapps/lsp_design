<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="#">Beranda</a></li>
	<li class="breadcrumb-item active" aria-current="page">Skema Sertifikasi - Unit Kompetensi</li>
  </ol>
</nav>

<h3 class="box-title"> Skema Sertifikasi - Unit Kompetensi </h3>

</br>

<!-- Tabel Utama Skema Sertifikasi - Unit Kompetensi -->
<table id="id_tabel_ss_uk" class="table table-hover dataTable" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th> # </th>	
			<th> Nomor </th>			
			<th> Judul Skema Sertifikasi </th>
			<th> Daftar Unit Kompetensi </th>
			<th> Status </th>
			<th class="sorting_disabled" align = "center"> &nbsp </th>
		</tr>
	</thead>
	
	<tbody>
	</tbody>
</table>

<!-- Modal Tabel Unit Kompetensi -->
<div class="modal fade" id="id_modal_tabel_uk" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center"> Title </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>	
			
			<div class="modal-body">				
				<dl class="row">
					<dt class="col-md-5"> Kode Skema Sertifikasi </dt>
						<dd id="id_modal_1_kodeSkema" class="col-md-7">Text</dd>
					<dt class="col-md-5"> Nomor Skema Sertifikasi </dt>
						<dd id="id_modal_1_nomorSkema" class="col-md-7">Text</dd>
				</dl>
			  
				<table id="id_tabel_uk" class="table table-hover dataTable" width="100%">
				<thead>
					<tr>
						<th> # </th>
						<th> Kode Unit Kompetensi </th>
						<th> Nama Unit Kompetensi </th>
						<th> Urutan </th>
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

<!-- Modal Form SS - UK -->
<div class="modal fade" id="id_modal_form_ss_uk" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center"> Title </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>	
			
			<div class="modal-body">	
				<form id="id_form_ss_uk"> 	
					<dl class="row">
						<dt class="col-md-5"> Kode Skema Sertifikasi </dt>
							<dd id="id_modal_2_kodeSkema" class="col-md-7">Text</dd>
						<dt class="col-md-5"> Nomor Skema Sertifikasi </dt>
							<dd id="id_modal_2_nomorSkema" class="col-md-7">Text</dd>
					</dl>
				  
					<table id="id_tabel_form_ss_uk" class="table table-hover dataTable" width="100%">
					<thead>
						<tr>
							<th> # </th>
							<th> Kode Unit Kompetensi </th>
							<th> Nama Unit Kompetensi </th>
							<th> Urutan </th>
						</tr>
					</thead>
						<tbody>
						</tbody>
					</table>
				</form>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onClick="setData()"> Simpan </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup </button>
			</div>			
		</div>
    </div>
</div>