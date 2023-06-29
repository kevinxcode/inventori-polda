
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">


								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap py-2">
										<div class="card-title">
											<h3 class="card-label">Edit Data
											</h3>
										</div>

										<div class="card-toolbar">
								      <!--begin::Button-->
											<a class="btn btn-primary btn-sm" onclick="closeMe()">CANCEL</a>
								      <!--end::Button-->
								    </div>

<script>
	function closeMe(){
			window.opener = self;
			window.close(); }
	</script>

</div>
<div class="card-body">
		<?php foreach ($list as $value): ?>
	<form action="<?php echo prefix_url;?>app/addPengeluaran" method="Post">
		<input type="hidden" name="check" value="1" class="form-control"  />
		<input type="hidden" name="token" value="<?php echo $value->token_pengeluaran ?>" class="form-control"  />

		<div class="form-group">
			<label>Dikeluarkan Oleh
			<span class="text-danger">*</span></label>
			<input type="text" name="oleh" value="<?php echo $value->oleh ?>" class="form-control"  />
		</div>

		<div class="form-group">
			<label>Status
			<span class="text-danger">*</span></label>
		<select name="status" class="form-control">
			<option value="1" <?php if($value->status=='1'): ?>selected<?php endif; ?>>Sent</option>
			<option value="2" <?php if($value->status=='2'): ?>selected<?php endif; ?>>Draf</option>
			<option value="3" <?php if($value->status=='3'): ?>selected<?php endif; ?>>Failed</option>
		</select>
		</div>

	</div>
	<div class="modal-footer">
	<button type="submit" id="btn_submit" class="btn btn-primary" >Submit</button>
	</form>
	<?php endforeach; ?>

<hr>
</div>
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->


	<script src="<?php echo prefix_url;?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
