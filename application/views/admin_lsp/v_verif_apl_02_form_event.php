<script text="text/javascript">
	var table;
	var url;
	var validator;
	var save_method = '<?php echo $saveMethod; ?>';
	
	function verifDt()
		{	
			url = "<?php echo $ajax_url[188]; ?>";	
			
			if ($("#<?php echo $form_id[141]; ?>").valid()) {
				$("#<?php echo $form_id[116]; ?>").load("<?php echo $ajax_url[182]; ?>");
				$("#<?php echo $form_id[141]; ?>").submit();
			}				
		}
		
	$(document).ready(function() {	
		$(':radio:not(:checked)').attr('disabled', true);
		
		validator = $("#<?php echo $form_id[141]; ?>").validate({
			rules: 
				{
					<?php echo $form_name[264]; ?>: 
						{
							required: true
						}
				}, 
			messages:
				{
					
				},
			submitHandler: function (form)
				{
					$.ajax({
						url			: url,
						type		: 'POST',
						data		: new FormData($("#<?php echo $form_id[141]; ?>")[0]),
						cache		: false,
						contentType	: false,
						processData	: false,
						success		: function(data){
							if(data=="1"){		
								alertify.success('<?php echo $validationMsg[115]; ?>');
							}else{
								alertify.error('<?php echo $validationMsg[116]; ?>');
							}						
						}
					});
					return false;
				}
		});
	});
</script>