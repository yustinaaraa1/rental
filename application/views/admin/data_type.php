<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Halaman Dara Type</h1>
		</div>
	</section>
	<a class="btn btn-sm btn-primary mb-3" href="<?php echo base_url('admin/data_type/tambah_type') ?>">Tambah Data Type</a>
	<?php echo $this->session->flashdata('pesan'); ?>
	<table class="table table-bordered table-striped">
		<tr>
			<th>No</th>
			<th>Kode Type</th>
			<th>Nama Type</th>
			<th>QRCode</th>
			<th>Aksi</th>
		</tr>
		<?php $no=1; foreach ($type as $tp):?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $tp->kode_type; ?></td>
				<td><?php echo $tp->nama_type; ?></td>
				<td>
					<?php 
					$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
					echo $generator->getBarcode($tp->id_type.$tp->kode_type, $generator::TYPE_CODE_128);
		 			?>
				</td>
				<td>
					<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/data_type/update_type/'.$tp->id_type) ?>"><i class="fas fa-edit"></i></a>
					<a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/data_type/delete_type/'.$tp->id_type) ?>"><i class="fas fa-trash"></i></a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>