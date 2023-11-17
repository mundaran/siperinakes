<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

 <div class="content-wrapper">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Selamat Datang <?php echo $user['name']?> 🎉</h5>
                          <p class="mb-4">
                            Selamat datang di dashboard Kabag
                          </p>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="<?php echo base_url()?>template/assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                      <a href="<?php echo base_url();?>sekdin/validasi_sip_kabag" class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="template/assets/img/icons/unicons/user1.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Ditinjau Kabag</span>
                            <?php 
                            $query = $this->db->query("SELECT * FROM data_sip WHERE status = 11");  
                            $kabag = $query->num_rows();
                            ?>
                          <h3 class="card-title mb-2"><?php echo $kabag;?></h3>
                          <small class="text-secondary fw-semibold"> Sedang Di Tinjau Kabag </small>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                      <a href="<?php echo base_url();?>sekdin/validasi_sip_sekdin" class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="template/assets/img/icons/unicons/cc-warning.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Perlu Anda Tinjau</span>
                            <?php 
                            $query_sekdin = $this->db->query("SELECT * FROM data_sip WHERE status = 12");  
                            $sekdin = $query_sekdin->num_rows();
                            ?>
                          <h3 class="card-title text-nowrap mb-1"><?php echo $sekdin;?></h3>
                          <small class="text-secondary fw-semibold"><i class=""></i> Mohon Cek Validasi</small>
                        </div>
                      </a>
                    </div>
                 
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                      <a href="<?php echo base_url();?>sekdin/progres_sip" class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="template/assets/img/icons/unicons/cc-primary.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Proses Kepala Dinas</span>
                          <?php 
                            $query_kadin = $this->db->query("SELECT * FROM data_sip WHERE status = 14");  
                            $kadin = $query_kadin->num_rows();
                            ?>
                          <h3 class="card-title mb-2"><?php echo $kadin;?></h3>
                          <small class="text-secondary fw-semibold"> Sedang Ditinjau Oleh Kepala Dinas </small>
                        </div>
                      </a>
                    </div>

                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                      <a href="<?php echo base_url();?>sekdin/manajemen_sip" class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="template/assets/img/icons/unicons/cc-success.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">SIP Diterbitkan </span>
                          <?php 
                            $query_terbit = $this->db->query("SELECT * FROM data_sip WHERE status = 3");  
                            $terbit = $query_terbit->num_rows();
                            ?>
                          <h3 class="card-title text-nowrap mb-1"><?php echo $terbit;?></h3>
                          <small class="text-secondary fw-semibold"><i class=""></i> Telah Diterbitkan Oleh Kadin </small>
                        </div>
                      </a>
                    </div>

              </div>
<!--
              <div class="row">
                <div class="col-12 col-lg-12 col-md-12 order-1 ">
                <div class="card">
                <h5 class="card-header"></h5>
                <div class="card-body mb-5">
                  <div class="row">
                    <div class="col-lg-12 mb-5 mb-xl-0">
                      <small class="text-light fw-semibold">Andik Mengajukan Sip Baru</small>
                      <p>
                      <small class="text-light fw-semibold">Andik Mengupload berkas Sip Baru</small>
                      </p>                      
                    </div>
                   
                  </div>
                </div>
                </div>
                </div>
              </div> 

-->




  </div>
  </div>
</div>
    