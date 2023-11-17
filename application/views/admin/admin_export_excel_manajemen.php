<?php   
$tanggal_tarik = date("Y-m-d");
header("Content-Type: application/vnd.ms-excel");  
header("Content-Disposition: attachment; filename=DATA_SIP_TARIKAN_ADMIN_TGL_".$tanggal_tarik.".xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
?>

<h2>DAFTAR SIP TANGGAL <?php $tgl_awal_baru = new DateTime($dari_tgl); $tgl_mulai=$tgl_awal_baru->format('d-m-Y'); echo $tgl_mulai;?> sd <?php $tgl_akhir_baru = new DateTime($sampai_tgl); $tgl_akhir=$tgl_akhir_baru->format('d-m-Y'); echo $tgl_akhir;?> </h2>
<br>
<br>


	<table border="1">
        <tr>
            <th align="center">Nomor SIP</th>
            <th align="center">Nama Nakes</th>
            <th align="center">No STR</th>
            <th align="center">Masa Berlaku STR</th>
            <th align="center">No Rekomendasi OP</th>
            <th align="center">Jenis SIP</th>
            <th align="center">Masa Berlaku SIP</th>
            <th align="center">Jenis Praktek</th>
            <th align="center">Tempat Praktek</th>
            <th align="center">Alamat Praktek</th>
            <th align="center">Waktu Praktek</th>
            <th align="center">Alamat Nakes</th>
            <th align="center">Validasi Kabag</th>
            <th align="center">Tanggal Validasi Kabag</th>
            <th align="center">Validasi Sekdin</th>
            <th align="center">Tanggal Validasi Sekdin</th>
            <th align="center">Validasi Kadin</th>
            <th align="center">Tanggal Validasi Kadin</th>

        </tr>

        <?php foreach($data_validasi as $data):?>
			<?php
			$id_sip = $data['id_sip'];
			$query_sip =$this->db->query("SELECT * FROM data_sip WHERE id=$id_sip ");
			$datasip = $query_sip->result_array();
			?>

        <tr>
        	<?php foreach($datasip as $sip):?>
    		<?php
    		  $tgl_db = $data['tgl_validasi_kadin'];
	          $tgl = new DateTime($tgl_db);
	          $tgl_validasi = $tgl->format('d-m-Y');
	          $date_plus = $tgl->modify("+5 years");

	          if($sip['masa_berlaku_str']=='Seumur Hidup'){
	            $masa_berlaku_sip = $date_plus->format('d-m-Y');
	            $masa_berlaku_str='Seumur Hidup';
	          }  else {
	              $tgl_str =$sip['masa_berlaku_str'];
	              $new_tgl_str = new DateTime($tgl_str);
	              $masa_berlaku_sip=$new_tgl_str->format('d-m-Y');
	              $masa_berlaku_str=$new_tgl_str->format('d-m-Y');
	          }


    		?>

        	<td><?php echo $sip['nomor_sip'];?></td>

        	<?php 
        	$id_user = $sip['id_user'];
        	$query_user =$this->db->query("SELECT * FROM user WHERE id=$id_user");
			$data_user = $query_user->result_array();
        	?>

        	<?php foreach($data_user as $user):?>

        	<td><?php echo $user['name'];?></td>

        	<?php endforeach;?>
        	<td><?php echo $sip['no_str'];?></td>
        	<td><?php echo $masa_berlaku_str;?></td>
        	<td><?php echo $sip['no_rekomendasi_op'];?></td>
        	<td><?php echo $sip['jenis_sip'];?></td>
        	<td><?php echo $masa_berlaku_sip;?></td>
        	<td><?php echo $sip['jenis_praktek'];?></td>
        	<td><?php echo $sip['tempat_praktek'];?></td>
        	<td><?php echo $sip['alamat_praktek'];?></td>
        	<td><?php echo $sip['hari_awal_praktek'];?></td>
        	<td><?php echo $user['alamat'];?></td>
        	<td><?php echo $data['validasi_kabag'];?></td>
        	<td><?php echo $data['tgl_validasi_kabag'];?></td>
        	<td><?php echo $data['validasi_sekdin'];?></td>
        	<td><?php echo $data['tgl_validasi_sekdin'];?></td>
        	<td><?php echo $data['validasi_kadin'];?></td>
        	<td><?php echo $data['tgl_validasi_kadin'];?></td>

        	<?php endforeach;?>
        </tr>

        <?php endforeach;?>
    </table>

<?php exit;?>