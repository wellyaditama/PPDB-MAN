<?php ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
include "../../assets/modules/phpqrcode/qrlib.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
$siswa = fetch($koneksi, 'siswa', ['id_siswa' => dekripsi($_GET['id'])]);
$tempdir = "../temp/"; //Nama folder tempat menyimpan file qrcode
if (!file_exists($tempdir)) //Buat folder bername temp
    mkdir($tempdir);

//isi qrcode jika di scan
$codeContents = $siswa['nisn'] . '-' . $siswa['nama_siswa'];

//simpan file kedalam temp
//nilai konfigurasi Frame di bawah 4 tidak direkomendasikan

QRcode::png($codeContents, $tempdir . $siswa['nisn'] . '.png', QR_ECLEVEL_M, 4);


$kelas = fetch($koneksi, 'jenjang', ['id_jenjang' => $siswa['kelas']]);
$tgl_lahirsiswa = $siswa['tgl_lahir'];
$tgl_mutasi = $siswa['tgl_mutasi'];
$tahun1 = date('Y');
$tahun2 = date('Y')+1;

?>

<style>
 #hed1 {
    font-family               : Verdana;
	font-size                 : 1px;
	border-collapse				: collapse;
	padding				:0px;
	    background:#999;
}
</style>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <title>Surat Pernyataan | <?= $siswa['nama_siswa'] ?></title>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<style type="text/css">

body {
    background: #fff;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 12px

}

tr {
    font-family               : Verdana;
	font-size                 : 11px;
	border-collapse				: collapse;
	padding				:0px;
    page-break-inside: avoid;
     page-break-after: auto ;
}
tab.td {
    font-family               : Verdana;
	font-size                 : 11px;
	border-collapse				: collapse;
	padding-left				:5px;
}
input, textarea{
    margin           : 1px;
	font-size        : 11px;
	font-family      : Verdana;
	color            : #000000;
	background-color : #FFFFFF;

}
option, select {
    margin           : 1px;
	font-size        : 11px;
	font-family      : Verdana;
	color            : #000000;
	background-color : #FFFFFF;
}
a, a:link, a:visited, a:active {
    color           : black;
    font-weight     : bold;
    font-family     : Verdana;
    font-size       : 11px ;
	text-decoration : none;
}
a:hover {
    color           : red;
	font-weight     : bold;
    font-family     : Verdana;
    font-size       : 11px;
	text-decoration : none;
}
A.headerlink {
    margin           : 1px;
	font-size        : 11px;
	font-family      : Verdana;
	color       : #FFFFFF;
	
}
  
.page-portrait {
    position: relative;
    width: 21cm;
    margin: 0.5cm auto;
    padding: 1cm;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    -webkit-box-sizing: initial;
    -moz-box-sizing: initial;
    box-sizing: initial;

}

.but{
    cursor:pointer;
    border:outset 1px #ccc;
    background:#999;
    color:#666;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg.gif) repeat-x left top;
}
.disabled{
    background:#c0c0c0;
    padding: 1px 2px;
	color:#000000;
}

.textboxred{
	color:#000000;
	padding: 1px 2px;
	background-color: #FB4678;
}

.header {
   border:outset 2px #000000;
     color:#000000;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg.gif) left top;
    border-collapse    : collapse;
    font-size        : 12px;
}
.header1 {
    font-size        : 15px;
	font-weight:bold;
}
.header2 {
	font-family      : Arial;
    font-size        : 22px;
	font-weight:bold;
}
.header3 {
	font-family      : Arial;
    font-size        : 14px;
}
.headerpesan {
    border:outset 1px #ccc;
    background:#999;
    color:#FFFFFF;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg2agreen.gif) repeat-x left top;
    border-collapse    : collapse;
    font-size        : 12px;
}
.headerlong {
    border:outset 2px #000000;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg.gif) repeat-x left top;
    border-collapse    : collapse;
    font-size        : 12px;
}
.headerlink2 {
	cursor:pointer;
    border:outset 1px #ccc;
    background:#999;
    color:#fcf300;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg2.gif) repeat-x left top;
    border-collapse    : collapse;
    font-size        : 12px;
	
}
.headerlink2active {
	cursor:pointer;
    border:outset 1px #ccc;
    background:#999;
    color:#fcf300;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg2a.gif) repeat-x left top;
    border-collapse    : collapse;
    font-size        : 12px;
	
}
.tab {
    font-family               : Verdana;
	font-size                 : 12px;
	background-color          : #FFFFFF;
	color                     : #000000;
	border            : groove 2px #000000;
	border-collapse    : collapse;
}
.tab1 {
    font-family               : Verdana;
	font-size                 : 12px;
	background-color          : #FFFFFF;
	color                     : #000000;
	border            : outset 2px #000000;
	border-collapse    : collapse;
}
.tab01 {
    font-family               : Verdana;
	font-size                 : 12px;
	background-color          : #FFFFFF;
	color                     : #000000;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	
}
.red {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #FF0000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
}

