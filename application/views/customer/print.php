<div class="row"></div>
<?php foreach ($transaksi as $tr):?>
<div class="row" style="margin-top: 85px;"></div>
<table class="table">
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php echo $this->session->userdata('nama'); ?></td>
	</tr>
	<tr>
		<td>Merk Mobil</td>
		<td>:</td>
		<td><?php echo $tr->merk ?></td>
	</tr>
	<tr>
		<td>Tgl Rental Mobil</td>
		<td>:</td>
		<td><?php echo $tr->tanggal_rental ?></td>
	</tr>
	<tr>
		<td>Tgl Kembali Mobil</td>
		<td>:</td>
		<td><?php echo $tr->tanggal_kembali ?></td>
	</tr>
	<tr>
		<td>Harga Sewa/Hari</td>
		<td>:</td>
		<td>Rp.<?php echo number_format($tr->harga,0,',','.') ?></td>
	</tr>
	<tr>
		<?php  $x= strtotime($tr->tanggal_rental);
			   $y= strtotime($tr->tanggal_kembali);
			   $jumlah=($y-$x)/(60*60*24);

		 ?>
		<td>Jumlah Hari Sewa</td>
		<td>:</td>
		<td><?php echo $jumlah; ?> Hari</td>
	</tr>

	<tr>
		<td class="text-success">Total Pembayaran</td>
		<td>:</td>
		<td>Rp.<?php echo number_format($tr->harga * $jumlah,0,',','.'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>
		</td>
	</tr>

</table>
<?php endforeach; ?>


<script type="text/javascript">
	window.print();
</script>