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
											<h3 class="card-label">Data Stok
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
													<th>Tanggal</th>
													<th>Nama Barang</th>
													<th>Jumlah</th>
													<th>Harga</th>

												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?>
												<?php foreach ($list as $value): ?>
												<tr onClick="send_employee('<?php echo $value->token;?>','<?php  echo $value->title;?>','<?php  echo $value->sisa;?>','<?php  echo $value->harga;?>')">
													<td><?php echo $i++ ?></td>
													<td><?php echo $value->tanggal ?> </td>
													<td><?php echo $value->title ?></td>
													<td><?php echo $value->sisa ?></td>
													<td>Rp. <?php echo number_format($value->harga); ?> / pcs</td>




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

					<script>
					function send_employee(token,title,jumlah,harga){
					window.opener.document.getElementById('token').value = token;
					window.opener.document.getElementById('title').value = title;
					window.opener.document.getElementById('jumlah').value = jumlah;
					window.opener.document.getElementById('harga').value = harga;
					window.close();
					}
					</script>



	<script src="<?php echo prefix_url;?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
<link href="<?php echo prefix_url;?>assets/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo prefix_url;?>assets/select2/select2-bootstrap4.css" rel="stylesheet">
<script src="<?php echo prefix_url;?>assets/select2/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="<?php echo prefix_url;?>assets/select2/select2.min.js"></script>
<script src="<?php echo prefix_url;?>assets/script.js"></script>
