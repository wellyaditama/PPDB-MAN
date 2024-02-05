
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>Selamat Datang <b><?= $siswa['nama_siswa'] ?></b> </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>

	

 		
<?php if ($siswa['status'] == 1) { ?>
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Terimakasih, Data Anda Sudah di Konfirmasi Panitia, selanjutnya silahkan melengkapi berkas sebagai berikut :<br /><br />
		1.  Fotocopy NISN<br />
		2.  Fotocopy Kartu Keluarga (KK)<br />
		3.  Fotocopy Akte Kelahiran<br />
		4.  Rapor Kelas 4 & 5 (semester 1&2), Kelas 6 (semester 1)<br />
		5.  Formulir Pendaftaran (dicetak oleh siswa)
		
	</div>
	
				
	<?php } else { ?>

	
	
	<?php if ($siswa['status'] == 0) { ?>
		<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Hai <?= $siswa['nama_siswa'] ?> !!!<br />
		Status Pendaftaran Kamu Saat ini <span class="badge badge-warning"> Sedang Dalam Proses. </span>  
		</div>
	<?php } ?><?php if ($siswa['status'] == 1) { ?>
		<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Hai <?= $siswa['nama_siswa'] ?> !!!<br />
		Status Pendaftaran Kamu Saat ini <button class="badge badge-danger"> Sudah Di Terima, </button> Silahkan Segera Daftar Ulang.
		</div>	
	<?php } ?>
	


<?php } ?>


 


