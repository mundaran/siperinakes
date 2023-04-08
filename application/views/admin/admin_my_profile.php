<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<div class="content-wrapper">
<!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
               
           <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="<?php echo base_url(); ?>nakes/my_profile"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details<span><?php echo $this->session->flashdata('message');?></span></h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <?php if(empty($user['pict'])){
                         echo '<img
                          src="'.base_url().'template/assets/img/avatars/user1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />

                        <div class="button-wrapper">
                            <button
                            type="button"
                            class="btn btn-lg btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalUploadfoto"
                          >Upload Foto
                          </button>
                          <br>
                          <br>
                          <p class="text-muted mb-0">Anda Belum Upload Foto Profile</p>
                          


                        ';
                      }
                      else{
                        echo'<img
                          src="'.base_url().'document/foto_user/'.$user['pict'].'.jpg"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                          />
                          <div class="button-wrapper">
                          <button
                          type="button"
                          class="btn btn-lg btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#modalUploadfoto"
                        >
                        Upload Foto
                        </button>
                          </label>

                        ';
                      }
                      ?>
                        
                      

                      

                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" action="<?php echo base_url();?>administrator/aksi_edit_profile" >
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Nama Lengkap ( Sertakan Gelar )</label>
                            <input
                              class="form-control"
                              type="text"
                              id="nama_lengkap"
                              name="nama_lengkap"
                              value="<?php echo $user['name'];?>"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="nik" class="form-label">NIK</label>
                            <input class="form-control" type="text" name="nik" id="nik" maxlength="16" minlength="16" value="<?php echo $user['nik'];?>" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="<?php echo $user['email'];?>"
                              placeholder="john.doe@example.com"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">No.Hp/Telp</label>
                            <input
                              type="text"
                              class="form-control"
                              id="no_hp"
                              name="no_hp"
                              value="<?php echo $user['no_hp'];?>"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Tempat Lahir</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="tmpat_lahir"
                                name="tempat_lahir"
                                class="form-control"
                                value="<?php echo $user['tempat_lahir'];?>"
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $user['tanggal_lahir'];?>" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Alamat</label>
                            <input class="form-control" type="text" id="alamat" name="alamat" value="<?php echo $user['alamat'];?>"/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="zipCode" class="form-label">Provinsi</label>
                            <select id="country" name="provinsi" class="select2 form-select">
                              <option value="<?php echo $user['provinsi'];?>"><?php echo $user['provinsi'];?></option>

                              <?php //untuk menampilkan no
                              $provinsi = $this->db->get_where('master_provinsi', array('id'))->result_array();
                              foreach( $provinsi as $prov ):
                              ?>
                              <option value="<?php echo $prov['provinsi'];?>"><?php echo $prov['provinsi'];?></option>

                              <?php  endforeach;?>

                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Kabupaten</label>
                            <select id="country" name="kota_kabupaten" class="select2 form-select">
                              <option value="<?php echo $user['kota_kabupaten'];?>"><?php echo $user['kota_kabupaten'];?></option>
                              

                              <?php //untuk menampilkan no
                              $kota = $this->db->get_where('master_kabupaten', array('id'))->result_array();
                              foreach( $kota as $kab ):
                              ?>
                              <option value="<?php echo $kab['kabupaten'];?>"><?php echo $kab['kabupaten'];?></option>

                              <?php  endforeach;?>

                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="language" class="form-label">Kecamatan</label>
                            <select id="kecamatan" class="select2 form-select" name="kecamatan">
                              <option value="<?php echo $user['kecamatan'];?>"><?php echo $user['kecamatan'];?></option>
                              <?php //untuk menampilkan no
                              $kecamatan = $this->db->get_where('master_kecamatan', array('id'))->result_array();
                              foreach( $kecamatan as $kec ):
                              ?>
                              <option value="<?php echo $kec['kecamatan'];?>"><?php echo $kec['kecamatan'];?></option>

                              <?php  endforeach;?>
                            </select>
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="kelurahan" class="form-label">Keluarahan</label>
                            <select id="kelurahan" name="kelurahan" class="select2 form-select">
                              <option value="<?php echo $user['kelurahan'];?>"><?php echo $user['kelurahan'];?></option>
                              <?php //untuk menampilkan no
                              $kelurahan = $this->db->get_where('master_kelurahan', array('id'))->result_array();
                              foreach( $kelurahan as $kel ):
                              ?>
                              <option value="<?php echo $kel['kelurahan'];?>"><?php echo $kel['kelurahan'];?></option>

                              <?php  endforeach;?>
                            </select>
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Simpan</button>
                          <a href=""  class="btn btn-outline-secondary">Kembali</a>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">Ubah Password</h5>
                    <div class="card-body">
                    
                      <form id="formAccountDeactivation" method="POST" action="<?php echo base_url();?>administrator/aksi_ubah_password">

                         <div class="mb-3 col-md-12">
                          <label class="form-label" for="ubahPassword">Masukan Password Lama Anda</label>
                            <input
                              type="text"
                              id="ubahPassword"
                              name="password_lama"
                              class="form-control"
                            />
                         </div>
                          <div class="mb-3 col-md-12">
                          <label class="form-label" for="ubahPassword">Masukan Password Baru Anda</label>
                            <input
                              type="text"
                              id="ubahPassword"
                              name="password_baru"
                              class="form-control"
                            />
                         </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Ubah Paassword</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>

    <!-- Modal Upload Foto -->
      <div class="modal fade" id="modalUploadfoto" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 class="modal-title " id="modalCenterTitle" >Upload Foto (Gunakan Foto 4x6)</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>administrator/upload_foto">
              <div class="row">
                <div class="col mb-3">
                  <label for="nameWithTitle" class="form-label"></label>
                  <input type="file" name="foto_user" id="formFile" class="form-control">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            </div>
          </div>
        </div>
      </div>
