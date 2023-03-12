<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>


        <div class="content-wrapper">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
               
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

                <div class="col-lg-12">
                  <div class="card mb-4">
                    <?php echo $this->session->flashdata('message');?>
                    <div class="card-body">
                      <h4 class="card-title mb-0">Upload Berkas Pengajuan Anda</h4>
                      <p></p>
                      <span class="badge bg-label-danger">Pastiakan Persyaratan Anda Lengkap</span>

                      <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>nakes/aksi_upload_berkas" >
                        <input type="hidden" name="id_sip" value="<?php echo $this->uri->segment(3); ?>">
                        <div class="mb-3">
                          <span id="basic-icon-address">
                              <i class="bx bxs-user-pin"></i>
                          </span>
                          <label for="formFile" class="form-label">Pas Foto</label>
                          <input class="form-control" type="file" id="formFile" name="pasfoto" />
                        </div>
                        <div class="mb-3">
                          <span id="basic-icon-address">
                              <i class="bx bxs-id-card"></i>
                          </span>
                          <label for="formFile" class="form-label">KTP</label>
                          <input class="form-control" type="file" id="formFile" name="ktp" />
                        </div>
                        <div class="mb-3">
                          <span id="basic-icon-address">
                              <i class="bx bxs-note"></i>
                          </span>
                          <label for="formFile" class="form-label">STR</label>
                          <input class="form-control" type="file" id="formFile" name="str" />
                        </div>
                        <div class="mb-3">
                          <span id="basic-icon-address">
                              <i class="bx bxs-user-rectangle"></i>
                          </span>
                          <label for="formFile" class="form-label">Rekomendasi Organisasi Profesi</label>
                          <input class="form-control" type="file" id="formFile" name="rop" />
                        </div>
                        <div class="mb-3">
                          <span id="basic-icon-address">
                              <i class="bx bxs-buildings"></i>
                          </span>
                          <label for="formFile" class="form-label">Rekomendasi Tempat Praktek</label>
                          <input class="form-control" type="file" id="formFile" name="rtp" />
                        </div>
                        <div class="mb-3">
                          <span id="basic-icon-address">
                              <i class="bx bxs-graduation"></i>
                          </span>
                          <label for="formFile" class="form-label">Ijazah</label>
                          <input class="form-control" type="file" id="formFile" name="ijazah" />
                        </div>
                        <div class="mb-3">
                          <span id="basic-icon-address">
                              <i class="bx bxs-receipt"></i>
                          </span>
                          <label for="formFile" class="form-label">Surat Sehat Dari Faskes Pemerintah</label>
                          <input class="form-control" type="file" id="formFile" name="surat_sehat" />
                        </div>
                        <div class="mb-3">
                          <span id="basic-icon-address">
                              <i class="bx bxs-receipt"></i>
                          </span>
                          <label for="formFile" class="form-label">Surat Pernyataan</label>
                          <input class="form-control" type="file" id="formFile" name="pernyataan" />
                        </div>
                        <button type="submit" class="btn btn-primary"> Upload </button>
                        <a href="<?php echo base_url();?>nakes/register_sip" class="btn btn-danger" >Lewati</a>
                      </form>
                    </div>
                  </div>
                </div>

              

            </div>

          <div class="row">
          </div>

        </div>
      </div>
       
      </div>
