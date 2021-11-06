<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Konfimasi Pembayaran</h1>
		</div>
		<div class="card" style="width: 51%;">
			<p>Konfiramsi Pembayaran</p>
			<form method="POST" action="<?php echo base_url('admin/transaksi/cek_pembayaran_aksi') ?>">
				<?php foreach ($transaksi as $tr):?>
			<div class="row" >
			<center>
				<a href="<?php echo base_url('admin/transaksi/download_pembayaran/'.$tr->id_rental) ?>" class="btn btn-sm btn-success"><i class="fas fa-download ml-4"> Download</i></a>
				<div class="custom-control custom-switch">
					
						<input type="hidden" name="id_rental" value="<?php echo $tr->id_rental; ?>">
					<?php endforeach; ?>
  					<input type="checkbox" class="custom-control-input" id="customSwitch1" value="1" name="status_pembayaran">
  					<label class="custom-control-label ml-3" for="customSwitch1">Konfirmasi Pembayaran</label>
  					<hr>
				</div>
				</center>


				<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
				
			</div>
			</form>
		</div>
	</section>
</div>