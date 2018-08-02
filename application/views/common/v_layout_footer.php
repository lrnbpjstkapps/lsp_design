		</div> <!-- /container -->
		<script text="text/javascript">
			$('.select2').select2();
			
			jQuery.validator.addMethod("notEqualPassword", function(value, element, param) {
			  return this.optional(element) || value != $(param).val();
			}, "Password baru tidak sama dengan password lama");

			jQuery.validator.addMethod("alphanumeric", function(value, element) {
				return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
			}, "Masukkan hanya huruf dan angka."); 
			
			jQuery.validator.addMethod("alphanumericunderscores", function(value, element) {
				return this.optional(element) || /^[a-zA-Z0-9_.]+$/.test(value);
			}, "Masukkan hanya huruf, angka, titik, dan garis bawah .");
			
			$.validator.addMethod('filesize', function (value, element, param) {
				return this.optional(element) || (element.files[0].size <= param)
			}, 'Ukuran file melebihi batas.');
		</script>
	</body>
</html>