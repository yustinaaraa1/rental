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

			<hr>
			<a href="<?php echo base_url('admin/laporan/print/?dari='.set_value('dari').'&sampai='.set_value('sampai')); ?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-print"></i>Print</a>
			
		</form>

		<table class="table table-bordered table-striped table-responsive">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Merk</th>
			<th>Tgl Rental</th>
			<th>Tgl Kembali</th>
			<th>Tgl Pengembalian</th>
			<th>Harga/hari</th>
			<th>Denda/hari</th>
			<th>Total Denda</th>
			<th>Status Pengembalian</th>
			<th>Status Rental</th>
			<th>Cek Pembayaran</th>
			<th>Aksi</th>
		</tr>
		<?php $no=1; foreach ($laporan as $tr):?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $tr->nama ?></td>
				<td><?php echo $tr->merk ?></td>
				<td><?php echo date('d/m/Y',strtotime($tr->tanggal_rental)) ?></td>
				<td><?php echo date('d/m/Y',strtotime($tr->tanggal_kembali)) ?></td>
				<td>
					<?php if ($tr->tanggal_pengembalian=="0000-00-00") {
						echo "-";
					}else{ ?>
						<?php echo date('d/m/Y',strtotime($tr->tanggal_pengembalian)) ?>
					<?php } ?>
				</td>
				<td>Rp.<?php echo number_format($tr->harga,0,',','.') ?></td>
				<td>Rp.<?php echo number_format($tr->denda,0,',','.') ?></td>
				<td>Rp.<?php echo number_format($tr->total_denda,0,',','.'); ?></td>
				<td>
					<?php if ($tr->status=="1") {
						echo "Telah Kembali";
					}else{
						echo "Belum Kembali";
					} ?>
				</td>

				<td>
					<?php if ($tr->status=="1") {
						echo "Telah Kembali";
					}else{
						echo "Belum Kembali";
					} ?>
				</td>
				<td>
					<a href="<?php echo base_url('admin/transaksi/cek_pembayaran/'.$tr->id_rental) ?>" class="btn btn-sm btn-danger"><i class="fas fa-check"></i></a>
				</td>
				<td><div class="row">
					<?php if ($tr->status=="1") { ?>
					<a href="<?php echo base_url('admin/transaksi/transaksi_selesai/'.$tr->id_rental) ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>
					<a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-danger ml-1"><i class="fas fa-times"></i></a>
					<?php }else{ ?>
						
						<a class="btn btn-sm btn-success mr-1" href="<?php echo base_url('admin/Transaksi/transaksi_selesai/'.$tr->id_rental) ?>"><i class="fas fa-check"></i></a>
						<?php if ($tr->status_rental=="Selesai") { ?>
							<a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
						<?php }else{ ?>
							<a onclick="return confirm('Yakin mau Batalkan Transaksi!!!') " class="btn btn-sm btn-danger" href="<?php echo base_url('admin/Transaksi/batal_transaksi/'.$tr->id_rental) ?>"><i class="fas fa-times"></i></a>
						<?php } ?>
						</div>
					<?php } ?>
				</td>
			</tr>
		<?php endforeach; ?>

	</table>
	</section>
</div>