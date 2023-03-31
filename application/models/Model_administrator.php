<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Model_administrator extends CI_Model{


	public function load_data_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=2");
		return $sql->result_array();
	}

	public function load_data_perpanjangan_sip()
	{
		
		$datasip = $this->db->query("SELECT * FROM data_sip WHERE status=5 ");
		return $datasip->result_array();
	}

	public function load_manajemen_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=3");
		return $sql->result_array();
	}

	public function load_list_revisi_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=6 OR status=4");
		return $sql->result_array();
	}

	public function load_list_revisi_sip_perpanjangan()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=8 OR status=7");
		return $sql->result_array();
	}

	public function load_manajemen_user()
	{
		$sql = $this->db->query("SELECT * FROM user WHERE id");
		return $sql->result_array();
	}

	public function approval_validasi_sip($data,$id_sip,$status_sip,$nomor_sip,$catatan,$title_validasi)
	{
		$query= $this->db->insert('validasi_sip', $data);
	    if($query)
	    {	
	    	$status = $status_sip ;
	    	$no_sip = $nomor_sip;
	    	$note = $catatan;
	    	$update_status = array( 
	    		'status'=>$status,
	    		'nomor_sip'=>$nomor_sip,
	    		'catatan'=>$catatan
	    					);
			$this->db->where('id',$id_sip);
			$berhasil = $this->db->update('data_sip', $update_status);

			$this->session->set_flashdata('message',$title_validasi);
			redirect('administrator/validasi_sip');
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_sip/'.$id_sip);
	    }
	}

	public function approval_revisi_sip_baru($data,$id_sip,$status_sip,$nomor_sip,$catatan,$title_validasi)
	{
		$this->db->where('id_sip',$id_sip);
		$query= $this->db->update('validasi_sip', $data);
	    if($query)
	    {	
	    	$status = $status_sip ;
	    	$no_sip = $nomor_sip;
	    	$note = $catatan;
	    	$update_status = array( 
	    		'status'=>$status,
	    		'nomor_sip'=>$nomor_sip,
	    		'catatan'=>$catatan
	    					);
			$this->db->where('id',$id_sip);
			$berhasil = $this->db->update('data_sip', $update_status);

			$this->session->set_flashdata('message',$title_validasi);
			redirect('administrator/list_revisi_sip');
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_sip/'.$id_sip);
	    }
	}


	public function revisi_validasi_sip($data,$id_sip,$status_sip,$title_validasi)
	{
		$query= $this->db->insert('validasi_sip', $data);
	    if($query)
	    {	
	    	$status = $status_sip ;
	    	$update_status = array( 'status'=>$status );
			$this->db->where('id',$id_sip);
			$berhasil = $this->db->update('data_sip', $update_status);

			$this->session->set_flashdata('message',$title_validasi);
			redirect('administrator/validasi_sip');
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_sip/'.$id_sip);
	    }
	}

	public function revisi_revisi_sip_baru($data,$id_sip,$status_sip,$title_validasi)
	{
		$this->db->where('id_sip',$id_sip);
		$query= $this->db->update('validasi_sip', $data);
	    if($query)
	    {	
	    	$status = $status_sip ;
	    	$update_status = array( 'status'=>$status );
			$this->db->where('id',$id_sip);
			$berhasil = $this->db->update('data_sip', $update_status);

			$this->session->set_flashdata('message',$title_validasi);
			redirect('administrator/list_revisi_sip');
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_sip/'.$id_sip);
	    }
	}


	public function validasi_perpanjangan($data,$id_sip,$status_sip,$validator_sebelumnya,$title_validasi,$nama_admin)
	{
		$this->db->where('id_sip',$id_sip);
		$update_validasi= $this->db->update('validasi_sip', $data);

	    if($update_validasi){	
	    	$status = $status_sip ;
	    	$update_status = array( 'status'=>$status );
			$this->db->where('id',$id_sip);
			$up_data_sip = $this->db->update('data_sip', $update_status);

			if ($up_data_sip) {
				$up_status = 'done';
				$data_riwayat=array(
					'status' => $up_status,
					'approver_sebelumnya'=>$validator_sebelumnya,
					'approver_perpanjangan'=>$nama_admin
				);

				$status_per = 'undone';
				$where =array(
					'id_sip' => $id_sip,
					'status'=>$status_per
				);
				$this->db->where($where);
				$up_riwayat = $this->db->update('riwayat_perpanjangan', $data_riwayat);
				$this->session->set_flashdata('message',$title_validasi);
				redirect('administrator/perpanjangan_sip');
			} else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
				redirect('administrator/perpanjangan_sip');
			}
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_sip/'.$id_sip);
	    }
	}
	
}