<script text="text/javascript">
function cari_data(){		
		$("#id_form_ek_search").submit();		
	}

$(document).ready(function() {
	$("#id_page_ek").hide();
			
	$("#id_form_ek_search").validate({
		rules: {
			
		},
		submitHandler: function(form){			
			$.ajax({
				url: '<?= base_url(); ?>admin_lsp/elemen_kompetensi/hasil_pencarian',
				type: 'POST',
				data: new FormData($("#id_form_ek_search")[0]),
				beforeSend: function (){
					//loading's thing
				},
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){					
					$("#id_page_ek").html(data);
					$("#id_page_ek").show();
				}
			});
			return false;
		}
	});
});
</script>