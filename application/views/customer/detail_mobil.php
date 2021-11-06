<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Detail Mobil</h1>
		</div>
	</section>
	<div class="card">
		<div class="card-body">
			<?php foreach ($mobil as $mb): ?>
			<div class="row">
				<div class="col-md-5">
					<img style="width: 89%;" src="<?php echo base_url('assets/upload/'.$mb->gambar); ?>">
				</div>
				<div class="col-md-6">
					<table class="table">
						<tr>
						<td>Type</td>
						<td>:</td>
						<td><?php echo $mb->kode_type; ?></td>
						</tr>

						<tr>
						<td>Merk</td>
						<td>:</td>
						<td><?php echo $mb->merk; ?></td>
						</tr>

						<tr>
						<td>No Plat</td>
						<td>:</td>
						<td><?php echo $mb->no_plat; ?></td>
						</tr>

						<tr>
						<td>Warna</td>
						<td>:</td>
						<td><?php echo $mb->warna; ?></td>
						</tr>

						<tr>
						<td>Tahun</td>
						<td>:</td>
						<td><?php echo $mb->tahun; ?></td>
						</tr>

						<tr>
						<td>Status</td>
						<td>:</td>
						<td><?php if ($mb->status=="1") {?>
							<span class="badge badge-primary">Tersedia</span>
							<?php }else{?>
							<span class="badge badge-danger">Tidak Tersedia</span>
							<?php } ?>
						</td>
						</tr>

						<tr>
						<td>Harga Sewa/hari</td>
						<td>:</td>
						<td><?php echo $mb->harga; ?></td>
						</tr>

						<tr>
						<td>Denda telat /hari</td>
						<td>:</td>
						<td><?php echo $mb->denda; ?></td>
						</tr>

						<tr>
							<td>
							<a class="btn btn-sm btn-danger" href="<?php echo base_url('customer/dashboard') ?>">Kembali</a>
							</td>
						</tr>


					</table>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</div>