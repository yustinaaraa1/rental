<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Form Update Customer</h1>
		</div>
	</section>
	<div class="card">
		<div class="card-body">
			<?php foreach ($customer as $cs):?>
			<form method="POST" action="<?php echo base_url('admin/data_customer/update_customer_aksi') ?>">
			<div class="row">
				
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama</label>
						<input type="hidden" name="id_customer" value="<?php echo $cs->id_customer ?>">
						<input type="text" name="nama" class="form-control" value="<?php echo $cs->nama; ?>">
						<?php echo form_error('nama','<div class="text-danger text-small">','</div>') ?>
					</div>

					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" value="<?php echo $cs->username; ?>">
						<?php echo form_error('username','<div class="text-danger text-small">','</div>') ?>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="hidden" name="password" class="form-control" value="<?php echo $cs->password; ?>">
						<?php echo form_error('password','<div class="text-danger text-small">','</div>') ?>
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control" value="<?php echo $cs->alamat; ?>">
						<?php echo form_error('alamat','<div class="text-danger text-small">','</div>') ?>
					</div>

					<div class="form-group">
						<label>No Telp</label>
						<input type="number" name="no_telepon" class="form-control" value="<?php echo $cs->no_telepon; ?>">
						<?php echo form_error('no_telepon','<div class="text-danger text-small">','</div>') ?>
					</div>

					
				</div>
				<div class="col-md-6">

					

					<div class="form-group">
						<label>No Ktp</label>
						<input type="number" name="no_ktp" class="form-control" value="<?php echo $cs->no_ktp; ?>">
						<?php echo form_error('no_ktp','<div class="text-danger text-small">','</div>') ?>
					</div>

					<div class="form-group">
						<label>Gender</label>
						<select name="gender" class="form-control">
							<option <?php if ($cs->gender=="Laki-laki") {echo "selected='selected'";}echo $cs->gender ?> value="Laki-laki">Laki-laki</option>
							<option <?php if ($cs->gender=="perempuan") {echo "selected='selected'";}echo $cs->gender ?> value="perempuan">Perempuan</option>
						</select>

						<?php echo form_error('gender','<div class="text-danger text-small">','</div>') ?>
					</div>

					<div class="form-group">
						<label>Daftar Sebagai</label>
						<select name="role_id" class="form-control">
							<option value="">--Daftar Sebagai--</option>
							<option <?php if ($cs->role_id=="2") {echo "selected=selected";} ?> value="2">Customer</option>
							<option <?php if ($cs->role_id=="1") {echo "selected=selected";} ?> value="1">Admin</option>

						</select>
						<?php echo form_error('role_id','<div class="text-danger text-small">','</div>') ?>
					</div>

					<button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
					<button type="reset" class="btn btn-sm btn-danger mt-3">Reset</button>
					
				</div>
				
			</div>
			</form>
		<?php endforeach; ?>
		</div>
	</div>
</div>