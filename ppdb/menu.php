<style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .app-sidebar__user-name   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }
</style>

<?php
$nama_siswa = $siswa['nama_siswa'] ;
$namapendek = strtolower($nama_siswa);
// 
?>
   
      <div class="app-sidebar__user">
 
	 
	  <?php if ($siswa['foto'] == '') { ?>
                    <img src="<?=$url?>assets/upload/foto_siswa/avatar.png" alt="Foto Siswa" class="rounded-circle app-sidebar__user-avatar" width="50">
					<?php } else { ?>
					 <img src="<?=$url?>assets/upload/foto_siswa/<?= $siswa['foto'] ?>" alt="Foto Siswa" class="rounded-circle app-sidebar__user-avatar" width="50">
					 <?php } ?>
					 
					 
	  
         <div class="col-md-10">
          <p class="app-sidebar__user-name"class="cap"><?= $namapendek ?></p>
          <p class="app-sidebar__user-designation"> 
				Calon Peserta Didik</p>
        </div>
      </div>
	<ul class="app-menu">
	 <li><a class="app-menu__item <?php if($_GET['pg']=="") { echo "active bg-info"; }?>" href="."><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
	
		<li><a class="app-menu__item <?php if($_GET['pg']=="formulir") { echo "active bg-info"; }?>" href="?pg=formulir"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label">Data Formulir</span><small class="label pull-right badge badge-danger">wajib</small></a></li>
		
	<!-- 	
		<li><a class="app-menu__item" href="?pg=berkas"><i class="app-menu__icon fa fa-upload"></i><span class="app-menu__label">Upload Berkas</span></a></li>
		<li><a class="app-menu__item" href="?pg=bayar"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Pembayaran</span></a></li> -->
		
        
	   
	  
	    </ul>