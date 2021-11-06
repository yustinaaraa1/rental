<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url('assets/assets_stisla') ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
              <?php echo $this->session->flashdata('pesan'); ?>
              <div class="card-body">
                <form method="POST" action="<?php echo base_url('auth/login_aksi') ?>">
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="email" type="text" class="form-control" name="username">
                    <?php echo form_error('username','<div class="text-danger text-small">','</div>') ?>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password">
                    <?php echo form_error('username','<div class="text-danger text-small">','</div>') ?>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>