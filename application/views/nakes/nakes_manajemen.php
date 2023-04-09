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
                          <h5 class="card-title text-primary"><?php echo $title;?>🎉</h5>
                          <p class="mb-4">
                           SIP yang telah di Approve Dinas Kesehatan
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
                                <th>Jenis Sip</th>
                                <th>No SIP</th>
                                <th>Status</th>
                                <th>Tanggal Approve</th>
                                <th>Tanggal Daftar</th>
                                <th>Tanggal Berakhir</th>
                                <th>Action</th>
                              </tr>
                              
                            </thead>
                            <tbody class="">

                                <?php foreach ($data_sip as $sip) {

                                  $id_sip= $sip['id'];
                                  $dataApprove = $this->db->query("SELECT * FROM validasi_sip WHERE id_sip= $id_sip ");
                                  $Approve= $dataApprove->row_array();

                                  $id_user= $sip['id_user'];
                                  $dataUser = $this->db->query("SELECT * FROM user WHERE id = $id_user ");
                                  $user= $dataUser->row_array();

                                  if($sip['status']==3){
                                    $status ='Approve';
                                  }

                                  echo '

                                    <tr>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$sip['jenis_sip'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$sip['nomor_sip'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$status.'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$Approve['tanggal_validasi'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$sip['tanggal_daftar'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$sip['masa_berlaku_str'].'</strong></td>

                                    <td>
                                      <div class="btn-group">
                                        <button
                                          type="button"
                                          class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow"
                                          data-bs-toggle="dropdown"
                                          aria-expanded="false"
                                        >
                                          <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                          <li><a class="dropdown-item" href="'.base_url().'nakes/detail_sip/'.$sip['id'].'">Detail SIP</a></li>
                                          <li><a class="dropdown-item" href="'.base_url().'nakes/form_perpanjangan_sip/'.$sip['id'].'">Perpanjangan</a></li>
                                          <li><a class="dropdown-item" data-bs-toggle="modal" href="#modalCabut'.$sip['id'].'">Cabut SIP</a></li>
                                        </ul>
                                      </div>

                                      </td>

                                    
                                  </tr>

                                  <div class="modal fade" id="modalCabut'.$sip['id'].'" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content ">
                                        <div class="modal-header">
                                          <h5 class="modal-title " id="modalCenterTitle" >Perhatian !!</h5>
                                          <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"
                                          ></button>
                                        </div>
                                        <div class="modal-body"> 
                                          <div class="row">
                                            <div class="col mb-3 align-center">
                                              <div class="card-body text-center">
                                              <p class="card-text text-danger" ><font size="5">Yakin Ingin Cabut SIP ?</font></p>
                                              <p><b>Dengan Nomor : '.$sip['nomor_sip'].'</b></p>
                                              <br>
                                              <label>Silahkan Upload Surat Permohonan Cabut SIP</label>
                                              <form action="'.base_url().'nakes/aksi_cabut_sip/'.$sip['id'].'" method="POST" enctype="multipart/form-data">
                                                <input type="file" class="form-control" name="surat_cabut" required>
                                                <br>
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">OK</button>
                                              </form>
                                            </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

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

 <!-- Modal Selesai Revisi-->
    

