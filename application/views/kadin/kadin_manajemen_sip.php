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
                           Daftar SIP Approved
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
                                <th>Action</th>
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


                                  $tgl_db = $validasi['tgl_validasi_kadin'];
                                  $tgl = new DateTime($tgl_db);
                                  $tgl_validasi = $tgl->format('d-m-Y');
                                  $date_plus = $tgl->modify("+5 years");

                                  if($data['masa_berlaku_str']=='Seumur Hidup'){
                                    $masa_berlaku_sip = $date_plus->format('d-m-Y');
                                    $masa_berlaku_str='Seumur Hidup';
                                  }  else {
                                      $tgl_str =$data['masa_berlaku_str'];
                                      $new_tgl_str = new DateTime($tgl_str);
                                      $masa_berlaku_sip=$new_tgl_str->format('d-m-Y');
                                      $masa_berlaku_str=$new_tgl_str->format('d-m-Y');
                                  }
                                  if($data['status']==3){
                                    $status = 'Aproved';
                                  }

                                  echo '  

                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$user['name'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$data['jenis_sip'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$data['nomor_sip'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$status.'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$tgl_validasi.'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$masa_berlaku_sip.'</strong></td>

                                    <td>
                                      <div class="btn-group">
                                      <a class="btn btn-primary" href="'.base_url().'sekdin/detail_sip/'.$data['id'].'" >Detail SIP</a>
                                      </div>

                                      </td>

                                    
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
      <form method="POST" action="<?php echo base_url();?>kadin/export_excel" enctype="multipart/form-data">
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
            <label for="emailWithTitle" class="form-label">Dari Tanggal</label>
            <input
              type="date"
              data-provide="datepicker"
              data-date-format="yyyy-mm-dd"
              id="emailWithTitle"
              class="form-control"
              name="tanggal_awal"
            />
          </div>
          <div class="col mb-0">
            <label for="dobWithTitle" class="form-label">Sampai Tanggal</label>
            <input
              type="date"
              id="dobWithTitle"
              class="form-control"
              placeholder="DD / MM / YY"
              name="tanggal_akhir"
            />
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>

    </div>
  </div>
</div>
    