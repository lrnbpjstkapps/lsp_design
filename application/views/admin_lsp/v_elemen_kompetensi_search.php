<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="#">Beranda</a></li>
	<li class="breadcrumb-item active" aria-current="page">Elemen Kompetensi</li>
  </ol>
</nav>

<h3 class="box-title"> Elemen Kompetensi </h3>

<div class = "alert alert-info" role = "alert"> 
	<form id="id_form_ek_search">  
		<div class="form-group">
			<div class="row">
				<div class="col-md-2">
					<label> Unit Kompetensi </label>
				</div>
				<div class="col-md-7">
				  <select class="form-control select2" style="width: 100%;" name="uk_uuid"> 
					<?php foreach($lis_uk->result() as $row){ ?>
						<option value = "<?php echo $row->UUID_UK; ?>"><?php echo $row->KODE_UK." - ".$row->JUDUL_UK; ?></option>
					<?php } ?>						
				  </select>
				</div>
				<div class="col-md-3">
					<button type="button" class="btn btn-danger float-right" onclick="cari_data()"> Cari </button>
				</div>
			</div>
		</div>     
	</form>	
</div>

<hr>

<div id="id_page_ek">
	
</div>

