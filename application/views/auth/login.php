<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>


<div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <img src="template/assets/img/favicon/icon_bjn.png" alt class="w-px-100 h-auto" />
                  </span>
                </a>
              </div>
              <div class="app-brand justify-content-center">
                <span class="text-body fw-bolder"><h3>SIPATAS</h3></span>
              </div>
              <!-- /Logo -->
              
              <h4 class="mb-2">Selamat Datang</h4>
              <p class="mb-4">Silahkan Login Menggunakan Akun Anda</p>
              <?php echo $this->session->flashdata('message');?>
              <form id="formAuthentication" class="mb-3" action="auth" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="username"
                    placeholder="Enter your email or username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a data-bs-toggle="modal" href="#modallupaPassword">
                      <small>Lupa Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"  onclick="myFunction()" ><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

              <p class="text-center">
                <a href="<?php echo base_url()?>auth/register_user">
                  <span>Buat Akun</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- modal lupa passsword -->
      <div class="modal fade" id="modallupaPassword" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel2">Reset Password</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <form method="POST" action="<?php echo base_url();?>auth/reset_password">
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                   <label class="form-label" for="emailSmall">Email</label>
                  <input type="text" class="form-control" id="emailSmall" name="email" placeholder="Masukan Email Anda" />
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Reset</button>
            </div>
          </form>
          </div>
        </div>
      </div>




    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>