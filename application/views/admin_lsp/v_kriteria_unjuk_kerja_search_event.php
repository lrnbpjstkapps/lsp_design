<script text="text/javascript">
function cari_data(){		
	$("#id_form_kuk_search").submit();		
}

function dropdown_ek(){		
		var e = document.getElementById("id_uk_uuid");
		var valOpt1 = e.options[e.selectedIndex].value;
		
		$.ajax({
			type: "POST",
			dataType: "html",
			url: "<?= base_url(); ?>admin_lsp/aksiAmbilData/dropdown_ek",
			beforeSend: function (){
				//loading things
			},
			data: "uk_uuid="+valOpt1,
			success: function(msg){
				if(msg==''){				
					$("select#id_ek_uuid").html("");
				}else{
					$("select#id_ek_uuid").html(msg);
				}                                     
			}
		});
	}
	
$(document).ready(function() {
	//$("#id_page_kuk").hide();
	dropdown_ek();
			
	$("#id_form_kuk_search").validate({
		rules: {
			
		},
		submitHandler: function(form){			
			$.ajax({
				url: '<?= base_url(); ?>admin_lsp/kriteria_unjuk_kerja/hasil_pencarian',
				type: 'POST',
				data: new FormData($("#id_form_kuk_search")[0]),
				beforeSend: function (){
					//loading's thing
				},
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){					
					$("#id_page_kuk").html(data);
					$("#id_page_kuk").show();
				}
			});
			return false;
		}
	});
});
</script>