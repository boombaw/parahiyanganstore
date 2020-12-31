<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Login</title>
		<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
		<link rel="icon" href="<?= base_url('assets/img/icon.ico'); ?>" type="image/x-icon" />
		<!-- Fonts and icons -->
		<script src="<?= base_url("assets/js/plugin/webfont/webfont.min.js"); ?>"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Lato:300,400,700,900"]
				},
				custom: {
					"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
		urls: ['<?= base_url("assets/css/fonts.min.css") ?>']
		},
		active: function() {
		sessionStorage.fonts = true;
		}
		});
		</script>
		<!-- CSS Files -->
		<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('assets/css/atlantis.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>">
		<script>
		var baseURL = "<?php echo base_url(); ?>"
		</script>
	</head>
	<body>
		<div class="wrapper bg-info-gradient">
			<div class="container-fluid h-100 text-dark">
				<div class="row justify-content-center align-items-center h-100">
					<div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
						<?php if (session()->getFlashdata('pesan')): ?>
							<div class="m-2 p-3 mb-2 bg-danger text-white justify-content-center"><?= session()->getFlashdata('pesan')?></div>
						<?php endif ?>
						<form action="<?= base_url('login/auth') ?>" method="POST">
							<?= csrf_field()?>
							<div class="form-group">
								<?php 
									if ($validation->hasError('username')) {
										$class1 = 'is-invalid';
										$class = 'text-light';
										$style = 'style=display:block;';
									}else{
										$class1 = '';
										$class = '';
										$style = '';
									}
								?>
								<div class="input-icon">
									<span class="input-icon-addon">
										<i class="fa fa-user"></i>
									</span>
									<input type="text" name="username" class="form-control <?= $class1 ?> " placeholder="Masukkan Nama Pengguna" value="<?= old('username')?>">
								</div>
								
								<div class="invalid-feedback <?= $class ?>" <?=  $style ?> ><?= $validation->getError('username')?></div>
							</div>
							<div class="form-group">
								<?php 
									if ($validation->hasError('password')) {
										$class1 = 'is-invalid';
										$class = 'text-light';
										$style = 'style=display:block;';
									}else{
										$class1 = '';
										$class = '';
										$style = '';
									}
								?>
								<div class="input-icon">
									<span class="input-icon-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" name="password" class="form-control <?= $class1?>" placeholder="Masukkan Kata Sandi" >
								</div>
								<div class="invalid-feedback <?= $class ?>" <?=  $style ?> ><?= $validation->getError('password')?></div>
							</div>
							<div class="form-group">
								<button type="submit" class="col-12 btn btn-info btn-sm float-right">
									<i class="fa fa-lock"></i>&nbsp;&nbsp;Masuk</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--   Core JS Files   -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="<?= base_url("assets/js/core/popper.min.js") ?>"></script>
		<script src="<?= base_url("assets/js/core/bootstrap.min.js") ?>"></script>
		<!-- jQuery Scrollbar -->
		<script src="<?= base_url("assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js") ?>"></script>
		<!-- Atlantis JS -->
		<script src="<?= base_url("assets/js/atlantis.min.js") ?>"></script>
	</body>
</html>