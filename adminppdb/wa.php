<!DOCTYPE html>
<html>
 <head>
<style>
 body{
 font-family:"Comic Sans MS", "Arial";
 color:#232323;
 background:#FFF;
 text-align:center;
}
#utama{
border:2px double #002625;
padding:5px;
min-width:330px;
max-width:430px;
margin:20px auto auto auto;
}
h1{
font-size:16pt;
padding:20px;
display:block;
border:1px solid #D1880D;
background:#FEA40D;
color:#FFF;
}
.layout{
background:#1A5451;
color:#FBFBFB;
text-align:left;
width:auto;
border:1px solid #A7A7A7;
padding:20px;
line-height:50px;
}
.masukan{
font-family:"Comic Sans MS","Arial";
float:right;
height:20px;
width:200px;
border:1px solid #D6E0E0;
border-radius:3px;
background:#E8FFFF;
padding:4px;
color:#929292
}
.tbl{
border-radius:19px;
min-width:140px;
border:0px;
background:#E34C00;
color:#FFFFFF;
margin:10px 20px auto 30px;
padding:5px;
font-weight:bold;
}
.tbl:hover{
background:#FCB30E;
}
.aktif{
color:#232323;
}
</style>
 </head>
<body>
  
  <form name="form-kwt" method="get" action="cetak.php" target="_blank">
<h1>Aplikasi Cetak Kwitansi Sederhana</h1>
<div class="layout">
Terima Dari : <input type="text" class="masukan nama" name="nm" value="Nama Pembayar" title="Nama Pembayar"/>
Uang Sejumlah :<input type="text" class="masukan uang" name="jml" value="Jumlah Uang diterima" title="Jumlah Uang diterima"/>
 Untuk Pembayaran : <input type="text" class="masukan pembayaran" name="utk" value="Untuk pembayaran" title="Untuk pembayaran"/>
Nama Petugas : <input type="text" class="masukan petugas" name="ptg" value="Nama Petugas" title="Nama Petugas"/>
<input type="submit" value="Cetak" class="tbl" style="align:left"/><input type="reset" value="Batal" class="tbl" style="align:right"/>
</div></form>

</body>
</html>