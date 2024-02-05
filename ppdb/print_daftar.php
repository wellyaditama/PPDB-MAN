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

th.center {
	text-align:center !important;
}
</style>
     <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
</HEAD>
<BODY>


<div class="page-portrait">
<?php if ($setting['_kop'] == "1") { ?>
 <table width="100%" class="page_header1" >
    <tbody><tr>
       
        <td>
            <center><img src="../<?= $setting['kop'] ?> " width="100%">
            </center></td>
       
    </tr>
	
    </tbody>
	</table>

		<hr>
	
<?php } else { ?>
    <table width="100%" class="page_header1" >
    <tbody><tr>
        <td style="width:75px;padding-bottom:4px;"><img src="../<?= $setting['logo'] ?> " height="75px"></td>
        <td>
            <center>
                <span class="header1"><?= $setting['lembaga'] ?> </span><br>
                <span class="header2"><?= $setting['nama_sekolah'] ?></span><br>
                <span class="header3"><i>NSM <?= $setting['nsm'] ?> / NPSN <?= $setting['npsn'] ?><br>
                <?= $setting['alamat'] ?> Kecamatan <?= $setting['kec'] ?>, Kabupaten <?= $setting['kab'] ?> - <?= $setting['provinsi'] ?>                </i></span>
            </center></td>
        <td style="width:75px;padding-bottom:4px;"></td>
    </tr>
    </tbody>
</table>
<?php } ?>

		<table background="#000000" border="2" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td>
                </td>
			</tr>
		</table>

