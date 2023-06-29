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
											<h3 class="card-label">Acc Claim
											</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Button-->
											<?php if ($priviledge['access_claim_2']): ?>
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
													<th>Nik</th>
													<th>Name</th>
													<th>Company</th>
													<?php if ($priviledge['access_claim_2']): ?>
													<th>Action</th>
													<?php endif; ?>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?>
												<?php foreach ($list as $value): ?>
												<tr>
													<td><?php echo $i++ ?></td>
													<td><?php echo $value->nik ?></td>
													<td><?php echo $value->name ?></td>
													<td><?php echo $value->company ?></td>

													<td>
														<?php if ($priviledge['access_claim_2']): ?>
															<a class="btn btn-info btn-sm"
																target="popup"
																onclick="window.open('<?php echo prefix_url;?>master/addAcc/<?php echo $value->nik ?>/<?php echo $value->company ?>','popup','width=600,location=0,toolbar=0,menubar=0,resizable=1,scrollbars=yes,height=700,top=100,left=100000').focus(); return false;">
															Access
															</a>
														<a href="<?php echo prefix_url;?>master/delAcc/<?php echo $value->nik ?>" class="btn btn-danger btn-sm">Delete</a>
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
				<form action="<?php echo prefix_url;?>master/addAccClaim" method="Post">
				<div class="form-group">
					<label>NIK Employee
					<span class="text-danger">*</span></label>
					<select name="employee" class="form-control" required>
            <option >::: Select Employee</option>
						<?php foreach ($list_em as $value): ?>
            <option value="<?php echo $value->nik ?>-<?php echo $value->name ?>-<?php echo $value->company ?>"><?php echo $value->nik ?> - <?php echo $value->name ?> - <?php echo $value->company ?></option>
						<?php endforeach; ?>
          </select>
				</div>




      </div>
      <div class="modal-footer">
				<button type="submit" class="btn btn-primary" >Submit</button>
			</form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--end modal-->

<link href="<?php echo prefix_url;?>assets/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo prefix_url;?>assets/select2/select2-bootstrap4.css" rel="stylesheet">
<script src="<?php echo prefix_url;?>assets/select2/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="<?php echo prefix_url;?>assets/select2/select2.min.js"></script>
<script src="<?php echo prefix_url;?>assets/script.js"></script>
