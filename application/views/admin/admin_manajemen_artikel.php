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
                          <h5 class="card-title text-info"><?php echo $title;?>🎉</h5>
                          <p class="mb-4">
                           Daftar Artikel Anda
                          </p>
                           <?php echo $this->session->flashdata('message');?>
                           <button type="button" class="btn rounded-pill btn-warning" > Tambahkan Artikel </button>
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
                                <th>Nama Pemohon</th>
                                <th>Jenis Sip</th>
                                <th>Nomor Sip</th>
                                <th>Tanggal Approve</th>
                                <th>Tanggal Berakhir</th>
                                <th>Action</th>
                              </tr>
                              
                            </thead>
                            <tbody class="">

                              <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>

                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>3</strong></td>

                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>4</strong></td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>5</strong></td>

                                <td>
                                  <div class="btn-group">
                                    <button
                                      type="button"
                                      class="btn btn-info btn-icon rounded-pill dropdown-toggle hide-arrow"
                                      data-bs-toggle="dropdown"
                                      aria-expanded="false"
                                    >
                                      <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                      <li><a class="dropdown-item" href="" >Detail SIP</a></li>
                                      <li><a class="dropdown-item" href="">Perpanjang</a></li>
                                      <li><a class="dropdown-item" data-bs-toggle="modal" href="">Cabut SIP</a></li>
                                    </ul>
                                  </div>

                                  </td>

                                
                              </tr>
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
    