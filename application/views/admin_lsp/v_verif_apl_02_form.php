	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Beranda</a></li>
		<li class="breadcrumb-item"><a href="fr_apl_01">FR-APL-02</a></li>
		<li class="breadcrumb-item active" aria-current="page">Verifikasi</li>
	  </ol>
	</nav>
	
	<h3 class="box-title"> <?php echo $menu_title[125]; ?> </h3>
	
	<form id="<?php echo $form_id[141]; ?>">
		<input type = "hidden" name = "<?php echo $form_name[134]; ?>" value = "<?php echo $$form_name[134]; ?>"> <!-- UUID_APL_01 -->
		<input type = "hidden" name = "<?php echo $form_name[146]; ?>" value = "<?php echo $$form_name[146]; ?>"> <!-- UUID_APL_02 -->
		<input type = "hidden" name = "<?php echo $form_name[150]; ?>" value = "<?php echo $$form_name[150]; ?>"> <!-- NO ASESMEN -->
		<input type = "hidden" name = "<?php echo $form_name[149]; ?>" value = "<?php echo $$form_name[149]; ?>"> <!-- UUID ADM -->
	
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
				
				<!-- Asesor -->
				<div class="form-group">
					<label> Asesor </label>
					<select name="<?php echo $form_name[147]; ?>" class="form-control">		
						<?php foreach($listAsesor->result() as $row){ ?>
							<option value = "<?php echo $row->UUID_USER; ?>" selected><?php echo $row->USER_NAME; ?></option>
						<?php } ?>
					</select>
					<span class="help-block"></span>
				</div>
				
				<!-- Manajer Sertifikasi -->
				<div class="form-group">
					<label> Manajer Sertifikasi </label>
					<select name="<?php echo $form_name[154]; ?>" id="" class="form-control">		
						<?php foreach($listManajSert->result() as $row){ ?>
							<option value = "<?php echo $row->UUID_USER; ?>" selected><?php echo $row->USER_NAME; ?></option>
						<?php } ?>
					</select>
					<span class="help-block"></span>
				</div>
			</div>
				
			<div class="col-md-6"> 
				<!-- TUK -->
				<div class="form-group">
					<label> TUK </label>
					<select name="<?php echo $form_name[148]; ?>" class="form-control">			
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
				
				<!-- Koordinator TUK -->
				<div class="form-group">
					<label> Koordinator TUK </label>
					<select name="<?php echo $form_name[153]; ?>" id="" class="form-control">		
						<?php foreach($listKoorTUK->result() as $row){ ?>
							<option value = "<?php echo $row->UUID_USER; ?>" selected><?php echo $row->USER_NAME; ?></option>
						<?php } ?>
					</select>
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
				
		<div class = "table-responsive">
			<?php if($listKUK->num_rows() > 0){ ?>
				<table class = "table table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th rowspan="2"> # </th>
							<th rowspan="2"> Judul Unit Kompetensi </th>
							<th rowspan="2"> Daftar Pertanyaan </br>(Asesmen Mandiri/Self Assessment) </th>
							<th colspan = "2"> Penilaian </th>
							<th rowspan="2" style="width: 15%"> Bukti - bukti Pendukung </th>
							<th class="sorting_disabled" align = "center" rowspan="2"> &nbsp </th>
							<th class="sorting_disabled" align = "center" rowspan="2"> &nbsp </th>
						</tr>
						<tr>							
							<th> K </th>
							<th> BK </th>
						</tr>
					</thead>		
					<tbody>
						<?php 
							$i 					= 0;		
							$unit_kompetensi 	= null;
							foreach($listKUK->result() as $row){ ?>
								<input type = "hidden" name = "<?php echo $form_name[143]; ?>" value = "<?php echo $row->UUID_UK; ?>">
								<input type = "hidden" name = "<?php echo $form_name[178]; ?>" value = "<?php echo $row->UUID_KUK; ?>">
								<input type = "hidden" name = "<?php echo $form_name[177]; ?>" value = "<?php echo $row->UUID_EK; ?>">
								<tr>
									<td class = "align-middle">
										<?php echo ($i+1); ?>
									</td>
									<?php 
										if($unit_kompetensi == null){
											$unit_kompetensi = $row->JUDUL_UK;
											echo '<td class = "align-middle">'.$row->JUDUL_UK.'</td>';
										}else{
											if($unit_kompetensi == $row->JUDUL_UK){												
												echo '<td class="border-0"></td>'; 
											}else{
												$unit_kompetensi = $row->JUDUL_UK;
												echo '<td class = "align-middle">'.$row->JUDUL_UK.'</td>';
											}
										}										
									?>
									<td class = "align-middle">
										<?php echo $row->PERTANYAAN; ?>
									</td>
									
									<?php if(${$form_name[173]}[$i] == '1'){ ?>
										<td class = "align-middle">
											<input type = "radio" name = "<?php echo $form_name[173].'['.$i.']'; ?>" id = "<?php echo $form_id[179]; ?>" value = "1" checked>
										</td>
										<td class = "align-middle">
											<input type = "radio" name = "<?php echo $form_name[173].'['.$i.']'; ?>" id = "<?php echo $form_id[179]; ?>" value = "0"> 
										</td>
									<?php } else if(${$form_name[173]}[$i] == '0'){ ?>
										<td class = "align-middle">
											<input type = "radio" name = "<?php echo $form_name[173].'['.$i.']'; ?>" id = "<?php echo $form_id[179]; ?>" value = "1">
										</td>
										<td class = "align-middle">
											<input type = "radio" name = "<?php echo $form_name[173].'['.$i.']'; ?>" id = "<?php echo $form_id[179]; ?>" value = "0" checked> 
										</td>
									<?php } else {?>									
										<td class = "align-middle">
											<input type = "radio" name = "<?php echo $form_name[173].'['.$i.']'; ?>" id = "<?php echo $form_id[179]; ?>" value = "1">
										</td>
										<td class = "align-middle">
											<input type = "radio" name = "<?php echo $form_name[173].'['.$i.']'; ?>" id = "<?php echo $form_id[179]; ?>" value = "0"> 
										</td>
									<?php } ?>
									
									<td class = "align-middle">	
										<?php $jmlBukti = 0; ?>
										<?php foreach($listBukti->result() as $row){ ?>
												<?php if(in_array($row->UUID_BUKTI, ${$form_name[136]}[$i])){ 
													echo '<a href="'.base_url().$row->URL.'" target="_blank"><i class="fa fa-file-pdf-o"></i> '.$row->KETERANGAN.'</a></br>'; 
													$jmlBukti++;
												}?>
										<?php } 
											if($jmlBukti == 0){
												echo '-'; 
											}
										?>								
									</td>								
								</tr>					
						<?php 
								$i++; 
							} 
						?>
					</tbody>
				</table>
			<?php } ?>
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