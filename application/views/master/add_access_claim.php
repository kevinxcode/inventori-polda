
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
											<h3 class="card-label">Data Claim Access
											</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Button-->
											<a class="btn btn-primary btn-sm" onclick="closeMe()">CLOSE</a>
											<!--end::Button-->

										</div>
									</div>
									<div class="card-body">

										<hr>
										<!--begin: Datatable-->
										<table class="table table-bordered table-hover">
					                <thead>
					                       <tr align="center">
					                      <th width="5%"> No </th>
					                      <th>  Category </th>
					                      <th>  Access </th>
					                      <th width="35%">  Access </th>

					                      </tr>
					                      </thead>
					                      <tbody>
					                 <?php $i = 1; ?>
					                <?php foreach ($list as $value): ?>
					                      <tr>
					                      <td> <?php echo $i++; ?> </td>
					                      <td> <?php echo $value->category; ?> </td>
					                      <form action="<?php echo prefix_url;?>master/saveAccess_claim" method="POST" class="form-horizontal">
					                        <input type="hidden" name="token" value="<?php echo  $value->token_data; ?>" class="form-control">
					                        <input type="hidden" name="nik" value="<?php echo $nik_data; ?>" class="form-control">
					                      <td>
					                        <label class="switch">
					                      <input type="checkbox" name="dlt" value="1" <?php if($value->dlt=='1'): ?> checked <?php endif; ?> onChange="this.form.submit()">
					                      <span class="slider round"></span>
					                      </label>
					                      </td>
					                      <td>


																	<?php if($value->limit_cat=='3'): ?>
																	<select name="access_remark[]" multiple data-placeholder="Select " required data-allow-clear="100">

																		<?php foreach ($list_travel as $dt): ?>
											 				 		 <option value="<?php echo $dt->l_travel; ?>"><?php echo $dt->l_travel; ?></option>
											 						 <?php endforeach; ?>

																	 <?php $t = explode( "'", $value->access_remark);
																		 for($i=1; $i < count($t); $i += 2)
																		 echo '<option value="'.$t[$i].'" selected>'.$t[$i].'</option>'; ?>
														      </select>
																<?php endif; ?>

																<button type="submit" class="btn btn-primary btn-sm">Submit </button>
					                      </td>

					                      </form>

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
	window.setTimeout(function() {
			window.close();
	}, 620000);
</script>

					<script>
						function closeMe()
						{
								window.opener = self;
								window.close();
						}
						</script>
