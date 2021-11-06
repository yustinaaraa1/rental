<div class="row"></div>
<div class="container">	
	<div class="row" style="margin-top: 98px;">
		<table class="table table-bordered table-striped">
			<?php echo $this->session->flashdata('pesan'); ?>
			<tr>
				<th>No</th>
				<th>Nama Customer</th>
				<th>No Plat</th>
				<th>Harga Sewa</th>
				<th>Aksi</th>
				<th>Batal</th>
			</tr>
			<?php $no=1;	foreach ($transaksi as $tr): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $tr->nama; ?></td>
					<td><?php echo $tr->no_plat; ?></td>
					<td><?php echo $tr->harga ?></td>
					<td><?php if ($tr->status_rental=="Belum Selesai"){?>
						<a href="<?php echo base_url('customer/transaksi/cek_pembayaran/'.$tr->id_rental); ?>" class="btn btn-sm btn-success">Cek Pembayaran</a>
						<?php }else{ ?>
							<a class="btn btn-sm btn-danger">Rental Selesai</a>
						<?php } ?>
					</td>
					<td>
						<?php if ($tr->status_rental=="Selesai") {?>
							<a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></a>
						<?php }else{?>
							<a onclick="return confirm('Yakin Mau Batal') " href="<?php echo base_url('customer/transaksi/batal_transaksi/'.$tr->id_rental) ?>" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></a>
						<?php } ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>	
</div>	


















<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Teransaksi tidak bisa dibatalkan/Transasi Sudah selesai
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>