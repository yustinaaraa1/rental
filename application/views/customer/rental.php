<div class="row"></div>

<div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Send us a Message</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <?php foreach ($mobil as $mb):?>
              <form action="<?php echo base_url('customer/dashboard/rental_aksi') ?>" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <label>Harga Sewa/hari</label>
                      <input type="hidden" name="id_mobil" value="<?php echo $mb->id_mobil ?>">
                     <input name="harga" type="text" class="form-control" id="name" value="<?php echo $mb->harga ?>" readonly>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <label>Denda Telat/hari</label>
                      <input name="denda" type="text" class="form-control" id="email" value="<?php echo $mb->denda ?>" readonly>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <label>Tanggal Rental</label>
                      <input name="tanggal_rental" type="date" class="form-control" id="subject"required>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <label>Tanggal Kembali</label>
                      <input name="tanggal_kembali" type="date" class="form-control" id="subject"required>
                    </fieldset>
                  </div>
        
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>