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
                          <h3 class="card-title text-primary">Detail SIP🎉</h3>
                          <p class="mb-4">
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

                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      
                        <div class="card-body">
                          <?php 

                            $id_user = $detail_sip['id_user'];
                            $datapemohon = $this->db->query("SELECT * FROM user WHERE id = $id_user ");
                            $datauser= $datapemohon->row_array();

                          ?>
                         <div class="table-responsive text-nowrap">
                          <table id="" class="table table-borderless">
                            <thead>
                              <tr>
                                <th></th>
                              </tr>
                              
                            </thead>
                            <tbody class="">


                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Nama Pemohon</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>:</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $datauser['name']?></strong></td>
                                    </tr>

                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Tempat/Tgl Lahir</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>:</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $datauser['tempat_lahir']?>,<?php echo $datauser['tanggal_lahir']?></strong></td>
                                    </tr>

                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Alamat Tempat Pratik</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>:</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $detail_sip['tempat_praktek']?></strong></td>
                                    </tr>

                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Nomor Str</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>:</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $detail_sip['no_str']?></strong></td>
                                    </tr>

                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Masa Berlaku</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>:</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $detail_sip['masa_berlaku_str']?></strong></td>
                                    </tr>
                                    
                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>No. Rekomendasi OP</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>:</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $detail_sip['no_rekomendasi_op']?></strong></td>
                                    </tr>

                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Peraktik Sebagai</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>:</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $detail_sip['jenis_praktek']?></strong></td>
                                    </tr>

                                    <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Hari/Jam</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>:</strong></td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $detail_sip['hari_awal_praktek']?> s/d <?php echo $detail_sip['hari_akhir_praktek'];?> , <?php echo $detail_sip['jam_buka']?> s/d <?php echo $detail_sip['jam_tutup'];?></strong></td>
                                    </tr>

                                    <tr>
                                      <td>&nbsp;&nbsp;
                                        <a href="<?php echo base_url();?>administrator/print_sip/<?php echo $this->uri->segment(3);?>" type="button" target="_blank" class="btn rounded-pill btn-primary">
                                          <span class="tf-icons bx bx-printer"></span>&nbsp; Print SIP
                                        </a>
                                      </td>
                                    </tr>

                            </tbody>
                          </table>

                        </div>
                        </div>
                      
                        </div>

                        <div class="d-flex align-items-end row">
                          <div class="card-body">
                            <div class="accordion mt-3" id="accordionExample">
                            <div class="card accordion-item active">
                              <h2 class="accordion-header" id="headingOne">
                                <button
                                  type="button"
                                  class="accordion-button"
                                  data-bs-toggle="collapse"
                                  data-bs-target="#accordionOne"
                                  aria-expanded="true"
                                  aria-controls="accordionOne"
                                >
                                Pas Foto
                                </button>
                              </h2>

                              <div
                                id="accordionOne"
                                class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample"
                              >
                                <div class="accordion-body text-center">
                                  <?php if(empty($detail_sip['pas_foto'])){
                                    echo "data belum disi";
                                  }

                                  else{
                                    echo '<img src="'.base_url().'document/foto_user/'.$datauser['pict'].'.jpg" width="550" height="600">';
                                  }

                                  ?>
                                  
                                </div>
                              </div>
                            </div>

                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button
                                  type="button"
                                  class="accordion-button collapsed"
                                  data-bs-toggle="collapse"
                                  data-bs-target="#accordionTwo"
                                  aria-expanded="false"
                                  aria-controls="accordionTwo"
                                >
                                 Foto KTP 
                                </button>
                              </h2>
                              <div
                                id="accordionTwo"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample"
                              >
                                <div class="accordion-body text-center">
                                  <?php if(empty($detail_sip['foto_ktp'])){
                                    echo "data belum disi";
                                  }

                                  else{
                                    echo '<embed src="'.base_url().'document/foto_ktp/'.$detail_sip['foto_ktp'].'.pdf" width="1000" height="700"> </embed>';
                                  }

                                  ?>
                                </div>
                              </div>
                            </div>

                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingThree">
                                <button
                                  type="button"
                                  class="accordion-button collapsed"
                                  data-bs-toggle="collapse"
                                  data-bs-target="#accordionThree"
                                  aria-expanded="false"
                                  aria-controls="accordionThree"
                                >
                                  STR
                                </button>
                              </h2>
                              <div
                                id="accordionThree"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample"
                              >
                                <div class="accordion-body text-center">
                                  <?php if(empty($detail_sip['foto_str'])){
                                    echo "data belum disi";
                                  }

                                  else{
                                    echo '<embed src="'.base_url().'document/str/'.$detail_sip['foto_str'].'.pdf" width="1000" height="700"> </embed>';
                                  }

                                  ?>
                                </div>
                              </div>
                            </div>

                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingFour">
                                <button
                                  type="button"
                                  class="accordion-button collapsed"
                                  data-bs-toggle="collapse"
                                  data-bs-target="#accordionFour"
                                  aria-expanded="false"
                                  aria-controls="accordionFour"
                                >
                                  Rekomendasi Organisai Profesi
                                </button>
                              </h2>
                              <div
                                id="accordionFour"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample"
                              >
                                <div class="accordion-body text-center">
                                  <?php if(empty($detail_sip['rekomendasi_org_p'])){
                                    echo "data belum disi";
                                  }

                                  else{
                                    echo '<embed src="'.base_url().'document/rop/'.$detail_sip['rekomendasi_org_p'].'.pdf" width="1000" height="700"> </embed>';
                                  }

                                  ?>
                                </div>
                              </div>
                            </div>

                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingFive">
                                <button
                                  type="button"
                                  class="accordion-button collapsed"
                                  data-bs-toggle="collapse"
                                  data-bs-target="#accordionFive"
                                  aria-expanded="false"
                                  aria-controls="accordionFive"
                                >
                                  Rekomendasi Tempat Praktek
                                </button>
                              </h2>
                              <div
                                id="accordionFive"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample"
                              >
                                <div class="accordion-body text-center">
                                  <?php if(empty($detail_sip['rekomendasi_tmpt_p'])){
                                    echo "data belum disi";
                                  }

                                  else{
                                    echo '<embed src="'.base_url().'document/rtp/'.$detail_sip['rekomendasi_tmpt_p'].'.pdf" width="1000" height="700"> </embed>';
                                  }

                                  ?>
                                </div>
                              </div>
                            </div>

                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingSix">
                                <button
                                  type="button"
                                  class="accordion-button collapsed"
                                  data-bs-toggle="collapse"
                                  data-bs-target="#accordionSix"
                                  aria-expanded="false"
                                  aria-controls="accordionSix"
                                >
                                  Ijazah
                                </button>
                              </h2>
                              <div
                                id="accordionSix"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingSix"
                                data-bs-parent="#accordionExample"
                              >
                                <div class="accordion-body text-center">
                                  <?php if(empty($detail_sip['ijazah'])){
                                    echo "data belum disi";
                                  }

                                  else{
                                    echo '<embed src="'.base_url().'document/ijazah/'.$detail_sip['ijazah'].'.pdf" width="1000" height="700"> </embed>';
                                  }

                                  ?>
                                </div>
                              </div>
                            </div>

                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingSeven">
                                <button
                                  type="button"
                                  class="accordion-button collapsed"
                                  data-bs-toggle="collapse"
                                  data-bs-target="#accordionSeven"
                                  aria-expanded="false"
                                  aria-controls="accordionSeven"
                                >
                                  Surat Sehat
                                </button>
                              </h2>
                              <div
                                id="accordionSeven"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingSeven"
                                data-bs-parent="#accordionExample"
                              >
                                <div class="accordion-body text-center">
                                  <?php if(empty($detail_sip['surat_sehat'])){
                                    echo "data belum disi";
                                  }

                                  else{
                                    echo '<embed src="'.base_url().'document/surat_sehat/'.$detail_sip['surat_sehat'].'.pdf" width="1000" height="700"> </embed>';
                                  }

                                  ?>
                                </div>
                              </div>
                            </div>

                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingEight">
                                <button
                                  type="button"
                                  class="accordion-button collapsed"
                                  data-bs-toggle="collapse"
                                  data-bs-target="#accordionEight"
                                  aria-expanded="false"
                                  aria-controls="accordionEight"
                                >
                                  Surat Pernyataan
                                </button>
                              </h2>
                              <div
                                id="accordionEight"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingEight"
                                data-bs-parent="#accordionExample"
                              >
                                <div class="accordion-body text-center">
                                  <?php if(empty($detail_sip['pernyataan'])){
                                    echo "data belum disi";
                                  }

                                  else{
                                    echo '<embed src="'.base_url().'document/surat_pernyataan/'.$detail_sip['pernyataan'].'.pdf" width="1000" height="700"> </embed>';
                                  }

                                  ?>
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
  </div>
</div>