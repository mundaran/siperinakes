<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
               
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Registrasi SIP BARU</h5>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="mb-3">  
                          <label class="form-label" for="basic-icon-default-fullname">Jenis SIP</label>
                          <div class="input-group">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>`
                            <select class="form-select" id="inputGroupSelect01" name="jenis_sip" required>
                              <option selected>Choose...</option>

                              <?php $mastersip = $this->db->get_where('master_sip', array('id'))->result_array();?>
                              <?php foreach($mastersip as $jenis_sip):?>
                                <option value="<?php echo $jenis_sip['jenis_sip'];?>"><?php echo $jenis_sip['jenis_sip'];?></option>
                              <?php endforeach;?>

                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Nik</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class="bx bx-buildings"></i
                            ></span>
                            <input
                              type="text"
                              id="basic-icon-default-company"
                              class="form-control"
                              placeholder="NIK"
                              aria-describedby="basic-icon-default-company2" required
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email" >Nama Lengkap</label>
                          <div class="input-group">
                            <input type="text" aria-label="First name" class="form-control" value="<?php echo $user['name'];?>" disabled/>
                            <input type="text" aria-label="Last name" class="form-control" placeholder="Masukan Gelar" required />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Tempat Lahir</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-address" class="input-group-text"
                              ><i class="bx bx-home"></i
                            ></span>
                            <input type="text" aria-label="Last name" class="form-control" placeholder="Tempat Lahir" required />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Tanggal Lahir</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-address" class="input-group-text"
                              ><i class="bx bx-calendar"></i
                            ></span>
                            <input type="date" name="Tgl_Lahir" class="form-control" placeholder="Tempat Lahir" required />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">No.Hp/Telp</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-address" class="input-group-text"
                              ><i class="bx bx-phone"></i
                            ></span>
                            <input type="text" name="no_hp" class="form-control" placeholder="No.Hp/Telp" required />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-address">Email</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-address" class="input-group-text">@</span>
                            <input type="text" name="email" class="form-control" placeholder= " <?php echo $user['email'];?> " value="<?php echo $user['email'];?>" disabled />
                          </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>