<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Account Settings /</span> Notifications
              </h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url();?>nakes/my_profile"
                        ><i class="bx bx-user me-1"></i> Account</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="<?php echo base_url();?>nakes/notification"
                        ><i class="bx bx-bell me-1"></i> Notifications</a
                      >
                    </li>
                  </ul>
                  <div class="card">
                    <!-- Notifications -->
                    <h5 class="card-header">Tabel Notifikasi</h5>
                    <div class="card-body">
                      <span
                        >Notifikasi Anda Akan Muncul Disini,
                        <span class="notificationRequest"><strong>Anda Belum Memiliki Notifikasi</strong></span></span
                      >
                      <div class="error"></div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-borderless border-bottom">
                        <thead>
                          <tr>
                            <th class="text-nowrap">Notifikasi</th>
                            <th class="text-nowrap text-center">✉️ Pesan</th>
                            <th class="text-nowrap text-center">🖥 Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="mt-4">
                            <a href="" class="btn btn-primary me-2">Kembali</a>
                          </div>
                        </div>
                    </div>
                    <!-- /Notifications -->
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->