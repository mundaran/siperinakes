
<div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="dashboard" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <img src="<?php echo base_url()?>template/assets/img/favicon/icon_bjn.png" alt class="w-px-40 h-auto rounded-circle" />
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">Siperi Nasehat</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">REGISTRASI</h4>
              <p class="mb-4">Ayok Bergabung Bersama Siperi</p>
              <form id="daftar" class="mb-3" action="<?php echo base_url();?>auth/aksi_register_user" method="POST">
              <?php echo $this->session->flashdata('message');?>
                <div class="mb-3">
                  <label for="name" class="form-label" type="">Nama</label>
                  <input
                    required
                    type="text"
                    class="form-control"
                    id="email"
                    name="name"
                    placeholder="Nama Lengkap"
                    autofocus
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    required
                    type="text"
                    class="form-control"
                    id="email"
                    name="username-email"
                    placeholder="Masukan Email"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      required
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Konfirmasi Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      required
                      type="password"
                      id="password"
                      class="form-control"
                      name="confirm"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="konfirmasi password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Daftar</button>
                </div>
              </form>

              <p class="text-center">
                <a href="<?php echo base_url()?>auth">
                  <span>Login</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>