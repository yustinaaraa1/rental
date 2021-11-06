<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?php echo $title; ?></h1>
		</div>
		<form method="POST" action="<?php echo base_url('admin/laporan/laporan_aksi') ?>">
			
			<div class="form-group">
				<label>Dari Tanggal</label>
				<input type="date" name="dari" class="form-control">
			</div>
			<div class="form-group">
				<label>Sampai Tanggal</label>
				<input type="date" name="sampai" class="form-control">
			</div>
			<button class="btn btn-sm btn-primary" type="submit">Filter</button>
			
		</form>
	</section>
</div>