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
											<h3 class="card-label">Data Item
											</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Button-->
											<?php if ($priviledge['pengeluaran_1']): ?>
											<a href="#" data-toggle="collapse" data-target="#demo"  onclick="myFunction()"  class="btn btn-primary btn-sm">
											<span class="svg-icon svg-icon-sm">
												<!--begin::Svg Icon | path:<?php echo prefix_url;?>assets/media/svg/icons/Design/Flatten.svg-->
												<i class="flaticon2-plus"></i>
												<!--end::Svg Icon-->
											</span>ADD ITEM</a>
										<?php endif; ?>
											<!--end::Button-->

										</div>
									</div>
									<div class="card-body">

										<script>
										function myFunction() {
										  document.getElementById("myForm").reset();
										}
										</script>

<div id="demo" class="collapse">
	<form action="<?php echo prefix_url;?>app/addItem" id="myForm" method="Post">

		<div class="form-group">
			<label>Item
			<span class="text-danger">*</span></label>
			<input type="hidden" name="token_pengeluaran" value="<?php echo $token_pengeluaran ?>" class="form-control"  readonly="readonly" required />
			<input type="hidden" name="token_stok" class="form-control" id="token"  readonly="readonly" required placeholder="Select item" />
			<input type="text" name="judul" class="form-control" id="title" onClick="open_popup('select_item');"  readonly required placeholder="Select item" />
		</div>

		<div class="form-group">
			<label>Sisa Stok
			<span class="text-danger">*</span></label>
			<input type="number" name="sisa_stok"  id="jumlah" readonly class="form-control"  />
		</div>

		<div class="form-group">
			<label>Harga / pcs
			<span class="text-danger">*</span></label>
			<input type="text" name="harga_item" id="harga" readonly class="form-control"  />
		</div>

	<div class="form-group">
		<label>Jumlah Di keluarkan
		<span class="text-danger">*</span></label>
		<input type="number" name="jumlah_keluar"  class="form-control"  />
	</div>


	<button type="submit" id="btn_submit" class="btn btn-primary btn-block" >SAVE</button>
</form>
<hr>
</div>
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" >

												<?php foreach ($list as $value): ?>
												<tr>
													<td width="10%">Kode </td>
													<td>: <?php echo $value->kode ?></td>
												</tr>
												<tr>
													<td width="10%">Tanggal </td>
													<td>: <?php echo $value->tanggal ?></td>
												</tr>
												<tr>
													<td width="10%">Oleh </td>
													<td>: <?php echo $value->oleh ?></td>
												</tr>
												<tr>
													<td width="10%">Status </td>
													<td>: <?php echo $value->remark ?></td>
												</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
										<hr>
										<b>List Item :</b>
										<hr>
										<table class="table table-separate table-head-custom table-checkable" >
											<thead>
												<tr>
													<th>#</th>
													<th>Item </th>
													<th>Jumlah</th>
													<th>Harga / Item</th>
													<th>Total</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?>
												<?php foreach ($list_item as $value): ?>
												<tr>
													<td><?php echo $i++ ?></td>
													<td><?php echo $value->judul ?></td>
													<td><?php echo $value->jumlah_keluar ?></td>
													<td>Rp. <?php echo number_format($value->harga_item); ?></td>
													<td>Rp. <?php echo number_format($value->total); ?></td>
													<td width="5%"><a href="<?php echo prefix_url;?>app/delItem/<?php echo $value->id_item ?>" class="btn btn-primary btn-sm">Delete</a></td>
												</tr>
												<?php endforeach; ?>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>

												</tr>
												<tr>
													<td colspan="4">GRAND TOTAL</td>
													<td colspan="2">:<b>Rp. <?php echo number_format($grand_total); ?></b></td>

												</tr>
											</tbody>
										</table>
										<br>
										<div class="card-toolbar">
											<form action="<?php echo prefix_url;?>app/printPengeluaran" method="Post">
											<input type="hidden" name="token_pengeluaran" value="<?php echo $token_pengeluaran ?>" class="form-control"  readonly="readonly" required />
											<div class="form-group">
												<label>Noted :
												<span class="text-danger">*</span></label>
												<textarea class="form-control" name="noted" rows="2" cols="50"><?php foreach ($list as $value): ?><?php echo $value->noted ?><?php endforeach; ?></textarea>
											</div>
											<button type="submit" class="btn btn-primary  btn-block">PRINT</button>
										</form>

											<!--end::Button-->
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

					<script>
					function open_popup(select_item) {
					window.open('<?php echo prefix_url;?>app/viewStok', 'popuppage', 'width=800,location=0,toolbar=0,menubar=0,resizable=1,scrollbars=yes,height=700,top=100,left=100000');
					}
					</script>



	<script src="<?php echo prefix_url;?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
<link href="<?php echo prefix_url;?>assets/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo prefix_url;?>assets/select2/select2-bootstrap4.css" rel="stylesheet">
<script src="<?php echo prefix_url;?>assets/select2/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="<?php echo prefix_url;?>assets/select2/select2.min.js"></script>
<script src="<?php echo prefix_url;?>assets/script.js"></script>
