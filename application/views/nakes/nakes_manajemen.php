<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>


        <div class="content-wrapper">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
               
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="card">

                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
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
                                <?php 
                                 $id_user = $user['id']; 
                                 $sip = $this->db->get_where('data_sip',array('id_user' => $id_user , ))->result_array();
                                 foreach($sip as $dataSip ):?>
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
                  </div>
                </div>
              </div>

          <div class="row">
          </div>

        </div>
      </div>
       
      </div>
