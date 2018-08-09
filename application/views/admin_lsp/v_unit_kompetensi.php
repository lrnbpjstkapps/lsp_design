<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="#">Beranda</a></li>
	<li class="breadcrumb-item active" aria-current="page">Unit Kompetensi</li>
  </ol>
</nav>

<h3 class="box-title"> <?php echo $menu_title[101]; ?> </h3>
<button onClick="addDt()" class="btn btn-primary float-right"> <?php echo $form_button[106]; ?> </button>
</br></br>
	  
 <table id="<?php echo $form_id[114]; ?>" class="table table-hover dataTable" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th> # </th>					
			<th> Kode Unit Kompetensi </th>
			<th> Judul Unit Kompetensi </th>
			<th> &nbsp </th>
			<th> &nbsp </th>
			<th> &nbsp </th>
		</tr>
	</thead>
	<tbody>
	</tbody>
 </table>

<div class="modal fade" id="<?php echo $form_id[113]; ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<h4 class="modal-title"> Title </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
			
			<div class="modal-body">
				<form id="<?php echo $form_id[110]; ?>">           
					<input type="hidden" name="<?php echo $form_name[105]; ?>" id="<?php echo $form_id[115]; ?>"/> 					
					<div class="form-group">
						<label> Kode Unit Kompetensi </label>
						<input name="<?php echo $form_name[104]; ?>" id="<?php echo $form_id[112]; ?>" class="form-control" type="text">
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label> Judul Unit Kompetensi </label>
						<textarea name="<?php echo $form_name[103]; ?>" id="<?php echo $form_id[111]; ?>" class="form-control" rows="2" style="resize:none"></textarea>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label> Skema Sertifikasi </label>
						  <select class="form-control select2" multiple = "multiple" style="width: 100%;" name="<?php echo $form_name[106]; ?>" id="<?php echo $form_id[105]; ?>"> 
							<?php foreach($listSkema->result() as $row){ ?>
								<option value = "<?php echo $row->UUID_SKEMA; ?>"><?php echo $row->NOMOR_SKEMA." - ".$row->NAMA_SKEMA; ?></option>
							<?php } ?>						
						  </select>
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

<div class="modal fade" id="<?php echo $form_id[106]; ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center"> Title </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>	
			
			<div class="modal-body">				
				<dl class="row">
					<dt class="col-md-5"> Kode Unit Kompetensi </dt>
						<dd id="<?php echo $form_id[109]; ?>" class="col-md-7">Text</dd>
					<dt class="col-md-5"> Judul Unit Kompetensi </dt>
						<dd id="<?php echo $form_id[108]; ?>" class="col-md-7">Text</dd>
				</dl>
			  
				<table id="<?php echo $form_id[107]; ?>" class="table table-hover dataTable" width="100%">
				<thead>
					<tr>
						<th> # </th>
						<th> Nomor </th>
						<th> Judul Skema Sertifikasi </th>
					</tr>
				</thead>
					<tbody>
					</tbody>
				</table>			
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"> <?php echo $form_button[100]; ?> </button>
			</div>			
		</div>
    </div>
</div>