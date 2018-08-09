<button onClick="addDt()" class="btn btn-primary float-right"> <?php echo $form_button[106]; ?> </button>		

<dl class="row">
	<dt class="col-md-2"> Kode Unit Kompetensi </dt>
		<dd class="col-md-10"> <?php echo $param1; ?> </dd>
	<dt class="col-md-2"> Judul Unit Kompetensi </dt>
		<dd class="col-md-10"> <?php echo $param2; ?> </dd>
</dl>

<table id="<?php echo $form_id[123]; ?>" class="table table-hover dataTable" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th> # </th>					
			<th> Nomor Elemen Kompetensi </th>
			<th> Nama Elemen Kompetensi </th>
			<th> &nbsp </th>
			<th> &nbsp </th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<div class="modal fade" id="<?php echo $form_id[122]; ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">				
				<h4 class="modal-title"> Title </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
			
			<div class="modal-body">
				<form id="<?php echo $form_id[119]; ?>" class="form-horizontal">            
						<input type="hidden" name="<?php echo $form_name[105]; ?>" id="<?php echo $form_id[115]; ?>"/>
						<input type="hidden" name="<?php echo $form_name[109]; ?>" id="<?php echo $form_id[124]; ?>"/>						
						
							<div class="form-group">
								<label> Unit Kompetensi </label>
								<input name="<?php echo $form_name[110]; ?>" id="<?php echo $form_id[125]; ?>" class="form-control" type="text" readonly>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<label> Nomor Elemen Kompetensi </label>
								<input name="<?php echo $form_name[108]; ?>" id="<?php echo $form_id[121]; ?>" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<label> Nama Elemen Kompetensi </label>
								<textarea name="<?php echo $form_name[107]; ?>" id="<?php echo $form_id[120]; ?>" class="form-control" rows="2" style="resize:none"></textarea>
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