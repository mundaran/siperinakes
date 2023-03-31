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
          <text style="font-size: 20px;">Area Perkantoran Pemerintah Kabupaten Bojonegoro - Jl.Dr.Cipto </text>
          </p>
        </td>
      </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" width="90%">
      <tr>
        <td align="center">
          <p>
            <h3><b>SURAT IZIN PRAKTIK (SIP) <?php echo strtoupper($detail_sip['jenis_sip']);?></b></h3>
            <text style="font-size: 15px;">No :<?php echo $detail_sip['nomor_sip'];?></text>
          </p>
        </td>
      </tr>
  </table>

  <table border="0" cellspacing="0" cellpadding="0" width="90%" height="100%">
      <tr>
        <td align="justify">
          <p>
            <text style="font-size: 16px; line-height:1.5; ">Berdasarkan Peraturan Menteri Kesehatan Republik Indonesia Nomor : 2052/Menkes/Per/X2011 tentang Izin Praktek dan Pelaksanaan Praktek Kedokteran, yang bertanda tangan di bawah ini, Kepala Dinas Kesehatan Kabupaten Bojonegoro memberikan izin Praktek Kepada :</text>
          </p>
        </td>
      </tr>
  </table>

  <?php 
  $id_user = $detail_sip['id_user'];
  $datapemohon = $this->db->query("SELECT * FROM user WHERE id = $id_user ");
  $datauser= $datapemohon->row_array();
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
  <br>
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
        <td align="left">Nomor STR</td>
        <td >:</td>
        <td ><?php echo $detail_sip ['no_str'];?> Berlaku s/d <?php echo $detail_sip['masa_berlaku_str'];?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr|>
      <tr>
        <td align="left">Nomor Rekomendasi OP</td>
        <td >:</td>
        <td ><?php echo $detail_sip ['no_rekomendasi_op'];?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr|>
      <tr>
        <td align="left">Jenis Praktek</td>
        <td >:</td>
        <td ><?php echo $detail_sip ['jenis_praktek'];?></td>
      </tr>
       <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr|>
      <tr>
        <td align="left">Hari/Jam</td>
        <td >:</td>
        <td ><?php echo $detail_sip ['hari_awal_praktek'];?>-<?php echo $detail_sip ['hari_akhir_praktek'];?>&nbsp;/&nbsp;<?php echo $detail_sip ['jam_buka'];?>-<?php echo $detail_sip ['jam_tutup'];?></td>
      </tr>
  </table>
  <br>
  <br>
  <br>

  <?php
  $path3 = 'document/foto_user/'.$datauser['pict'].'.jpg';
  $type = pathinfo($path3, PATHINFO_EXTENSION);
  $data = file_get_contents($path3);
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  ?>

  <table border="0" cellspacing="0" cellpadding="0" width="90%" height="100%">
      <tr>
        <td width="144" height="211">&nbsp;</td>
        <td width="144" height="211">&nbsp;</td>
        <td align="right" valign ="top"><img src="<?php echo $base64?>" width="144" height="211"></td>
        <td align="left" valign ="top" >
          <p>&nbsp;Ditetapkan di : Bojonegoro</p>
          <p>&nbsp;Pada Tanggal : <?php echo date('d-m-Y');?></p>
          <br>
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
          <p>&nbsp;Tembusan :</p>
          <p>&nbsp;1.Menteri Kesehatan</p>
          <p>&nbsp;2.Ketua Konsil Kedokteran Indonesia</p>
          <p>&nbsp;3.Kepala Dinas Kesehatan Provinsi Jawa Timur</p>
          <p>&nbsp;4.Organisasi Profesi</p>
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