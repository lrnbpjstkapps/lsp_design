<form id="<?php echo $form_id[181]; ?>">
	<input type = "hidden" name = "<?php echo $form_name[134]; ?>" value = "<?php echo $$form_name[134]; ?>">
	<input type = "hidden" name = "<?php echo $form_name[102]; ?>" value = "<?php echo $$form_name[102]; ?>"> 
	<input type = "hidden" name = "<?php echo $form_name[146]; ?>" value = "<?php echo $$form_name[146]; ?>">
	<input type = "hidden" name = "<?php echo $form_name[150]; ?>" value = "<?php echo $$form_name[150]; ?>">
	<input type = "hidden" name = "<?php echo $form_name[149]; ?>" value = "<?php echo $$form_name[149]; ?>">
	
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
								<td>
									<?php echo ($i+1); ?>
								</td>
								<?php 
									if($unit_kompetensi == null){
										$unit_kompetensi = $row->JUDUL_UK;
										echo '<td>'.$row->JUDUL_UK.'</td>';
									}else{
										if($unit_kompetensi == $row->JUDUL_UK){												
											echo '<td class="border-0"></td>'; 
										}else{
											$unit_kompetensi = $row->JUDUL_UK;
											echo '<td>'.$row->JUDUL_UK.'</td>';
										}
									}										
								?>
								<td>
									<?php echo $row->PERTANYAAN; ?>
								</td>
								
								<?php if(${$form_name[173]}[$i] == '1'){ ?>
									<td>
										<input type = "radio" name = "<?php echo $form_name[173].'['.$i.']'; ?>" id = "<?php echo $form_id[179]; ?>" value = "1" checked>
									</td>
									<td>
										<input type = "radio" name = "<?php echo $form_name[173].'['.$i.']'; ?>" id = "<?php echo $form_id[179]; ?>" value = "0"> 
									</td>
								<?php } else if(${$form_name[173]}[$i] == '0'){ ?>
									<td>
										<input type = "radio" name = "<?php echo $form_name[173].'['.$i.']'; ?>" id = "<?php echo $form_id[179]; ?>" value = "1">
									</td>
									<td>
										<input type = "radio" name = "<?php echo $form_name[173].'['.$i.']'; ?>" id = "<?php echo $form_id[179]; ?>" value = "0" checked> 
									</td>
								<?php } else {?>									
									<td>
										<input type = "radio" name = "<?php echo $form_name[173].'['.$i.']'; ?>" id = "<?php echo $form_id[179]; ?>" value = "1">
									</td>
									<td>
										<input type = "radio" name = "<?php echo $form_name[173].'['.$i.']'; ?>" id = "<?php echo $form_id[179]; ?>" value = "0"> 
									</td>
								<?php } ?>
								
								<td>								
									<select multiple="multiple" name="<?php echo $form_name[136].'['.$i.'][]'; ?>" id="<?php echo $form_id[173]; ?>">															
										<?php foreach($listBukti->result() as $row){ ?>
											<?php if(in_array($row->UUID_BUKTI, ${$form_name[136]}[$i])){ ?>
												<option value = "<?php echo $row->UUID_BUKTI; ?>" selected> <?php echo $row->KETERANGAN; ?></option>
											<?php }else{ ?>
												<option value = "<?php echo $row->UUID_BUKTI; ?>"> <?php echo $row->KETERANGAN; ?></option>
											<?php } ?>
										<?php } ?>
									</select>								
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

<script text="text/javascript">
	$('select#<?php echo $form_id[173]; ?>').multipleSelect({width: '100%'});
	var validator;
	var save_method = '<?php echo $saveMethod; ?>';
	
	function saveDt()
		{	
			if(save_method == 'add') {
				url = "<?php echo $ajax_url[149]; ?>";	
				
				if ($("#<?php echo $form_id[181]; ?>").valid()) {
					$("#<?php echo $form_id[116]; ?>").load("<?php echo $ajax_url[145]; ?>");
					$("#<?php echo $form_id[181]; ?>").submit();
				}				
			} else {				
				url = "<?php echo $ajax_url[150]; ?>";
				
				if ($("#<?php echo $form_id[181]; ?>").valid()) {
					alertify.confirm('<?php echo $validationMsg[112]; ?>', function(){
						$("#<?php echo $form_id[116]; ?>").load("<?php echo $ajax_url[145]; ?>");
						$("#<?php echo $form_id[181]; ?>").submit();						
					}).setting({
						'labels'	: {
							ok		: '<?php echo $form_button[102]; ?>',
							cancel	: '<?php echo $form_button[103]; ?>'
						}
					}).setHeader('<?php echo $form_title[103]; ?>').show();					
				}
			}						
		}
		
	$(document).ready(function() {	
		<?php 
			if($listKUK->num_rows()==0)
				{
				?>
					$("#<?php echo $form_id[180]; ?>").attr('onClick','').unbind('click');
					$('#<?php echo $form_id[180]; ?>').attr('disabled', 'disable');
				<?php
				}
			else
				{
				?>
					$("#<?php echo $form_id[180]; ?>").attr('onClick', 'saveDt();');
					$('#<?php echo $form_id[180]; ?>').removeAttr('disabled');
				<?php
				}
		?>
			
		validator = $("#<?php echo $form_id[181]; ?>").validate({
			submitHandler: function (form)
				{
					$.ajax({
						url			: url,
						type		: 'POST',
						data		: new FormData($("#<?php echo $form_id[181]; ?>")[0]),
						cache		: false,
						contentType	: false,
						processData	: false,
						success		: function(data){		
							if(save_method == "add"){
								if(data=="1"){		
									alertify.success('<?php echo $validationMsg[106]; ?>');
								}else{
									alertify.error('<?php echo $validationMsg[107]; ?>');
								}	
							}else{
								if(data=="1"){		
									alertify.success('<?php echo $validationMsg[108]; ?>');
								}else{
									alertify.error('<?php echo $validationMsg[109]; ?>');
								}
							}							
						}
					});
					return false;
				}
		});		
	});
</script>