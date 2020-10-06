
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<ul class="list-group">
				  <?php
				  foreach ($kategori->result() as $k){
				  ?>
				  <li class="list-group-item"><a href="<?= base_url() ?>v/kategori/<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></a></li>
				  <?php
				  }
				  ?>
				</ul>
			</div>

			<div class="col-md-9">
				<h2 class="bold">Obat Paling Laris</h2>
				<p>Daftar obat paling laris hari ini.</p>

				<br>

				<div class="row">
					<?php
					foreach($laris->result() as $p){
					?>
					<div class="col-md-3">
						<div class="card cardbook">
							<div class="text-center">
							<a href="<?= base_url() ?>v/detail/<?= $p->kode ?>">
								<img src="<?= base_url() ?>assets/images/books/<?= $p->gambar ?>" class="img-rounded thumbnail-max">
							</a>
							</div>
							<br>
							<a href="<?= base_url() ?>v/detail/<?= $p->kode ?>"><b><?= ucwords($p->nama) ?></b></a>
							<br>
							<a href="<?= base_url() ?>v/kategori/<?= $p->id_kategori ?>"><?= ucwords($p->nama_kategori) ?></a>
							<p class="price">Rp<?= number_format($p->harga, 0, ".", ".") ?>,-</p>
						</div>
					</div>
					<?php } ?>
				</div>


			</div>
			
		</div>
	</div>
