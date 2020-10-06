<div class="container">
	<div class="row">
		<form method="POST" action="<?= base_url() ?>v/checkout_process">
		<div class="col-md-8">
			<div class="card" style="padding: 10px 24px; height: 570px">
				<h3 class="bold">Checkout</h3>
				<p>Pastikan informasi yang anda isi akurat</p>
				<hr>
				<h4 class="bold">Alamat Pengiriman</h4>
				<br>
		    	<textarea class="form-control input-grey" name="alamat" placeholder="Masukkan alamat lengkap kamu disini" rows="6" required="required"></textarea>
			  	<br><br>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="padding: 10px 15px 15px 15px;">
				<h4>Total Harga</h4>
				<h3 class="bold tcolor" style="margin-top:10px">Rp<?= number_format($totalHarga, 0, ".", ".") ?>,-</h3>
				<hr>
				<table class="table borderless" style="border:none">
					<tr>
						<td class="bold">Ongkos Kirim</td>
						<td class="text-right">Gratis</td>
					</tr>
					<tr>
						<td class="bold">Biaya Layanan</td>
						<td class="text-right">Gratis</td>
					</tr>
				</table>
				<button type="submit" class="btn btn-primary btn-block bold">Checkout</button>
			</div>
		</div>
	</form>
	</div>
</div>