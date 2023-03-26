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
                          <h5 class="card-title text-danger"><?php echo $title;?>🎉</h5>
                          <p class="mb-4">
                           Daftar Pengguna SIPERI
                          </p>
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
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>No Telp</th>
                                <th>NIK</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                              
                            </thead>
                            <tbody class="">

                                <?php foreach ($data_user as $nakes) {
                                  if ($nakes['role_id']==11) {
                                    $status='Admin';
                                  } else {
                                    $status='Pemohon';
                                  }

                                  echo '

                                    <tr>
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
                                          <li><a class="dropdown-item" href="'.base_url().'administrator/detail_sip/'.$nakes['id'].'" >Nonaktifkan</a></li>
                                          <li><a class="dropdown-item" href="javascript:void(0);">Reset Password</a></li>
                                          <li><a class="dropdown-item" href="javascript:void(0);">Hapus Akun</a></li>
                                        </ul>
                                      </div>

                                      </td>

                                    
                                  </tr>



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
    