<table width="100%"  border="0">
    <tr>
        <td>

            <br>
            <div align="center" class="style13">
			
			<?php if($siswa['jurusan']=="REGULER") { ?>
			
                    <b>FORMULIR PENDAFTARAN JALUR REGULER </b> <br/>
					
			<?php } else if($siswa['jurusan']=="PRESTASI") { ?>
			
			<b>FORMULIR PENDAFTARAN JALUR PRESTASI </b> <br/>
			
			<?php } else if($siswa['jurusan']=="AFIRMASI") { ?>
			
			<b>FORMULIR PENDAFTARAN JALUR AFIRMASI </b> <br/>
			
			<?php }  ?>
            </div>
            <br/>
		
        </td>
    </tr>
	
	<tr>
        <td align="right" style="font-size: 11pt;"><b> NOMOR :  <?= $siswa['no_daftar'] ?> </b>
		<br/><br/></td>
	</tr>
		
    </table>



        

         
                
                
                        <table style="font-size: 11pt;" class="table" >
                            <tbody>

                                <tr>
                                    <th>A.</th>
                                    <th colspan="3">CALON SISWA</th>
                                </tr>
                               
					<tr>
                                    <td width="1%"></td> 
                                    <td width="33%">NISN dan NIS</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['nisn'] ?> </td>
                                </tr>
					
					<tr>
                                    <td width="1%"></td> 
                                    <td>Nama Lengkap</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['nama_siswa'] ?> </td>
                                </tr>
								
					<tr>
                                    <td width="1%"></td> 
                                    <td>Jenis Kelamin</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['jk'] ?> </td>
                                </tr>


					<tr>
                                    <td width="1%"></td> 
                                    <td>Tempat dan Tanggal Lahir</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['tempat_lahir'] ?> ,  <?= $siswa['tgl_lahir'] ?></td>
                                </tr>
								
					<tr>
                                    <td width="1%"></td> 
                                    <td>Asal Sekolah / Madrasah</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['asal_sekolah'] ?> </td>
                                </tr>			

								
                                <tr>
                                    <td width="1%"></td> 
                                    <td>Nomor Telp./HP/WA</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['no_hp'] ?> </td>
                                </tr>	
								
								
					<tr>
                                    <td width="1%"></td> 
                                    <td>Nomor KK</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['no_kk'] ?> </td>
                                </tr>	
						
					<tr>
                                    <td width="1%"></td> 
                                    <td>NIK</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['nik'] ?> </td>
                                </tr>	
								
								
                                <tr>
                                    <th>B.</th>
                                    <th colspan="3">ORANGTUA </th>
                                </tr>
                               
					<tr>
                                    <td width="1%"></td> 
                                    <td>Nama Ayah</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['nama_ayah'] ?> </td>
                                </tr>
								
					<tr>
                                    <td width="1%"></td> 
                                    <td>Nomor Telp./HP Ayah</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['no_hp_ayah'] ?> </td>
                                </tr>
								
					<tr>
                                    <td width="1%"></td> 
                                    <td>Nama Ibu</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['nama_ibu'] ?> </td>
                                </tr>
								
					<tr>
                                    <td width="1%"></td> 
                                    <td>Nomor Telp./HP Ibu</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['no_hp_ibu'] ?> </td>
                                </tr>	

					<tr>
                                    <td width="1%"></td> 
                                    <td colspan="3"><b>ALAMAT</b></td> 
                                </tr>	
								
							 
					<tr>
                                    <td width="1%"></td> 
                                    <td>Dusun/Lingkungan</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['alamat_ayah'] ?> </td>
                                </tr>	
						
					<tr>
                                    <td width="1%"></td> 
                                    <td>RT / RW</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['rt_ayah'] ?> / <?= $siswa['rw_ayah'] ?></td>
                                </tr>
								
					 	
					<tr>
                                    <td width="1%"></td> 
                                    <td>Desa/Kelurahan </td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['desa_ayah'] ?> </td>
                                </tr>	
								
					<tr>
                                    <td width="1%"></td> 
                                    <td>Kecamatan </td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['kec_ayah'] ?> </td>
                                </tr>	
							
					<tr>
                                    <td width="1%"></td> 
                                    <td>Kabupaten/Kota </td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['kab_ayah'] ?> </td>
                                </tr>
								

								
                                 <tr>
                                    <th>C.</th>
                                    <th colspan="3">WALI </th>
                                </tr>
                               
					<tr>
                                    <td width="1%"></td> 
                                    <td>Nama Wali</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['nama_wali'] ?> </td>
                                </tr>
								
					<tr>
                                    <td width="1%"></td> 
                                    <td>Hubungan</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['hubungan_wali'] ?> </td>
                                </tr>
								 
					<tr>
                                    <td width="1%"></td> 
                                    <td colspan="3"><b>ALAMAT</b></td> 
                                </tr>	
								
							 
					<tr>
                                    <td width="1%"></td> 
                                    <td>Dusun/Lingkungan</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['alamat_wali'] ?> </td>
                                </tr>	
						
					<tr>
                                    <td width="1%"></td> 
                                    <td>RT / RW</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['rt_wali'] ?> / <?= $siswa['rw_wali'] ?> </td>
                                </tr>
					 
								
					<tr>
                                    <td width="1%"></td> 
                                    <td>Desa/Kelurahan </td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['desa_wali'] ?> </td>
                                </tr>	
								
					<tr>
                                    <td width="1%"></td> 
                                    <td>Kecamatan </td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['kec_wali'] ?> </td>
                                </tr>	
							
					<tr>
                                    <td width="1%"></td> 
                                    <td>Kabupaten/Kota </td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['kab_wali'] ?> </td>
                                </tr>
								  
							
                                <tr>
                                    <td width="1%"></td> 
                                    <td>Nomor Telp./HP Wali</td>
                                    <td width="1%">:</td>
                                    <td>  <?= $siswa['no_hp_wali'] ?> </td>
                                </tr>

                                
					<?php if($siswa['jurusan']=="REGULER") { ?>
						 
						
					<tr>
                                    <th>D.</th>
                                    <th colspan="3">NILAI RAPORT</th>
                                </tr>
					
					<tr>
                                    <td></td> 
                                    <td>Rata-rata Semester 4  / KKM</td>
                                    <td>:</td>
                                    <td><?= $siswa['rataratasemester4'] ?> / <?= $siswa['kkmsemester4'] ?></td>
                                </tr>
							
					 
								
					<tr>
                                    <td></td> 
                                    <td>Rata-rata Semester 5   / KKM</td>
                                    <td>:</td>
                                    <td><?= $siswa['rataratasemester5'] ?> / <?= $siswa['kkmsemester5'] ?>  </td>
                                </tr>
					 		
					 
								
								
					<tr>
                                    <th>E.</th>
                                    <th colspan="3">PROGRAM PILIHAN</th>
                                </tr>
					
					<tr>
                                    <td></td> 
                                    <td>Asrama</td>
                                    <td>:</td>
					<td><?php if($siswa['asrama']=="Y") { echo "Ya"; } else { echo "Tidak";}  ?></td>
                                </tr>
					<tr>
                                    <td></td> 
                                    <td>Ketrampilan</td>
                                    <td>:</td>
                                    <td><?php if($siswa['ketrampilan']=="Y") { echo "Ya"; } else { echo "Tidak";}  ?></td>
                                </tr>							
								
								
						<?php } else if($siswa['jurusan']=="AFIRMASI") { ?>
						
						
						
						
					<tr>
                                    <th>D.</th>
                                    <th colspan="5">DOKUMEN AFIRMASI YANG DIMILIKI</th>
                                </tr>
					
 

					<tr>
                                    <td></td> 
                                    <td>Kartu Indonesia Pintar (KIP)</td>
                                    <td>:</td>
                                    <td><?php if($siswa['kip']=="Y") { echo "Ya"; } else { echo "Tidak";}  ?></td>
                                </tr>
							
					 
								
					<tr>
                                    <td></td> 
                                    <td>Program Keluarga Harapan (PKH)</td>
                                    <td>:</td>
                                    <td><?php if($siswa['pkh']=="Y") { echo "Ya"; } else { echo "Tidak";}  ?></td>
                                </tr>
								
					 <tr>
                                    <td></td> 
                                    <td>Kartu Keluarga Sehat (KKS)</td>
                                    <td>:</td>
                                    <td><?php if($siswa['kks']=="Y") { echo "Ya"; } else { echo "Tidak";}  ?></td>
                                </tr>
								
								
					<tr>
                                    <td></td> 
                                    <td>Surat Keterangan Tidak Mampu (SKTM)</td>
                                    <td>:</td>
                                    <td><?php if($siswa['sktm']=="Y") { echo "Ya"; } else { echo "Tidak";}  ?></td>
                                </tr>
								
								
					<tr>
                                    <th>E.</th>
                                    <th colspan="5">PROGRAM PILIHAN</th>
                                </tr>
					
					<tr>
                                    <td></td> 
                                    <td>Asrama</td>
                                    <td>:</td>
					<td><?php if($siswa['asrama']=="Y") { echo "Ya"; } else { echo "Tidak";}  ?></td>
                                </tr>
					<tr>
                                    <td></td> 
                                    <td>Ketrampilan</td>
                                    <td>:</td>
                                    <td><?php if($siswa['ketrampilan']=="Y") { echo "Ya"; } else { echo "Tidak";}  ?></td>
                                </tr>							
								
								
								
								
						 
						<?php } else if($siswa['jurusan']=="PRESTASI") { ?>
						
					
					<tr>
                                    <th>D.</th>
                                    <th colspan="5">PRESTASI YANG DIPEROLEH TIGA TAHUN TERAKHIR</th>
                                </tr>
					
 

					<tr>
                                    <td></td> 
                                    <td colspan="5">
						<table width="100%">
							<tr>
								<th class="center">No.</th>
								<th class="center">Juara Ke</th>
								<th class="center">Nama Event</th>
								<th class="center">Tingkat</th>
								<th class="center">Tahun</th>
							</tr>
							<tr>
								<td align="center">1</td>
								<td align="center"><?=$siswa['juaraprestasi1']?></td>
								<td><?=$siswa['eventprestasi1']?></td>
								<td><?=$siswa['tingkatprestasi1']?></td>
								<td align="center"><?=$siswa['tahunprestasi1']?></td> 
							</tr>
							<tr>
								<td align="center">2</td>
								<td align="center"><?=$siswa['juaraprestasi2']?></td>
								<td><?=$siswa['eventprestasi2']?></td>
								<td><?=$siswa['tingkatprestasi2']?></td>
								<td align="center"><?=$siswa['tahunprestasi2']?></td> 
							</tr>
							<tr>
								 <td align="center">3</td>
								<td align="center"><?=$siswa['juaraprestasi3']?></td>
								<td><?=$siswa['eventprestasi3']?></td>
								<td><?=$siswa['tingkatprestasi3']?></td>
								<td align="center"><?=$siswa['tahunprestasi3']?></td> 
							</tr>
						</table>
									
					</td> 
                                </tr>
							
					 
					<tr>
                                    <th>E.</th>
                                    <th colspan="5">PERINGKAT DIKELAS DAN RERATA NILAI</th>
                                </tr>
					
 

					<tr>
                                    <td></td> 
                                    <td colspan="5">
						<table width="100%">
							<tr>
								<th class="center">No.</th>
								<th class="center">Semester</th>
								<th class="center">Peringkat Dikelas</th>
								<th class="center">Rerata Nilai</th>
								<th class="center">Jumlah Kelas Paralel</th>
							</tr>
							<tr>
								<td align="center">1</td>
								<td align="center">Semester 1 </td>
								<td align="center"><?=$siswa['peringkatkelassemester1']?></td>
								<td align="center"><?=$siswa['rataratasemester1']?></td>
								<td align="center"><?=$siswa['jumlahkelasparalelsemester1']?></td> 
							</tr>
							<tr>
								<td align="center">2</td>
								<td align="center">Semester 2 </td>
								<td align="center"><?=$siswa['peringkatkelassemester2']?></td>
								<td align="center"><?=$siswa['rataratasemester2']?></td>
								<td align="center"><?=$siswa['jumlahkelasparalelsemester2']?></td> 
							</tr>
							<tr>
								<td align="center">3</td>
								<td align="center">Semester 3 </td>
								<td align="center"><?=$siswa['peringkatkelassemester3']?></td>
								<td align="center"><?=$siswa['rataratasemester3']?></td>
								<td align="center"><?=$siswa['jumlahkelasparalelsemester3']?></td> 
							</tr>
							<tr>
								<td align="center">4</td>
								<td align="center">Semester 4 </td>
								<td align="center"><?=$siswa['peringkatkelassemester4']?></td>
								<td align="center"><?=$siswa['rataratasemester4']?></td>
								<td align="center"><?=$siswa['jumlahkelasparalelsemester4']?></td>  
							</tr>
							<tr>
								<td align="center">5</td>
								<td align="center">Semester 5 </td>
								<td align="center"><?=$siswa['peringkatkelassemester5']?></td>
								<td align="center"><?=$siswa['rataratasemester5']?></td>
								<td align="center"><?=$siswa['jumlahkelasparalelsemester5']?></td>  
							</tr>
						</table>
									
					</td> 
                                </tr>		
					 
								
								
					<tr>
                                    <th>F.</th>
                                    <th colspan="3">PROGRAM PILIHAN</th>
                                </tr>
					
					<tr>
                                    <td></td> 
                                    <td>Asrama</td>
                                    <td>:</td>
					<td><?php if($siswa['asrama']=="Y") { echo "Ya"; } else { echo "Tidak";}  ?></td>
                                </tr>
					<tr>
                                    <td></td> 
                                    <td>Ketrampilan</td>
                                    <td>:</td>
                                    <td><?php if($siswa['ketrampilan']=="Y") { echo "Ya"; } else { echo "Tidak";}  ?></td>
                                </tr>							
					
					
					
										
						<?php }?>
						

                                

                                
                                <tr>
                                    <td colspan="4"> 
									
						<div style="width:400px; float:left; margin-top:20px;">
						Note : 
						<br>Formulir ini merupakan Hasil isian Data saya di Website Portal PPDB Online
						<br>Saya Bertanggung Jawab Penuh Atas Seluruh Iisan data di Formulir ini
						 </div>
						 <div style="width:300px; float:right; margin-top:20px;">
						 <img class="img" src="../<?= $siswa['foto'] ?>" ec="H" style="width: 30mm; background-color: white; color: black;" align="left">
						 
						 Temanggung, __________ 2024 <br/>
						 Pendaftar 
						 <br/> <br/> <br/> <br/> <br/>  
						 
							 <?= $siswa['nama_siswa'] ?> 
						 </div>
										
									 	
                                    </td>
                                   
                                    
                                </tr>

                            </tbody>
                        </table>
						
						
				<br/><br/><br/> 	

					<hr/> 
					<br/><br/> 
		Silahkan melengkapi / membawa berkas  berikut pada saat verivikasi dokumen :<br /><br />
		1.  Fotocopy NISN<br />
		2.  Fotocopy Kartu Keluarga (KK)<br />
		3.  Fotocopy Akte Kelahiran<br />
		4.  Rapor Kelas 4 & 5 (semester 1&2), Kelas 6 (semester 1)<br />
		5.  Formulir Pendaftaran (dicetak oleh siswa)
		
		
		
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
