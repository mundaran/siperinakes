<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

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
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url(); ?>nakes/notification"
                        ><i class="bx bx-bell me-1"></i> Notifications</a
                      >
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <?php if($user['pict']==0){
                         echo '<img
                          src="'.base_url().'template/assets/img/avatars/user1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />

                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          <p class="text-muted mb-0">Anda Belum Upload Foto Profile</p>
                          


                        ';
                      }
                      else{
                        echo'<img
                          src="'.base_url().'template/assets/img/avatars/'.$user['pict'].'"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                          />
                          <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Update Foto</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>

                        ';
                      }
                      ?>
                        
                      <?php echo $this->session->flashdata('message');?>

                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" action="aksi_edit_profile" >
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
                            <input
                              type="text"
                              class="form-control"
                              id="provinsi"
                              name="provinsi"
                              value="<?php echo $user['provinsi'];?>"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Kabupaten</label>
                            <select id="country" name="kota_kabupaten" class="select2 form-select">
                              <option value="<?php echo $user['kota_kabupaten'];?>"><?php echo $user['kota_kabupaten'];?></option>
                              <option value="Australia">Australia</option>
                              <option value="Bangladesh">Bangladesh</option>
                              <option value="Belarus">Belarus</option>
                              <option value="Brazil">Brazil</option>
                              <option value="Canada">Canada</option>
                              <option value="China">China</option>
                              <option value="France">France</option>
                              <option value="Germany">Germany</option>
                              <option value="India">India</option>
                              <option value="Indonesia">Indonesia</option>
                              <option value="Israel">Israel</option>
                              <option value="Italy">Italy</option>
                              <option value="Japan">Japan</option>
                              <option value="Korea">Korea, Republic of</option>
                              <option value="Mexico">Mexico</option>
                              <option value="Philippines">Philippines</option>
                              <option value="Russia">Russian Federation</option>
                              <option value="South Africa">South Africa</option>
                              <option value="Thailand">Thailand</option>
                              <option value="Turkey">Turkey</option>
                              <option value="Ukraine">Ukraine</option>
                              <option value="United Arab Emirates">United Arab Emirates</option>
                              <option value="United Kingdom">United Kingdom</option>
                              <option value="United States">United States</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="language" class="form-label">Kecamatan</label>
                            <select id="kecamatan" class="select2 form-select" name="kecamatan">
                              <option value="<?php echo $user['provinsi'];?>"><?php echo $user['kecamatan'];?></option>
                              <option value="en">English</option>
                              <option value="fr">French</option>
                              <option value="de">German</option>
                              <option value="pt">Portuguese</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="kelurahan" class="form-label">Keluarahan</label>
                            <select id="kelurahan" name="kelurahan" class="select2 form-select">
                              <option vvalue="<?php echo $user['kelurahan'];?>"><?php echo $user['kelurahan'];?></option>
                              <option value="-12">(GMT-12:00) International Date Line West</option>
                              <option value="-11">(GMT-11:00) Midway Island, Samoa</option>
                              <option value="-10">(GMT-10:00) Hawaii</option>
                              <option value="-9">(GMT-09:00) Alaska</option>
                              <option value="-8">(GMT-08:00) Pacific Time (US & Canada)</option>
                              <option value="-8">(GMT-08:00) Tijuana, Baja California</option>
                              <option value="-7">(GMT-07:00) Arizona</option>
                              <option value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                              <option value="-7">(GMT-07:00) Mountain Time (US & Canada)</option>
                              <option value="-6">(GMT-06:00) Central America</option>
                              <option value="-6">(GMT-06:00) Central Time (US & Canada)</option>
                              <option value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                              <option value="-6">(GMT-06:00) Saskatchewan</option>
                              <option value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                              <option value="-5">(GMT-05:00) Eastern Time (US & Canada)</option>
                              <option value="-5">(GMT-05:00) Indiana (East)</option>
                              <option value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
                              <option value="-4">(GMT-04:00) Caracas, La Paz</option>
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
                    <h5 class="card-header">Reset Password</h5>
                    <div class="card-body">
                    
                      <form id="formAccountDeactivation" action="aksi_ubah_password">

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