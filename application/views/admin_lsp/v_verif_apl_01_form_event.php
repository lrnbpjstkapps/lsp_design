<script text="text/javascript">
	var table;
	var validator;
	var save_method = '<?php echo $saveMethod; ?>';
	
	function reloadDt()
		{
			table.ajax.reload(null,false); 
		}
	
	function verifDt()
		{	
			url = "<?php echo $ajax_url[180]; ?>";	
			
			if ($("#<?php echo $form_id[140]; ?>").valid()) {
				$("#<?php echo $form_id[116]; ?>").load("<?php echo $ajax_url[174]; ?>");
				$("#<?php echo $form_id[140]; ?>").submit();
			}				
		}
		
	function reloadDt()
		{
			table.ajax.reload(null,false); 
		}
		
	$(document).ready(function() {		
		setDt102();
		dropdown1();
		dropdown2();
		
		validator = $("#<?php echo $form_id[140]; ?>").validate({
			ignore: [],
			submitHandler: function (form)
				{
					$.ajax({
						url			: url,
						type		: 'POST',
						data		: new FormData($("#<?php echo $form_id[140]; ?>")[0]),
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
		
		$(':radio:not(:checked)').attr('disabled', true);
		$('#rekomendasi_diterima').attr('disabled', false);
		$('#rekomendasi_tidak_diterima').attr('disabled', false);
		
		$('#<?php echo $form_id[101]; ?>').prop("disabled", true);
		$('#<?php echo $form_id[173]; ?>').prop("disabled", true);
		});
	
	function setDt102()
		{				
			var select_id 	= document.getElementById('<?php echo $form_id[101]; ?>');
			var param 		= select_id.options[select_id.selectedIndex].value;
			
			$.ajax({
				type: "POST",
				dataType: "html",
				url: "<?php echo $ajax_url[177]; ?>",
				data: "<?php echo $form_name[102]; ?>="+param,
				success: function(msg){
					document.getElementById('<?php echo $form_id[102]; ?>').value = msg;                  
				}
			});	
			
			dropdown1();			
		}
		
	function dropdown1()
		{		
			if ($("#<?php echo $form_id[115]; ?>").hasClass("error")) {
				$('#<?php echo $form_id[115]; ?>').removeClass('error');
				$("#<?php echo $form_id[115]; ?>").css("display", "block");
			}
				
			var e 		= document.getElementById("<?php echo $form_id[101]; ?>");
			var valOpt1 = e.options[e.selectedIndex].value;
			
			$.ajax({
				type: "POST",
				dataType: "html",
				url: "<?php echo $ajax_url[178]; ?>",
				beforeSend: function (){
					//loading things
				},
				data: 
					{
						"<?php echo $form_name[102]; ?>": valOpt1,
						"<?php echo $form_name[134]; ?>": '<?php echo $$form_name[134]; ?>'
					},
				success: function(msg){
					if(msg==''){				
						$("#box_unit_kompetensi").html("Tidak ada data");
					}else{
						$("#box_unit_kompetensi").html(msg);
					}                                     
				}
			});						
		}	
		
	function dropdown2()
		{					
			$.ajax({
				type: "POST",
				dataType: "html",
				url: "<?php echo $ajax_url[179]; ?>",
				beforeSend: function (){
					//loading things
				},
				data: 
					{
						"<?php echo $form_name[140]; ?>": 'd8c702c5-4e7f-11e8-bf00-00ff0b0c062f',
						"<?php echo $form_name[134]; ?>": '<?php echo $$form_name[134]; ?>'
					},
				success: function(msg){
					if(msg==''){				
						$("#box_bukti_kelengkapan").html("");
					}else{
						$("#box_bukti_kelengkapan").html(msg);
					}                                     
				}
			});						
		}
	
</script>