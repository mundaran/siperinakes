<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<div class="content-wrapper">
<!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
               
           <div class="container-xxl flex-grow-1 container-p-y">

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h4 class="card-header text-primary"><b>Edit Akun User</b></h4>
                    
                    <!-- Account -->
                    <div class="card-body">
                      <?php echo $this->session->flashdata('message');?>
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <?php if(empty($nakes['pict'])){
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
                          src="'.base_url().'document/foto_user/'.$nakes['pict'].'.jpg"
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
                      <form id="formAccountSettings" method="POST" action="<?php echo base_url();?>administrator/aksi_edit_profile_user/<?php echo $this->uri->segment(3);?>" >
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Nama Lengkap ( Sertakan Gelar )</label>
                            <input
                              class="form-control"
                              type="text"
                              id="nama_lengkap"
                              name="nama_lengkap"
                              value="<?php echo $nakes['name'];?>"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="nik" class="form-label">NIK</label>
                            <input class="form-control" type="text" name="nik" id="nik" maxlength="16" minlength="16" value="<?php echo $nakes['nik'];?>" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="<?php echo $nakes['email'];?>"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">No.Hp/Telp</label>
                            <input
                              type="text"
                              class="form-control"
                              id="no_hp"
                              name="no_hp"
                              value="<?php echo $nakes['no_hp'];?>"
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
                                value="<?php echo $nakes['tempat_lahir'];?>"
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $nakes['tanggal_lahir'];?>" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Alamat</label>
                            <input class="form-control" type="text" id="alamat" name="alamat" value="<?php echo $nakes['alamat'];?>"/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="zipCode" class="form-label">Provinsi</label>
                            <select id="country" name="provinsi" class="select2 form-select">
                              <option value="<?php echo $nakes['provinsi'];?>"><?php echo $nakes['provinsi'];?></option>

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
                              <option value="<?php echo $nakes['kota_kabupaten'];?>"><?php echo $nakes['kota_kabupaten'];?></option>
                              

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
                              <option value="<?php echo $nakes['kecamatan'];?>"><?php echo $nakes['kecamatan'];?></option>
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
                              <option value="<?php echo $nakes['kelurahan'];?>"><?php echo $nakes['kelurahan'];?></option>
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
                          <a href="<?php echo base_url();?>administrator/manajemen_user"  class="btn btn-outline-secondary">Kembali</a>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">Ganti Password User</h5>
                    <div class="card-body">
                      <form id="formAccountDeactivation" method="POST" action="<?php echo base_url();?>administrator/aksi_ganti_password_user/<?php echo $this->uri->segment(3);?>">
                         <div class="input-group input-group-merge">
                          <input
                            type="password"
                            id="password"
                            class="form-control"
                            name="password_baru"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password"
                            required
                          />
                          <span class="input-group-text cursor-pointer"  onclick="myFunction()" ><i class="bx bx-hide"></i></span>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-danger deactivate-account">Ganti Password</button>
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
          <form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>administrator/aksi_edit_foto_nakes/<?php echo $nakes['id'];?>">
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
            </div>
          </div>
          </form>
        </div>
      </div>
 <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>