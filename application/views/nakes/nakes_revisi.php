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
                           Revisi Berkas
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
                                <th>Tanggal Request</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                              </tr>
                              
                            </thead>
                            <tbody class="">
                              <?php foreach ($sip_revisi as $sip) {

                                  $id_validasi= $sip['id'];
                                  $data_list = $this->db->query("SELECT * FROM validasi_sip WHERE id_sip = $id_validasi ");
                                  $validasi= $data_list->row_array();


                                  echo '

                                    <tr>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$sip['jenis_sip'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$validasi['tanggal_validasi'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$validasi['keterangan'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><a href="'.base_url().'nakes/form_revisi_sip/'.$sip['id'].'" class="btn btn-sm btn-danger"><span class="tf-icons bx bx-note"></span>&nbsp; Revisi</a></strong></td>

                                    
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



