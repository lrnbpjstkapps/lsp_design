	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Beranda</a></li>
		<li class="breadcrumb-item"><a href="#">FR-APL-01</a></li>
		<li class="breadcrumb-item active" aria-current="page">Tambah</li>
	  </ol>
	</nav>
	
	<?php if($saveMethod=="add"){ ?>
	  <h3 class="box-title"> <?php echo $menu_title[106]; ?> </h3>
	<?php }else{ ?>
	  <h3 class="box-title"> <?php echo $menu_title[107]; ?> </h3>
	<?php } ?>
	
	<form id="<?php echo $form_id[136]; ?>">                
		<input type="hidden" name="<?php echo $form_name[134]; ?>" value="<?php echo $$form_name[134]; ?>" id="<?php echo $form_id[139]; ?>"/> 
	<!-- Bagian 1 : Rincian Data Asesi -->
		<h4> Bagian 1 : Rincian Data Asesi </h4>
		<p> Pada bagian ini, cantumkan data pribadi, data pendidikan formal serta data pekerjaan anda pada saat ini. </p>		
	
		<!-- a. Data Pribadi -->
		<h5 style="margin-bottom: 10px;"> <b> a. Data Pribadi </b> </h5>	
		<div class="row">
			<div class="col-md-6">
				<!-- Nama lengkap -->
				<div class="form-group">
					<label> Nama lengkap </label>
					<input name="<?php echo $form_name[115]; ?>" value="<?php echo $$form_name[115]; ?>" id="<?php echo $form_id[140]; ?>" class="form-control" type="text">
					<span class="help-block"></span>
				</div>	
				
				<!-- Tempat Lahir -->
				<div class="form-group">
					<label> Tempat Lahir </label>
					<input name="<?php echo $form_name[116]; ?>" value="<?php echo $$form_name[116]; ?>" id="<?php echo $form_id[141]; ?>" class="form-control" type="text">
					<span class="help-block"></span>
				</div>	

				<!-- Tanggal Lahir -->
				<div class="form-group">
					<label> Tanggal Lahir </label>
					<input name="<?php echo $form_name[117]; ?>" value="<?php echo $$form_name[117]; ?>" id="<?php echo $form_id[142]; ?>" class="form-control" placeholder="yyyy-mm-dd" data-date-format='yyyy-mm-dd'>
					<span class="help-block"></span>
				</div>						

				<!-- Jenis kelamin -->
				<div class="form-group">
					<label> Jenis kelamin </label>
					<div>
						<?php if($$form_name[118] == 'Wanita'){ ?>									
							<label>									
								<input type="radio" name="<?php echo $form_name[118]; ?>" id="<?php echo $form_id[143]; ?>" value="Laki - laki">
								Laki - laki
							</label>
							&nbsp
							<label>
								<input type="radio" name="<?php echo $form_name[118]; ?>" id="<?php echo $form_id[163]; ?>" value="Wanita" checked>
								Wanita
							</label>
						<?php }else{ ?> 
							<label>									
								<input type="radio" name="<?php echo $form_name[118]; ?>" id="<?php echo $form_id[143]; ?>" value="Laki - laki" checked>
								Laki - laki
							</label>
							&nbsp
							<label>
								<input type="radio" name="<?php echo $form_name[118]; ?>" id="<?php echo $form_id[163]; ?>" value="Wanita">
								Wanita
							</label>
						<?php } ?>							
					</div>		  
				</div>	

				<!-- Kebangsaan -->
				<div class="form-group">
					<label> Kebangsaan </label>
					<input name="<?php echo $form_name[119]; ?>" value="<?php echo $$form_name[119]; ?>" id="<?php echo $form_id[144]; ?>" class="form-control" type="text">
					<span class="help-block"></span>
				</div>	

				<!-- Alamat Rumah -->
				<div class="form-group">
					<label> Alamat rumah </label>
					<textarea name="<?php echo $form_name[120]; ?>" id="<?php echo $form_id[145]; ?>" class="form-control" rows="3" style="resize:none"><?php echo $$form_name[120]; ?></textarea>
					<span class="help-block"></span>
				</div>					
			</div>
			
			<div class = "col-md-6">		
				<!-- Kode pos Rumah-->
				<div class="form-group">
					<label> Kode pos Rumah </label>
					<input name="<?php echo $form_name[121]; ?>" value="<?php echo $$form_name[121]; ?>" id="<?php echo $form_id[146]; ?>" class="form-control" type="number">
					<span class="help-block"></span>
				</div>	
				
				<!-- No. Telepon Rumah -->
				<div class="form-group">
					<label> No. Telepon Rumah </label>
					<input name="<?php echo $form_name[122]; ?>" value="<?php echo $$form_name[122]; ?>" id="<?php echo $form_id[147]; ?>" class="form-control" type="number">
					<span class="help-block"></span>
				</div>	
				
				<!-- HP -->
				<div class="form-group">
					<label> HP </label>
					<input name="<?php echo $form_name[123]; ?>" value="<?php echo $$form_name[123]; ?>" id="<?php echo $form_id[148]; ?>" class="form-control" type="number">
					<span class="help-block"></span>
				</div>	
				
				<!-- E-mail Pribadi-->
				<div class="form-group">
					<label> E-mail </label>
					<input name="<?php echo $form_name[124]; ?>" value="<?php echo $$form_name[124]; ?>" id="<?php echo $form_id[149]; ?>" class="form-control" type="email">
					<span class="help-block"></span>
				</div>
				
				<!-- Pendidikan Terakhir -->
				<div class="form-group">
					<label> Pendidikan Terakhir </label>
					<input name="<?php echo $form_name[125]; ?>" value="<?php echo $$form_name[125]; ?>" id="<?php echo $form_id[150]; ?>" class="form-control" type="text">
					<span class="help-block"></span>
				</div>
			</div>
		</div>
		
		<!-- b. Data Pekerjaan Sekarang -->
		</br><h5 style="margin-bottom: 10px;"> <b> b. Data Pekerjaan Sekarang </b> </h5>
		<div class="row">
			<div class="col-md-6">
				<!-- Nama Lembaga/Perusahaan -->
				<div class="form-group">
					<label> Nama Lembaga / Perusahaan </label>
					<input name="<?php echo $form_name[126]; ?>" value="<?php echo $$form_name[126]; ?>" id="<?php echo $form_id[151]; ?>" class="form-control" type="text">
					<span class="help-block"></span>
				</div>	

				<!-- Jabatan -->
				<div class="form-group">
					<label> Jabatan </label>
					<input name="<?php echo $form_name[127]; ?>" value="<?php echo $$form_name[127]; ?>" id="<?php echo $form_id[152]; ?>" class="form-control" type="text">
					<span class="help-block"></span>
				</div>						
				
				<!-- Alamat kantor -->
				<div class="form-group">
					<label> Alamat kantor </label>
					<textarea name="<?php echo $form_name[128]; ?>" id="<?php echo $form_id[153]; ?>" class="form-control" rows="5" style="resize:none"><?php echo $$form_name[128]; ?></textarea>
					<span class="help-block"></span>
				</div>	
			</div>
			
			<div class = "col-md-6">
				<!-- Kode Pos Kantor -->
				<div class="form-group">
					<label> Kode pos Kantor </label>
					<input name="<?php echo $form_name[129]; ?>" value="<?php echo $$form_name[129]; ?>" id="<?php echo $form_id[154]; ?>" class="form-control" type="number">
					<span class="help-block"></span>
				</div>
				
				<!-- No. Telepon Kantor -->
				<div class="form-group">
					<label> No. Telepon Kantor </label>
					<input name="<?php echo $form_name[130]; ?>" value="<?php echo $$form_name[130]; ?>" id="<?php echo $form_id[155]; ?>" class="form-control" type="number">
					<span class="help-block"></span>
				</div>	
				
				<!-- Fax -->
				<div class="form-group">
					<label> Fax </label>
					<input name="<?php echo $form_name[131]; ?>" value="<?php echo $$form_name[131]; ?>" id="<?php echo $form_id[156]; ?>" class="form-control" type="number">
					<span class="help-block"></span>
				</div>
				
				<!-- E-mail Kantor -->
				<div class="form-group">
					<label> E-mail </label>
					<input name="<?php echo $form_name[132]; ?>" value="<?php echo $$form_name[132]; ?>" id="<?php echo $form_id[157]; ?>" class="form-control" type="email">
					<span class="help-block"></span>
				</div>
			</div>
		</div>
		
	<!-- Bagian 2 : Data Sertifikasi -->
		</br><h4 class="page-header"> Bagian 2 : Data Sertifikasi </h4>
		<p> Pada bagian 2 ini berisikan Unit Kompetensi yang anda ajukan untuk dinilai/diuji kompetensi dalam rangka mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki. Unit kompetensi yang diajukan sesuai dengan skema sertifikasi </p>
		<div class="row">
			<div class="col-md-6">
				<!-- Judul Skema sertifikasi -->
				<div class="form-group">
					<label> Skema Sertifikasi </label>
					<select name="<?php echo $form_name[102]; ?>" id="<?php echo $form_id[101]; ?>" onclick="setDt102()" class="form-control">
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
					<label> Nomor </label>
					<input name="<?php echo $form_name[101]; ?>" value="<?php echo $$form_name[101]; ?>" id="<?php echo $form_id[102]; ?>" class="form-control" type="text" readonly>
					<span class="help-block"></span>
				</div>
				
				<!-- Unit Kompetensi yang diujikan -->
				<div class="form-group">
					<label> Unit Kompetensi </label>
					<select multiple="multiple" name="<?php echo $form_name[143]; ?>" value="<?php echo $$form_name[105]; ?>" id="<?php echo $form_id[115]; ?>"></select>
				</div>	

				<!-- Tujuan asesmen -->
				<div class="form-group">
					<label> Tujuan asesmen </label>
					<div>
						<input type="radio" name="<?php echo $form_name[133]; ?>" value = "Sertifikasi" onchange="disableTujuanText()" <?php if ($$form_name[133] == 'Sertifikasi'){ echo 'checked'; } ?>> Sertifikasi
						&nbsp <input type="radio" name="<?php echo $form_name[133]; ?>" value = "Sertifikasi Ulang" onchange="disableTujuanText()" <?php if ($$form_name[133] == 'Sertifikasi  Ulang'){ echo 'checked'; } ?>> Sertifikasi Ulang
						&nbsp <input type="radio" name="<?php echo $form_name[133]; ?>" id="<?php echo $form_id[162]; ?>" value = "Lainnya" onchange="disableTujuanText()" <?php if ($$form_name[133] == 'Lainnya'){ echo 'checked'; } ?>> Lainnya:
						</br></br><input name="<?php echo $form_name[141]; ?>" value="<?php echo $$form_name[141]; ?>" id="<?php echo $form_id[164]; ?>" class="form-control" type="text">
					</div>
				</div>
			</div>
		</div>
				
	<!-- Bagian 3 : Bukti Kelengkapan Pemohon -->
		</br><h4 class="page-header"> Bagian 3 : Bukti Kelengkapan Pemohon </h4>
		<p> Pada bagian ini, asesi diminta untuk memenuhi persyaratan skema sertifikasi. Tuliskan bukti-bukti paling relevan dari rincian pendidikan/pengalaman kerja sesuai dengan <b><i>judul unit kompetensi</i></b> yang diajukan pada kolom <b><i>bukti*</i></b> pada tabel di bawah ini dan lampirkan data-data/dokumen.
		</br></br> Untuk selanjutnya bagian sertifikasi LSP atau asesor kompetensi akan menilai kesesuaian bukti-bukti yang diajukan oleh pemohon sebelum mengikuti asesmen kompetensi dengan bukti-bukti yang tertuang dalam persyaratan skema sertifikasi. </p>
				
		<div class="row">
			<div class="col-md-6">
				<!-- Bukti Kelengkapan Pemohon -->
				<div class="form-group">
					<label> File </label>
					<select multiple="multiple" name="<?php echo $form_name[139]; ?>" value="<?php echo $$form_name[136]; ?>" id="<?php echo $form_id[173]; ?>"></select>
				</div>					
			</div>
		</div>
		
	</form>	
	
	<div class = "row float-right">
		<table>
			<tr>
				<td>
					<button onClick="saveDt()" class="btn btn-primary"> <?php echo $form_button[101]; ?> </button>
				</td>
				<td>
					<button onClick="pagingList()" class="btn btn-danger"> <?php echo $form_button[103]; ?> </button>
				</td>					
			</tr>		
		</table>
	</div>