<?php ob_start();
require "../config/database.php";
require "../config/function.php";
require "../config/functions.crud.php";
include "../assets/modules/phpqrcode/qrlib.php";
session_start();
if (!isset($_SESSION['id_siswa'])) {
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
    <title>Biotata_<?= $siswa['nama_siswa'] ?></title>
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


.table td {
	border-bottom-width: 0px !important;
	padding: .1rem .5rem !important;
	font-size : 10pt !important;
}

.table th{
	border-bottom-width: 0px !important;
	padding: .3rem .5rem !important;
	font-size : 10pt !important;
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
	font-size                 : 11px;
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
	font-size                 : 11px;
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

 <?php 
 
 if($siswa['asrama']=="Y") {
	 $siswa['asrama']="Ya";
 } else if($siswa['asrama']=="Tidak") {
	 $siswa['asrama']="Tidak";
 }
 
 ?>

    <div class="page-portrait">
 
    <table width="100%" class="page_header1" >
    <tbody><tr>
        <td style="width:75px;padding-bottom:4px;"><img src="../assets/logo.jpg" height="75px"></td>
        <td>
            <center>
                <span class="header1">BUKTI PENDAFTARAN CALON PESERTA DIDIK BARU </span><br>
                <span class="header1">MADRASAH ALIYAH NEGERI TEMANGGUNG</span><br>
                <span class="header1">TAHUN PELAJARAN 2024/2025	</span>
            </center></td>
        <td style="width:75px;padding-bottom:4px;"></td>
    </tr>
    </tbody>
</table>
 
		<table background="#000000" border="2" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td>
                </td>
			</tr>
		</table>

<table width="60%" align="center" border="0">
    <tr>
        <td>
 
            
        </td>
    </tr>
    </table><br>                    
                        <table style="font-size: 11pt;" class="table table-sm " cellspacing="0" id="sampleTable">
                            <tbody>

                                
                                <tr>
                                    <td></td>
                                    <td></td> 
                                    <td></td> 
                                    <td><div style="float:right; font-size:1.2em;">Nomor : <b>
                                            <?= $siswa['no_daftar'] ?>
                                        </b>
							</div>			
										</td>
                                </tr>
                                <tr>
                                    <td width="1%">1</td> 
                                    <td width="30%">NAMA </td>
                                    <td width="1%">:</td>
                                    <td> <?= strtoupper($siswa['nama_siswa']) ?>  </td>
                                </tr>
								
					<tr>
                                    <td>2</td> 
                                    <td width="30%">NISN / NIS </td>
                                    <td width="1%">:</td>
                                    <td> <?= $siswa['nisn'] ?> / <?= $siswa['nis'] ?> </td>
                                </tr>
                                <tr>
                                    <td>3</td> 
                                    <td width="30%">ASAL SEKOLAH / AMDRASAH </td>
                                    <td width="1%">:</td>
                                    <td><?= strtoupper($siswa['asal_sekolah']) ?> </td>
                                </tr>
								
					<tr>
                                    <td>4</td> 
                                    <td width="30%">MENDAFTAR ASRAMA </td>
                                    <td width="1%">:</td>
                                    <td><?= strtoupper($siswa['asrama']) ?> </td>
                                </tr>
                               
                                 
                                
                                <tr>
                                    <td colspan="4" > 
							<div style="float:left; width:300px; margin-top:20px;">
							Bagi yang  diterima, Kartu  ini  wajib ditunjukkan pada saat mendaftar ulang.
							</div>
							
							<div style="float:right; width:300px; margin-top:20px;">
							
							
                                     
									 Temanggung, _________ 2024 <br/>
							a.n. Kepala Madrasah <br/>
							Ketua Panitia 
							<br/><br/> <img class="img" src="../<?= $setting['ttd'] ?>" style="width: 30mm;" class="img" >
							
							<br/><br/>
							<?= $setting['ketua_panitia'] ?><br/>
							NIP: <?= $setting['nip_ketua_panitia'] ?>
										

							</div>
							
							
						</td>		 
                                </tr>

                            </tbody>
                        </table>
						
		
						
                        <div class="row footer">
                            <!-- <img src="https://jasaeditfoto.com/wp-content/uploads/2017/04/mengganti-warna-background-pas-foto.jpg" alt="foto_pas"> -->
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
