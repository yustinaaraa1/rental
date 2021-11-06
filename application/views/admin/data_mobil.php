<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Mobil</h1>
		</div>
	</section>
	<a class="btn btn-sm btn-primary mb-3" href="<?php echo base_url('admin/data_mobil/tambah_mobil') ?>">Tambah Data Mobil</a>
	<?php echo $this->session->flashdata('pesan') ?>
	<table class="table table-bordered table-striped table-responsive">
		<tr>
			<th>NO</th>
			<th>gambar</th>
			<th>Merk</th>
			<th>No Plat</th>
			<th>Warna</th>
			<th>Tahun</th>
			<th>Harga</th>
			<th>Denda</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
		<?php $no=1; foreach ($mobil as $mb): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td>
					<img style="width: 86px;" src="<?php echo base_url('assets/upload/'.$mb->gambar); ?>">
				</td>
				<td><?php echo $mb->merk; ?></td>
				<td><?php echo $mb->no_plat; ?></td>
				<td><?php echo $mb->warna; ?></td>
				<td><?php echo $mb->tahun; ?></td>
				<td><?php echo $mb->harga; ?></td>
				<td><?php echo $mb->denda; ?></td>
				<td>
					<?php if ($mb->status=="1"){?>
						<span class="badge badge-primary">Tersedia</span>
					<?php }else{?>
						<span class="badge badge-danger">Tidak Tersedia</span>
					<?php } ?>
				</td>
				<td>
					<div class="row">
						<div class="row">
							<div class="row">
					<a class="btn btn-sm btn-success" href="<?php echo base_url('admin/data_mobil/detail_mobil/'.$mb->id_mobil) ?>"><i class="fas fa-eye"></i></a>
					<a class="btn btn-sm btn-danger ml-1" href="<?php echo base_url('admin/data_mobil/delete_mobil/'.$mb->id_mobil) ?>"><i class="fas fa-trash"></i></a>
					<a class="btn btn-sm btn-primary ml-1" href="<?php echo base_url('admin/data_mobil/update_mobil/'.$mb->id_mobil) ?>"><i class="fas fa-edit"></i></a>
					</div>
					</div>
					</div>
				</td>

			</tr>
		<?php endforeach; ?>
	</table>

</div>