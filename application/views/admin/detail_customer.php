<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Detail Customer</h1>
		</div>
	</section>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<?php foreach ($customer as $cs): ?>
					<table class="table">
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><?php echo $cs->nama; ?></td>
						</tr>
						<tr>
							<td>Username</td>
							<td>:</td>
							<td><?php echo $cs->username; ?></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><?php echo $cs->password; ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?php echo $cs->alamat; ?></td>
						</tr>

				
					</table>
					</div>
					
				
				<div class="col-md-6">
					<table class="table">
					<tr>
						<td>No.Telp</td>
						<td>:</td>
						<td><?php echo $cs->no_telepon; ?></td>
					</tr>
					<tr>
						<td>No.Ktp</td>
						<td>:</td>
						<td><?php echo $cs->no_ktp; ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td><?php if ($cs->gender=="Laki-laki") {
							echo "Laki-laki";
						}else{
							echo "Perempuan";
						} ?></td>
					</tr>
					<tr>
						<td>Terdaftar Sebagai</td>
						<td>:</td>
						<td><?php if ($cs->role_id=="1") {
							echo "Admin";
						}else{
							echo "Customer";
						} ?></td>
					</tr>
					</table>
					<a class="btn btn-sm btn-danger mt-3" href="<?php echo base_url('admin/data_customer/') ?>">Kembali</a>
					<a class="btn btn-sm btn-primary mt-3" href="<?php echo base_url('admin/data_customer/update_customer/'.$cs->id_customer) ?>"><i class="fas fa-edit"></i>Update</a>
				</div>
				<?php endforeach; ?>

			</div>
		</div>
	</div>
</div>