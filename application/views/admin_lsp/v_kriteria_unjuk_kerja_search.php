<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="#">Beranda</a></li>
	<li class="breadcrumb-item active" aria-current="page">Kriteria Unjuk Kerja</li>
  </ol>
</nav>

<h3 class="box-title"> <?php echo $menu_title[103]; ?> </h3> 

<div class = "alert alert-info" role = "alert">		  
	<form id="<?php echo $form_id[126]; ?>">
		<div class="form-group">
			<div class="row">
				<div class="col-md-2">
					<label> Unit Kompetensi </label>
				</div>
				<div class="col-md-7">
				  <select class="form-control select2" style="width: 100%;" name="<?php echo $form_name[105]; ?>" id="<?php echo $form_id[115]; ?>" onchange="dropdown1();"> 
					<?php foreach($listUK->result() as $row){ ?>
						<option value = "<?php echo $row->UUID_UK; ?>"><?php echo $row->KODE_UK." - ".$row->JUDUL_UK; ?></option>
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
				  <select class="form-control select2" style="width: 100%;" name="<?php echo $form_name[109]; ?>" id="<?php echo $form_id[124]; ?>"></select>
				</div>
				<div class="col-md-3">
					<button type="button" class="btn btn-danger float-right" onclick="findDt()" id="<?php echo $form_id[135]; ?>"> <?php echo $form_button[104]; ?> </button>
				</div>
			</div>
		</div>
	</form>	
</div>
<hr>
<div id="<?php echo $form_id[116]; ?>">
	
</div>

