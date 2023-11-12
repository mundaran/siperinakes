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
                          <h5 class="card-title text-info"><?php echo $title;?>🎉</h5>
                          <p class="mb-4">
                           Daftar Progres SIP
                          </p>
                           <?php echo $this->session->flashdata('message');?>
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
                                <th>Nama Pemohon</th>
                                <th>Jenis Sip</th>
                                <th>Nomor Sip</th>
                                <th>Status Sip</th>
                                <th>Tanggal Approve</th>
                                <th>Tanggal Berakhir</th>
                              </tr>
                              
                            </thead>
                            <tbody class="">

                                <?php foreach ($data_sip as $data) {

                                  $id_user= $data['id_user'];
                                  $dataUser = $this->db->query("SELECT * FROM user WHERE id = $id_user ");
                                  $user= $dataUser->row_array();

                                  $id_sip= $data['id'];
                                  $dataValidasi = $this->db->query("SELECT * FROM validasi_sip WHERE id_sip = $id_sip ");
                                  $validasi= $dataValidasi->row_array();

                                  if($data['status']==3){
                                    $status = 'Konfirmasi Kabag';
                                  }

                                  echo '  

                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$user['name'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$data['jenis_sip'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$data['nomor_sip'].'</strong></td>

                                    <td><span class="badge bg-label-warning me-1">'.$status.' </span></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$validasi['tanggal_validasi'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$data['masa_berlaku_str'].'</strong></td>
                                    
                                  </tr>

                                  <div class="modal fade" id="modalCabut'.$data['id'].'" tabindex="-1" aria-hidden="true">
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
                                              <p><b>Dengan Nomor : '.$data['nomor_sip'].'</b></p>
                                              <br>
                                              <label>Silahkan Upload Surat Permohonan Cabut SIP</label>
                                              <form action="'.base_url().'administrator/aksi_cabut_sip/'.$data['id'].'" method="POST" enctype="multipart/form-data">
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

                        <a class="btn btn-success fw-bolder" data-bs-toggle="modal" href="#ModalExport" > Export Excel </a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>


  </div>
  </div>
</div>

<!-- Modal Export Excel SIP -->
<div class="modal fade" id="ModalExport" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Export To Excel</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="col mb-0">
            <label for="emailWithTitle" class="form-label">Email</label>
            <input
              
              data-provide="datepicker"
              data-date-format="yyyy-mm-dd"
              id="emailWithTitle"
              class="form-control"
            />
          </div>
          <div class="col mb-0">
            <label for="dobWithTitle" class="form-label">DOB</label>
            <input
              type="text"
              id="dobWithTitle"
              class="form-control"
              placeholder="DD / MM / YY"
            />
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    