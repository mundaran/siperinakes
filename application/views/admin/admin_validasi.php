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
                          <h5 class="card-title text-primary">PENGAJUAN SIP BARU🎉</h5>
                          <p class="mb-4">
                           Siapkan Kopimu Dan Mulai Validasi.
                          </p>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="<?php echo base_url()?>template/assets/img/illustrations/ai2.png"
                            height="150"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">
                          <?php echo $this->session->flashdata('message');?>
                         <div class="table-responsive text-nowrap">
                          <table id="myTable" class="dispaly table table-borderless">
                            <thead>
                              <tr>
                                <th>Nama Pemohon</th>
                                <th>Jenis Sip</th>
                                <th>Validasi</th>
                                <th>Tanggal</th>
                              </tr>
                              
                            </thead>
                            <tbody class="">

                                <?php foreach ($sip as $dataSip) {

                                  $id_user = $dataSip['id_user'];
                                  $datapemohon = $this->db->query("SELECT * FROM user WHERE id = $id_user ");
                                  $datauser= $datapemohon->row_array();

                                  echo '

                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$datauser['name'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$dataSip['jenis_sip'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><a href="'.base_url().'administrator/form_validasi_sip/'.$dataSip['id'].'" class="btn btn-sm btn-primary"><span class="tf-icons bx bx-note"></span>&nbsp; Validasi</a></strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$dataSip['tanggal_daftar'].'</strong></td>
                                  </tr>



                                  ';
                                 
                                  
                                } ?>
                                 
                                  
                                
                                
                            </tbody>
                          </table>
                        </div>

                      
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>





  </div>
  </div>
</div>
    