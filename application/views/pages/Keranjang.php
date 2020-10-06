<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card" style="padding: 10px 24px; height: 580px">
				<h3 class="bold">Keranjang</h3>
				<p>Terdapat <?= count($this->cart->contents()) ?> obat dikeranjang</p>
				<hr>
				<?php
			      if($this->session->flashdata('msg')){
			        echo $this->session->flashdata('msg');
			      }

			      if(count($this->cart->contents()) < 1){
			      	echo "<h3 class='text-center bold'>Kamu belum menambahkan item kedalam keranjang</h3>";
			      } else {
			    ?>
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Obat</th>
							<th>Harga</th>
							<th>Qty</th>
							<th>Sub Total</th>
							<th>Actions</th>
						</tr>
					</thead>
					<form method="POST" action="<?= base_url() ?>v/update_keranjang">
					<?php
					$i=1;
					$totalHarga = 0;
					foreach ($this->cart->contents() as $items){
						$totalHarga = $totalHarga + ($items['price'] * $items['qty']);
					?>
					<tr>
						<td><?= $i; ?></td>
						<td><?= ucwords($items['name']) ?></td>
						<td>Rp<?= number_format($items['price'], 0, ".", ".") ?>,-</td>
						<td>
						    <input type="hidden" name="rowid<?= $i ?>" value="<?= $items['rowid'] ?>">
							<input type="text" class="form-control input-grey" name="qty<?= $i ?>" style="width: 100px" value="<?= $items['qty'] ?>">
						</td>
						<td>Rp<?= number_format($items['price']*$items['qty'], 0, ".", ".") ?>,-</td>
						<td>
							<a href="<?= base_url() ?>v/hapus_keranjang/<?= $items['rowid'] ?>" class="btn btn-sm btn-danger-sm bold"><span class="glyphicon glyphicon-remove"></span></a>
						</td>
					</tr>
					<?php
						$i++;
					}
					?>
					<tr style="background: #eee">
						<td style="padding-top: 20px; padding-bottom: 20px;" colspan="4" class="text-right">Total harga</td>
						<td style="padding-top: 20px; padding-bottom: 20px;" class="bold">Rp<?= number_format($totalHarga, 0, ".", ".") ?>,-</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td class="text-right">
							<input type="hidden" name="totalItemCart" value="<?= $i-1 ?>">
							<button type="submit" class="btn btn-warning bold" style="margin-top: 20px; color:#fff; height: 38px;">Perbarui Keranjang</button>
						</td>
						<td>
							<a href="<?= base_url() ?>v/checkout" class="btn btn-primary bold btn-block" style="margin-top: 20px">Checkout</a>
						</td>
					</tr>
					</form>
				</table>
				<?php } ?>
			</div>
		</div>
	</div>
</div>