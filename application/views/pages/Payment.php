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
				<div class="card" style="margin-top: 50px; padding: 5px 20px">
					<h3 class="bold" style="line-height: 32px">Berhasil Checkout <br><small>Mohon segera selesaikan pembayaran Anda</small></h3>
					
					<br>
					<div class="well" style="margin-bottom: 30px;">
						<p>Total Pembayaran</p>
						<h3 style="margin:0" class="bold">Rp<?= number_format($this->session->flashdata('totalHarga'), 0, ".", ".") ?>,-</h3>
					</div>
					<div class="info-group">
						<h4 class="bold">Metode Pembayaran</h4>
						<table class="table borderless">
							<tr>
								<td><img src="<?= base_url() ?>assets/images/brand/bni.png" class="img-responsive" style="width: 80px;"></td>
								<td>
									<p style="color:grey">Transfer BNI</p>
									<p class="bold">800 600 6009</p>
									<p>a/n PT.Tomedic </p>
								</td>
							</tr>
						</table>
					</div>						
					<hr>
					<p style="color: grey">Sistem secara otomatis akan menkonfirmasi pembayaran jika transaksi sudah berhasil dilakukan <br><br> Kami akan mengirimkan email konfirmasi ke anda bahwa buku yang anda pesan telah dikirim</p>
					<hr>
					<p class="text-center"><a href="<?= base_url() ?>" class="primary bold">Kembali ke Halaman Utama</a></p>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>