<div id="<?php echo $form_button[100]; ?>" class = "animate-bottom">
	<div class="box">
		<div class="box-header with-border">
			<a onClick="addDt()" class="btn bg-navy pull-right"> <?php echo $form_button[106]; ?> </a>
		</div>
		<div class="box-body pad table-responsive">
			<dl class="dl-horizontal">
				<dt> <?php echo $form_label[112]; ?> </dt>
				<dd> <?php echo $param1; ?> </dd>
				<dt> <?php echo $form_label[111]; ?> </dt>
				<dd> <?php echo $param2; ?> </dd>
			</dl>
			</br>
			<table id="<?php echo $form_id[123]; ?>" class="table table-hover table-striped dataTable" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th> <?php echo $table_column[100]; ?> </th>					
						<th> <?php echo $table_column[108]; ?> </th>
						<th> <?php echo $table_column[107]; ?> </th>
						<th> <?php echo $table_column[101]; ?> </th>
						<th> <?php echo $table_column[101]; ?> </th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>	
</div>

<div class="modal fade" id="<?php echo $form_id[122]; ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">				
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"> Title </h4>
            </div>
			
			<div class="modal-body">
				<form id="<?php echo $form_id[119]; ?>" class="form-horizontal">
					<div class="modal-body form">                
						<input type="hidden" name="<?php echo $form_name[105]; ?>" id="<?php echo $form_id[115]; ?>"/>
						<input type="hidden" name="<?php echo $form_name[109]; ?>" id="<?php echo $form_id[124]; ?>"/>						
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3"> <?php echo $form_label[115]; ?> </label>
								<div class="col-md-9">
									<input name="<?php echo $form_name[110]; ?>" id="<?php echo $form_id[125]; ?>" class="form-control" type="text" readonly>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"> <?php echo $form_label[117]; ?> </label>
								<div class="col-md-9">
									<input name="<?php echo $form_name[108]; ?>" id="<?php echo $form_id[121]; ?>" class="form-control" type="text">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"> <?php echo $form_label[116]; ?> </label>
								<div class="col-md-9">
									<textarea name="<?php echo $form_name[107]; ?>" id="<?php echo $form_id[120]; ?>" class="form-control" rows="2" style="resize:none"></textarea>
									<span class="help-block"></span>
								</div>
							</div>							
						</div>                
					</div>
				</form>		
			</div>

			<div class="modal-footer">
				<button type="button" class="btn bg-navy" onclick="saveDt()"> <?php echo $form_button[101]; ?> </button>
				<button type="button" class="btn bg-navy" data-dismiss="modal"> <?php echo $form_button[100]; ?> </button>
			</div>			
        </div>
    </div>
</div>