<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="#">Beranda</a></li>
	<li class="breadcrumb-item active" aria-current="page">Skema Sertifikasi</li>
  </ol>
</nav>
	
<h3 class="box-title"> <?php echo $menu_title[100]; ?> </h3>
<button onClick="addDt()" class="btn btn-primary float-right"> <?php echo $form_button[106]; ?> </button>
</br></br>

 <table id="<?php echo $form_id[104]; ?>" class="table table-hover dataTable" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th> # </th>
			<th> Nomor </th>
			<th> Judul Skema Sertifikasi </th>
			<th class="sorting_disabled" align = "center"> &nbsp </th>
			<th class="sorting_disabled" align = "center"> &nbsp </th>
		</tr>
	</thead>
	<tbody>
	</tbody>
 </table>
   
<div class="modal fade" id="<?php echo $form_id[103]; ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Title </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
			
			<div class="modal-body">
				<form id="<?php echo $form_id[100]; ?>">           
					<input type="hidden" name="<?php echo $form_name[102]; ?>" id="<?php echo $form_id[105]; ?>"/> 
					<div class="form-group">
						<label> Nomor Skema Sertifikasi </label>
						<input name="<?php echo $form_name[101]; ?>" class="form-control" type="text">
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label> Judul Skema Sertifikasi </label>
						<input name="<?php echo $form_name[100]; ?>" class="form-control" type="text">
						<span class="help-block"></span>
					</div>	
				</form>		
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="saveDt()"> <?php echo $form_button[101]; ?> </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"> <?php echo $form_button[100]; ?> </button>
			</div>			
        </div>
    </div>
</div>