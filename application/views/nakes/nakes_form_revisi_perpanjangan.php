<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>


        <div class="content-wrapper">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
               
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="card">
                    <?php echo $this->session->flashdata('message');?>
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Form Revisi Permohonan Perpanjang SIP</h5>
                      <?php
                        $id_sip = $this->uri->segment(3);
                        $note_sip = $this->db->query("SELECT * FROM validasi_sip WHERE id_sip=$id_sip");
                        $note = $note_sip->row_array();

                      ?>
                      <div class="alert alert-danger" role="alert"> Note : <?php echo $note['keterangan']; ?>
                        <p>Revisi Sesuai Note Saja, Jika Sudah Klik Selesai </p>
                      </div>
                    </div>
                    <?php
                      $id_sip = $this->uri->segment(3);
                      $rev_sip = $this->db->query("SELECT * FROM data_sip WHERE id=$id_sip");
                      $datasip = $rev_sip->row_array();

                    ?>

                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">
                            <div class="mb-3">
                              <form action="<?php echo base_url();?>nakes/aksi_update_no_str_baru/<?php echo $this->uri->segment(3)?>" method="POST" >
                              <label class="form-label" for="basic-icon-default-company">Nomor STR Baru</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"
                                  ><i class="bx bx-barcode"></i
                                ></span>
                                <input type="text " id="basic-icon-default-company" class="form-control" name="no_str_baru" placeholder=""
                                  aria-describedby="basic-icon-default-company2" value="<?php echo $datasip['no_str'];?>" />
                                  <button type="submit" class="btn btn-primary">Update No STR</button>
                              </div>
                              </form>
                            </div>
                            <div class="mb-3">
                              <form action="<?php echo base_url();?>nakes/aksi_update_masa_berlaku/<?php echo $this->uri->segment(3)?>" method="POST" >
                              <label class="form-label" for="basic-icon-default-company">Masa Berlaku STR Baru</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"
                                  ><i class="bx bx-barcode"></i
                                ></span>
                                <input type="date" id="basic-icon-default-company" class="form-control" name="masa_berlaku_str" placeholder=""
                                  aria-describedby="basic-icon-default-company2" value="<?php echo $datasip['masa_berlaku_str'];?>" />
                                  <button type="submit" class="btn btn-primary">Update Tgl STR</button>
                              </div>
                              </form>
                            </div>
                            <div class="mb-3">
                              <form action="<?php echo base_url();?>nakes/aksi_update_str_perpanjangan/<?php echo $this->uri->segment(3)?>" method="POST" enctype="multipart/form-data">
                              <label class="form-label" for="basic-icon-default-company">Foto STR Baru</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"
                                  ><i class="bx bx-barcode"></i
                                ></span>
                                <input type="file" id="basic-icon-default-company" class="form-control" name="foto_str_baru" placeholder=""
                                  aria-describedby="basic-icon-default-company2" required />
                                <button type="submit" class="btn btn-primary">Update Berkas</button>
                              </div>
                              </form>
                            </div>
                            <div class="mb-3">
                              <form action="<?php echo base_url();?>nakes/aksi_update_sip_lama_perpanjangan/<?php echo $this->uri->segment(3)?>" method="POST" enctype="multipart/form-data">
                              <label class="form-label" for="basic-icon-default-company">Foto SIP Lama</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"
                                  ><i class="bx bx-barcode"></i
                                ></span>
                                <input type="file" id="basic-icon-default-company" class="form-control" name="foto_sip_lama" placeholder=""
                                  aria-describedby="basic-icon-default-company2" required />
                                  <button type="submit" class="btn btn-primary">Update Berkas</button>
                              </div>
                              </form>
                            </div>
                            <div class="mb-3">
                              <form action="<?php echo base_url();?>nakes/aksi_update_rop_baru/<?php echo $this->uri->segment(3)?>" method="POST" enctype="multipart/form-data">
                              <label class="form-label" for="basic-icon-default-company">Foto ROP Baru</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"
                                  ><i class="bx bx-barcode"></i
                                ></span>
                                <input type="file" id="basic-icon-default-company" class="form-control" name="foto_rop_baru" placeholder=""
                                  aria-describedby="basic-icon-default-company2" required />
                                  <button type="submit" class="btn btn-primary">Update Berkas</button>
                              </div>
                              </form>
                            </div>
                            <a href="<?php echo base_url();?>nakes/selesai_revisi_perpanjangan/<?php echo $this->uri->segment(3);?>" class="btn btn-primary"> Selesai Revisi </a>
                            <a href="<?php echo base_url();?>nakes/list_perpanjangan" class="btn btn-secondary"> Kembali </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          <div class="row">
          </div>

        </div>
      </div>
       
      </div>