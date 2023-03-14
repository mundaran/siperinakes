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
                          <?php 
                           $id = $this->uri->segment(3);
                            $datavalidasi = $this->db->query("SELECT * FROM data_sip WHERE id =$id ");
                            $datasip = $datavalidasi->row_array();
                          ?>
                          <h5 class="card-title text-primary">Form Validasi SIP🎉</h5>
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
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">

                          <form method="POST" action="<?php echo base_url();?>nakes/aksi_register_sip" >
                        <input type="hidden" name="tanggal_daftar" value="<?php echo date("d-m-Y"); ?>">
                        <div class="mb-3">  
                          <label class="form-label" for="basic-icon-default-fullname">Jenis SIP</label>
                          <div class="input-group">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            <select class="form-select" id="inputGroupSelect01" name="jenis_sip"  >
                              <option selected>Choose...</option>

                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Nomor STR</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class="bx bx-barcode"></i
                            ></span>
                            <input type="text" id="basic-icon-default-company" class="form-control" name="no_str" placeholder=""
                              aria-describedby="basic-icon-default-company2" required />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email" >Masa Berlaku STR</label>
                          <div class="input-group">
                            <input type="date" aria-label="First" name="masa_berlaku_str" class="form-control"/>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Tempat Praktek</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-address" class="input-group-text">
                              <i class="bx bx-buildings"></i>
                            </span>
                            <input type="text" aria-label="Last name" class="form-control" name="tempat_praktek" placeholder="Klinik" required />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Alamat Praktek</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-address" class="input-group-text">
                              <i class="bx bxs-building-house" type="solid"></i>
                            </span>
                            <input type="text" name="alamat_praktek" class="form-control" placeholder="jl...." required />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Jenis Praktek</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-address" class="input-group-text"
                              ><i class="bx bx-user-pin"></i
                            ></span>
                            <input type="text" name="jenis_praktek" class="form-control" placeholder="Dokter/Apoteker/Other" required />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Hari Praktek</label>
                          <div class="input-group input-group-merge">
                            <select id="kecamatan" class="select2 form-select" name="hari_awal">
                              <option value="Senin" selected>Senin</option>
                              <option value="Selasa">Selasa</option>
                              <option value="Rabu">Rabu</option>
                              <option value="Kamis">Kamis</option>
                              <option value="Jumat">Jumat</option>
                              <option value="Sabtu">Sabtu</option>
                              <option value="Minggu">Minggu</option>
                            </select>
                            <span id="basic-icon-address" class="input-group-text">s/d</span>
                            <select id="kecamatan" class="select2 form-select" name="hari_akhir">
                              <option value="Senin" selected>Senin</option>
                              <option value="Selasa">Selasa</option>
                              <option value="Rabu">Rabu</option>
                              <option value="Kamis">Kamis</option>
                              <option value="Jumat">Jumat</option>
                              <option value="Sabtu">Sabtu</option>
                              <option value="Minggu">Minggu</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Jam Praktek</label>
                          <div class="input-group input-group-merge">
                            <input type="time" name="jam_buka" class="form-control"  required />
                            <span id="basic-icon-address" class="input-group-text">s/d</span>
                            <input type="time" name="jam_tutup" class="form-control" required />
                          </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary"> Simpan dan Lanjutkan </button>
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
    