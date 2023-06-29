<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>Inventory Warehouse - Login</title>
		<meta name="description" content="Inventory Warehouse - Login" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="<?php echo prefix_url;?>assets/css/pages/login/login-4.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?php echo prefix_url;?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo prefix_url;?>assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo prefix_url;?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="<?php echo prefix_url;?>assets/inventory_logo/inventory_icon.png" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-static page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Content-->
				<div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
					<!--begin::Wrapper-->
					<div class="login-content d-flex flex-column pt-lg-0 pt-12">
						<!--begin::Logo-->
						<a href="#" class="login-logo pb-xl-20 pb-15">
							<img src="<?php echo prefix_url;?>assets/inventory_logo/inventory_sea logo_2.png" class="max-h-70px" alt="" />
						</a>
						<!--end::Logo-->
						<script>
						window.setTimeout(function() {
						$(".alert").fadeTo(450, 0).slideUp(450, function(){
						  $(this).remove();
						});
					}, 5500);
						</script>
						<!-- notif -->
						      <?php if($this->session->flashdata('notaccess')){ ?>
						          <div class="alert alert-danger">
						          <a href="#" class="close" data-dismiss="alert"></a>
						          <strong>You do not have permission to access this application </strong>
						        </div>


						  <?php } else if($this->session->flashdata('eror')){  ?>
						  <div class="alert alert-danger">
						  <a href="#" class="close" data-dismiss="alert"></a>
						  <strong>Check Your NIK / USERNAME or Password</strong>
						  </div>
						          <?php } ?>
						<!-- end notif -->
						<!--begin::Signin-->
						<div class="login-form">
							<!--begin::Form-->
							<form class="form" action="<?php echo prefix_url;?>login/checkLOgin" method="POST">
								<!--begin::Title-->
								<div class="pb-2 pb-lg-5">
									<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Inventory Warehouse - Login</h3>
								</div>
								<!--begin::Title-->

								<!--begin::Form group-->
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">USERNAME</label>
									<input class="form-control form-control-solid h-auto py-4 px-3 rounded-lg border-0" type="text" name="username" autocomplete="off" />
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
									</div>
									<input class="form-control form-control-solid h-auto py-4 px-3 rounded-lg border-0" type="password" name="password" autocomplete="off" />
								</div>
								<!--end::Form group-->

								<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
									<button type="submit"  class="btn btn-primary btn-block font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
						 &copy; Copyright - fadeintech.com <?php echo date('Y') ?>
					</div>
					<!--end::Wrapper-->
				</div>
				<!--begin::Content-->
				<style>
				.center-cropped {
  width: 100%;
  height: 100%;
	background-image: url(<?php echo prefix_url;?>assets/login_bg.jpg);
  background-repeat: no-repeat;
  background-size: cover;
	z-index: -1;
}
				</style>



				<!--begin::Aside-->
				<div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">

					<div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom">
						<div class="center-cropped"></div>



						<!--begin::Aside title-->

						<!--end::Aside title-->
					</div>
				</div>
				<!--end::Aside-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="<?php echo prefix_url;?>assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?php echo prefix_url;?>assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="<?php echo prefix_url;?>assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="<?php echo prefix_url;?>assets/js/pages/custom/login/login-4.js"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>
