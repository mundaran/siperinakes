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
                          <h5 class="card-title text-danger">List Pencabutan SIP</h5>
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
                                <th>Jenis SIP</th>
                                <th>Nomor SIP</th>
                                <th>Nama Pemohon</th>
                                <th>Status</th>
                              </tr>
                              
                            </thead>
                            <tbody class="">
                              <?php foreach ($cabut_sip as $sip_cabut) {

                                  
                                  if($sip_cabut['status']==9){
                                    $status_perp ='<a href="'.base_url().'administrator/form_pencabutan/'.$sip_cabut['id'].'" class="btn btn-sm btn-danger"><span class="tf-icons bx bx-note"></span>&nbsp; Konfirmasi Cabut</a>';
                                  } elseif($sip_cabut['status']==10){
                                    $status_perp ='SIP Dicabut';
                                  }

                                  $id_nakes = $sip_cabut['id_user'];
                                  $data_nakes = $this->db->query("SELECT * FROM user WHERE id = $id_nakes ");
                                  $nakes=$data_nakes->row_array();

                                  echo '

                                    <tr>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$sip_cabut['jenis_sip'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$sip_cabut['nomor_sip'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$nakes['name'].'</strong></td>

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

