<button onClick="addDt()" class="btn btn-primary float-right"> <?php echo $form_button[106]; ?> </button>		

<div id="<?php echo $form_button[100]; ?>" class = "animate-bottom">
			<dl class="row">
				<dt class="col-md-3"> Kode Unit Kompetensi </dt>
					<dd class="col-md-9"> <?php echo $param1; ?> </dd>
				<dt class="col-md-3"> Judul Unit Kompetensi </dt>
					<dd class="col-md-9"> <?php echo $param2; ?> </dd>
				<dt class="col-md-3"> Nomor Elemen Kompetensi </dt>
					<dd class="col-md-9"> <?php echo $param3; ?> </dd>
				<dt class="col-md-3"> Nama Elemen Kompetensi </dt>
					<dd class="col-md-9"> <?php echo $param4; ?> </dd>
			</dl>
			
			<table id="<?php echo $form_id[131]; ?>" class="table table-hover dataTable" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th> # </th>					
						<th> Nomor Kriteria Unjuk Kerja </th>
						<th> Pernyataan </th>
						<th> Pertanyaan </th>
						<th> &nbsp </th>
						<th> &nbsp </th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
</div>

<div class="modal fade" id="<?php echo $form_id[130]; ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">				
				<h4 class="modal-title"> Title </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
			
			<div class="modal-body">
				<form id="<?php echo $form_id[127]; ?>">
					<div class="modal-body form">                
						<input type="hidden" name="<?php echo $form_name[109]; ?>" id="<?php echo $form_id[124]; ?>"/>
						<input type="hidden" name="<?php echo $form_name[113]; ?>" id="<?php echo $form_id[132]; ?>"/>						
						<div class="form-body">
							<!-- Unit Kompetensi -->
							<div class="form-group">
								<label> Unit Kompetensi </label>
								<input name="<?php echo $form_name[110]; ?>" id="<?php echo $form_id[125]; ?>" class="form-control" type="text" readonly>
								<span class="help-block"></span>
							</div>
							
							<!-- Elemen Kompetensi -->
							<div class="form-group">
								<label> Elemen Kompetensi </label>
								<input name="<?php echo $form_name[115]; ?>" id="<?php echo $form_id[134]; ?>" class="form-control" type="text" readonly>
								<span class="help-block"></span>
							</div>
							
							<!-- Nomor Kriteria Unjuk Kerja -->
							<div class="form-group">
								<label> Nomor Kriteria Unjuk Kerja </label>
								<input name="<?php echo $form_name[112]; ?>" id="<?php echo $form_id[129]; ?>" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
							
							<!-- Pernyataan -->
							<div class="form-group">
								<label> Pernyataan </label>
								<textarea name="<?php echo $form_name[111]; ?>" id="<?php echo $form_id[128]; ?>" class="form-control" rows="3" style="resize:none"></textarea>
								<span class="help-block"></span>
							</div>	
							
							<!-- Pertanyaan -->
							<div class="form-group">
								<label> Pertanyaan </label>
								<textarea name="<?php echo $form_name[114]; ?>" id="<?php echo $form_id[133]; ?>" class="form-control" rows="3" style="resize:none"></textarea>
								<span class="help-block"></span>
							</div>								
						</div>                
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