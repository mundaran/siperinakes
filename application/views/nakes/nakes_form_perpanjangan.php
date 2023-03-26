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
                      <h5 class="mb-0">Perpanjang SIP</h5>
                      <span class="alert alert-danger" role="alert"> Pastikan Persyaratan Sudah Siap</span>
                      
                    </div>

                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">
                          <form> 
                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-company">Nomor STR Baru</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"
                                  ><i class="bx bx-barcode"></i
                                ></span>
                                <input type="text" id="basic-icon-default-company" class="form-control" name="no_str" placeholder=""
                                  aria-describedby="basic-icon-default-company2" required />
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-company">Masa Berlaku STR Baru</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"
                                  ><i class="bx bx-barcode"></i
                                ></span>
                                <input type="text" id="basic-icon-default-company" class="form-control" name="no_str" placeholder=""
                                  aria-describedby="basic-icon-default-company2" required />
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-company">foto STR Baru</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"
                                  ><i class="bx bx-barcode"></i
                                ></span>
                                <input type="file" id="basic-icon-default-company" class="form-control" name="no_str" placeholder=""
                                  aria-describedby="basic-icon-default-company2" required />
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-company">foto SIP Lama</label>
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"
                                  ><i class="bx bx-barcode"></i
                                ></span>
                                <input type="file" id="basic-icon-default-company" class="form-control" name="no_str" placeholder=""
                                  aria-describedby="basic-icon-default-company2" required />
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

          <div class="row">
          </div>

        </div>
      </div>
       
      </div>