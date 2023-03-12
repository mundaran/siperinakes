<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>


        <div class="content-wrapper">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
               
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

                <div class="col-lg-6">
                  <div class="card mb-4">
                    <?php echo $this->session->flashdata('message');?>
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Registrasi SIP BARU</h5>
                      <span class="alert alert-danger" role="alert"> Pastikan Persyaratan Sudah Siap</span>
                      
                    </div>
                    <div class="card-body">
                      <form method="POST" action="<?php echo base_url();?>nakes/aksi_register_sip" >
                        <?php 
                          $queryId = $this->db->query("SELECT max(id) as idTerbesar FROM data_sip")->row_array();
                          $idSipTerakhir = $queryId['idTerbesar'];
                          $urutanid = $idSipTerakhir+1;
                        ?>
                        <input type="hidden" name="id_sip_new" value="<?php echo $urutanid; ?>">
                        <input type="hidden" name="tanggal_daftar" value="<?php echo date("d-m-Y"); ?>">
                        <div class="mb-3">  
                          <label class="form-label" for="basic-icon-default-fullname">Jenis SIP</label>
                          <div class="input-group">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            <select class="form-select" id="inputGroupSelect01" name="jenis_sip"  >
                              <option selected>Choose...</option>

                              <?php $mastersip = $this->db->get_where('master_sip', array('id'))->result_array();?>
                              <?php foreach($mastersip as $jenis_sip):?>
                                <option value="<?php echo $jenis_sip['jenis_sip'];?>"><?php echo $jenis_sip['jenis_sip'];?></option>
                              <?php endforeach;?>

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

              <div class="col-lg-6  ">
                <div class="row">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Status Pengajuan SIP</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th>Jenis SIP</th>
                        <th>Tgl Daftar</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($sip as $dataSip ):?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $dataSip['jenis_sip'];?></strong></td>
                        <td><?php echo $dataSip['tanggal_daftar'];?></td>
                        <td>
                          <?php 
                          if($dataSip['status']==1){
                            echo'<span class="badge bg-label-info me-1"> <a href="'.base_url().'nakes/upload_berkas/'.$dataSip['id'].'" > Upload Berkas </a> </span>';
                          }
                          else{  if($dataSip['status']==2){
                                echo '<span class="badge bg-label-success me-1"> <a > Ditinjau </a> </span>';
                              }

                              else{ if($dataSip['status']==3){
                                echo '<span class="badge bg-label-info me-1"> <a href="'.base_url().'nakes/upload_berkas/'.$dataSip['id'].'" > Approved (Lihat) </a> </span>';
                                }

                                else{ if($dataSip['status']==4){
                                echo '<span class="badge bg-label-info me-1"> <a href="'.base_url().'nakes/upload_berkas/'.$dataSip['id'].'" > Revisi Data (Lihat) </a> </span>';
                                }

                                else{

                                }

                               }
                            }
  
                          }

                       ?>

                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
              </div>
               <div class="row">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">PERSYARATAN</h5>
                </div>
                <div class="card-body">
                  Persyaratan SIP
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
