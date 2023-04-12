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
                          <h5 class="card-title text-success"><?php echo $title;?>🎉</h5>
                          <p class="mb-4">
                           Permohonan Perpanjang SIP
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

                         <div class="table-responsive text-nowrap">
                          <table id="myTable" class="dispaly table table-borderless">
                            <thead>
                              <tr>
                                <th>Jenis Sip</th>
                                <th>Nomor SIP</th>
                                <th>Tanggal Request</th>
                                <th>Status</th>
                              </tr>
                              
                            </thead>
                            <tbody class="">
                              <?php foreach ($perpanjang_sip as $sip) {

                                  $id_list= $sip['id'];
                                  $data_list = $this->db->query("SELECT * FROM riwayat_perpanjangan WHERE id_sip = $id_list AND status='undone'");
                                  $list= $data_list->row_array();
                                  if($sip['status']==5){
                                    $status_perp ='Sedang Ditinjau';
                                  } elseif($sip['status']==7){
                                    $status_perp ='<a href="'.base_url().'nakes/form_revisi_perpanjangan/'.$sip['id'].'" class="btn btn-sm btn-danger">REVISI PERPANJANGAN</a>';
                                  }elseif($sip['status']==8){
                                    $status_perp ='Revisi Sedang Ditinjau';
                                  }

                                  echo '

                                    <tr>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$sip['jenis_sip'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$sip['nomor_sip'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$list['tanggal'].'</strong></td>

                                    <td>'.$status_perp.'</td>

                                    
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



