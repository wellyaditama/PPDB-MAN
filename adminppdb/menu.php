<style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .app-sidebar__user-name   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }
</style>

<?php
$jml_jur = rowcount($koneksi, 'jurusan', ['status' => 1]);
$nama_user = $user['nama_user'] ;
$namapendek = strtolower($nama_user);
// 
?>
   
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../assets/img/avatar/avatar-1.png" width='50'alt="User Image">
        <div>
          <p class="app-sidebar__user-name"class="cap"><?= $namapendek ?></p>
          <p class="app-sidebar__user-designation"><small> Panitia PPDB  </small></p>
        </div>
      </div>
	<ul class="app-menu">
	 <li><a class="app-menu__item <?php if($_GET['pg']=="") { echo "active bg-info";}?>" href="."><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
	
       
        <li class="treeview <?php if($_GET['pg']=="profil_lembaga" or $_GET['pg']=="pengguna" or $_GET['pg']=="jurusan") { echo "is-expanded";}?>"><a class="app-menu__item <?php if($_GET['pg']=="profil_lembaga" or $_GET['pg']=="pengguna" or $_GET['pg']=="jurusan") { echo "active";}?>" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Kelembagaan</span><i class="treeview-indicator fa fa-arrow-circle-down"></i></a>
		
          <ul class="treeview-menu" >
            <li><a class="treeview-item <?php if($_GET['pg']=="profil_lembaga") { echo "active bg-info";}?>" href="?pg=profil_lembaga"><i class="icon fa fa-circle-o"></i> Profil Lembaga</a></li>
			<li><a class="treeview-item <?php if($_GET['pg']=="pengguna") { echo "active bg-info";}?>" href="?pg=pengguna"><i class="icon fa fa-circle-o"></i> Data Pengguna</a></li>
         
			<li><a class="treeview-item <?php if($_GET['pg']=="jurusan") { echo "active bg-info";}?>" href="?pg=jurusan"><i class="icon fa fa-circle-o"></i> Data Jurusan</a></li>
          </ul>
        </li>
        <li class="treeview <?php if($_GET['pg']=="siswa" or $_GET['pg']=="diterima") { echo "is-expanded";}?>"><a class="app-menu__item <?php if($_GET['pg']=="siswa" or $_GET['pg']=="diterima") { echo "active";}?>" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">Data PPDB</span><i class="treeview-indicator fa fa-arrow-circle-down"></i></a>
          <ul class="treeview-menu">
            
			
            <li><a class="treeview-item <?php if($_GET['pg']=="siswa") { echo "active bg-info";}?>" href="?pg=siswa"><i class="icon fa fa-circle-o"></i>Semua pendaftar</a></li>
			<li><a class="treeview-item <?php if($_GET['pg']=="diterima") { echo "active bg-info";}?>" href="?pg=diterima"><i class="icon fa fa-circle-o"></i>Di Terima</a></li>
			
			
          </ul>
        </li>
		 <?php if ($jml_jur == 0) { ?>
		 <?php } else { ?> 
		<!--<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Data Per Jurusan</span><i class="treeview-indicator fa fa-arrow-circle-down"></i></a>
          <ul class="treeview-menu">
            
			<?php
                             $query = mysqli_query($koneksi, "select * from jurusan where status in(1)");
                            $no = 0;
                            while ($jurusan = mysqli_fetch_array($query)) {
                                $no++;
                               
                            ?>
            <li><a class="treeview-item" href="?pg=siswa&jurusan=<?= $jurusan['kelas'] ?>"><i class="icon fa fa-circle-o"></i><?= $jurusan['kelas'] ?></a></li>
			<?php } ?>
			
          </ul>
        </li>-->
		<?php } ?>
        <li class="treeview <?php if($_GET['pg']=="biaya" or $_GET['pg']=="bayar") { echo "is-expanded";}?>"><a class="app-menu__item <?php if($_GET['pg']=="biaya" or $_GET['pg']=="bayar") { echo "active";}?>" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-credit-card"></i><span class="app-menu__label">Administrasi</span><i class="treeview-indicator fa fa-arrow-circle-down"></i></a>
          <ul class="treeview-menu">
            
			<li><a class="treeview-item <?php if($_GET['pg']=="biaya") { echo "active bg-info";}?>" href="?pg=biaya"><i class="icon fa fa-circle-o"></i>Jenis Pembayaran</a></li>
			<li><a class="treeview-item <?php if($_GET['pg']=="bayar") { echo "active bg-info";}?>" href="?pg=bayar"><i class="icon fa fa-circle-o"></i>Data Pembayaran</a></li>
			
          </ul>
        </li>
		 <li class="treeview <?php if($_GET['pg']=="setting" or $_GET['pg']=="pengaturan") { echo "is-expanded";}?>"><a class="app-menu__item <?php if($_GET['pg']=="setting" or $_GET['pg']=="pengaturan") { echo "active";}?>" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Pengaturan</span><i class="treeview-indicator fa fa-arrow-circle-down"></i></a>
          <ul class="treeview-menu">
            
			<li><a class="treeview-item <?php if($_GET['pg']=="setting") { echo "active bg-info";}?>" href="?pg=setting"><i class="icon fa fa-circle-o"></i>Pengaturan PPDB</a></li>
			<li><a class="treeview-item <?php if($_GET['pg']=="pengaturan") { echo "active bg-info";}?>" href="?pg=pengaturan"><i class="icon fa fa-circle-o"></i>Pengaturan Umum </a></li>
			
			
          </ul>
		  
		
		
		
		
	  
	 
	  
	  
	    </ul>
