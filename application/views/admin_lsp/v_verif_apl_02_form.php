	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Beranda</a></li>
		<li class="breadcrumb-item"><a href="fr_apl_01">FR-APL-01</a></li>
		<li class="breadcrumb-item active" aria-current="page">Verifikasi</li>
	  </ol>
	</nav>
	
	<h3 class="box-title"> <?php echo $menu_title[124]; ?> </h3>
	
<!-- Bagian 1 : Rincian Data Asesi -->
	<h4> Bagian 1 : Rincian Data Asesi </h4>
	<p> Pada bagian ini, cantumkan data pribadi, data pendidikan formal serta data pekerjaan anda pada saat ini. </p>		

	<!-- a. Data Pribadi -->
	<h5 style="margin-bottom: 10px;"> a. Data Pribadi </h5>	
	<div class="row">
		<div class="col-md-6">
			<!-- Nama lengkap -->
			<div class="form-group">
				<label> Nama lengkap </label>
				<input name="<?php echo $form_name[115]; ?>" value="<?php echo $$form_name[115]; ?>" class="form-control" type="text" readonly>
				<span class="help-block"></span>
			</div>	
			
			<!-- Tempat Lahir -->
			<div class="form-group">
				<label> Tempat Lahir </label>
				<input name="<?php echo $form_name[116]; ?>" value="<?php echo $$form_name[116]; ?>" class="form-control" type="text" readonly>
				<span class="help-block"></span>
			</div>	

			<!-- Tanggal Lahir -->
			<div class="form-group">
				<label> Tanggal Lahir </label>
				<input name="<?php echo $form_name[117]; ?>" value="<?php echo $$form_name[117]; ?>" id="<?php echo $form_id[142]; ?>" class="form-control" placeholder="yyyy-mm-dd" data-date-format='yyyy-mm-dd' readonly>
				<span class="help-block"></span>
			</div>						

			<!-- Jenis kelamin -->
			<div class="form-group">
				<label> Jenis kelamin </label>
				<div>
					<?php if($$form_name[118] == 'Wanita'){ ?>									
						<label>									
							<input type="radio" name="<?php echo $form_name[118]; ?>" value="Laki - laki">
							Laki - laki
						</label>
						&nbsp
						<label>
							<input type="radio" name="<?php echo $form_name[118]; ?>" value="Wanita" checked>
							Wanita
						</label>
					<?php }else{ ?> 
						<label>									
							<input type="radio" name="<?php echo $form_name[118]; ?>" value="Laki - laki" checked>
							Laki - laki
						</label>
						&nbsp
						<label>
							<input type="radio" name="<?php echo $form_name[118]; ?>" value="Wanita">
							Wanita
						</label>
					<?php } ?>							
				</div>		  
			</div>	

			<!-- Kebangsaan -->
			<div class="form-group">
				<label> Kebangsaan </label>
				<input name="<?php echo $form_name[119]; ?>" value="<?php echo $$form_name[119]; ?>" class="form-control" type="text" readonly>
				<span class="help-block"></span>
			</div>	

			<!-- Alamat Rumah -->
			<div class="form-group">
				<label> Alamat rumah </label>
				<textarea name="<?php echo $form_name[120]; ?>" class="form-control" rows="3" style="resize:none" readonly><?php echo $$form_name[120]; ?></textarea>
				<span class="help-block"></span>
			</div>					
		</div>
		
		<div class = "col-md-6">		
			<!-- Kode pos Rumah-->
			<div class="form-group">
				<label> Kode pos Rumah </label>
				<input name="<?php echo $form_name[121]; ?>" value="<?php echo $$form_name[121]; ?>" class="form-control" type="number" readonly>
				<span class="help-block"></span>
			</div>	
			
			<!-- No. Telepon Rumah -->
			<div class="form-group">
				<label> No. Telepon Rumah </label>
				<input name="<?php echo $form_name[122]; ?>" value="<?php echo $$form_name[122]; ?>" class="form-control" type="number" readonly>
				<span class="help-block"></span>
			</div>	
			
			<!-- HP -->
			<div class="form-group">
				<label> HP </label>
				<input name="<?php echo $form_name[123]; ?>" value="<?php echo $$form_name[123]; ?>" class="form-control" type="number" readonly>
				<span class="help-block"></span>
			</div>	
			
			<!-- E-mail Pribadi-->
			<div class="form-group">
				<label> E-mail </label>
				<input name="<?php echo $form_name[124]; ?>" value="<?php echo $$form_name[124]; ?>" class="form-control" type="email" readonly>
				<span class="help-block"></span>
			</div>
			
			<!-- Pendidikan Terakhir -->
			<div class="form-group">
				<label> Pendidikan Terakhir </label>
				<input name="<?php echo $form_name[125]; ?>" value="<?php echo $$form_name[125]; ?>" class="form-control" type="text" readonly>
				<span class="help-block"></span>
			</div>
		</div>
	</div>
	
	<!-- b. Data Pekerjaan Sekarang -->
	<h5 style="margin-bottom: 10px;"> b. Data Pekerjaan Sekarang </h5>
	<div class="row">
		<div class="col-md-6">
			<!-- Nama Lembaga/Perusahaan -->
			<div class="form-group">
				<label> Nama Lembaga / Perusahaan </label>
				<input name="<?php echo $form_name[126]; ?>" value="<?php echo $$form_name[126]; ?>" class="form-control" type="text" readonly>
				<span class="help-block"></span>
			</div>	

			<!-- Jabatan -->
			<div class="form-group">
				<label> Jabatan </label>
				<input name="<?php echo $form_name[127]; ?>" value="<?php echo $$form_name[127]; ?>" class="form-control" type="text" readonly>
				<span class="help-block"></span>
			</div>						
			
			<!-- Alamat kantor -->
			<div class="form-group">
				<label> Alamat kantor </label>
				<textarea name="<?php echo $form_name[128]; ?>" class="form-control" rows="5" style="resize:none" readonly><?php echo $$form_name[128]; ?></textarea>
				<span class="help-block"></span>
			</div>	
		</div>
		
		<div class = "col-md-6">
			<!-- Kode Pos Kantor -->
			<div class="form-group">
				<label> Kode pos Kantor </label>
				<input name="<?php echo $form_name[129]; ?>" value="<?php echo $$form_name[129]; ?>" class="form-control" type="number" readonly>
				<span class="help-block"></span>
			</div>
			
			<!-- No. Telepon Kantor -->
			<div class="form-group">
				<label> No. Telepon Kantor </label>
				<input name="<?php echo $form_name[130]; ?>" value="<?php echo $$form_name[130]; ?>" class="form-control" type="number" readonly>
				<span class="help-block"></span>
			</div>	
			
			<!-- Fax -->
			<div class="form-group">
				<label> Fax </label>
				<input name="<?php echo $form_name[131]; ?>" value="<?php echo $$form_name[131]; ?>" class="form-control" type="number" readonly>
				<span class="help-block"></span>
			</div>
			
			<!-- E-mail Kantor -->
			<div class="form-group">
				<label> E-mail </label>
				<input name="<?php echo $form_name[132]; ?>" value="<?php echo $$form_name[132]; ?>" class="form-control" type="email" readonly>
				<span class="help-block"></span>
			</div>
		</div>
	</div>
	
