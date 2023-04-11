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
                          <?php echo $this->session->flashdata('message');?>
                          <?php 
                           $id = $this->uri->segment(3);
                            $datavalidasi = $this->db->query("SELECT * FROM data_sip WHERE id =$id ");
                            $datasip = $datavalidasi->row_array();
                          ?>
                          <h4 class="card-title text-danger"><b>Form Pencabutan</b></h4>
                          <p class="mb-4">
                            SIP : <?php echo $datasip['jenis_sip'];?>
                            
                          </p>
                          <?php
                            $id_user = $datasip['id_user'];
                            $datapemohon = $this->db->query("SELECT * FROM user WHERE id = $id_user ");
                            $datauser= $datapemohon->row_array();
                          ?>
                          <p class="mb-4">
                            PEMOHON : <?php echo $datauser['name'];?>
                          </p>
                          <p>Surat Permohonan Cabut SIP</p>
                          <p>Nomor SIP : <?php echo $datasip['nomor_sip'];?></p>

                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="<?php echo base_url()?>template/assets/img/illustrations/ai1.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                       <div class="col-sm-6">
                        <div class="card-body">
                          
                         <?php if(empty($datasip['surat_cabut'])){
                            echo "Data Belum Diisi";
                          }

                          else{
                            echo '<embed src="'.base_url().'document/surat_cabut/'.$datasip['surat_cabut'].'.pdf" width="550" height="700"> </embed>';
                          }

                          ?>
                        </div>
                        </div>

                      <div class="col-sm-6">
                      <div class="card-body">

                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Jenis SIP</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class="bx bx-note"></i
                            ></span>
                            <input type="text" id="basic-icon-default-company" class="form-control" name="no_str" value="&nbsp;&nbsp;<?php echo $datasip['jenis_sip']?>" placeholder=""
                              aria-describedby="basic-icon-default-company2" disabled />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Nomor STR</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class="bx bx-barcode"></i
                            ></span>
                            <input type="text" id="basic-icon-default-company" class="form-control" name="no_str" value="&nbsp;&nbsp;<?php echo $datasip['no_str']?>" placeholder=""
                              aria-describedby="basic-icon-default-company2" disabled />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email" >Masa Berlaku STR</label>
                          <div class="input-group">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class="bx bx-calendar"></i
                            ></span>
                            <input type="date" aria-label="First" name="masa_berlaku_str" value="<?php echo $datasip['masa_berlaku_str']?>" class="form-control" disabled/>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Tempat Praktek</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-address" class="input-group-text">
                              <i class="bx bx-buildings"></i>
                            </span>
                            <input type="text" aria-label="Last name" class="form-control" name="tempat_praktek" value="&nbsp;&nbsp;<?php echo $datasip['tempat_praktek']?>" placeholder="Klinik" disabled />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Alamat Praktek</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-address" class="input-group-text">
                              <i class="bx bxs-building-house" type="solid"></i>
                            </span>
                            <input type="text" name="alamat_praktek" class="form-control" placeholder="" value="&nbsp;&nbsp;<?php echo $datasip['alamat_praktek']?>" disabled />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Jenis Praktek</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-address" class="input-group-text"
                              ><i class="bx bx-user-pin"></i
                            ></span>
                            <input type="text" name="jenis_praktek" class="form-control" placeholder="" value="&nbsp;&nbsp;<?php echo $datasip['jenis_praktek']?>" disabled />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Hari Praktek/Jam Praktek</label>
                          <div class="input-group input-group-merge">
                             <span id="basic-icon-address" class="input-group-text"
                              ><i class="bx bx-calendar"></i
                            ></span>
                            <input type="text" name="jenis_praktek" class="form-control" placeholder="" value="&nbsp;&nbsp;<?php echo $datasip['hari_awal_praktek']?>" disabled />
                          </div>
                        </div>
                        <button
                          type="button"
                          class="btn btn-lg btn-danger"
                          data-bs-toggle="modal"
                          data-bs-target="#modalApprove"
                        >
                        Cabut SIP
                        </button>
                        <button  onclick="goBack()" class="btn btn-lg btn-secondary" >Kembali</button>
                        <script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>




                        <!-- Modal -->
                        <div class="modal fade" id="modalApprove" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content ">
                              <div class="modal-header">
                                <h5 class="modal-title " id="modalCenterTitle" >Konfirmasi Cabut SIP</h5>
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
                                    <p class="card-text text-danger" ><font size="5">Yakin Ingin Mencabut SIP ?</font></p>
                                    <p>Nomor SIP : <?php echo $datasip['nomor_sip'];?></p>
                                    <br>
                                    <br>
                                    <form method="POST" action="<?php echo base_url();?>administrator/aksi_approval_cabut_sip/<?php echo $this->uri->segment(3);?>/<?php echo $datasip['id_user'];?>">
                                      <input type="hidden" value="3" name="status_validasi">
                                      <input type="hidden" value="Dicabut" name="keterangan">
                                      <input type="hidden" name="status_sip" value="10">
                                      <input type="hidden" name="title_validasi" value='<div class="alert alert-success" role="alert"><b> Data Telah Dicabut</b></div>'>
                                      <BR>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                      Close
                                    </button>
                                    <button type="submit" class="btn btn-danger">Cabut</button>
                                    </form>
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
                </div>
              </div>





  </div>
  </div>
</div>
    