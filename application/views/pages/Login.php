<!DOCTYPE html>
<html>
<head>
	<title>Tomedic - Toko Obat Paling Laris</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/styles.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="card" style="margin-top: 100px; padding: 24px">
					<br>
					<div class="text-center">
						<a href="<?= base_url() ?>">
							<img src="<?= base_url() ?>assets/images/brand/logo_2.PNG" style="max-width:100px; margin-top: -10px;"">
						</a>
					</div>
					<hr>
					<h3 class="bold text-center">Login</h3>
					<br>
					<?php
				      if($this->session->flashdata('msg')){
				        echo $this->session->flashdata('msg');
				      }
				    ?>
					<form method="POST" action="<?= base_url() ?>v/login_auth">
					  <div class="form-group">
					    <label for="email">Email address</label>
					    <input type="email" class="form-control input-grey" name="email" placeholder="Email">
					  </div>
					  <div class="form-group">
					    <label for="password">Password</label>
					    <input type="password" class="form-control input-grey" name="password" placeholder="Password">
					  </div>
					  <button type="submit" class="btn btn-primary btn-block bold">Login Sekarang</button>
					</form>
					<br>
					<p class="text-center">Belum memiliki akun? <a href="<?= base_url() ?>v/register" class="primary bold">Daftar Sekarang</a></p>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>