<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="card" style="min-height: 570px;">
				<div class="row">
					<div class="col-md-4">
						<img src="<?= base_url() ?>assets/images/books/<?= $obat->gambar ?>" class="img-responsive img-thumbnail">
					</div>
					<div class="col-md-7">
						<h2 class="bold"><?= ucwords($obat->nama) ?></h2>
						<a href="#"><?= $obat->nama_kategori ?></a>
						<br><hr>
						<div class="row">
							<div class="col-md-4">
								<div class="info-group">
									<p class="bold">Dosis</p>
									<p><?= $obat->dosis ?></p>
								</div>	
							</div>
							<div class="col-md-4">
								<div class="info-group">
									<p class="bold">Jenis</p>
									<p><?= $obat->jenis ?></p>
								</div>
							</div>
						</div>

						<br>

						<div class="info-group">
							<p class="bold">Keterangan</p>
							<p><?= $obat->keterangan ?></p>
						</div>	
						<br>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="card" style="padding: 10px 15px 15px 15px;">
				<h4>Harga</h4>
				<h3 class="bold tcolor" style="margin-top:10px">Rp<?= number_format($obat->harga, 0, ".", ".") ?>,-</h3>
				<hr>
				<?php
				      if($this->session->flashdata('msg_stok')){
				        echo $this->session->flashdata('msg_stok');
				      }
			    ?>
				<form method="POST" action="<?= base_url() ?>v/tambah_keranjang">
				  <div class="form-group">
				    <label for="qty">Quantity</label>
				    <input type="text" class="form-control input-grey" name="qty" placeholder="Stok tersedia <?= $obat->jumlah ?>" autocomplete="off" required="required">
				  </div>
				  <input type="hidden" name="kode" value="<?= $obat->kode ?>">
				  <button type="submit" class="btn btn-primary btn-block bold">Tambahkan ke Keranjang</button>
				</form>
			</div>
		</div>
	</div>
</div>