<!-- Bagian 2 : Data Sertifikasi -->
	</br><h4 class="page-header"> Bagian 2 : Data Sertifikasi </h4>
	<p> Tuliskan Judul dan Nomor Skema Sertifikasi, Tujuan Asesmen serta Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi yang anda ajukan untuk mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.</p>
	<div class="row">
		<div class="col-md-6">
			<!-- Judul Skema sertifikasi -->
			<div class="form-group">
				<label> Judul Skema Sertifikasi </label>
				<select name="<?php echo $form_name[102]; ?>" id="<?php echo $form_id[101]; ?>" onclick="setDt102()" class="form-control" readonly>
					<?php foreach($listSkema->result() as $row){ ?>
						<?php if($$form_name[158]==$row->UUID_SKEMA){?>
							<option value = "<?php echo $row->UUID_SKEMA; ?>" selected><?php echo $row->NAMA_SKEMA; ?></option>
						<?php }else{ ?>
							<option value = "<?php echo $row->UUID_SKEMA; ?>"><?php echo $row->NAMA_SKEMA; ?></option>
						<?php } ?>
					<?php } ?>
				</select>
				<span class="help-block"></span>
			</div>	

			<!-- Nomor Skema sertifikasi -->
			<div class="form-group">
				<label> Nomor Skema Sertifikasi</label>
				<input name="<?php echo $form_name[101]; ?>" value="<?php echo $$form_name[101]; ?>" id="<?php echo $form_id[102]; ?>" class="form-control" type="text" readonly>
				<span class="help-block"></span>
			</div>
		</div>
		<div class="col-md-12">
			<!-- Unit Kompetensi yang diujikan -->
			<div class="form-group">
				<label> Daftar Unit Kompetensi: </label>
				<div id = "box_unit_kompetensi">
					
				</div>
			</div>	
		</div>
		<div class="col-md-6">
			<!-- Tujuan asesmen -->
			<div class="form-group">
				<label> Tujuan asesmen </label>
				<div>
					<input type="radio" name="<?php echo $form_name[133]; ?>" value = "Sertifikasi" onchange="disableTujuanText()" <?php if ($$form_name[133] == 'Sertifikasi' || $$form_name[133] == ''){ echo 'checked'; } ?>> Sertifikasi
					&nbsp <input type="radio" name="<?php echo $form_name[133]; ?>" value = "Sertifikasi Ulang" onchange="disableTujuanText()" <?php if ($$form_name[133] == 'Sertifikasi  Ulang'){ echo 'checked'; } ?>> Sertifikasi Ulang
					&nbsp <input type="radio" name="<?php echo $form_name[133]; ?>" id="<?php echo $form_id[162]; ?>" value = "Lainnya" <?php if ($$form_name[133] == 'Lainnya'){ echo 'checked'; } ?>> Lainnya:
					</br></br><input name="<?php echo $form_name[141]; ?>" value="<?php echo $$form_name[141]; ?>" id="<?php echo $form_id[164]; ?>" class="form-control" type="text" readonly>
				</div>
			</div>
		</div>
	</div>
			
