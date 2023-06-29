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
											<?php if ($priviledge['transaksi_1']): ?>
											<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">
											<span class="svg-icon svg-icon-sm">
												<!--begin::Svg Icon | path:<?php echo prefix_url;?>assets/media/svg/icons/Design/Flatten.svg-->
												<i class="flaticon2-plus"></i>
												<!--end::Svg Icon-->
											</span>ADD</a> -
											<a href="#" data-toggle="modal" data-target="#myModal_filter" class="btn btn-primary btn-sm">FILTER</a>
										<?php endif; ?>
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
													<th>Action</th>
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
													<td>
														<?php if($value->dlt=='0'): ?>
														<?php if ($priviledge['transaksi_1']): ?>
														<a class="btn btn-primary btn-sm"
															target="popup"
															onclick="window.open('<?php echo prefix_url;?>app/editTransaksi/<?php echo $value->idtransaksi ?>','popup','width=800,location=0,toolbar=0,menubar=0,resizable=1,scrollbars=yes,height=700,top=100,left=100000').focus(); return false;">
															Edit
														</a>
															<?php endif; ?>
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
				<form action="<?php echo prefix_url;?>app/addTransaksi" method="Post">
					<input type="hidden" name="check" value="0" class="form-control"  />
					<div class="form-group">
						<label>Tanggal
						<span class="text-danger">*</span></label>
						<input type="text" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>" id="kt_datepicker_1" readonly="readonly" required placeholder="Select date" />
					</div>


				<div class="form-group">
					<label>Deskripsi
					<span class="text-danger">*</span></label>
					<input type="text" name="deskripsi" class="form-control"  />
				</div>

				<div class="form-group">
					<label>Category
					<span class="text-danger">*</span></label>
				<select name="kategory" class="form-control">
					<option value="1">Pemasukan</option>
					<option value="2">Pengeluaran</option>
				</select>
				</div>

				<div class="form-group">
					<label>Jumlah
					<span class="text-danger">*</span></label>
					<input type="number" name="txtjumlah" class="form-control"  />
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

<!-- Modal -->
<div id="myModal_filter" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Filter</h4>
		</div>
		<div class="modal-body">
			<!-- form -->
			<form action="<?php echo prefix_url;?>app/transaksi" method="Post">
				<input type="hidden" name="txtsearch" value="1" class="form-control"  />
				<div class="form-group">
					<label>Start Date
					<span class="text-danger">*</span></label>
					<input type="text" name="start_date" class="form-control" value="<?php echo $start_date ?>" id="kt_datepicker_1" readonly="readonly" required placeholder="Select date" />
				</div>

				<div class="form-group">
					<label>End Date
					<span class="text-danger">*</span></label>
					<input type="text" name="end_date" class="form-control" value="<?php echo $end_date ?>" id="kt_datepicker_1" readonly="readonly" required placeholder="Select date" />
				</div>

		</div>
		<div class="modal-footer">
			<button type="submit"  name="btn_submit" value="1" class="btn btn-primary" >Export PDF</button>
			<button type="submit"  name="btn_submit" value="2" class="btn btn-primary" >Export XLS</button>
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
