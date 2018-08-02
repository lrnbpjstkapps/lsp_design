	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Beranda</a></li>
		<li class="breadcrumb-item active" aria-current="page">FR-APL-01</li>
	  </ol>
	</nav>
	
	<h3 class="box-title"> <?php echo $menu_title[105]; ?> </h3>
	<button onClick="pagingAdd()" class="btn btn-primary float-right"> <?php echo $form_button[106]; ?> </button>
	</br></br>
	
	 <table id="<?php echo $form_id[138]; ?>" class="table table-hover dataTable" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th> # </th>
				<th> ID Dokumen </th>
				<th> Skema Sertifikasi </th>
				<th> Tanggal </th>
				<th class="sorting_disabled" align = "center"> &nbsp </th>
				<th class="sorting_disabled" align = "center"> &nbsp </th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	 </table>