.tab2 {
    font-family               : Verdana;
	font-size                 : 12px;
	background-color          : #FFFFFF;
	color                     : #000000;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	border-right:none;
}

.tab3 {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	border-left:none;
}


.headerlongar {
   
    font-weight:smooth;
    padding: 1px 2px;
    background:url(formbg.gif) repeat-x left top;
    border-collapse    : collapse;
 	font-size:15.0pt;
	line-height:105%;
	font-family:Verdana;
	
}


.tabar {
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : groove 2px #000000;
	border-collapse    : collapse;
	font-size:14.0pt;
	line-height:105%;
	font-family:Times New Roman;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
}
.tabar1 {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
}
.redar {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #FF0000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
}

.tabar2 {
    font-family               : Verdana;
	font-size                 : 11px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	border-right:none;
}

.tabar3 {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	border-left:none;
}

.ttd {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : none;
	border-collapse    : collapse;
}
.h {
		background-color:#565656;
		border-collapse    : collapse;
		color:#FFFFFF;
    	font-weight:bold;
	}
.back_table {
	background-image: url(../images/bktablelong.jpg);
	background-repeat: no-repeat;
}
.tab_kelas {
	background-color: #FFFFFF;
	border-bottom-style: none;
}
.miring {
	border-bottom-style: none;
	font-style: italic;
}
.brown {
	color: #663333;
}
.ukuran {
	width: 135px;
}
.ukuranemail {
	width: 150px;
}
.Ukuranketerangan {
	height: 40px;
	width: 200px;
}
.text_merah{
    background:#FFFFFF;
    padding: 1px 2px;
	color:#FF0000;
}
input,textarea,select{
	border:1px solid #333333; padding:1px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}

div.page {
    page-break-before:always;
}
.style1{
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF
}
.style6 {
	font-size: 12px;
	font-weight: bold;
}
.style13 {
	font-size: 18px;
}
.style14 {color: #FFFFFF}
header { 
    position: fixed; 
    top: 25%; 
    left:     0px;
    width:    100%;
    height:   100%;
    opacity: .1;
 
}
header img { 
    width:    8cm;
    height:   8cm;
}
#watermark {
				display: block;
				position: fixed;
				top: -10%;
				left: 105px;
				transform: rotate(-45deg);
				transform-origin: 50% 50%;
				opacity: .15;
                font-family: Verdana;
                font-size: 20px;
				color: #76fd4a;
				width: 480px;
				text-align: center;
                white-space: nowrap;
               
			}

            @media print {
    body {
        background: #fff;
        font-family: 'Times New Roman', Times, serif;
        font-size: 12px
    }
            .page {
            page-break-before: always;
        }  
       .page-portrait {
		width: 21cm;
        max-height: 29.7cm;
        padding-top: 1cm;
        padding-bottom: 1cm;
        padding-right: 1.5cm;
        padding-left: 2cm;
        margin: 0cm;
        box-shadow: none;

    }
        .footer {
        bottom: 0.7cm;
        left: 0.7cm;
        right: 0.7cm
    }
}
</style>
     <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
</HEAD>
<BODY>


    <div class="page-portrait">
		
<table width="60%" align="center" border="0">
    <tr>
        <td>

            <br>
            <div align="center" class="style13">
                    <b>SURAT PERNYATAAN PESERTA DIDIK BARU <br>TAHUN PELAJARAN <?= $setting['tahun_pelajaran'] ?> </b>
            </div>
            
        </td>
    </tr>
    </table><br>
    
    <p>Yang bertanda tangan di bawah ini :</p>
    <table border="0">
        <tr>
            <td style="font-size: 11pt;">1.</td>
            <td style="font-size: 11pt;">Nama</td>
            <td style="font-size: 11pt;">:</td>
            <td style="font-size: 11pt;"><b><?= $siswa['nama_siswa'] ?></b></td>
        </tr>
        <tr>
            <td style="font-size: 11pt;">2.</td>
            <td style="font-size: 11pt;">No Pendaftaran</td>
            <td style="font-size: 11pt;">:</td>
            <td style="font-size: 11pt;"><?= $siswa['no_daftar'] ?></td>
        </tr>
        <tr>
            <td style="font-size: 11pt;">3.</td>
            <td style="font-size: 11pt;">Jenis Kelamin</td>
            <td style="font-size: 11pt;">:</td>
            <td style="font-size: 11pt;"><?php if ($siswa['jk'] == 'L') { ?>
                                            Laki-laki
                                        <?php } elseif ($siswa['jk'] == 'P') { ?>
                                            Perempuan
                                        <?php } ?></td>
        </tr>
        <tr>
            <td style="font-size: 11pt;">4.</td>
            <td style="font-size: 11pt;">Telp/HP Orangtua/Wali</td>
            <td style="font-size: 11pt;">:</td>
            <td style="font-size: 11pt;"><?= $siswa['no_hp_ayah'] ?></td>
        </tr>
        <tr>
            <td style="font-size: 11pt;">5.</td>
            <td style="font-size: 11pt;">Alamat</td>
            <td style="font-size: 11pt;">:</td>
            <td style="font-size: 11pt;"><?= $siswa['alamat_ayah'] ?>&nbsp;
                                        Desa / Kelurahan <?= $siswa['desa_ayah'] ?>,&nbsp;
                                        Kecamatan <?= $siswa['kec_ayah'] ?>,&nbsp;
                                        Kabupaten / Kota <?= $siswa['kab_ayah'] ?>&nbsp;
                                        <?= $siswa['prov_ayah'] ?>&nbsp;
                                        </td>
        </tr>

    </table><br>
    <p>Dengan ini saya menyatakan dengan sesungguhnya,</p>
    <ol>
        <li>Bertaqwa kepada Alloh SWT dan menjalankan Syariat Agama Islam dengan sungguh-sungguh</li>
        <li>Hormat dan patuh kepada orang tua dan guru</li>
        <li>Sanggup menjaga nama baik Diri sendiri, Keluarga, Masyarakat dan Madrasah</li>
        <li>Sanggup menaati seluruh tata tertib Madrasah dan peraturan yang berlaku</li>
        <li>Sanggup tidak membawa Hand Phone (HP) dan sepeda motor ke Madrasah</li>
        <li>Sanggup tidak akan mengikuti kegiatan diluar kegiatan Madrasah (ketrampilan bela diri atau lainya ) yang tidak direkomendasi Madrasah</li>
        <li>Sanggup menerima sanksi apabila melanggar tata tertib Madrasah berupa:
            <ul type="square">
                <li>Teguran</li>
                <li>Pemberitauan dan pemanggilan Orang tua</li>
                <li>Diskors dalam waktu tertentu</li>
                <li>Dikembalikan kepada orang tua</li>
            </ul>
        </li>
    </ol>
    <p>Demikian surat pernyataan ini kami buat dengan sebenarnya dan penuh rasa tanggung jawab.</p>
    <table width="100%" border="0">
     <tr>
                                    <td style="font-size: 11pt;" class="text-center">Mengetahui, 
									<br style="font-size: 11pt;" class="text-center">Orangtua/Wali
									<br>
									<br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br style="font-size: 11pt;" class="text-center">............................
                                    </td>
                                    <td style="font-size: 11pt;" class="text-center">Temanggung, <?php
                                                             $tgl=date('d-m-Y');
                                                             echo $tgl;
                                                             ?>
									<br style="font-size: 11pt;" class="text-center">Yang Membuat Pernyataan
									<br>
									<br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br style="font-size: 11pt;" class="text-center"><b><?= $siswa['nama_siswa'] ?></b>
                                    </td>
                                </tr>
    </table>
    
    
                        <div class="row footer">
                        </div>
                    </div>
                </div>
            </div>
            <p style="page-break-after: always;"></p>

            <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'></script>
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('#example').DataTable();
                });
            </script>
        </body>


</html>