<!-- Bagian 3 : Bukti Kelengkapan Pemohon -->
	</br><h4 class="page-header"> Bagian 3 : Bukti Kelengkapan Pemohon </h4>				
	<div class="row">
		<div class="col-md-12">
			<!-- Bukti Kelengkapan Pemohon -->
			<div class="form-group">
				<label> File: </label>
				<div id = "box_bukti_kelengkapan">
					
				</div>
			</div>					
		</div>
	</div>
	
	<hr>
	<form id="<?php echo $form_id[140]; ?>">
		<input type="hidden" name="<?php echo $form_name[134]; ?>" value="<?php echo $$form_name[134]; ?>"/> 
		<input type="hidden" name="<?php echo $form_name[149]; ?>" value="<?php echo $$form_name[149]; ?>"/> 
		<div class="form-group">
			<label> Rekomendasi </label> 
			<div>
				<input type="radio" name="<?php echo $form_name[162]; ?>" id = "rekomendasi_diterima" value="Berdasarkan ketentuan persyaratan dasar pemohon, maka pemohon diterima sebagai peserta sertifikasi"> Berdasarkan ketentuan persyaratan dasar pemohon, maka pemohon <b>diterima</b> sebagai peserta sertifikasi
				</br><input type="radio" name="<?php echo $form_name[162]; ?>" id = "rekomendasi_tidak_diterima" value="Berdasarkan ketentuan persyaratan dasar pemohon, maka pemohon diterima sebagai peserta sertifikasi"> Berdasarkan ketentuan persyaratan dasar pemohon, maka pemohon <b>tidak diterima</b> sebagai peserta sertifikasi
			</div>
			<span class="help-block"></span>
		</div>
		
		<!-- Catatan Admin LSP -->
		<div class="form-group">
			<label> Catatan Admin LSP </label>
			<textarea name="<?php echo $form_name[264]; ?>" class="form-control" rows="5" style="resize:none"></textarea>
			<span class="help-block"></span>
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