
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
											<h3 class="card-label">Data Role Access
											</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Button-->

											<!--end::Button-->

										</div>
									</div>
									<div class="card-body">
										 <?php echo $email; ?>
										<hr>
										<!--begin: Datatable-->
											<form action="<?php echo prefix_url;?>master/addAccess2" method="POST" class="form-horizontal">
										<table class="table table-bordered table-hover">
					                <thead>
					                       <tr align="center">
					                      <th width="5%"> No </th>
					                      <th>  Role Name </th>
					                      <th>  Role </th>
																<th  width="20%">   </th>
																

					                      </tr>
					                      </thead>
					                      <tbody>
					                 <?php $i = 1; ?>
					                <?php foreach ($list as $value): ?>

															<input type="hidden" name="idrole[]" value="<?php echo  $value->role_data; ?>" class="form-control">
															<input type="hidden" name="token" value="<?php echo $gid_data; ?>" class="form-control">
														 <tr>
					                      <td> <?php echo $i++; ?> </td>
					                      <td> <?php echo $value->role_data; ?>   </td>
					                      <td>
					                        <label class="switch">
					                      <input type="checkbox" name="dlt[]" value="<?php echo  $value->role_data; ?>-1" <?php if($value->dlt=='1'): ?> checked <?php endif; ?> >
					                      <span class="slider round"></span>
					                      </label>
					                      </td>
					                      
											  <td>
					          <input type="checkbox"  name="access[]" value="1" class="acc_check<?php echo $value->id; ?>"  <?php if($value->access=='1'): ?> checked <?php endif; ?>>
					          <label for="html">All Access</label>
									</td>
											  
					                      </tr>
																<script>
																$(document).ready(function(){
																    $('.acc_check<?php echo $value->id; ?>').click(function() {
																        $('.acc_check<?php echo $value->id; ?>').not(this).prop('checked', false);
																    });
																});
																</script>
					                <?php endforeach; ?>

					                      </tbody>
					                      </table>
																<br>
																<button type="submit" class="btn btn-primary btn-lg btn-block">SUBMIT</button>
																       </form>
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
