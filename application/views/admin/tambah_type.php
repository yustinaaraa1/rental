<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Form Tambah Type</h1>
		</div>
	</section>
	<div class="card">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('admin/data_type/tambah_type_aksi'); ?>">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Kode Type</label>
						<input type="text" name="kode_type" class="form-control">
						<?php echo form_error('kode_type','<div class="text-small text-danger">','</div>'); ?>
					</div>
					<div class="form-group">
						<label>Nama Type Mobil</label>
						<input type="text" name="nama_type" class="form-control">
						<?php echo form_error('nama_type','<div class="text-small text-danger">','</div>'); ?>
					</div>
					<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
					<button type="reset" class="btn btn-sm btn-danger">Reset</button>
				</div>
				</form>
				<div class="col-md-6">
					
				</div>
			</div>
		</div>		
	</div>
</div>