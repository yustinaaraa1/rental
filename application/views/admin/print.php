<table style="margin-top: 45px; margin-bottom: 31px;">
	<h1 align="center">Laporan Data Rental</h1>
	<tr>
		<td>Dari Tanggal</td>
		<td>:</td>
		<td><?php echo date('d/m/Y',strtotime($_GET['dari'])) ?></td>
	</tr>
	<tr>
		<td>Dari Tanggal</td>
		<td>:</td>
		<td><?php echo date('d/m/Y',strtotime($_GET['sampai'])) ?></td>
	</tr>
</table>

<table class="table">
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
			</tr>
		<?php endforeach; ?>

	</table>


	<script type="text/javascript">
		window.print();
	</script>