<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
             <div class="row gutters-sm">
			 <?php if ($siswa['jenis'] == 1) { ?>
			 <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
				  <?php if ($siswa['foto'] == '') { ?>
                    <img src="<?=$url?>assets/upload/foto_siswa/avatar.png" alt="Foto Siswa" class="rounded-circle" width="150">
					<?php } else { ?>
					 <img src="<?=$url?>assets/upload/foto_siswa/<?= $siswa['foto'] ?>" alt="Foto Siswa" class="rounded-circle" width="150">
					 <?php } ?>
                    <div class="mt-3">
                      <!-- ngIf: datakelasSelect.jurusan_nama=='' -->
                      <!-- ngIf: datakelasSelect.jurusan_nama!=='' --><h4 ng-if="datakelasSelect.jurusan_nama!==''" ng-bind="datakelasSelect.tingkat_nama +'.'+datakelasSelect.jurusan_nama+'.'+ datakelasSelect.kelas_nama" class="ng-binding ng-scope">
				<!--  <button class="btn btn-danger"> <?= $siswa['kelas'] ?> </button> -->
				
				<?php if ($siswa['status'] == 0) { ?>
				 <span class="btn btn-sm btn-warning" title="Status"> Terdaftar </span>
				<?php } ?><?php if ($siswa['status'] == 1) { ?>
				 <span class="btn btn-sm btn-success" title="Status"> Diterima </span> 
				<?php } ?><?php if ($siswa['status'] == 2) { ?>
				 <span class="btn btn-sm btn-danger" title="Status"> Tidak Diterima </span> 
				<?php } ?>
				
				 
				<button type="button" class="btn btn-sm  btn-icon icon-left btn-primary" data-toggle="modal" data-target="#ubahpass" title="Ubah Password">
                        <i class="fa fa-key"></i>
                    </button> 
				<button type="button" class="btn btn-sm  btn-icon icon-left btn-success" data-toggle="modal" data-target="#modal-foto" title="Upload Foto">
                        <i class="fa fa-image"></i>
                    </button> 
				</h4><!-- end ngIf: datakelasSelect.jurusan_nama!=='' -->
                        <p class="text-muted font-size-sm mb-0"><?= $siswa['no_daftar'] ?></p>
                      <p class="text-muted font-size-sm font-weight-bold ng-binding mb-0" ng-bind="''+datakelasSelect.walas_nama+''"><?= $siswa['nama_siswa'] ?></p>
				
				<p class="text-muted font-size-sm font-weight-bold ng-binding" >Jalur  <?=$siswa['jurusan']?></p>
                    </div>
                  </div>
                </div>
              </div>
              </div>
			  <?php  } else { ?>
			  <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
				  <?php if ($siswa['foto'] == '') { ?>
                    <img src="<?=$url?>assets/upload/foto_siswa/avatar.png" alt="Foto Siswa" class="rounded-circle" width="150">
					<?php } else { ?>
					 <img src="<?=$url?>assets/upload/foto_siswa/<?= $siswa['foto'] ?>" alt="Foto Siswa" class="rounded-circle" width="150">
					 <?php } ?>
                    <div class="mt-3">
                      <!-- ngIf: datakelasSelect.jurusan_nama=='' -->
                      <!-- ngIf: datakelasSelect.jurusan_nama!=='' --><h4 ng-if="datakelasSelect.jurusan_nama!==''" ng-bind="datakelasSelect.tingkat_nama +'.'+datakelasSelect.jurusan_nama+'.'+ datakelasSelect.kelas_nama" class="ng-binding ng-scope">
			
				
				<?php if ($siswa['status'] == 0) { ?>
				 <span class="btn btn-sm btn-warning" title="Status"> Terdaftar </span>
				<?php } ?><?php if ($siswa['status'] == 1) { ?>
				 <span class="btn btn-sm btn-success" title="Status"> Diterima </span> 
				<?php } ?><?php if ($siswa['status'] == 2) { ?>
				 <span class="btn btn-sm btn-danger" title="Status"> Tidak Diterima </span> 
				<?php } ?>
				
				
				<button type="button" class="btn btn-sm btn-icon icon-left btn-primary" data-toggle="modal" data-target="#ubahpass" title="Ubah Password">
                        <i class="fa fa-key"></i>
                    </button> 
				<button type="button" class="btn btn-sm  btn-icon icon-left btn-success" data-toggle="modal" data-target="#modal-foto" title="Upload Foto">
                        <i class="fa fa-image"></i>
                    </button> 
				</h4><!-- end ngIf: datakelasSelect.jurusan_nama!=='' -->
                        <p class="text-muted font-size-sm mb-0"><?= $siswa['no_daftar'] ?></p>
                      <p class="text-muted font-size-sm font-weight-bold ng-binding mb-0" ng-bind="''+datakelasSelect.walas_nama+''"><?= $siswa['nama_siswa'] ?></p>
				
				<p class="text-muted font-size-sm font-weight-bold ng-binding" >Jalur <?=$siswa['jurusan']?></p>
                    </div>
                  </div>
                </div>
              </div>
              </div>
			  <?php } ?>
              <div class="col-md-8 mb-3">
              <div class="card mb-3">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="card-title mb-0">Rincian Data Pendaftar</h5>
                    </div>
                    </div>
                  </div>
                <div class="card-body pb-0">
               <ul class="list-group list-group-flush" style="margin-bottom:10px;">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"> 
                    <i class="fa fa-credit-card" style="color:#2AAAEC; margin-left:5px; width:20px;"></i>
                    Nama Pendaftar
                    </h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.mapel_nama"><?= $siswa['nama_siswa'] ?></span>
                  </li>
                 
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                    <i class="fa fa-map-marker" style="color:#2AAAEC; margin-left:5px; width:20px;"></i>
                     Tempat, Tanggal Lahir</h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.tahunajaran_id+'/'+((datakelasSelect.tahunajaran_id*1)+1)"> <?= $siswa['tempat_lahir'] ?>, <?php echo tgl_indo("$tgl_lahirsiswa");?></span>
                  </li>
				   <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                    <i class="fa fa-bank" style="color:#2AAAEC; margin-left:5px; width:20px;"></i> 
                   Asal Sekolah</h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.jum_siswa"> <?= $siswa['asal_sekolah'] ?> 	</span>
                  </li>
                  
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                    <i class="fa fa-calendar" style="color:#2AAAEC; margin-left:5px; width:20px;"></i> 
                    Tanggal Daftar</h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.jum_siswa"> <?= tgl_indo(substr($siswa['tgl_daftar'],0,11)) ?> &nbsp; <?=substr($siswa['tgl_daftar'],11,5)?>	</span>
                  </li>
                  
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                    <i class="fa fa-star" style="color:#2AAAEC; margin-left:5px; width:20px;"></i> 
                    Gelombang </h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.jum_siswa"> #<?= $siswa['gelombang'] ?>	</span>
                  </li>
                  
                  
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    
					 
					<!-- <a target="" href="?pg=formulir" type="button" class="btn btn-primary"><i class="fa fa-book    "></i> Lengkapi Data</a>  -->
					
				<!--	<a target="" href="?pg=berkas" type="button" class="btn btn-success"><i class="fa fa-upload    "></i> Upload Berkas</a>   -->
					
                  </li>

                </ul>
			
              </div> 

              </div>
            </div>
            </div>
		 </div>
        </div>		
