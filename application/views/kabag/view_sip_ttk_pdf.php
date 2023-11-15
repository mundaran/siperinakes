<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Detail SIP</title>
</head>


  <?php
  $path1 = 'document/frame2.png';
  $type = pathinfo($path1, PATHINFO_EXTENSION);
  $data = file_get_contents($path1);
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  ?>

  <style>
  body {
    background-image: url('<?php echo $base64?>');
    background-repeat: no-repeat;
    background-position: center;
    background-size: 140%;
    margin-top: -150;
    text-align: center;

   
  }

  article {
        backdrop-filter: blur(0px);
        padding-top: 280px;
        padding-right: 30px;
        padding-left: 95PX;
      }

  p {
   line-height:0.5;
}
  </style>
<body>
  <?php
  $path2 = 'document/icon_bjn.png';
  $type = pathinfo($path2, PATHINFO_EXTENSION);
  $data = file_get_contents($path2);
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  ?>

  <div class="row">
  <article>
  <table border="0" cellspacing="0" cellpadding="0" width="90%">
      <tr>
        <td align="center"><img src="<?php echo $base64?>" width="100" height="150"></td>
        <td align="center">
          <p>
          <text style="font-size:28px;">PEMERINTAH KABUPATEN BOJONEGORO</text>
          <h1>DINAS KESEHATAN</h1>
          <text style="font-size: 20px;">Area Kantor Pemerintah Kabupaten Bojonegoro Jalan Dr. Cipto 
