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
											<h3 class="card-label">Data Pengeluaran
											</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Button-->
											<?php if ($priviledge['pengeluaran_1']): ?>
											<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">
											<span class="svg-icon svg-icon-sm">
												<!--begin::Svg Icon | path:<?php echo prefix_url;?>assets/media/svg/icons/Design/Flatten.svg-->
												<i class="flaticon2-plus"></i>
												<!--end::Svg Icon-->
											</span>ADD</a>
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
													<th>Tanggal</th>
													<th>Kode </th>
													<th>Oleh</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?>
												<?php foreach ($list as $value): ?>
												<tr>
													<td><?php echo $i++ ?></td>
													<td><?php echo $value->tanggal ?> </td>
													<td><?php echo $value->kode ?></td>
													<td><?php echo $value->oleh ?></td>
													<td><?php echo $value->remark ?></td>
													<td>
														<a href="<?php echo prefix_url;?>app/item/<?php echo $value->token_pengeluaran ?>" class="btn btn-primary btn-sm">
															ITEM
														</a>
														<?php if ($priviledge['pengeluaran_1']): ?>
														<a class="btn btn-primary btn-sm"
															target="popup"
															onclick="window.open('<?php echo prefix_url;?>app/editPengeluaran/<?php echo $value->token_pengeluaran ?>','popup','width=800,location=0,toolbar=0,menubar=0,resizable=1,scrollbars=yes,height=700,top=100,left=100000').focus(); return false;">
															Edit
														</a>

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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ADD</h4>
      </div>
      <div class="modal-body">
				<!-- form -->
				<form action="<?php echo prefix_url;?>app/addPengeluaran" method="Post">
					<input type="hidden" name="check" value="0" class="form-control"  />
					<div class="form-group">
						<label>Tanggal
						<span class="text-danger">*</span></label>
						<input type="text" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>" id="kt_datepicker_14" readonly="readonly" required placeholder="Select date" />
					</div>


				<div class="form-group">
					<label>Dikeluarkan Oleh
					<span class="text-danger">*</span></label>
					<input type="text" name="oleh" class="form-control"  />
				</div>

				<div class="form-group">
					<label>Status
					<span class="text-danger">*</span></label>
				<select name="status" class="form-control">
					<option value="1">Sent</option>
					<option value="2">Draf</option>
					<option value="3">Fail</option>
				</select>
				</div>



      </div>
      <div class="modal-footer">
				<button type="submit" id="btn_submit" class="btn btn-primary" >Submit</button>
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
