<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>LSP BPJS Ketenagakerjaan</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/validation/screen.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>	
	<script src="<?php echo base_url(); ?>assets/js/messages_id.js"></script>
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
		<!--img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>assets/image/BPJS_Ketenagakerjaan_logo.png" alt="" width="400" height="92"-->
        <img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>assets/image/LSP_logo.png" alt="" width="510" height="142">
        <p class="lead"><i>"BPJS Ketenagakerjaan selaku penyelenggara program Jaminan Sosial Ketenagakerjaan mendirikan LSP bagi masyarakat yang membutuhkan sertifikasi terkait Jaminan Sosial Ketenagakerjaan."</i></br>- Agus Susanto, Direktur Utama BPJS Ketenagakerjaan</p>
	  </div>
	  
      <div class="row justify-content-center">
        <div class="col-md-7">
          <form action="common/akun/login" method="post" id = "formLogin">
		  
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name = "login_id" id = "login_id" placeholder="Masukan login id" required>
              </div>
            </div>
			
			<div class="mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" name = "password" id = "password" placeholder="Masukan password" required>
              </div>
            </div>			
            
			<button class="btn btn-primary btn-lg btn-block" type="submit">Masuk</button>
			
			</br><div id="login_id_validate" class="text-center"></div>
			<div id="password_validate" class="text-center"></div>

          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">Copyright &copy; 2018 BPJS Ketenagakerjaan, All rights reserved.</p>
      </footer>
    </div>

	<script text="text/javascript">	
		$("#formLogin").validate({
			rules: {
				login_id: {
					required: true
				},
				password:{
					required	: true,
					remote 		: { 
						url 	: "common/akun/cekPassword", 
						type 	:"post",
						data	: {
							login_id: function(){
								return $("#login_id").val();
							}
						}
					}
				}
			},
			messages:{
				login_id : 
					{ 
						required : "Kolom <b>Login ID</b> diperlukan"
					},
				password : 
					{ 
						required : "Kolom <b>password</b> diperlukan",
						remote : "Login ID dan password tidak cocok" 
					}
			},
			errorPlacement: function (error, element) {
				var name = $(element).attr("name");
				error.appendTo($("#" + name + "_validate"));
				$("#" + name + "_validate").show();
			}
		});
	</script>    
  </body>
</html>