Telp. (0353) 881350 Fax. 886695 Kode Pos 62116
BOJONEGORO
 </text>
          </p>
        </td>
      </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" width="90%">
      <tr>
        <td align="center">
          <p>
            <h3><b>SURAT IZIN PRAKTIK TENAGA TEKNIS KEFARMASIAN <?php echo strtoupper($detail_sip['jenis_sip']);?> (SIPTKK) </b></h3>
            <text style="font-size: 15px;">No :<?php echo $detail_sip['nomor_sip'];?></text>
          </p>
        </td>
      </tr>
  </table>

  <table border="0" cellspacing="0" cellpadding="0" width="90%" height="100%">
      <tr>
        <td align="justify">
          <p>
            <text style="font-size: 16px; line-height:1.5; ">Berdasarkan Undang-Undang Republik Indonesia Nomor 17 Tahun 2023 Tentang Kesehatan, yang bertanda tangan di bawah ini, Kepala Dinas Kesehatan Kabupaten Bojonegoro memberikan Izin Praktik Tenaga Teknis Kefarmasian Kepada  :</text>
          </p>
        </td>
      </tr>
  </table>

  <?php 
 $id_user = $detail_sip['id_user'];
  $id_sip = $detail_sip['id'];
  $datapemohon = $this->db->query("SELECT * FROM user WHERE id = $id_user ");
  $datauser= $datapemohon->row_array();

  $datavalidasi=$this->db->query("SELECT * FROM validasi_sip WHERE id_sip= $id_sip ");
  $datavalid=$datavalidasi->row_array();
  $tgl_db = $datavalid['tgl_validasi_kadin'];
  $tgl = new DateTime($tgl_db);
  $date_plus = $tgl->modify("+5 years");
  


  if($detail_sip['masa_berlaku_str']=='Seumur Hidup'){
    $masa_berlaku_sip = $date_plus->format('d-m-Y');
    $masa_berlaku_str='Seumur Hidup';
  }  else {
      $tgl_str =$detail_sip['masa_berlaku_str'];
      $new_tgl_str = new DateTime($tgl_str);
      $masa_berlaku_sip=$new_tgl_str->format('d-m-Y');
      $masa_berlaku_str=$new_tgl_str->format('d-m-Y');
  }
  ?>

  <table border="0" cellspacing="0" cellpadding="0" width="90%" height="100%">
      <tr>
        <td align="center">
          <p>
            <text style="font-size: 37px; line-height:1.5; "><b><?php echo $datauser['name'];?><b></text>
          </p>
        </td>
      </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" width="90%" height="100%">
      <tr>
        <td align="left">Tempat/Tgl.Lahir</td>
        <td >:</td>
        <td ><?php echo $datauser['tempat_lahir'];?>, <?php echo $datauser['tanggal_lahir'];?> </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="left">Alamat Rumah</td>
        <td >:</td>
        <td ><?php echo $datauser['alamat'];?>,Kec.<?php echo $datauser['kecamatan'];?> <?php echo $datauser['kota_kabupaten'];?>  </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="left">Nomor STRTTK</td>
        <td >:</td>
        <td ><?php echo $detail_sip ['no_str'];?> Berlaku s/d <?php echo $masa_berlaku_str;?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr|>
      <tr>
        <td align="left">Untuk Praktek Sebagai</td>
        <td >:</td>
        <td ><?php echo $detail_sip ['jenis_praktek'];?></td>
      </tr>
       <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="left">Alamat Tempat Praktik</td>
        <td >:</td>
        <td ><?php echo $detail_sip ['tempat_praktek'];?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="left">Hari/Jam</td>
        <td >:</td>
        <td ><?php echo $detail_sip ['hari_awal_praktek'];?></td>
      </tr>
      <tr>
        <td align="left">Masa Berlaku</td>
        <td >:</td>
        <td ><?php echo $masa_berlaku_sip; ?></td>
      </tr>
  </table>

  <table border="0" cellspacing="0" cellpadding="0" width="90%" height="60%">
    <tr>
      <td align="justify">
        <p>Dengan Ketentuan Sebagai Berikut :</p>
        <p style="font-size: 16px; line-height:1;">1. Penyelenggaraan pekerjaan/praktik kefarmasian disarana kefarmasian harus selalau mengikuti paradigma pelayanan kefarmasian dan perkembangan ilmu pengetahuan dan teknologi serta peraturan perundang-undangan yang berlaku.</p>
        <p style="font-size: 16px; line-height:1;">2. Surat Izin ini batal demi hukum apabila bertentangan dengan ayat 1 diatas dan pekerjaan kefarmasian dilakukan tidak sesuai dengan yang tercantum dalam surat izin.</p>
        <p style="font-size: 16px; line-height:1;">Catatan :</p>
        <p><?php echo $detail_sip['catatan'];?></p>
      </td>
    </tr>
  </table>

  <?php
  $path3 = 'document/foto_user/'.$datauser['pict'].'.jpg';
  $type = pathinfo($path3, PATHINFO_EXTENSION);
  $data = file_get_contents($path3);
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  ?>

  <table border="0" cellspacing="0" cellpadding="0" width="90%" height="100%">
      <tr>
        <td width="150" height="211" colspan="2" align="left" valign ="bottom" >&nbsp;
          <p style="font-size: 14px; line-height:1;">&nbsp;Tembusan disampaikan kepada Yth:</p>
          <p style="font-size: 14px; line-height:1;">&nbsp;1.Direktur Jendral Bina Kefarmasian dan Alat Kesehatan</p>
          <p style="font-size: 14px; line-height:1;">&nbsp;2.Ketua Komite Farmasi Nasional</p>
          <p style="font-size: 14px; line-height:1;">&nbsp;3.Kepala Dinas Kesehatan Provinsi Jawa Timur</p>
        </td>
        <td width="100" height="211">&nbsp;</td>
        <td align="right" valign ="top"><img src="<?php echo $base64?>" width="144" height="211"></td>
        <td align="left" valign ="top" >
          <p>&nbsp;Ditetapkan di : Bojonegoro</p>
          <p>&nbsp;Pada Tanggal : <?php echo date('d-m-Y');?></p>
          <p>&nbsp;KEPALA DINAS KESEHATAN</p>
          <p>&nbsp;KABUPATEN BOJONEGORO</p>
          <br>
          <br>
          <p>&nbsp;<u>dr.ANI PUJININGRUM, M.Kes</u></p>
          <p>&nbsp;Pembina Tingkat I</p>
          <p>&nbsp;NIP : 19731008 200312 2 006</p>
        <td>
      </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" width="90%" height="100%">
      <tr>
        <td align="left" valign ="top" >
          
        <td>
      </tr>
  </table>

  </article>
  </div>
  <div class="row">
  <article>
  
  </article>
  </div>

</body>
</html>