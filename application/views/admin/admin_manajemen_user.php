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
                          <h4 class="card-title text-primary"><?php echo $title;?> Aktif🎉</h4>
                          <p class="mb-4">
                           Daftar Pengguna SIPERI
                          </p>
                          <?php echo $this->session->flashdata('message');?>
                          <div class="btn-group" role="group" aria-label="First group">
                          <button type="button" class="btn btn-outline-primary"  data-bs-toggle="modal"
                          data-bs-target="#modalAddUser">
                            <i class="tf-icons bx bx-user-plus"></i><span>Tambah User</span>
                          </button>
                        </div>
                        </div>
                        
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="<?php echo base_url()?>template/assets/img/illustrations/ai2.png"
                            height="150"
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

                         <div class="table-responsive text-nowrap">
                          <table id="myTable" class="dispaly table table-borderless">
                            <thead>
                              <tr>
                                <th>User  Id</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>No Telp</th>
                                <th>NIK</th>
                                <th>User Role</th>
                                <th>Action</th>
                              </tr>
                              
                            </thead>
                            <tbody class="">

                                <?php foreach ($data_user as $nakes) {
                                  if ($nakes['role_id']==11) {
                                    $status='Admin';
                                  } elseif($nakes['role_id']==21) {
                                    $status='Nakes';
                                  } elseif($nakes['role_id']==31) {
                                    $status='Kabag';
                                  } elseif($nakes['role_id']==41) {
                                    $status='Sekdin';
                                  } elseif($nakes['role_id']==51) {
                                    $status='Kadin';
                                  }

                                  echo '

                                    <tr>
                                     <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$nakes['id'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$nakes['name'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$nakes['email'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$nakes['no_hp'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$nakes['nik'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$status.'</strong></td>

                                    <td>
                                      <div class="btn-group">
                                        <button
                                          type="button"
                                          class="btn btn-warning btn-icon rounded-pill dropdown-toggle hide-arrow"
                                          data-bs-toggle="dropdown"
                                          aria-expanded="false"
                                        >
                                          <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                          <li><a class="dropdown-item" href="'.base_url().'administrator/edit_user/'.$nakes['id'].'">Edit</a></li>
                                          <li><a class="dropdown-item" data-bs-toggle="modal" href="#modalNonaktifkan'.$nakes['id'].'">Nonaktifkan</a></li>
                                        </ul>
                                      </div>

                                      </td>

                                    
                                  </tr>

                                  <div class="modal fade" id="modalNonaktifkan'.$nakes['id'].'" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content ">
                                        <div class="modal-header">
                                          <h5 class="modal-title " id="modalCenterTitle" >Perhatian !!</h5>
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
                                              <p class="card-text text-danger" ><font size="5">Yakin Nonaktifkan Akun ?</font></p>
                                              <p><b>ID AKUN : '.$nakes['id'].'</b></p>
                                              <br>
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="'.base_url().'administrator/aksi_nonaktifkan_user/'.$nakes['id'].'" class="btn btn-danger">OK</a>
                                              
                                            </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  ';
                                 
                                  
                                } ?>
                                 
                                  
                                
                                
                            </tbody>
                          </table>
                        </div>

                      
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h4 class="card-title text-danger">Daftar User Nonaktif</h4>
                          <p class="mb-4">
                           Daftar Pengguna SIPERI
                          </p>
                          <div class="btn-group" role="group" aria-label="First group">
                        </div>
                        </div>
                        
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="<?php echo base_url()?>template/assets/img/illustrations/ai2.png"
                            height="150"
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

                         <div class="table-responsive text-nowrap">
                          <table id="TabelUserNonaktif" class="dispaly table table-borderless">
                            <thead>
                              <tr>
                                <th>User  Id</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>No Telp</th>
                                <th>NIK</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                              
                            </thead>
                            <tbody class="">

                                <?php foreach ($data_user_nonaktif as $nakes_non) {
                                  if ($nakes_non['role_id']==11) {
                                    $status_non='Admin';
                                  } elseif($nakes_non['role_id']==21) {
                                    $status_non='Nakes';
                                  } elseif($nakes_non['role_id']==31){
                                    $status_non='Kabag';
                                  } elseif($nakes_non['role_id']==41){
                                    $status_non='Sekdin';
                                  } elseif($nakes_non['role_id']==51){
                                    $status_non='Kadin';
                                  }

                                  echo '

                                    <tr>
                                     <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$nakes_non['id'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$nakes_non['name'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$nakes_non['email'].'</strong></td>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$nakes_non['no_hp'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$nakes_non['nik'].'</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$status_non.'</strong></td>

                                    <td><button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#modalAktifkan'.$nakes_non['id'].'" > Aktifkan </button> </td>

                                    
                                  </tr>

                                  <div class="modal fade" id="modalAktifkan'.$nakes_non['id'].'" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content ">
                                        <div class="modal-header">
                                          <h5 class="modal-title " id="modalCenterTitle" >Perhatian !!</h5>
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
                                              <p class="card-text text-primary" ><font size="5">Yakin Aktifkan Akun ?</font></p>
                                              <p><b>ID AKUN : '.$nakes_non['id'].'</b></p>
                                              <br>
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="'.base_url().'administrator/aksi_aktifkan_user/'.$nakes_non['id'].'" class="btn btn-danger">OK</a>
                                              
                                            </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  ';
                                 
                                  
                                } ?>
                                 
                                  
                                
                                
                            </tbody>
                          </table>
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
    
<!-- Modal Add User-->
<div class="modal fade" id="modalAddUser" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form method="POST" action="<?php echo base_url();?>administrator/aksi_tambah_user">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Tambah User</h5>
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
            <label for="nameWithTitle" class="form-label" >Nama Lengkap Dengan Gelar</label>
            <input
              type="text"
              id="nameWithTitle"
              class="form-control"
              placeholder="Nama Lengkap"
              name="nama_lengkap"
            />
          </div>
        </div>
        <div class="row g-2">
          <div class="col mb-0">
            <label for="emailWithTitle" class="form-label">Email</label>
            <input
              type="text"
              id="emailWithTitle"
              class="form-control"
              placeholder="xxxx@xxx.xx"
              name="email"
            />
          </div>
          <div class="col mb-0 ">
            <label for="dobWithTitle" class="form-label">Password</label>
            <div class="input-group input-group-merge">
              <input
                type="password"
                id="password"
                class="form-control"
                name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
              />
              <span class="input-group-text cursor-pointer"  onclick="myFunction()" ><i class="bx bx-hide"></i></span>
            </div>
          </div>
        </div>
        <br>
        <div class="row g-2">
          <div class="col mb-0">
            <label class="form-label" for="country">Status User</label>
            <select id="country" name="role_id" class="select2 form-select">
              <option value="21">Nakes</option>
              <option value="11">Admin</option>
              <option value="31">Kabag</option>
              <option value="41">Sekdin</option>
              <option value="51">Kadin</option>
            </select>
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