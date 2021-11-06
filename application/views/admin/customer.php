<div class="main-content">	
	<section class="section">
		<div class="section-header">
			<h1>Data Customer</h1>
		</div>	
	</section>	
	<a class="btn btn-sm btn-primary mb-3" href="<?php echo base_url('admin/data_customer/tambah_customer'); ?>">Tambah Data Customer</a>
	<?php echo $this->session->flashdata('pesan'); ?>
	<table class="table table-bordered table-striped">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>No.Telp</th>
			<th>Alamat</th>
			<th>Gender</th>
			<th>Aksi</th>
		</tr>
		<?php $no=1; foreach ($customer as $cs):?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $cs->nama ?></td>
			<td><?php echo $cs->no_telepon ?></td>
			<td><?php echo $cs->alamat ?></td>
			<td><?php echo $cs->gender ?></td>
			<td>
				<a class="btn btn-sm btn-success" href="<?php echo base_url('admin/data_customer/detail_customer/'.$cs->id_customer) ?>"><i class="fas fa-eye"></i></a>
				<a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/data_customer/delete_customer/'.$cs->id_customer) ?>"><i class="fas fa-trash"></i></a>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/data_customer/update_customer/'.$cs->id_customer) ?>"><i class="fas fa-edit"></i></a>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
</div>	