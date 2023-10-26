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
                <a href="dashboard" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <img src="<?php echo base_url()?>template/assets/img/favicon/icon_bjn.png" alt class="w-px-40 h-auto rounded-circle" />
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">SIPATAS</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">UBAH PASSWORD</h4>
              <?php echo $this->session->flashdata('message');?>
              <form id="formAuthentication" class="mb-3" action="<?php echo base_url()?>auth/aksi_ubah_password/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>" method="POST">

                <div class="mb-3 form-password-toggle">
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="new_password"
                      placeholder="Password Baru"
                      aria-describedby="password"
                      required
                    />
                    <span class="input-group-text cursor-pointer"  onclick="myFunction()" ><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password2"
                      class="form-control"
                      name="confirm_new_password"
                      placeholder="Konfirmasi Password Baru"
                      aria-describedby="password"
                      required
                    />
                    <span class="input-group-text cursor-pointer"  onclick="myFunction2()" ><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Ubah Password</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /Register -->
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

    <script>
        function myFunction2() {
            var x = document.getElementById("password2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>