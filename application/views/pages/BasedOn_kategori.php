
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<ul class="list-group">
				  <?php
				  foreach ($kategori->result() as $k){
				  	if($k->id_kategori == $id){
				  		$kat = $k->nama_kategori;
				  	?>
					  <li class="list-group-item active"><a href="<?= base_url() ?>v/kategori/<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></a></li>
				  	<?php
				  	} else {
				  ?>
					  <li class="list-group-item"><a href="<?= base_url() ?>v/kategori/<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></a></li>
				  <?php
					}
				  }
				  ?>
				</ul>
			</div>

			<div class="col-md-9">
				<h2 class="bold"><?= $kat ?></h2>
				<p>Ditemukan <b><?= $obat->num_rows() ?> buku</b> pada kategori <?= $kat ?></p>
				<br>
				<div class="row">
					<?php
					foreach($obat->result() as $b){
					?>
					<div class="col-md-3">
						<div class="card cardbook">
							<div class="text-center">
							<a href="<?= base_url() ?>v/detail/<?= $b->kode ?>">
								<img src="<?= base_url() ?>assets/images/books/<?= $b->gambar ?>" class="img-rounded thumbnail-max">
							</a>
							</div>
							<br>
							<a href="<?= base_url() ?>v/detail/<?= $b->kode ?>"><b><?= ucwords($b->nama) ?></b></a>
							<br>
							<a href="<?= base_url() ?>v/kategori/<?= $b->id_kategori ?>"><?= ucwords($b->nama_kategori) ?></a>
							<p class="price">Rp<?= number_format($b->harga, 0, ".", ".") ?>,-</p>
						</div>
					</div>
					<?php } ?>
				</div>

				<div class="text-center">
					<?= $this->pagination->create_links(); ?>
				</div>

			</div>
			
		</div>
	</div>
