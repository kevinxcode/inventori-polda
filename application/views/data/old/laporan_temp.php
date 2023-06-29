<?php $priviledge = $this->session->userdata('priviledge_claim');  ?>
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">

								<!--begin::notif--
								<?php if($this->session->flashdata('alert')): ?>
									<div class="alert alert-success" >
									<button type="button" class="close" data-dismiss="alert">x</button>
									<strong><h3><?php echo $flash_message; ?></h1></strong>
								</div>
								<?php endif; ?>
								<!--end::notif-->

								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap py-2">
										<div class="card-title">
											<h3 class="card-label">Data Laporan
											</h3>
										</div>
										<div class="card-toolbar">


											<!--begin::Button-->
											<?php if ($priviledge['stok_1']): ?>
												<a href="#" data-toggle="modal" data-target="#myModal_filter" class="btn btn-primary btn-sm">
												CREATE CLOSE BOOK</a>

										<?php endif; ?>
											<!--end::Button-->

										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
											<thead>
												<tr>
													<th>#</th>
													<th>Keterangan</th>
													<th>Start Date</th>
													<th>End Date</th>
													<th>Status</th>


													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?>
												<?php foreach ($list as $value): ?>
												<tr>
													<td><?php echo $i++ ?></td>
													<td><?php echo $value->keterangan ?> </td>
													<td><?php echo $value->start_date ?></td>
													<td><?php echo $value->end_date ?></td>
													<td>Done</td>
													<td>
														<?php if ($priviledge['stok_1']): ?>
															<a href="<?php echo prefix_url;?>app/reportPdf/<?php echo $value->id_lap ?>" class="btn btn-danger btn-sm">PDF</a>
															<a href="<?php echo prefix_url;?>app/reportXls/<?php echo $value->id_lap ?>" class="btn btn-danger btn-sm">XLS</a>
														<a href="<?php echo prefix_url;?>app/delReport/<?php echo $value->id_lap ?>" class="btn btn-danger btn-sm">Delete</a>
													<?php endif; ?>
													</td>

												</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
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





<!-- Modal -->
<div id="myModal_filter" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Create Close Book</h4>
		</div>
		<div class="modal-body">
			<!-- form -->
			<form action="<?php echo prefix_url;?>app/createReport" method="Post">

				<div class="form-group">
					<label>Start Date
					<span class="text-danger">*</span></label>
					<input type="text" name="start_date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="kt_datepicker_1" readonly="readonly" required placeholder="Select date" />
				</div>

				<div class="form-group">
					<label>End Date
					<span class="text-danger">*</span></label>
					<input type="text" name="end_date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="kt_datepicker_1" readonly="readonly" required placeholder="Select date" />
				</div>

				<div class="form-group">
					<label>Keterangan
					<span class="text-danger">*</span></label>
					<input type="text" name="keterangan" class="form-control"  required  />
				</div>



		</div>
		<div class="modal-footer">

			<button type="submit" class="btn btn-primary" >Submit</button>
		</form>
			<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>

		</div>
	</div>

</div>
</div>
<!--end modal-->
	<script src="<?php echo prefix_url;?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
<link href="<?php echo prefix_url;?>assets/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo prefix_url;?>assets/select2/select2-bootstrap4.css" rel="stylesheet">
<script src="<?php echo prefix_url;?>assets/select2/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="<?php echo prefix_url;?>assets/select2/select2.min.js"></script>
<script src="<?php echo prefix_url;?>assets/script.js"></script>
