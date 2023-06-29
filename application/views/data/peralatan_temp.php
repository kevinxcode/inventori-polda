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
											<h3 class="card-label">Data Peralatan Khusus
											</h3>
										</div>
										<div class="card-toolbar">

											<!--begin::Button-->


											<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">
											<span class="svg-icon svg-icon-sm">
												<!--begin::Svg Icon | path:<?php echo prefix_url;?>assets/media/svg/icons/Design/Flatten.svg-->
												<i class="flaticon2-plus"></i>
												<!--end::Svg Icon-->
											</span>ADD</a>

											<!--end::Button-->

										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
											<thead>
												<tr>
													<th>#</th>
													<th>Pengadaan</th>
													<th>Jenis</th>
													<th>Jumlah</th>
													<th>B</th>
													<th>RR</th>
													<th>RB</th>

													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?>
												<?php foreach ($list as $value): ?>
												<tr>
													<td><?php echo $i++ ?></td>
													<td><?php echo $value->judul_pengadaan ?> </td>
													<td><?php echo $value->jenis ?></td>
													<td><?php echo $value->jumlah ?></td>
													<td><?php echo $value->b ?></td>
													<td><?php echo $value->rr ?></td>
													<td><?php echo $value->rb ?></td>
													<td>
														<a onclick="edit_peralatan('<?php echo $value->id_peralatan ?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Edit</a>
														<a href="<?php echo prefix_url;?>app/delPeralatan/<?php echo $value->id_peralatan ?>" class="btn btn-danger btn-sm">Delete</a>
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
				<form action="<?php echo prefix_url;?>app/addPeralatan" method="Post">
					<input type="hidden" name="id_peralatan" id="id_peralatan" value="0" class="form-control"  />
					<div class="form-group">
						<label>Pengadaan
						<span class="text-danger">*</span></label>
						<select name="pengadaan" id="pengadaan" class="form-control" >
						<?php foreach($list_pengadaan as $dt): ?>
						<option value="<?php echo $dt->id; ?>"><?php echo $dt->judul_pengadaan; ?></option>
						<?php endforeach; ?>
						</select>
					</div>


				<div class="form-group">
					<label>Jenis
					<span class="text-danger">*</span></label>
					<input type="text" name="jenis"  id="jenis" class="form-control"  />
				</div>

				<div class="form-group">
					<label>Jumlah
					<span class="text-danger">*</span></label>
					<input type="number" name="jumlah" id="jumlah" class="form-control"  />
				</div>

				<div class="form-group">
					<label>B
					<span class="text-danger">*  </span></label>
					<input type="number" name="b" id="b" class="form-control"  />
				</div>

				<div class="form-group">
					<label>RR
					<span class="text-danger">*  </span></label>
					<input type="number" name="rr" id="rr" class="form-control"  />
				</div>

				<div class="form-group">
					<label>RB
					<span class="text-danger">*  </span></label>
					<input type="number" name="rb" id="rb" class="form-control"  />
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

<script>
function edit_peralatan(id_peralatan){
	$.ajax({
	 url: '<?php echo base_url();?>app/editPeralatan/'+id_peralatan,
	 dataType: 'html',
	 success: function(data) {
		const obj = JSON.parse(data);
		$('#id_peralatan').val(obj[0].id_peralatan);
		$('#pengadaan').val(obj[0].pengadaan);
		$('#jenis').val(obj[0].jenis);
		$('#jumlah').val(obj[0].jumlah);
		$('#b').val(obj[0].b);
		$('#rr').val(obj[0].rr);
		$('#rb').val(obj[0].rb);
	}
 });
}
</script>

	<script src="<?php echo prefix_url;?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
<link href="<?php echo prefix_url;?>assets/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo prefix_url;?>assets/select2/select2-bootstrap4.css" rel="stylesheet">
<script src="<?php echo prefix_url;?>assets/select2/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="<?php echo prefix_url;?>assets/select2/select2.min.js"></script>
<script src="<?php echo prefix_url;?>assets/script.js"></script>
