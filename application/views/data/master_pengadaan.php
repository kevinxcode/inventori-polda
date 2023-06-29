
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
											<h3 class="card-label">Master Pengadaan
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
													<th>Judul Pengadaan</th>
													<th>Tahun</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?>
												<?php foreach ($list as $value): ?>
												<tr>
													<td><?php echo $i++ ?></td>
													<td><?php echo $value->judul_pengadaan ?> </td>
													<td><?php echo $value->tahun ?></td>
													<td>
														<a onclick="edit('<?php echo $value->id ?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Edit</a>
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
				<form action="<?php echo prefix_url;?>app/addMasterPengadaan" method="Post">
					<input type="hidden" name="id"  id="id" value="0" class="form-control"  />



				<div class="form-group">
					<label>Judul Pengadaan
					<span class="text-danger">*</span></label>
					<input type="text" name="judul_pengadaan"  id="judul_pengadaan" class="form-control"  />
				</div>


				<div class="form-group">
					<label>tahun
					<span class="text-danger">*  </span></label>
					<input type="text" name="tahun" id="tahun" class="form-control"  />
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
function edit(id){
	$.ajax({
	 url: '<?php echo base_url();?>app/editMasterPengadaan/'+id,
	 dataType: 'html',
	 success: function(data) {
		const obj = JSON.parse(data);
		$('#id').val(obj[0].id);
		$('#judul_pengadaan').val(obj[0].judul_pengadaan);
		$('#tahun').val(obj[0].tahun);

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
