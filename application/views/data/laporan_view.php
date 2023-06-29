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
											<h3 class="card-label">Data Transaksi :<b> <?php echo date('d F Y', strtotime($start_date)) ?> s/d <?php echo date('d F Y', strtotime($end_date)) ?></b>
											</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Button-->

											<!--end::Button-->

										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatable_1">
											<thead>
												<tr>
													<th>#</th>
													<th>Tanggal</th>
													<th>Deskripsi </th>
													<th>Pemasukan</th>
													<th>Pengeluaran</th>

												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?>
												<?php foreach ($list as $value): ?>
												<tr>
													<td><?php echo $i++ ?></td>
													<td><?php echo $value->tanggal ?> </td>
													<td><?php echo $value->deskripsi ?></td>
													<td><?php if($value->pay_in==''): ?>
													<?php else: ?>
															Rp. <?php echo number_format($value->pay_in); ?>
													<?php endif; ?>
													</td>
													<td>
														<?php if($value->pay_out==''): ?>
														<?php else: ?>
																Rp. <?php echo number_format($value->pay_out); ?>
														<?php endif; ?>
														</td>


												</tr>

												<?php endforeach; ?>
												<tr>
													<td colspan="3">Jumlah</td>

													<td><b>Rp. <?php echo number_format($total_in); ?><b></td>
													<td><b>Rp. <?php echo number_format($total_out); ?><b></td>
													<td></td>
												</tr>
												<tr>
													<td colspan="3">Balance : <b>Rp. <?php echo number_format($balance); ?></b></td>

													<td colspan="2" ></td>

													<td></td>
												</tr>
											</tbody>
										</table>
										<!--end: Datatable-->
										<form action="<?php echo prefix_url;?>app/addreport" method="Post">
												<input type="hidden" name="start_date" value="<?php echo $start_date ?>" class="form-control"  required  />
													<input type="hidden" name="end_date" value="<?php echo $end_date ?>" class="form-control"  required  />
														<input type="hidden" name="keterangan" value="<?php echo $keterangan ?>" class="form-control"  required  />
											<button type="submit" id="btn_submit" class="btn btn-primary" >KONFIRMASI CLOSE BOOK</button>
										</form>
										Note : jika sudah close book maka transaksi tidak bisa diubah

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
<link href="<?php echo prefix_url;?>assets/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo prefix_url;?>assets/select2/select2-bootstrap4.css" rel="stylesheet">
<script src="<?php echo prefix_url;?>assets/select2/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="<?php echo prefix_url;?>assets/select2/select2.min.js"></script>
<script src="<?php echo prefix_url;?>assets/script.js"></script>
