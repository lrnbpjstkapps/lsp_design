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
    <link href="<?php echo base_url(); ?>assets/css/form-validation.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">	
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
		<img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>assets/image/BPJS_Ketenagakerjaan_logo.png" alt="" width="400" height="92">
        <!--img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>assets/image/LSP_logo.png" alt="" width="300" height="136"-->
        <p class="lead"><i>"BPJS Ketenagakerjaan selaku penyelenggara program Jaminan Sosial Ketenagakerjaan mendirikan LSP bagi masyarakat yang membutuhkan sertifikasi terkait Jaminan Sosial Ketenagakerjaan."</i></br>- Agus Susanto, Direktur Utama BPJS Ketenagakerjaan</p>
	  </div>
	  
      <div class="row justify-content-center">
        <div class="col-md-7">
          <form class="needs-validation" action="common/akun/login" method="post">
		  
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name = "username" placeholder="Masukan username" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
            </div>
			
			<div class="mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" name = "password" placeholder="Masukan password" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
            </div>			
            
			<button class="btn btn-primary btn-lg btn-block" type="submit">Masuk</button>

          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">Copyright &copy; 2018 BPJS Ketenagakerjaan, All rights reserved.</p>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
