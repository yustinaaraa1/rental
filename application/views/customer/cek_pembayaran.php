<div class="row">
</div>
<div class="container">
	<div class="row" style="margin-top: 98px;">
		<div class="col-md-8">
			<div class="card-header alert alert-success">
				Invoice Pembayaran
			</div>
			<div class="card-body">
				<?php foreach ($transaksi as $tr): ?>
				<table class="table">
					<tr>
						<th>Merk</th>
						<td>:</td>
						<td><?php echo $tr->merk ?></td>
					</tr>
					<tr>
						<th>Tgl Rental</th>
						<td>:</td>
						<td><?php echo $tr->tanggal_rental ?></td>
					</tr>
					<tr>
						<th>Tgl Kembali</th>
						<td>:</td>
						<td><?php echo $tr->tanggal_kembali ?></td>
					</tr>
					<tr>
						<th>Harga Sewa/Hari</th>
						<td>:</td>
						<td>Rp.<?php echo number_format($tr->harga,0,',','.') ?></td>
					</tr>
					<tr>
						<?php  $x= strtotime($tr->tanggal_rental);
							   $y= strtotime($tr->tanggal_kembali);
							   $jumlah=($y-$x)/(60*60*24);

						 ?>
						<th>Jumlah Hari Sewa</th>
						<td>:</td>
						<td><?php echo $jumlah; ?> Hari</td>
					</tr>

					<tr>
						<th class="text-success">Total Pembayaran</th>
						<td>:</td>
						<td>
						<button class="btn btn-sm btn-success">Rp.<?php echo number_format($tr->harga * $jumlah,0,',','.'); ?></button>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<a href="<?php echo base_url('customer/transaksi/print/'.$tr->id_rental) ?>" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i>Print Invoice</a>
						</td>
					</tr>

				</table>
			<?php endforeach; ?>
			</div>
		</div>
		<div class="col-md-4">
		<div class="card">
  		<div class="card-header alert alert-primary">
    		Informarsi Pembayaran
  		</div>
  			<div class="card-body">
  				<p>Silahkan melakukan pembayaran melalui no rekening dibawah ini.</p>
  				<ul class="list-group list-group-flush">
    			<li class="list-group-item">BNI : 39849874987</li>
    			<li class="list-group-item">BCA : 49848948</li>
    			<li class="list-group-item">BRI : 498794874897</li>
  			</ul>
  			</div>
  			<div>
  				<?php if (empty($tr->bukti_pembayaran)) {?>
  					<a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal" style="width: 99%;"><i class="fas fa-clock"></i> Upload</a>
  				<?php }elseif ($tr->status_pembayaran=="0") {?>
  					<a class="btn btn-sm btn-warning" style="width: 99%;"><i class="fas fa-clock"></i> Tunggu Konfimasih</a>
  				<?php }elseif ($tr->status_pembayaran=="1") { ?>
  					<a  class="btn btn-sm btn-success" style="width: 99%;"><i class="fas fa-check"></i> Transaksi Selesai</a>
  				<?php } ?>
  			</div>
  				

  			
		</div>

		
			
		</div>
	</div>
</div>














<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kirim Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo base_url('customer/transaksi/pembayaran_aksi') ?>" enctype="multipart/form-data">
      <div class="modal-body">
      	<input type="hidden" name="id_rental" value="<?php echo $tr->id_rental ?>">
        <input type="file" name="bukti_pembayaran" class="form-control" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
      </form>
    </div>
  </div>
</div>