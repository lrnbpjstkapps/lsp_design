</head>
   <body>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		  <a class="navbar-brand" href="#">LSP BPJS Ketenagakerjaan</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item">
				<a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
			  </li>
			  
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>asesor/fr_mma">FR-MMA <span class="sr-only">(current)</span></a>
			  </li>
			  
			  <li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Verifikasi</a>
				  <div class="dropdown-menu" aria-labelledby="dropdown10">
					<a class="dropdown-item" href="<?php echo base_url(); ?>asesor/fr_apl_02">FR-APL-02</a>
				  </div>
				</li>
			</ul>
			
			<form class="form-inline mt-2 mt-md-0" action="<?php echo base_url(); ?>common/akun/logout" method="post">
			  <button class="btn btn-danger" type="submit">Keluar</button>
			</form>
		  </div>
		</nav>
		<div class="container">