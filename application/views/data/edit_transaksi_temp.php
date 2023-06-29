
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
	<form action="<?php echo prefix_url;?>app/addTransaksi" method="Post">
		<input type="hidden" name="check" value="1" class="form-control"  />
		<input type="hidden" name="idtransaksi" value="<?php echo $value->idtransaksi ?>" class="form-control"  />
		<div class="form-group">
			<label>Tanggal
			<span class="text-danger">*</span></label>
			<input type="text" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>"  value="<?php echo $value->tanggal ?>" id="kt_datepicker_1" readonly="readonly" required placeholder="Select date" />
		</div>


	<div class="form-group">
		<label>Deskripsi
		<span class="text-danger">*</span></label>
		<input type="text" name="deskripsi" value="<?php echo $value->deskripsi ?>" class="form-control"  />
	</div>

	<div class="form-group">
		<label>Category
		<span class="text-danger">*</span></label>
	<select name="kategory" class="form-control">
		<option value="1" <?php if($value->kategory=='1'): ?>selected<?php endif; ?>>Pemasukan</option>
		<option value="2" <?php if($value->kategory=='2'): ?>selected<?php endif; ?>>Pengeluaran</option>
	</select>
	</div>

	<div class="form-group">
		<label>Jumlah
		<span class="text-danger">*</span></label>
		<input type="number" name="txtjumlah" value="<?php echo $value->pay_in ?><?php echo $value->pay_out ?>" class="form-control"  />
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
