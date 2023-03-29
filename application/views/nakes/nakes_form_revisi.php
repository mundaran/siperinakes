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
                      <span class="alert alert-danger" role="alert"> Cek kembali berkas Anda</span>
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

                          <div class="mb-3">
                            <form>
                            <label class="form-label" for="basic-icon-default-company">foto KTP </label>
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
                            <form>
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
                            <form>
                            <label class="form-label" for="basic-icon-default-company">foto Rekomendasi OP </label>
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
                            <form>
                            <label class="form-label" for="basic-icon-default-company">foto Rekomendasi Tempat Praktek </label>
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
                            <form>
                            <label class="form-label" for="basic-icon-default-company">foto Ijazah </label>
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
                            <form>
                            <label class="form-label" for="basic-icon-default-company">foto Surat Sehat </label>
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
                            <form>
                            <label class="form-label" for="basic-icon-default-company">foto Surat Pernyataan </label>
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
                          <BR>
                          <div class="mb-3" align="center">
                            <button type="submit" class="btn btn-danger col-lg-4" >SELESAI REVISI</button>&nbsp;
                            <button  onclick="goBack()" class="btn btn-secondary col-lg-4" >KEMBALI</button>
                            <script>
                                function goBack() {
                                    window.history.back();
                                }
                            </script>
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