<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="#">Beranda</a></li>
	<li class="breadcrumb-item active" aria-current="page">Kriteria Unjuk Kerja</li>
  </ol>
</nav>

<h3 class="box-title"> Kriteria Unjuk Kerja </h3> 

<div class = "alert alert-info" role = "alert">		  
	<form id="id_form_kuk_search">
		<div class="form-group">
			<div class="row">
				<div class="col-md-2">
					<label> Unit Kompetensi </label>
				</div>
				<div class="col-md-7">
				  <select class="form-control select2" style="width: 100%;" name="uk_uuid" id="id_uk_uuid" onchange="dropdown_ek();"> 
					<?php foreach($lis_uk->result() as $row){ ?>
						<option value = "<?= $row->UUID_UK; ?>"><?= $row->KODE_UK." - ".$row->JUDUL_UK; ?></option>
					<?php } ?>						
				  </select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-2">
					<label> Elemen Kompetensi </label>
				</div>
				<div class="col-md-7">
				  <select class="form-control select2" style="width: 100%;" name="ek_uuid" id="id_ek_uuid"></select>
				</div>
				<div class="col-md-3">
					<button type="button" class="btn btn-danger float-right" onclick="cari_data()"> Cari </button>
				</div>
			</div>
		</div>
	</form>	
</div>

<hr>

<div id="id_page_kuk">
	
</div>

