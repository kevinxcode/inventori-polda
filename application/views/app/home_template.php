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
											<h3 class="card-label">Home
											</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Button-->

											<!--end::Button-->

										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
											<thead>
												<tr>
													<th>#</th>
													<th>TANGGAL</th>
													<th>KODE</th>
								          <th>JUDUL</th>
								          <th>JUMLAH KELUAR</th>


												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?>
												<?php foreach ($list as $value): ?>
												<tr>
													<td><?php echo $i++ ?></td>
													<td>'<?php echo $value->tanggal ?></td>
													<td><?php echo $value->kode ?></td>
													<td><?php echo $value->judul ?></td>
								          <td><?php echo $value->jumlah_keluar ?></td>

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





<!--date picker-->
	<script src="<?php echo prefix_url;?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
<!--end date picker-->
