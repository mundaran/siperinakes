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
          <text style="font-size: 20px;">Jl.Panglima Sudirman No.30 Telp (0353) 881350</text>
          </p>
        </td>
      </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" width="90%">
      <tr>
        <td align="center">
          <p>
            <h3><b>SURAT IZIN PRAKTIK (SIP) DOKTER</b></h3>
            <text style="font-size: 15px;">No :...../.../DINKES/drg/XII/2022</text>
          </p>
        </td>
      </tr>
  </table>

  <table border="0" cellspacing="0" cellpadding="0" width="90%" height="100%">
      <tr>
        <td align="justify">
          <p>
            <text style="font-size: 14px; line-height:1.5; ">Berdasarkan Peraturan Menteri Kesehatan Republik Indonesia Nomor : 2052/Menkes/Per/X2011 tentang Izin Praktek dan Pelaksanaan Praktek Kedokteran, yang bertanda tangan di bawah ini, Kepala Dinas Kesehatan Kabupaten Bojonegoro memberikan izin Praktek Kepada :</text>
          </p>
        </td>
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