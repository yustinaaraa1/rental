<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?php echo $title; ?></h1>
		</div>	
		<?php foreach ($transaksi as $tr):?>	
		<form method="POST" action="<?php echo base_url('admin/transaksi/transaksi_selesai_aksi') ?>">
		<div class="form-group">
			<label>Tanggal Pengembalian</label>
			<input type="hidden" name="id_rental" value="<?php echo $tr->id_rental ?>">
			<input type="hidden" name="id_mobil" value="<?php echo $tr->id_mobil ?>">
			<input type="hidden" name="tanggal_kembali" value="<?php echo $tr->tanggal_kembali ?>">
			<input type="hidden" name="denda" value="<?php echo $tr->denda ?>">
			<input type="date" name="tanggal_pengembalian" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Status Pengembalian</label>
			<select name="status_pengembalian" class="form-control">
				<option value="<?php echo $tr->status_pengembalian ?>"><?php echo $tr->status_pengembalian ?></option>
				<option value="Kembali">Kembali</option>
				<option value="Belum Kembali">Belum Kembali</option>
			</select>
		</div>
		<div class="form-group">
			<label>Status Rental</label>
			<select name="status_rental" class="form-control">
				<option value="<?php echo $tr->status_rental ?>"><?php echo $tr->status_rental ?></option>
				<option value="Selesai">Selesai</option>
				<option value="Belum Selesai">Belum Selesai</option>
			</select>
		</div>
		<div class="form-group">
			<label>Pengembalian Mobil</label>
			<select name="status" class="form-control" required>
				<option value="">Status Mobil</option>
				<option value="1">Kembali</option>
				<option value="0">Belum Kembali</option>
			</select>
		</div>
		<button type="submit" class="btn btn-sm btn-danger">Simpan</button>
		</form>	
	<?php endforeach; ?>
	</section>
</div>	