<!-- Modal -->
<div class="modal fade" id="modal-foto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<form id="form-foto">
		<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" ="">
		<div class="modal-header">
			<h5 class="modal-title">Upload Foto Siswa</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">

		<div class="card" id="settings-card">
			
			<div class="card-body"
			
			<div class="form-group row align-items-center">
				
				<div class="col-sm-6 col-md-12">

					<div class="custom-file">
						<input type="file" name="foto" class="custom-file-input" id="site-foto" required>
						<label class="custom-file-label">Upload Foto</label>
					</div>
				</div>

			</div>
			<div class="card-footer bg-whitesmoke text-md-right">
			<button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
			<button class="btn btn-secondary" type="button">Reset</button>
			</div>
			</div>
		</div>
		</form>
	</div>
</div>
</div>
<div class="modal fade" id="ubahpass" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="form-ubahpass">
				<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" ="">
				<div class="modal-header">
					<h5 class="modal-title">Ubah password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				   
					
					<div class="form-group">
						<label>Nama Siswa</label>
						<input type="text"  value="<?= $siswa['nama_siswa'] ?>"  class="form-control" readonly="">
					</div>
					<div class="form-group">
						<label>username</label>
						<input type="text" name="nisn" value="<?= $siswa['nisn'] ?>" class="form-control" readonly="">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input class="form-control" type="text" name="password" value="<?= $siswa['password'] ?>" ="" />
						
					</div>
					
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div> 	
<!-- simpan Foto -->			
<script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
	$('#form-foto').on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: 'content/crud.php?pg=foto',
			data: new FormData(this),
			processData: false,
			contentType: false,
			cache: false,
			beforeSend: function() {
				$('form-foto<?= $no ?>').on("click", function(e) {
					e.preventDefault();
				});
			},
			success: function(data) {

				 swal({
        					title: 'Sukses !!',
        					text: 'Simpan Data Berhasil',
        					type: 'success',
                            });
				setTimeout(function() {
					window.location.reload();
				}, 2000);


			}
		});
	});
</script>
<!-- simpan Password -->
					<script>
				
				$(document).ready(function() {
					$('#form-ubahpass').submit(function(e) {
						e.preventDefault();
						$.ajax({
							type: 'POST',
							url: 'content/crud.php?pg=ubah-pass',
							data: $(this).serialize(),
							beforeSend: function() {
								$('#btnsimpan').prop('disabled', true);
							},
							success: function(data) {
								$('#btnsimpan').prop('disabled', false);
								swal({
									title: 'Sukses !!',
									text: 'Data  <?= $siswa['nama_siswa'] ?>  Berhasil disimpan',
									type: 'success',
									});
									setTimeout(function() {
								window.location.reload();
							}, 1000);
							}
						});
						return false;
					});
				});
			</script>						
	
