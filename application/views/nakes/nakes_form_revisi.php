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
                      <h3 class="mb-0">Revisi SIP Baru</h3>
                      <?php
                        $id_sip = $this->uri->segment(3);
                        $note_sip = $this->db->query("SELECT * FROM validasi_sip WHERE id_sip=$id_sip");
                        $note = $note_sip->row_array();

                      ?>
                      <div class="alert alert-danger" role="alert"> Note : <?php echo $note['keterangan']; ?></div>
                    </div>
                    <?php
                      $id_sip = $this->uri->segment(3);
                      $rev_sip = $this->db->query("SELECT * FROM data_sip WHERE id=$id_sip");
                      $datasip = $rev_sip->row_array();

                    ?>
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">
                          <h5>Data Pemohon</h5>
                          <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Jenis SIP</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class="bx bx-note"></i
                            ></span>
                            <input type="text" id="basic-icon-default-company" class="form-control" name="no_str" value="&nbsp;&nbsp;<?php echo $datasip['jenis_sip']?>" placeholder=""
                              aria-describedby="basic-icon-default-company2"  />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Nomor STR</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class="bx bx-barcode"></i
                            ></span>
                            <input type="text" id="basic-icon-default-company" class="form-control" name="no_str" value="&nbsp;&nbsp;<?php echo $datasip['no_str']?>" placeholder=""
                              aria-describedby="basic-icon-default-company2"  />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email" >Masa Berlaku STR</label>
                          <div class="input-group">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class="bx bx-calendar"></i
                            ></span>
                            <input type="date" aria-label="First" name="masa_berlaku_str" value="<?php echo $datasip['masa_berlaku_str']?>" class="form-control" />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Tempat Praktek</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-address" class="input-group-text">
                              <i class="bx bx-buildings"></i>
                            </span>
                            <input type="text" aria-label="Last name" class="form-control" name="tempat_praktek" value="&nbsp;&nbsp;<?php echo $datasip['tempat_praktek']?>" placeholder="Klinik"  />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Alamat Praktek</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-address" class="input-group-text">
                              <i class="bx bxs-building-house" type="solid"></i>
                            </span>
                            <input type="text" name="alamat_praktek" class="form-control" placeholder="" value="&nbsp;&nbsp;<?php echo $datasip['alamat_praktek']?>"  />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Jenis Praktek</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-address" class="input-group-text"
                              ><i class="bx bx-user-pin"></i
                            ></span>
                            <input type="text" name="jenis_praktek" class="form-control" placeholder="" value="&nbsp;&nbsp;<?php echo $datasip['jenis_praktek']?>"  />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Hari Praktek</label>
                          <div class="input-group input-group-merge">
                             <span id="basic-icon-address" class="input-group-text"
                              ><i class="bx bx-calendar"></i
                            ></span>
                            <input type="text" name="jenis_praktek" class="form-control" placeholder="" value="&nbsp;&nbsp;<?php echo $datasip['hari_awal_praktek']?>"  />
                            <span id="basic-icon-address" class="input-group-text">s/d</span>
                            <input type="text" name="jenis_praktek" class="form-control" placeholder="" value="&nbsp;&nbsp;<?php echo $datasip['hari_akhir_praktek']?>"  />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Jam Praktek</label>
                          <div class="input-group input-group-merge">
                            <input type="text" name="jam_buka" class="form-control"  value="&nbsp;&nbsp;<?php echo $datasip['jam_buka']?>" />
                            <span id="basic-icon-address" class="input-group-text">s/d</span>
                            <input type="text" name="jam_tutup" class="form-control" value="&nbsp;&nbsp;<?php echo $datasip['jam_tutup']?>" />
                          </div>
                        </div>

                        </div>
                      </div>
                    </div>

                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">
                          <h5>Upload Berkas Sesuai Note Revisi </h5>
                          <?php
                            $id_sip = $this->uri->segment(3);
                            $note_sip = $this->db->query("SELECT * FROM validasi_sip WHERE id_sip=$id_sip");
                            $note = $note_sip->row_array();
                          ?>
                          <div class="alert alert-danger" role="alert"> Note Revisi : <?php echo $note['keterangan']; ?><P>Jika Sudah Revisi Klik Tombol Selesai Revisi Dibawah</P></div>

                          <div class="mb-3">
                            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>nakes/update_foto_ktp/<?php echo $this->uri->segment(3);?>">
                            <label class="form-label" for="basic-icon-default-company">foto KTP </label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-barcode"></i
                              ></span>
                              <input type="file" id="basic-icon-default-company" class="form-control" name="foto_ktp_baru" placeholder=""
                                aria-describedby="basic-icon-default-company2" required />
                                <button type="submit" class="btn btn-primary">Update Berkas</button>
                            </div>
                            </form>
                          </div>

                          <div class="mb-3">
                            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>nakes/update_foto_str/<?php echo $this->uri->segment(3);?>">
                            <label class="form-label" for="basic-icon-default-company">foto STR </label>
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
                            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>nakes/update_foto_rop/<?php echo $this->uri->segment(3);?>">
                            <label class="form-label" for="basic-icon-default-company">foto Rekomendasi OP </label>
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

                          <div class="mb-3">
                            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>nakes/update_foto_rtp/<?php echo $this->uri->segment(3);?>">
                            <label class="form-label" for="basic-icon-default-company">Foto Rekomendasi Tempat Praktek </label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-barcode"></i
                              ></span>
                              <input type="file" id="basic-icon-default-company" class="form-control" name="foto_rtp_baru" placeholder=""
                                aria-describedby="basic-icon-default-company2" required />
                                <button type="submit" class="btn btn-primary">Update Berkas</button>
                            </div>
                            </form>
                          </div>

                          <div class="mb-3">
                            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>nakes/update_foto_ijazah/<?php echo $this->uri->segment(3);?>">
                            <label class="form-label" for="basic-icon-default-company">foto Ijazah</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-barcode"></i
                              ></span>
                              <input type="file" id="basic-icon-default-company" class="form-control" name="foto_ijazah_baru" placeholder=""
                                aria-describedby="basic-icon-default-company2" required />
                                <button type="submit" class="btn btn-primary">Update Berkas</button>
                            </div>
                            </form>
                          </div>

                          <div class="mb-3">
                            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>nakes/update_foto_surat_sehat/<?php echo $this->uri->segment(3);?>">
                            <label class="form-label" for="basic-icon-default-company">foto Surat Sehat </label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-barcode"></i
                              ></span>
                              <input type="file" id="basic-icon-default-company" class="form-control" name="foto_surat_sehat_baru" placeholder=""
                                aria-describedby="basic-icon-default-company2" required />
                                <button type="submit" class="btn btn-primary">Update Berkas</button>
                            </div>
                            </form>
                          </div>

                          <div class="mb-3">
                            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>nakes/update_foto_surat_pernyataan/<?php echo $this->uri->segment(3);?>">
                            <label class="form-label" for="basic-icon-default-company">foto Surat Pernyataan </label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-barcode"></i
                              ></span>
                              <input type="file" id="basic-icon-default-company" class="form-control" name="foto_surat_pernyataan_baru" placeholder=""
                                aria-describedby="basic-icon-default-company2" required />
                                <button type="submit" class="btn btn-primary">Update Berkas</button>
                            </div>
                            </form>
                          </div>
                          <BR>
                          <div class="mb-3" align="center">
                            <button type="button" class="btn btn-danger col-lg-3" data-bs-toggle="modal" data-bs-target="#modalRevisiSelesai">Selesai Revisi</button>
                            
                            <a href="<?php echo base_url();?>nakes/revisi" class="btn btn-secondary col-lg-3" >Kembali</a>


                            <!-- Modal Selesai Revisi-->
                            <div class="modal fade" id="modalRevisiSelesai" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content ">
                                  <div class="modal-header">
                                    <h5 class="modal-title " id="modalCenterTitle" >Konfirmasi Revisi</h5>
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
                                        <p class="card-text" ><font size="5">Anda Yakin Revisi Sudah Selesai ?</font></p>
                                        <p>Pastikan data sudah sesuai yaa...</p>
                                        <br>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="<?php echo base_url();?>nakes/revisi_selesai/<?php echo $this->uri->segment(3);?>" class="btn btn-primary">OK</a>
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

            <div class="row">

            </div>

        </div>
      </div>
       
      </div>