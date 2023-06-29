
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
											<h3 class="card-label">PROFILE
											</h3>
										</div>

										<div class="card-toolbar">
								      <!--begin::Button-->

								      <!--end::Button-->
								    </div>



</div>
<div class="card-body">
		<?php foreach ($list as $value): ?>
	<form action="<?php echo prefix_url;?>home/updateProfile" method="Post">

		<div class="form-group">
			<label>Name
			<span class="text-danger">*</span></label>
			<input type="text" name="tanggal" class="form-control" />
		</div>

	<div class="form-group">
		<label>Username
		<span class="text-danger">*</span></label>
		<input type="text" name="title" value="<?php echo $value->username ?>" class="form-control"  />
	</div>

	<div class="form-group">
		<label>Jumlah
		<span class="text-danger">*</span></label>
		<input type="password" name="jumlah"  class="form-control"  />
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
