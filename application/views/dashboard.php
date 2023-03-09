        <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
      <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">

          <!-- Navbar -->

         
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <img src="template/assets/img/favicon/icon_bjn.png" alt class="w-px-30 h-auto" />
                  <span class="app-brand-text demo menu-text fw-bolder ms-2">Siperi Nasehat</span>
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. <li class="nav-item lh-1 me-3">
                   <button type="button" class="btn rounded-pill btn-primary">Login</button>
                </li> -->
               
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="dropdown-toggle hide-arrow btn rounded-pill btn-outline-secondary" href="javascript:void(0);" data-bs-toggle="dropdown">
                   
                    <span class="tf-icons bx bx-user"></span>&nbsp; Masuk/Daftar

                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-offline">
                              <img src="template/assets/img/avatars/user1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">Acount</span>
                            <small class="text-muted">-</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Masuk</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?php echo base_url()?>auth/register_user">
                        <i class="bx bx-mobile me-2"></i>
                        <span class="align-middle">Daftar</span>
                      </a>
                    </li>
                   
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->

          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Layout Demo -->
  
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">

                        <div id="carouselExample-cf"class="carousel carousel-dark slide carousel-fade"
                        data-bs-ride="carousel">

                        <ol class="carousel-indicators">
                          <li data-bs-target="#carouselExample-cf" data-bs-slide-to="0" class="active"></li>
                          <li data-bs-target="#carouselExample-cf" data-bs-slide-to="1"></li>
                          <li data-bs-target="#carouselExample-cf" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">

                            <div class="col-sm-5 text-center text-sm-left">
                              <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                  src="template/assets/img/illustrations/ai1.png"
                                  height="140"
                                  alt="View Badge User"
                                  data-app-dark-img="illustrations/ai1.png"
                                  data-app-light-img="illustrations/ai1.png"
                                />
                                <ul></ul>
                              </div>
                            </div>

                            <img class="d-block w-100" src="template/assets/img/elements/bg_4.jpg" alt="First slide" />
                            <div class="carousel-caption  ">
                              <h7>Memudahakan Tenaga Kesahatan Dalam Memperoleh SIP</h7>
                            </div>
                          </div>

                          <div class="carousel-item">

                            <div class="col-sm-5 text-center text-sm-left">
                              <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                  src="template/assets/img/illustrations/ai2.png"
                                  height="140"
                                  alt="View Badge User"
                                  data-app-dark-img="illustrations/ai2.png"
                                  data-app-light-img="illustrations/ai2.png"
                                />
                                <ul></ul>
                              </div>
                            </div>

                            <img class="d-block w-100" src="template/assets/img/elements/bg_5.jpg" alt="Second slide" />
                            <div class="carousel-caption ">
                              <h7>Praktik Jadi Lebih Aman Dan Nyaman</h7>
                            </div>
                          </div>

                          <div class="carousel-item">

                            <div class="col-sm-5 text-center text-sm-left">
                              <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                  src="template/assets/img/illustrations/ai3.png"
                                  height="140"
                                  alt="View Badge User"
                                  data-app-dark-img="illustrations/ai3.png"
                                  data-app-light-img="illustrations/ai3.png"
                                />
                                <ul></ul>
                              </div>
                            </div>

                            <img class="d-block w-100" src="template/assets/img/elements/bg_6.jpg" alt="Third slide" />
                            <div class="carousel-caption ">
                              <h7>Perpanjang Berkas dan Perijinan Praktek Jadi Lebih Mudah dan Efisien</h7>
                            </div>
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExample-cf" role="button" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample-cf" role="button" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </a>
                      </div>
                  </div>
                </div>
             </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="template/assets/img/icons/unicons/user1.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Register</span>
                          <h3 class="card-title mb-2">
                            <?php 
                            $user = $this->db->get_where('user', array('role_id' => 2 ))->result_array();
                            echo $this->db->count_all_results();?></h3>
                          <small class="text-success fw-semibold"> User </small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="template/assets/img/icons/unicons/cc-warning.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">SIP Terdaftar </span>
                          <h3 class="card-title text-nowrap mb-1">6</h3>
                          <small class="text-success fw-semibold"><i class=""></i> SIP </small>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="template/assets/img/icons/unicons/cc-primary.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">SIPA Terdafatar</span>
                          <h3 class="card-title mb-2">4</h3>
                          <small class="text-success fw-semibold"> SIPA </small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="template/assets/img/icons/unicons/cc-success.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">SIP Kedaluarsa </span>
                          <h3 class="card-title text-nowrap mb-1">2</h3>
                          <small class="text-success fw-semibold"><i class=""></i> SIP </small>
                        </div>
                      </div>
                    </div>


                  </div>

              </div>


        </div>

              <!--/ Layout Demo -->


            </div>


            <!-- / Content -->