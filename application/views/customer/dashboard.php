

   <div class="row"></div>

    <div class="products">
      <div class="container">
        <?php echo $this->session->flashdata('pesan'); ?>
        <div class="row">
          
          <?php foreach ($mobil as $mb): ?>
          <div class="col-md-4">
            <div class="product-item">
              <img src="<?php echo base_url('assets/upload/'.$mb->gambar); ?>" alt="">
              <div class="down-content">
                <h4>Merk:<?php echo $mb->merk ?></h4>
                <h6><small>Harga</small>Rp. <?php echo number_format($mb->harga,0,',','.') ?> <small>/hari</small></h6>
                <small>
                    <strong title="Detail"><a href="<?php echo base_url('customer/transaksi/detail_mobil/'.$mb->id_mobil) ?>" class="btn btn-sm btn-success">Detail</a></strong>
                    <strong title="Rental">
                      <?php if ($mb->status=="1"){?>
                        <a href="<?php echo base_url('customer/dashboard/rental/'.$mb->id_mobil) ?>" class="btn btn-sm btn-secondary">Rental</a>
                      <?php }else{?>
                        <a class="btn btn-sm btn-secondary">Sudah Dirental</a>
                    <?php } ?>
                    </strong>
                </small>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        </div>
      </div>
    </div>

    

    