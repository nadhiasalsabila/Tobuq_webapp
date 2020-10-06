<!DOCTYPE html>
<html>
<head>
	<title>Apotek - Toko Obat Paling Lengkap</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/styles.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="card" style="margin-top: 50px; padding: 24px">
					<br>
					<div class="text-center">
						<a href="<?= base_url() ?>">
							<img src="<?= base_url() ?>assets/images/brand/logo_2.PNG" style="max-width:100px; margin-top: -10px;"">
						</a>
					</div>
					<hr>
					<h3 class="bold text-center">Daftar Member</h3>
					<br><br>
					<form method="POST" action="<?= base_url() ?>v/register_process">
					  <div class="form-group">
					    <label for="nama">Nama Lengkap</label>
					    <input required type="text" class="form-control input-grey" name="nama" placeholder="Nama Lengkap">
					  </div>
					  <div class="form-group">
					    <label for="email">Email address</label>
					    <input required type="email" class="form-control input-grey" name="email" placeholder="Email">
					  </div>
					  <div class="form-group">
					    <label for="telepon">Nomor Telepon</label>
					    <input required type="text" class="form-control input-grey" name="no_telp" placeholder="Nomor Telepon">
					  </div>
					  <div class="form-group">
					    <label>Jenis Kelamin</label>
					    <br>
					    <label style="font-weight: normal;"><input checked type="radio" name="jk" value="Laki-laki"> Laki-laki</label>
					    &nbsp;
					    <label style="font-weight: normal;"><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
					  </div>
					  <div class="form-group">
					    <label for="password">Password</label>
					    <input required type="password" class="form-control input-grey" name="password" placeholder="Password">
					  </div>
					  <div class="form-group">
					    <label for="alamat">Alamat</label>
					    <textarea required class="form-control input-grey" name="alamat" placeholder="Alamat"></textarea>
					  </div>
					  <button type="submit" class="btn btn-primary btn-block bold">Daftar Sekarang</button>
					</form> 
					<br>
					<p class="text-center">Sudah memiliki akun? <a href="<?= base_url() ?>v/login" class="primary bold">Login Sekarang</a></p>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>