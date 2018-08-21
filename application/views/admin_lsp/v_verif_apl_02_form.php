	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Beranda</a></li>
		<li class="breadcrumb-item"><a href="fr_apl_01">FR-APL-02</a></li>
		<li class="breadcrumb-item active" aria-current="page">Verifikasi</li>
	  </ol>
	</nav>
	
	<h3 class="box-title"> <?php echo $menu_title[125]; ?> </h3>
	
	<form>
		<div class="row">                
			<div class="col-md-6">  									
				<!-- Judul Skema sertifikasi -->
				<div class="form-group">
					<label> Judul Skema Sertifikasi </label>
					<input name="<?php echo $form_name[100]; ?>" value="<?php echo $$form_name[100]; ?>" class="form-control" type="text" readonly>
					<span class="help-block"></span>
				</div>
				
				<!-- Nomor Skema sertifikasi -->
				<div class="form-group">
					<label> Nomor Skema Sertifikasi </label>
					<input name="<?php echo $form_name[101]; ?>" value="<?php echo $$form_name[101]; ?>" class="form-control" type="text" readonly>
					<span class="help-block"></span>
				</div>
			</div>
				
			<div class="col-md-6"> 
				<!-- TUK -->
				<div class="form-group">
					<label> TUK </label>
					<select name="" id="" class="form-control">			
						<option value = "Sewaktu"> Sewaktu</option>
						<option value = "Tempat Kerja"> Tempat Kerja</option>
						<option value = "Mandiri"> Mandiri</option>
					</select>
					<span class="help-block"></span>
				</div>
				
				<!-- Nama Peserta -->
				<div class="form-group">
					<label> Nama Peserta </label>
					<input name="<?php echo $form_name[115]; ?>" value="<?php echo $$form_name[115]; ?>" class="form-control" type="text" readonly>
					<span class="help-block"></span>
				</div>
			</div>
		</div>
		
		<hr>
				
		<p> 
			Peserta diminta untuk:
			</br>1. Mempelajari Kriteria Unjuk Kerja (KUK), Batasan Variabel, Panduan Penilaian, dan Aspek Kritis seluruh Unit Kompetensi yang diminta untuk di Ases.
			</br>2. Melaksanakan Penilaian Mandiri secara obyektif atas sejumlah pertanyaan yang diajukan, bilamana Anda menilai diri sudah kompeten atas pertanyaan tersebut, pilih kolom Kompeten (K), dan bilamana Anda menilai diri belum kompeten pilih kolom Belum Kompeten (BK). 
			</br>3. Mengisi bukti - bukti kompetensi yang relevan atas  sejumlah pertanyaan yang dinyatakan Kompeten (bila ada). 		
			</br>4. Menandatangani form Asesmen Mandiri
		</p>		
				
		<div id="<?php echo $form_id[117]; ?>">
			
		</div>
	</form>
	
	<div class = "row float-right">
		<table>
			<tr>
				<td>
					<button onClick="verifDt()" class="btn btn-primary"> <?php echo $form_button[108]; ?> </button>
				</td>
				<td>
					<button onClick="pagingList()" class="btn btn-danger"> <?php echo $form_button[103]; ?> </button>
				</td>					
			</tr>		
		</table>
	</div>
	</br></br>