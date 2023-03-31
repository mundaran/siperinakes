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
                          <h5 class="card-title text-primary">Congratulations <?php echo $user['name']?> 🎉</h5>
                          <p class="mb-4">
                            Anda Telah Bergabung Sebagai Peri Nakes Ayok Mulai Tambahkan Perijinan Kamu
                          </p>

                          <a href="<?php echo base_url()?>nakes/register_sip" class="btn btn-sm btn-outline-primary">Mulai Sekarang</a>
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
                      <a href="<?php echo base_url();?>nakes/register_sip">
                      <div class="card">
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
                          <span class="fw-semibold d-block mb-1">Daftar SIP Baru</span>
                            <?php
                            $id_user=$user['id'];
                            $status = 2;
                            $this->db->like('id_user',$id_user); 
                            $this->db->like('status', $status);
                            $this->db->from('data_sip');
                            ?>
                          <h3 class="card-title mb-1"><?php echo $this->db->count_all_results();?></h3>
                          <small class="text-success fw-semibold"> SIP Baru Sedang Ditinjau </small>
                        </div>
                      </div>
                      </a>

                    </div>

                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                      <a href="<?php echo base_url();?>nakes/manajemen_sip">
                      <div class="card">
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
                          <span class="fw-semibold d-block mb-1">SIP Terdaftar </span>
                            <?php 
                            $id_user=$user['id'];
                            $this->db->like('id_user',$id_user);
                            $this->db->like('status',3);
                            $this->db->from('data_sip');
                            ?>
                          <h3 class="card-title text-nowrap mb-1"><?php echo $this->db->count_all_results();?></h3>
                          <small class="text-success fw-semibold"><i class=""></i> SIP Telah Terdaftar </small>
                        </div>
                      </div>
                      </a>
                    </div>
                 
                    <div class="col-lg-3 col-md-12 col-6 mb-4">

                      <a href="<?php echo base_url();?>nakes/list_perpanjangan">
                      <div class="card">
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
                          <span class="fw-semibold d-block mb-1">Daftar Perpanjangan SIP</span>
                          <h3 class="card-title mb-1">0</h3>
                          <small class="text-success fw-semibold"> Perpanjangan Sedang Ditinjau </small>
                        </div>
                      </div>
                      </a>

                    </div>

                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                      <a href="<?php echo base_url();?>nakes/revisi">
                      <div class="card">
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
                          <span class="fw-semibold d-block mb-1">SIP Revisi </span>
                          <?php 
                            $id_user=$user['id'];
                            $this->db->like('id_user',$id_user);
                            $this->db->like('status',4);
                            $this->db->from('data_sip');
                            ?>
                          <h3 class="card-title text-nowrap mb-1"><?php echo $this->db->count_all_results();?></h3>
                          <small class="text-success fw-semibold"><i class=""></i> SIP </small>
                        </div>
                      </div>
                      </a>
                    </div>
                  </div>

              <div class="row">
                <div class="col-12 col-lg-12 col-md-12 order-1 ">
                <div class="card">
                <h5 class="card-header">Tutorial</h5>
                <div class="card-body mb-5">
                  <div class="row">
                    <!-- Custom content with heading -->
                    <div class="col-lg-12 mb-5 mb-xl-0">
                      <small class="text-light fw-semibold">Cari Tahu Caranya Yuk !!</small>
                      <div class="mt-3">
                        <div class="row">
                          <div class="col-md-4 col-12 mb-5 mb-md-0">
                            <div class="list-group">
                              <a class="list-group-item list-group-item-action active"
                                id="list-home-list"
                                data-bs-toggle="list"
                                href="#list-home">Syarat Registrasi Sip</a>
                              <a class="list-group-item list-group-item-action"
                                id="list-profile-list"
                                data-bs-toggle="list"
                                href="#list-profile">Syarat Perpanjang</a>
                              <a class="list-group-item list-group-item-action"
                                id="list-messages-list"
                                data-bs-toggle="list"
                                href="#list-messages">Syarat Perubahan</a>
                              <a class="list-group-item list-group-item-action"
                                id="list-settings-list"
                                data-bs-toggle="list"
                                href="#list-settings">Syarat Pencabutan</a>
                            </div>
                          </div>
                          <div class="col-md-8 col-12">
                            <div class="tab-content p-0">
                              <div class="tab-pane fade show active" id="list-home">
                               
                                <p>Pas Foto 4x6 </p>
                                <p>Foto KTP Asli</p>
                                <p>Foto STR</p>
                                <p>Foto Surat Sehat</p>
                                <p>Foto Surat Pernyataan</p>
                                <p>Foto Rekomendasi Organisasi Profesi</p>
                                <p>Foto Rekomendasi Tempat Praktek</p>
                                 

                              </div>
                              <div class="tab-pane fade" id="list-profile">
                                <p>Foto STR</p>
                                <p>Foto Rekomendasi Organisasi Profesi</p>
                                <p>Foto Rekomendasi Tempat Praktek</p>
                              </div>
                              <div class="tab-pane fade" id="list-messages">
                                Ice cream dessert candy sugar plum croissant cupcake tart pie apple pie. Pastry
                                chocolate chupa chups tiramisu. Tiramisu cookie oat cake. Pudding brownie bonbon. Pie
                                carrot cake chocolate macaroon. Halvah jelly jelly beans cake macaroon jelly-o. Danish
                                pastry dessert gingerbread powder halvah. Muffin bonbon fruitcake dragée sweet sesame
                                snaps oat cake marshmallow cheesecake. Cupcake donut sweet bonbon cheesecake soufflé
                                chocolate bar.
                              </div>
                              <div class="tab-pane fade" id="list-settings">
                                Marzipan cake oat cake. Marshmallow pie chocolate. Liquorice oat cake donut halvah
                                jelly-o. Jelly-o muffin macaroon cake gingerbread candy cupcake. Cake lollipop lollipop
                                jelly brownie cake topping chocolate. Pie oat cake jelly. Lemon drops halvah jelly
                                cookie bonbon cake cupcake ice cream. Donut tart bonbon sweet roll soufflé gummies
                                biscuit. Wafer toffee topping jelly beans icing pie apple pie toffee pudding. Tiramisu
                                powder macaroon tiramisu cake halvah.
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                    <!--/ Custom content with heading -->
                  </div>
                </div>
              </div>
              </div>
          </div>




  </div>
  </div>
</div>
    