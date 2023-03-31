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
                           Daftar Revisi SIP Baru
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
                                <th>Nama Pemohon</th>
                                <th>Note</th>
                                <th>Status</th>
                              </tr>
                              
                            </thead>
                            <tbody class="">
                              <?php foreach ($data_revisi as $sip) {

                                  $id_list= $sip['id'];
                                  $data_list = $this->db->query("SELECT * FROM validasi_sip WHERE id_sip = $id_list ");
                                  $list= $data_list->row_array();
                                  if($sip['status']==4){
                                    $status ='Sedang Direvisi';
                                  } elseif($sip['status']==6){
                                    $status ='<a href="'.base_url().'administrator/form_validasi_revisi/'.$sip['id'].'" class="btn btn-sm btn-info">Validasi</a>';
                                  }

                                  $id_nakes = $sip['id_user'];
                                  $data_nakes = $this->db->query("SELECT * FROM user WHERE id = $id_nakes ");
                                  $nakes=$data_nakes->row_array();

                                  echo '

                                    <tr>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$sip['jenis_sip'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$nakes['name'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$list['keterangan'].'</strong></td>

                                    <td>
                                      '.$status.'
                                    </td>

                                    
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

      <div class="row">
        <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-info">List Revisi Perpanjangan</h5>
                          <p class="mb-4">
                           Daftar Revisi SIP Perpanjangan
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
                          <table id="TabelRevisiPerpanjangan" class="dispaly table table-borderless">
                            <thead>
                              <tr>
                                <th>Jenis Sip</th>
                                <th>Nama Pemohon</th>
                                <th>Note</th>
                                <th>Status</th>
                              </tr>
                              
                            </thead>
                            <tbody class="">
                              <?php foreach ($data_revisi_perpanjangan as $sip_perp) {

                                  $id_list_perp= $sip_perp['id'];
                                  $data_list_perp = $this->db->query("SELECT * FROM validasi_sip WHERE id_sip = $id_list_perp ");
                                  $list_perp= $data_list_perp->row_array();
                                  if($sip_perp['status']==7){
                                    $status_perp ='Sedang Direvisi';
                                  } elseif($sip_perp['status']==8){
                                    $status_perp ='<a href="" class="btn btn-sm btn-danger">Validasi</a>';
                                  }

                                  $id_nakes_perp = $sip_perp['id_user'];
                                  $data_nakes_perp = $this->db->query("SELECT * FROM user WHERE id = $id_nakes_perp ");
                                  $nakes_perp=$data_nakes_perp->row_array();

                                  echo '

                                    <tr>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$sip_perp['jenis_sip'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$nakes_perp['name'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$list_perp['keterangan'].'</strong></td>

                                    <td>
                                      '.$status_perp.'
                                    </td>

                                    
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

