<script text="text/javascript">
	$(document).ready(function() {				
		setDt134();
	});
	
	function setDt134()
		{			
			var uuidApl01 = '<?php echo $$form_name[134]; ?>';

			if(uuidApl01 != "")
				{
					$.ajax({
						type: "POST",
						dataType: "JSON",
						url: "<?php echo $ajax_url[147]; ?>",
						data: "<?php echo $form_name[134]; ?>="+uuidApl01,
						success: function(data){            
							$("#<?php echo $form_id[117]; ?>").load("<?php echo $ajax_url[148]; ?>"+uuidApl01+"/"+data.UUID_SKEMA+"/"+'<?php echo $saveMethod; ?>'+'/'+'<?php echo $$form_name[146]; ?>'+'/'+'<?php echo $$form_name[149]; ?>'+'/'+'<?php echo $$form_name[150]; ?>');
							$('select#<?php echo $form_id[173]; ?>').multipleSelect({width: '100%'});
							$('#<?php echo $form_id[180]; ?>').attr('onClick', 'saveDt();');
							$('#<?php echo $form_id[180]; ?>').removeAttr('disabled');
						}
					});			
				}
			else{
				$("#<?php echo $form_id[117]; ?>").html("");
				$('#<?php echo $form_id[180]; ?>').attr('onclick','').unbind('click');
				$('#<?php echo $form_id[180]; ?>').attr('disabled','disabled');
			}
		}
</script>