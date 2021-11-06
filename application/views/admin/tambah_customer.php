<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Form Tambah Customer</h1>
		</div>
	</section>
	<div class="card">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('admin/data_customer/tambah_customer_aksi') ?>">
			<div class="row">
				
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control">
						<?php echo form_error('nama','<div class="text-danger text-small">','</div>') ?>
					</div>

					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control">
						<?php echo form_error('username','<div class="text-danger text-small">','</div>') ?>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="text" name="password" class="form-control">
						<?php echo form_error('password','<div class="text-danger text-small">','</div>') ?>
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control">
						<?php echo form_error('alamat','<div class="text-danger text-small">','</div>') ?>
					</div>
					
				</div>
				<div class="col-md-6">

					<div class="form-group">
						<label>No Telp</label>
						<input type="number" name="no_telepon" class="form-control">
						<?php echo form_error('no_telepon','<div class="text-danger text-small">','</div>') ?>
					</div>

					<div class="form-group">
						<label>No Ktp</label>
						<input type="number" name="no_ktp" class="form-control">
						<?php echo form_error('no_ktp','<div class="text-danger text-small">','</div>') ?>
					</div>

					<div class="form-group">
						<label>Gender</label>
						<select name="gender" class="form-control">
							<option value="">--Jenis Kelamin--</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
						<?php echo form_error('gender','<div class="text-danger text-small">','</div>') ?>
					</div>

					<div class="form-group">
						<label>Daftar Sebagai</label>
						<select name="role_id" class="form-control">
							<option value="">--Daftar Sebagai--</option>
							<option value="2">Customer</option>
							<option value="1">Admin</option>
						</select>
						<?php echo form_error('role_id','<div class="text-danger text-small">','</div>') ?>
					</div>

					<button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
					<button type="reset" class="btn btn-sm btn-danger mt-3">Reset</button>
					
				</div>
				
			</div>
			</form>
		</div>
	</div>
</div>