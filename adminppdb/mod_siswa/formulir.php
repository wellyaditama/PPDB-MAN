<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php $siswa = fetch($koneksi, 'siswa', ['id_siswa' => dekripsi($_GET['id'])]);
 $jenjang = fetch($koneksi, 'jenjang', ['id_jenjang' => $siswa['kelas']]);
$tgl_lahirsiswa = $siswa['tgl_lahir'];
$tgl_mutasi = $siswa['tgl_mutasi'];
 ?>

<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
	<div class="row gutters-sm">
              <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center"> 
				  <?php if ($siswa['foto'] == "") { ?>
					<img src="<?=$url?>assets/upload/foto_siswa/avatar.png" alt="" class="rounded-circle" width="150">
				<?php } else { ?>
					<img src="<?=$url?>assets/upload/foto_siswa/<?= $siswa['foto'] ?>" alt="" class="rounded-circle" width="150"  height="150">
				<?php } ?>
                    
                    <div class="mt-3">
                       
					     <!-- ngIf: datakelasSelect.jurusan_nama!=='' --><h4 ng-if="datakelasSelect.jurusan_nama!==''" ng-bind="datakelasSelect.tingkat_nama +'.'+datakelasSelect.jurusan_nama+'.'+ datakelasSelect.kelas_nama" class="ng-binding ng-scope">
					  
					  
				<?php if ($siswa['status'] == 0) { ?>
				 <span class="btn btn-sm btn-warning" title="Status"> Terdaftar </span>
				<?php } ?><?php if ($siswa['status'] == 1) { ?>
				 <span class="btn btn-sm btn-success" title="Status"> Diterima </span> 
				<?php } ?><?php if ($siswa['status'] == 2) { ?>
				 <span class="btn btn-sm btn-danger" title="Status"> Tidak Diterima </span> 
				<?php } ?>
				
				<button type="button" class="btn btn-sm btn-icon icon-left btn-primary" data-toggle="modal" data-target="#ubahpass">
                    <i class="fa fa-key"></i> 
                </button>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-foto">
                    <i class="fa fa-image    "></i>
                </button>
                
				<small>	
				<br><br>
				 <p class="text-muted font-size-sm mb-0"><?= $siswa['no_daftar'] ?></p>
                      <p class="text-muted font-size-sm font-weight-bold ng-binding mb-0" ng-bind="''+datakelasSelect.walas_nama+''"><?= $siswa['nama_siswa'] ?></p>
					  
				<p class="text-muted font-size-sm font-weight-bold ng-binding" >Jalur  <?=$siswa['jurusan']?></p>
</small>	
                    </div>
                  </div>
                </div>
              </div>
              </div>
              
            <!-- Modal -->
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
					
					
				<script>
				
				$(document).ready(function() {
					$('#form-ubahpass').submit(function(e) {
						e.preventDefault();
						$.ajax({
							type: 'POST',
							url: 'mod_siswa/crud_siswa.php?pg=ubah-pass',
							data: $(this).serialize(),
							beforeSend: function() {
								$('#btnsimpan').prop('disabled', true);
							},
							success: function(data) {
								$('#btnsimpan').prop('disabled', false);
								swal({
									title: 'Sukses !!',
									text: 'Data Akun  Berhasil disimpan',
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
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			<script>
			$('.custom-file-input').on('change', function() {
				let fileName = $(this).val().split('\\').pop();
				$(this).next('.custom-file-label').addClass("selected").html(fileName);
			});
			$('#form-foto').on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'post',
					url: 'mod_siswa/crud_siswa.php?pg=foto',
					data: new FormData(this),
					processData: false,
					contentType: false,
					cache: false,
					beforeSend: function() {
						$('form-foto').on("click", function(e) {
							e.preventDefault();
						});
					},
					success: function(data) {

						swal({
							title: 'Sukses !!',
							text: 'Foto Siswa Berhasil disimpan',
							type: 'success',
							});
						setTimeout(function() {
							window.location.reload();
						}, 2000);


							}
						});
					});
		    </script>
			
			
              <div class="col-md-8 mb-3">
              <div class="card mb-3">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="card-title mb-0">Ringkasan Siswa</h5>
                    </div>
                    </div>
                  </div>
				  
							
                <div class="card-body pb-0">
               <ul class="list-group list-group-flush" style="margin-bottom:10px;">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info" style="margin-bottom:-8px;" ><path d="M8.627,7.885C8.499,8.388,7.873,8.101,8.13,8.177L4.12,7.143c-0.218-0.057-0.351-0.28-0.293-0.498c0.057-0.218,0.279-0.351,0.497-0.294l4.011,1.037C8.552,7.444,8.685,7.667,8.627,7.885 M8.334,10.123L4.323,9.086C4.105,9.031,3.883,9.162,3.826,9.38C3.769,9.598,3.901,9.82,4.12,9.877l4.01,1.037c-0.262-0.062,0.373,0.192,0.497-0.294C8.685,10.401,8.552,10.18,8.334,10.123 M7.131,12.507L4.323,11.78c-0.218-0.057-0.44,0.076-0.497,0.295c-0.057,0.218,0.075,0.439,0.293,0.495l2.809,0.726c-0.265-0.062,0.37,0.193,0.495-0.293C7.48,12.784,7.35,12.562,7.131,12.507M18.159,3.677v10.701c0,0.186-0.126,0.348-0.306,0.393l-7.755,1.948c-0.07,0.016-0.134,0.016-0.204,0l-7.748-1.948c-0.179-0.045-0.306-0.207-0.306-0.393V3.677c0-0.267,0.249-0.461,0.509-0.396l7.646,1.921l7.654-1.921C17.91,3.216,18.159,3.41,18.159,3.677 M9.589,5.939L2.656,4.203v9.857l6.933,1.737V5.939z M17.344,4.203l-6.939,1.736v9.859l6.939-1.737V4.203z M16.168,6.645c-0.058-0.218-0.279-0.351-0.498-0.294l-4.011,1.037c-0.218,0.057-0.351,0.28-0.293,0.498c0.128,0.503,0.755,0.216,0.498,0.292l4.009-1.034C16.092,7.085,16.225,6.863,16.168,6.645 M16.168,9.38c-0.058-0.218-0.279-0.349-0.498-0.294l-4.011,1.036c-0.218,0.057-0.351,0.279-0.293,0.498c0.124,0.486,0.759,0.232,0.498,0.294l4.009-1.037C16.092,9.82,16.225,9.598,16.168,9.38 M14.963,12.385c-0.055-0.219-0.276-0.35-0.495-0.294l-2.809,0.726c-0.218,0.056-0.351,0.279-0.293,0.496c0.127,0.506,0.755,0.218,0.498,0.293l2.807-0.723C14.89,12.825,15.021,12.603,14.963,12.385"></path></svg>
                    Nama Siswa
                    </h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.mapel_nama"> <?= $siswa['nama_siswa'] ?></span>
                  </li>
				  
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info" style="margin-bottom:-8px;"><path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    Jenis Kelamin</h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.jum_siswa"> <?php if ($siswa['jk'] == 'L') { ?> Laki Laki <?php } else { ?> Perempuan <?php } ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info" style="margin-bottom:-8px;"><path fill="none" d="M16.254,3.399h-0.695V3.052c0-0.576-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042v0.347H6.526V3.052c0-0.576-0.467-1.042-1.042-1.042S4.441,2.476,4.441,3.052v0.347H3.747c-0.768,0-1.39,0.622-1.39,1.39v11.813c0,0.768,0.622,1.39,1.39,1.39h12.507c0.768,0,1.391-0.622,1.391-1.39V4.789C17.645,4.021,17.021,3.399,16.254,3.399z M14.17,3.052c0-0.192,0.154-0.348,0.348-0.348c0.191,0,0.348,0.156,0.348,0.348v0.347H14.17V3.052z M5.136,3.052c0-0.192,0.156-0.348,0.348-0.348S5.831,2.86,5.831,3.052v0.347H5.136V3.052z M16.949,16.602c0,0.384-0.311,0.694-0.695,0.694H3.747c-0.384,0-0.695-0.311-0.695-0.694V7.568h13.897V16.602z M16.949,6.874H3.052V4.789c0-0.383,0.311-0.695,0.695-0.695h12.507c0.385,0,0.695,0.312,0.695,0.695V6.874z M5.484,11.737c0.576,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043s-1.042,0.467-1.042,1.043C4.441,11.271,4.908,11.737,5.484,11.737z M5.484,10.348c0.192,0,0.347,0.155,0.347,0.348c0,0.191-0.155,0.348-0.347,0.348s-0.348-0.156-0.348-0.348C5.136,10.503,5.292,10.348,5.484,10.348z M14.518,11.737c0.574,0,1.041-0.467,1.041-1.042c0-0.576-0.467-1.043-1.041-1.043c-0.576,0-1.043,0.467-1.043,1.043C13.475,11.271,13.941,11.737,14.518,11.737z M14.518,10.348c0.191,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.156-0.348-0.348C14.17,10.503,14.324,10.348,14.518,10.348z M14.518,15.212c0.574,0,1.041-0.467,1.041-1.043c0-0.575-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042C13.475,14.745,13.941,15.212,14.518,15.212z M14.518,13.822c0.191,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.155-0.348-0.348C14.17,13.978,14.324,13.822,14.518,13.822z M10,15.212c0.575,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042c-0.576,0-1.042,0.467-1.042,1.042C8.958,14.745,9.425,15.212,10,15.212z M10,13.822c0.192,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348s-0.348-0.155-0.348-0.348C9.653,13.978,9.809,13.822,10,13.822z M5.484,15.212c0.576,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042s-1.042,0.467-1.042,1.042C4.441,14.745,4.908,15.212,5.484,15.212z M5.484,13.822c0.192,0,0.347,0.155,0.347,0.347c0,0.192-0.155,0.348-0.347,0.348s-0.348-0.155-0.348-0.348C5.136,13.978,5.292,13.822,5.484,13.822z M10,11.737c0.575,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043c-0.576,0-1.042,0.467-1.042,1.043C8.958,11.271,9.425,11.737,10,11.737z M10,10.348c0.192,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348s-0.348-0.156-0.348-0.348C9.653,10.503,9.809,10.348,10,10.348z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    Tempat Tgl Lahir</h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.tahunajaran_id+'/'+((datakelasSelect.tahunajaran_id*1)+1)"><?= $siswa['tempat_lahir'] ?>, <?php echo tgl_indo("$tgl_lahirsiswa");?></span>
                  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info" style="margin-bottom:-8px;"><path fill="none" d="M16.254,3.399h-0.695V3.052c0-0.576-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042v0.347H6.526V3.052c0-0.576-0.467-1.042-1.042-1.042S4.441,2.476,4.441,3.052v0.347H3.747c-0.768,0-1.39,0.622-1.39,1.39v11.813c0,0.768,0.622,1.39,1.39,1.39h12.507c0.768,0,1.391-0.622,1.391-1.39V4.789C17.645,4.021,17.021,3.399,16.254,3.399z M14.17,3.052c0-0.192,0.154-0.348,0.348-0.348c0.191,0,0.348,0.156,0.348,0.348v0.347H14.17V3.052z M5.136,3.052c0-0.192,0.156-0.348,0.348-0.348S5.831,2.86,5.831,3.052v0.347H5.136V3.052z M16.949,16.602c0,0.384-0.311,0.694-0.695,0.694H3.747c-0.384,0-0.695-0.311-0.695-0.694V7.568h13.897V16.602z M16.949,6.874H3.052V4.789c0-0.383,0.311-0.695,0.695-0.695h12.507c0.385,0,0.695,0.312,0.695,0.695V6.874z M5.484,11.737c0.576,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043s-1.042,0.467-1.042,1.043C4.441,11.271,4.908,11.737,5.484,11.737z M5.484,10.348c0.192,0,0.347,0.155,0.347,0.348c0,0.191-0.155,0.348-0.347,0.348s-0.348-0.156-0.348-0.348C5.136,10.503,5.292,10.348,5.484,10.348z M14.518,11.737c0.574,0,1.041-0.467,1.041-1.042c0-0.576-0.467-1.043-1.041-1.043c-0.576,0-1.043,0.467-1.043,1.043C13.475,11.271,13.941,11.737,14.518,11.737z M14.518,10.348c0.191,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.156-0.348-0.348C14.17,10.503,14.324,10.348,14.518,10.348z M14.518,15.212c0.574,0,1.041-0.467,1.041-1.043c0-0.575-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042C13.475,14.745,13.941,15.212,14.518,15.212z M14.518,13.822c0.191,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.155-0.348-0.348C14.17,13.978,14.324,13.822,14.518,13.822z M10,15.212c0.575,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042c-0.576,0-1.042,0.467-1.042,1.042C8.958,14.745,9.425,15.212,10,15.212z M10,13.822c0.192,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348s-0.348-0.155-0.348-0.348C9.653,13.978,9.809,13.822,10,13.822z M5.484,15.212c0.576,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042s-1.042,0.467-1.042,1.042C4.441,14.745,4.908,15.212,5.484,15.212z M5.484,13.822c0.192,0,0.347,0.155,0.347,0.347c0,0.192-0.155,0.348-0.347,0.348s-0.348-0.155-0.348-0.348C5.136,13.978,5.292,13.822,5.484,13.822z M10,11.737c0.575,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043c-0.576,0-1.042,0.467-1.042,1.043C8.958,11.271,9.425,11.737,10,11.737z M10,10.348c0.192,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348s-0.348-0.156-0.348-0.348C9.653,10.503,9.809,10.348,10,10.348z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    Username/Password</h6>
                    <span class="text-primary ng-binding" ng-bind="datakelasSelect.tahunajaran_id+'/'+((datakelasSelect.tahunajaran_id*1)+1)"><?= $siswa['nisn'] ?>/<?= $siswa['password'] ?></span>
                  </li>
				 
                </ul>
              </div>

              </div>
            </div>
 
		 
		 
		
         
        <div class="card author-box card-primary">
            
            <div class="card-body">
                
                <div class="author-box-details">
                    <div class="row">
                        <div class="col-12 col-sm-5 col-lg-12">
                            <div class="card">
                                
                                <div class="card-header bg-se">
                                    <ul class="nav nav-pills nav-fill" id="myTab3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="data-diri" data-toggle="tab" href="#datadiri" role="tab" aria-controls="diri" aria-selected="true">Data Diri</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="data-ayah" data-toggle="tab" href="#dataayah" role="tab" aria-controls="ayah" aria-selected="false">Data Orangtua</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" id="data-wali" data-toggle="tab" href="#datawali" role="tab" aria-controls="wali" aria-selected="false">Data Wali</a> 
                                        </li>
										
						<?php if($siswa['jurusan']=="REGULER") { ?>
						<li class="nav-item">
                                            <a class="nav-link" id="data-nilai" data-toggle="tab" href="#datanilai" role="tab" aria-controls="nilai" aria-selected="false"> Nilai  Raport</a> 
                                        </li>
						
						<?php } else if($siswa['jurusan']=="AFIRMASI") { ?>
						
						<li class="nav-item">
                                            <a class="nav-link" id="data-afirmasi" data-toggle="tab" href="#dataafirmasi" role="tab" aria-controls="afirmasi" aria-selected="false"> Dokumen Afirmasi </a> 
                                        </li>
						<?php } else if($siswa['jurusan']=="PRESTASI") { ?>
						
						<li class="nav-item">
                                            <a class="nav-link" id="data-prestasi" data-toggle="tab" href="#dataprestasi" role="tab" aria-controls="prestasi" aria-selected="false"> Prestasi dan Nilai Raport</a> 
                                        </li>
										
						<?php }?>
						
						<li class="nav-item">
                                            <a class="nav-link" id="data-programpilihan" data-toggle="tab" href="#dataprogrampilihan" role="tab" aria-controls="programpilihan" aria-selected="false">Program Pilihan</a> 
                                        </li>
										
                                        <!--<li class="nav-item">
                                            <a class="nav-link" id="data-dokumen" data-toggle="tab" href="#datadokumen" role="tab" aria-controls="wali" aria-selected="false">Data Dokumen</a>
                                        </li>-->
                                    </ul>
								</div>
						    </div>
						</div>
					
						<div class="card-body">

							<div class="tab-content" id="myTabContent2">

								<!-- DATA DIRI -->
								<div class="tab-pane fade show active" id="datadiri" role="tabpanel" aria-labelledby="data-diri">
									<form id="form-datadiri">
										<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" ="">
										<div class="form-row">
										    
											
											
											
											  <div class="form-group col-md-12">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Pilihan Program / Kelas</b></i>
														</div>
													</div>
													 
													<select class='form-control' name='jurusan'>
														<option value=''>Pilih Program / Kelas</option> 
														
														<?php 
														$qu = mysqli_query($koneksi, "select * from jurusan where status='1' order by id_jurusan desc");
														while ($jur = mysqli_fetch_array($qu)) {
															if($siswa['jurusan']==$jur['nama_jurusan']) {
																$ok="selected=selected";
															} else {
																$ok="";
															}
														?>
															<option value="<?= $jur['nama_jurusan'] ?>" <?=$ok?>> <?= $jur['nama_jurusan'] ?></option>
														<?php } ?>
							
													</select>
												</div>
											</div>
											
											

										
										     
											
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>NISN</b></i>
														</div>
													</div>
													<input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="10" minlength="10" type="text" name="nisn" value="<?= $siswa['nisn'] ?>" ="" />
												</div>
											</div>

											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>NIS Lokal</b></i>
														</div>
													</div>
													<input class="form-control" onkeypress="return hanyaAngka(this);" type="text" name="nis" value="<?= $siswa['nis'] ?>" ="" />
												</div>
											</div>

											
											
											<div class="form-group col-md-12">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Nama Lengkap</b></i>
														</div>
													</div>
													<input class="form-control" type="text" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>" ="" />
												</div>
											</div>
											 
											 
											 <div class="form-group col-md-12">
												<div class="text-info"><strong>Jenis Kelamin</strong></div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="customRadioInline1" name="jk" class="custom-control-input" value="L" <?php if ($siswa['jk'] == 'L') echo 'checked' ?>>
													<label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="customRadioInline2" name="jk" class="custom-control-input" value="P" <?php if ($siswa['jk'] == 'P') echo 'checked' ?>>
													<label class="custom-control-label" for="customRadioInline2">Perempuan</label>
												</div>
											</div>
											
											<div class="form-group col-md-12">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Asal Sekolah / Madrasah</strong></i>
														</div>
													</div>
													<input class="form-control" type="text" name="asal_sekolah" value="<?= $siswa['asal_sekolah'] ?>" ="" />
												</div>
												 
											</div>
											
											
											
											

											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Tempat Lahir</strong></i>
														</div>
													</div>
													<input class="form-control" type="text" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>" ="" />
												</div>
											</div>

											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Tanggal Lahir</strong></i>
														</div>
													</div>
													<input class="form-control" type="date" name="tgl_lahir" value="<?= $siswa['tgl_lahir'] ?>" ="" />
												</div>
											</div>
											
											
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Nomor Telp/HP/WA</b></i>
														</div>
													</div>
													<input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="13" minlength="10" type="text" name="no_hp" value="<?= $siswa['no_hp'] ?>" ="" />
												</div>
											</div>
											
											<div class="form-group col-md-6"></div>
											
											
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Nomor KK</b></i>
														</div>
													</div>
													<input class="form-control" type="text" onkeypress="return hanyaAngka(this);" maxlength="16" minlength="16" name="no_kk" value="<?= $siswa['no_kk'] ?>" ="" />
												</div>
											</div>
											
											
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>NIK</strong></i>
														</div>
													</div>
													<input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="16" minlength="16" type="text" name="nik" value="<?= $siswa['nik'] ?>" ="" />
												</div>
											</div>
											
											
											
											
											 

										</div>
										<div class="form-group">
											<div class="col-sm-12 row">
												<button type="submit" id="btnsimpan" name="submit" class="btn btn-primary">Simpan</button>
											</div>
										</div>
									</form>
								</div>

								<!-- DATA AYAH -->
								<div class="tab-pane fade" id="dataayah" role="tabpanel" aria-labelledby="data-ayah">
									<form id="form-dataayah">
										<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" ="">
										<div class="form-row">
											<div class="form-group col-md-12">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Nama Ayah</b></i>
														</div>
													</div>
													<input class="form-control" type="text" name="nama_ayah" value="<?= $siswa['nama_ayah'] ?>" ="" />
												</div>
											</div>

											 
  
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Nomor Telp. Ayah</b></i>
														</div>
													</div>
													<input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="13" minlength="10" type="text" name="no_hp_ayah" value="<?= $siswa['no_hp_ayah'] ?>" ="" />
												</div>
											</div>
											
											
											<div class="form-group col-md-12">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Nama Ibu</b></i>
														</div>
													</div>
													<input class="form-control" type="text" name="nama_ibu" value="<?= $siswa['nama_ibu'] ?>" ="" />
												</div>
											</div>

										 
										 
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Nomor Telp. Ibu</b></i>
														</div>
													</div>
													<input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="13" minlength="10" type="text" name="no_hp_ibu" value="<?= $siswa['no_hp_ibu'] ?>" ="" />
												</div>
											</div>
											

											
											<h6 class="col-lg-12" style="color:#17A2B8;">ALAMAT</h6>
											
											<div class="form-group col-md-12">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Alamat Jalan / Dusun / Lingkungan</strong></i>
														</div>
													</div>
													<input class="form-control" type="text" name="alamat_ayah" value="<?= $siswa['alamat_ayah'] ?>" ="" />
												</div>
											</div>
											
											
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>RT</strong></i>
														</div>
													</div>
													<input class="form-control" type="text" name="rt_ayah" value="<?= $siswa['rt_ayah'] ?>" ="" />
												</div>
											</div>
											
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>RW</strong></i>
														</div>
													</div>
													<input class="form-control" type="text" name="rw_ayah" value="<?= $siswa['rw_ayah'] ?>" ="" />
												</div>
											</div>
											
											
											
											
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Desa / Kelurahan</b></i>
														</div>
													</div>
													<input class="form-control" type="text" name="desa_ayah" value="<?= $siswa['desa_ayah'] ?>" />
													<!--<select class='form-control' id="form_des_ayah" name='desa_ayah' >
															<option value="<?= $siswa['desa_ayah'] ?>"><?= $siswa['desa_ayah'] ?></option>
														</select>-->
												</div>
											</div>
											
											

											
											
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Kecamatan</b></i>
														</div>
													</div>
													<input class="form-control" type="text" name="kec_ayah" value="<?= $siswa['kec_ayah'] ?>" />
													<!--<select class='form-control' id="form_kec_ayah" name='kec_ayah' >
															<option value="<?= $siswa['kec_ayah'] ?>"><?= $siswa['kec_ayah'] ?></option>
														</select>-->
												</div>
											</div>
											
											
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Kabupaten / Kota </b></i>
														</div>
													</div>
													<input class="form-control" type="text" name="kab_ayah" value="<?= $siswa['kab_ayah'] ?>" />
													<!--<select class='form-control' id="form_kab_ayah" name='kab_ayah' >
															<option value="<?= $siswa['kab_ayah'] ?>"><?= $siswa['kab_ayah'] ?></option>
														</select>-->
												</div>
											</div>
											
											
											 

											 

										</div>
										<div class="form-group">
											<div class="col-sm-12 row">
												<button type="submit" id="btnsimpan" name="submit" class="btn btn-primary">Simpan</button>
											</div>
										</div>
									</form>
								</div>

							 
								<!-- DATA WALI -->
								<div class="tab-pane fade" id="datawali" role="tabpanel" aria-labelledby="data-wali">
									<form id="form-datawali">
									
										
										<font color="red">Bagian ini diisi apabila calon siswa ikut wali</font>
										<br/><br/>
										
										<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" ="">
										<div class="form-row">
											

											<div class="form-group col-md-12">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Nama Wali</b></i>
														</div>
													</div>
													<input class="form-control" type="text" name="nama_wali" value="<?= $siswa['nama_wali'] ?>"  />
												</div>
											</div>
											
											<div class="form-group col-md-12">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Hubungan</b></i>
														</div>
													</div>
													<input class="form-control" type="text" name="hubungan_wali" value="<?= $siswa['hubungan_wali'] ?>"  />
												</div>
											</div>


											<div class="form-group col-md-12">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Alamat Jalan / Dusun / Lingkungan</strong></i>
														</div>
													</div>
													<input class="form-control" type="text" name="alamat_wali" value="<?= $siswa['alamat_wali'] ?>"  />
												</div>
											</div>
											
											
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>RT</strong></i>
														</div>
													</div>
													<input class="form-control" type="text" name="rt_wali" value="<?= $siswa['rt_wali'] ?>" ="" />
												</div>
											</div>
											
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>RW</strong></i>
														</div>
													</div>
													<input class="form-control" type="text" name="rw_wali" value="<?= $siswa['rw_wali'] ?>" ="" />
												</div>
											</div>
											
 
											 <div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Desa / Kelurahan</b></i>
														</div>
													</div>
													<input class="form-control" type="text" name="desa_wali" value="<?= $siswa['desa_wali'] ?>"  />
													<!--<select class='form-control' id="form_des_wali" name='desa_wali' readonly>
															<option value="<?= $siswa['desa_wali'] ?>"><?= $siswa['desa_wali'] ?></option>
														</select>-->
												</div>
											</div>
											 
											
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Kecamatan</b></i>
														</div>
													</div>
													<input class="form-control" type="text" name="kec_wali" value="<?= $siswa['kec_wali'] ?>"  />
													<!--<select class='form-control' id="form_kec_wali" name='kec_wali' readonly>
															<option value="<?= $siswa['kec_wali'] ?>"><?= $siswa['kec_wali'] ?></option>
														</select>-->
												</div>
											</div>
											
											
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Kabupaten / Kota</b></i>
														</div>
													</div>
													<input class="form-control" type="text" name="kab_wali" value="<?= $siswa['kab_wali'] ?>"  />
													<!--<select class='form-control' id="form_kab_wali" name='kab_wali' readonly>
															<option value="<?= $siswa['kab_wali'] ?>"><?= $siswa['kab_wali'] ?></option>
														</select>-->
												</div>
											</div>
											
											<div class="form-group col-md-6"> </div>

											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Nomor Telp.</b></i>
														</div>
													</div>
													<input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="13" minlength="10" type="text" name="no_hp_wali" value="<?= $siswa['no_hp_wali'] ?>"  />
												</div>
											</div>

										</div>
										<div class="form-group">
											<div class="col-sm-12 row">
												<button type="submit" id="btnsimpan" name="submit" class="btn btn-primary">Simpan</button>
											</div>
										</div>
									</form>
								</div>

								
						<?php if($siswa['jurusan']=="REGULER") { ?>
						 
								<!-- DATA NILAI REGULER -->
								<div class="tab-pane fade" id="datanilai" role="tabpanel" aria-labelledby="data-nilai">
									<form id="form-datanilai">
										<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" ="">
										<div class="form-row">
											 <div class="col-lg-12">
											<div class="text-info"><strong>NILAI RAPORT</strong></div>
											</div>
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Rata-rata Semester 4</b></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="rataratasemester4" min="0" max="100" step="any" value="<?= $siswa['rataratasemester4'] ?>"  />
												</div>
											</div>

											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>KKM Semester 4</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="kkmsemester4" min="0" max="100" step="any" value="<?= $siswa['kkmsemester4'] ?>"  />
												</div>
											</div>

											 

											 <div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Rata-rata Semester 5</b></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="rataratasemester5" min="0" max="100" step="any" value="<?= $siswa['rataratasemester5'] ?>"  />
												</div>
											</div>

											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>KKM Semester 5</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="kkmsemester5" min="0" max="100" step="any" value="<?= $siswa['kkmsemester5'] ?>"  />
												</div>
											</div>

											 
 
											

											 

										</div>
										<div class="form-group">
											<div class="col-sm-12 row">
												<button type="submit" id="btnsimpan" name="submit" class="btn btn-primary">Simpan</button>
											</div>
										</div>
									</form>
								</div>


						
						<?php } else if($siswa['jurusan']=="AFIRMASI") { ?>
						
						 
						 	<!-- DATA AFIRMASI -->
								<div class="tab-pane fade" id="dataafirmasi" role="tabpanel" aria-labelledby="data-afirmasi">
									<form id="form-dataafirmasi">
										<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" ="">
										<div class="form-row">
											 <div class="col-lg-12">
											<div class="text-info"><strong>DOKUMEN AFIRMASI YANG DIMILIKI</strong></div>
											</div>
											 
											 <div class="form-check form-check-inline col-md-6">
													<input class="form-check-input" type="checkbox" id="kip" name="kip" value="Y" <?php if ($siswa['kip'] == 'Y') echo 'checked' ?>>
													<label class="form-check-label" for="kip">Kartu Indonesia Pintar (KIP)</label>
												</div>
												 
												<div class="form-check form-check-inline col-md-6">
													<input class="form-check-input" type="checkbox" id="pkh" name="pkh" value="Y" <?php if ($siswa['pkh'] == 'Y') echo 'checked' ?>>
													<label class="form-check-label" for="pkh">Program Keluarga Harapan (PKH)</label>
												</div>
												
												<div class="form-check form-check-inline col-md-6">
													<input class="form-check-input" type="checkbox" id="kks" name="kks" value="Y" <?php if ($siswa['kks'] == 'Y') echo 'checked' ?>>
													<label class="form-check-label" for="kks">Kartu Keluarga Sehat (KKS)</label>
												</div>
												
												<div class="form-check form-check-inline col-md-6">
													<input class="form-check-input" type="checkbox" id="sktm" name="sktm" value="Y" <?php if ($siswa['sktm'] == 'Y') echo 'checked' ?>>
													<label class="form-check-label" for="sktm">SuratKeterangan Tidak Mampu  (SKTM)</label>
												</div>
										
										 
										

											 

										</div>
										<div class="form-group">
											<div class="col-sm-12 row">
												<button type="submit" id="btnsimpan" name="submit" class="btn btn-primary">Simpan</button>
											</div>
										</div>
									</form>
								</div>



						<?php } else if($siswa['jurusan']=="PRESTASI") { ?>
						
						 
						 
						 <!-- DATA PRESTASI -->
								<div class="tab-pane fade" id="dataprestasi" role="tabpanel" aria-labelledby="data-prestasi">
									<form id="form-dataprestasi">
										<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" ="">
										<div class="form-row">
											
											<div class="col-lg-12">
											<div class="text-info"><strong>PRESTASI YANG DIRAIH SELAMA TIGA TAHUN TERAKHIR *)</strong></div>
											</div>
											
											
											 <div class="form-group col-md-2">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Juara Ke-</b></i>
														</div>
													</div>
													<input class="form-control"  type="text" name="juaraprestasi1" value="<?= $siswa['juaraprestasi1'] ?>"  />
												</div>
											</div>

											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Event</strong></i>
														</div>
													</div>
													<input class="form-control"  type="text" name="eventprestasi1" value="<?= $siswa['eventprestasi1'] ?>"  />
												</div>
											</div>
											
											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong> Tingkat</strong></i>
														</div>
													</div>
													<input class="form-control"  type="text" name="tingkatprestasi1" value="<?= $siswa['tingkatprestasi1'] ?>"  />
												</div>
											</div>
											
											<div class="form-group col-md-2">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong> Tahun</strong></i>
														</div>
													</div>
													<input class="form-control"  type="text" name="tahunprestasi1" value="<?= $siswa['tahunprestasi1'] ?>"  />
												</div>
											</div>

											 <div class="form-group col-md-2">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Juara Ke-</b></i>
														</div>
													</div>
													<input class="form-control"  type="text" name="juaraprestasi2" value="<?= $siswa['juaraprestasi2'] ?>"  />
												</div>
											</div>

											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Event</strong></i>
														</div>
													</div>
													<input class="form-control"  type="text" name="eventprestasi2" value="<?= $siswa['eventprestasi2'] ?>"  />
												</div>
											</div>
											
											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong> Tingkat</strong></i>
														</div>
													</div>
													<input class="form-control"  type="text" name="tingkatprestasi2" value="<?= $siswa['tingkatprestasi2'] ?>"  />
												</div>
											</div>
											
											<div class="form-group col-md-2">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong> Tahun</strong></i>
														</div>
													</div>
													<input class="form-control"  type="text" name="tahunprestasi2" value="<?= $siswa['tahunprestasi2'] ?>"  />
												</div>
											</div>



										 <div class="form-group col-md-2">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Juara Ke-</b></i>
														</div>
													</div>
													<input class="form-control"  type="text" name="juaraprestasi3" value="<?= $siswa['juaraprestasi3'] ?>"  />
												</div>
											</div>

											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Event</strong></i>
														</div>
													</div>
													<input class="form-control"  type="text" name="eventprestasi3" value="<?= $siswa['eventprestasi3'] ?>"  />
												</div>
											</div>
											
											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong> Tingkat</strong></i>
														</div>
													</div>
													<input class="form-control"  type="text" name="tingkatprestasi3" value="<?= $siswa['tingkatprestasi3'] ?>"  />
												</div>
											</div>
											
											<div class="form-group col-md-2">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong> Tahun</strong></i>
														</div>
													</div>
													<input class="form-control"  type="text" name="tahunprestasi3" value="<?= $siswa['tahunprestasi3'] ?>"  />
												</div>
											</div>


											

											<div class="col-lg-12" style="margin-top:20px;">
											<div class="text-info"><strong>PERINGKAT DI KELAS dan RERATA NILAI</strong></div>
											</div>
											 
											 <div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Peringkat Semester 1</b></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="peringkatkelassemester1" value="<?= $siswa['peringkatkelassemester1'] ?>"  />
												</div>
											</div>

											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Rerata Semester 1</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="rataratasemester1" value="<?= $siswa['rataratasemester1'] ?>"  />
												</div>
											</div>
											
											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Jumlah Kelas Paralel Semester 1</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="jumlahkelasparalelsemester1" value="<?= $siswa['jumlahkelasparalelsemester1'] ?>"  />
												</div>
											</div>

										
										
											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Peringkat Semester 2</b></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="peringkatkelassemester2" value="<?= $siswa['peringkatkelassemester2'] ?>"  />
												</div>
											</div>

											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Rerata Semester 2</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="rataratasemester2" value="<?= $siswa['rataratasemester2'] ?>"  />
												</div>
											</div>
											
											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Jumlah Kelas Paralel Semester 2</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="jumlahkelasparalelsemester2" value="<?= $siswa['jumlahkelasparalelsemester2'] ?>"  />
												</div>
											</div>
											
											
											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Peringkat Semester 3</b></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="peringkatkelassemester3" value="<?= $siswa['peringkatkelassemester3'] ?>"  />
												</div>
											</div>

											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Rerata Semester 3</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="rataratasemester3" value="<?= $siswa['rataratasemester3'] ?>"  />
												</div>
											</div>
											
											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Jumlah Kelas Paralel Semester 3</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="jumlahkelasparalelsemester3" value="<?= $siswa['jumlahkelasparalelsemester3'] ?>"  />
												</div>
											</div>


									<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Peringkat Semester 4</b></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="peringkatkelassemester4" value="<?= $siswa['peringkatkelassemester4'] ?>"  />
												</div>
											</div>

											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Rerata Semester 4</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="rataratasemester4" value="<?= $siswa['rataratasemester4'] ?>"  />
												</div>
											</div>
											
											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Jumlah Kelas Paralel Semester 4</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="jumlahkelasparalelsemester4" value="<?= $siswa['jumlahkelasparalelsemester4'] ?>"  />
												</div>
											</div>


									
									<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Peringkat Semester 5</b></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="peringkatkelassemester5" value="<?= $siswa['peringkatkelassemester5'] ?>"  />
												</div>
											</div>

											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Rerata Semester 5</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="rataratasemester5" value="<?= $siswa['rataratasemester5'] ?>"  />
												</div>
											</div>
											
											<div class="form-group col-md-4">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>Jumlah Kelas Paralel Semester 5</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" name="jumlahkelasparalelsemester5" value="<?= $siswa['jumlahkelasparalelsemester5'] ?>"  />
												</div>
											</div>



									 

											

											 

										</div>
										<div class="form-group">
											<div class="col-sm-12 row">
												<button type="submit" id="btnsimpan" name="submit" class="btn btn-primary">Simpan</button>
											</div>
										</div>
									</form>
								</div>



										
						<?php }?>
						
						 <!-- DATA PRESTASI -->
								<div class="tab-pane fade" id="dataprogrampilihan" role="tabpanel" aria-labelledby="data-programpilihan">
									<form id="dataprogrampilihan">
										<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" ="">
										<div class="form-row">
											
										 
										<font color="red"> &nbsp; Hanya diisi bagi yang akan memilih</font>
										 
											  
										<div class="form-group col-lg-12">
												<div class="text-info" style="margin-top:20px;"><strong>PROGRAM PILIHAN </strong></div>
												<div class="form-check form-check-inline col-md-6">
													<input class="form-check-input" type="checkbox" id="asrama" name="asrama" value="Y" <?php if ($siswa['asrama'] == 'Y') echo 'checked' ?>>
													<label class="form-check-label" for="asrama">Asrama</label>
												</div>
												 
												<div class="form-check form-check-inline col-md-6">
													<input class="form-check-input" type="checkbox" id="ketrampilan" name="ketrampilan" value="Y" <?php if ($siswa['ketrampilan'] == 'Y') echo 'checked' ?>>
													<label class="form-check-label" for="ketrampilan">Ketrampilam</label>
												</div>
												 
											</div>

											

											 

										</div>
										<div class="form-group">
											<div class="col-sm-12 row">
												<button type="submit" id="btnsimpan" name="submit" class="btn btn-primary">Simpan</button>
											</div>
										</div>
									</form>
								</div>
 

								
								
								<div class="tab-pane fade" id="datadokumen" role="tabpanel" aria-labelledby="data-dokumen">
									<form id="form-berkas">
										<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" ="">
										<div class="card" id="berkas-card">
											<div class="card-body">
												<div class="form-group row align-items-center">
													<label class="form-control-label col-sm-3 text-md-right">Kartu Keluarga</label>
													<div class="col-sm-6 col-md-9">

														<div class="custom-file">
															<input type="file" name="file_kk" class="custom-file-input" id="site-kk"required>
															<label class="custom-file-label">Choose File</label>
														</div>
														<div class="form-text text-muted">File bisa berupa gambar atau pdf</div>
													</div>
												</div>
												<div class="form-group row align-items-center">
													<label class="form-control-label col-sm-3 text-md-right">Preview</label>
													<div class="col-sm-6 col-md-6">
														<?php if ($siswa['file_kk'] == null) { ?>
														<a  class="btn btn-sm btn-warning"><i class="fa fa-eye    "></i>Belum Upload</a>
														<?php } else { ?>
														<a  title="" data-original-title="Cetak Surat" href="../<?= $siswa['file_kk'] ?>"" class="btn btn-sm btn-info"><i class="fa fa-eye    "></i>Lihat File</a>
														
														<?php } ?>
														
													</div>
												</div>
												
												<div class="form-group row align-items-center">
													<label class="form-control-label col-sm-3 text-md-right">Akta Kelahiran</label>
													<div class="col-sm-6 col-md-9">

														<div class="custom-file">
															<input type="file" name="file_akte" class="custom-file-input" id="site-akta"required>
															<label class="custom-file-label">Choose File</label>
														</div>
														<div class="form-text text-muted">File bisa berupa gambar atau pdf</div>
													</div>
												</div>
												<div class="form-group row align-items-center">
													<label class="form-control-label col-sm-3 text-md-right">Preview</label>
													<div class="col-sm-6 col-md-6">
														<?php if ($siswa['file_akte'] == null) { ?>
														<a  class="btn btn-sm btn-warning"><i class="fa fa-eye    "></i>Belum Upload</a>
														<?php } else { ?>
														<a  title="" data-original-title="Cetak Surat" href="../<?= $siswa['file_akte'] ?>"" class="btn btn-sm btn-info"><i class="fa fa-eye    "></i>Lihat File</a>
														<?php } ?>
														
													</div>
												</div>
												<div class="form-group row align-items-center">
													<label class="form-control-label col-sm-3 text-md-right">Ijazah</label>
													<div class="col-sm-6 col-md-9">

														<div class="custom-file">
															<input type="file" name="file_ijazah" class="custom-file-input" id="site-ijazah">
															<label class="custom-file-label">Choose File</label>
														</div>
														<div class="form-text text-muted">File bisa berupa gambar atau pdf</div>
													</div>
												</div>
												<div class="form-group row align-items-center">
													<label class="form-control-label col-sm-3 text-md-right">Preview</label>
													<div class="col-sm-6 col-md-6">
														<?php if ($siswa['file_ijazah'] == null) { ?>
														<a  class="btn btn-sm btn-warning"><i class="fa fa-eye    "></i>Belum Upload</a>
														<?php } else { ?>
														<a  title="" data-original-title="Cetak Surat" href="../<?= $siswa['file_ijazah'] ?>"" class="btn btn-sm btn-info"><i class="fa fa-eye    "></i>Lihat File</a>
														<?php } ?>
														
													</div>
												</div>
												<div class="form-group row align-items-center">
													<label class="form-control-label col-sm-3 text-md-right">Kartu Indonesia Pintar</label>
													<div class="col-sm-6 col-md-9">

														<div class="custom-file">
															<input type="file" name="file_kip" class="custom-file-input" id="site-kip">
															<label class="custom-file-label">Choose File</label>
														</div>
														<div class="form-text text-muted">File bisa berupa gambar atau pdf</div>
													</div>
												</div>
												<div class="form-group row align-items-center">
													<label class="form-control-label col-sm-3 text-md-right">Preview</label>
													<div class="col-sm-6 col-md-6">
														<?php if ($siswa['file_kip'] == null) { ?>
														<a  class="btn btn-sm btn-warning"><i class="fa fa-eye    "></i>Belum Upload</a>
														<?php } else { ?>
														<a  title="" data-original-title="Cetak Surat" href="../<?= $siswa['file_kip'] ?>"" class="btn btn-sm btn-info"><i class="fa fa-eye    "></i>Lihat File</a>
														<?php } ?>
														
													</div>
												</div>

											</div>
											<div class="card-footer bg-whitesmoke text-md-right">
												<button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
												<button class="btn btn-secondary" type="button">Reset</button>
											</div>
										</div>
									</form>
								</div>
							</div>

						
						
						</div>
                    </div>
                </div>
            </div>
        </div>
    
	
	
	
	
	</div>
</div>





<script>
   
    $(document).ready(function() {
        $('#form-datadiri').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_siswa/crud_siswa.php?pg=simpandaftar',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    $('#btnsimpan').prop('disabled', false);
                     swal({
						title: 'Sukses !!',
						text: 'Data Siswa <?= $siswa['nama_siswa'] ?>  Berhasil disimpan',
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

<!-- simpan ayah -->
<script>
    
    $(document).ready(function() {
        $('#form-dataayah').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_siswa/crud_siswa.php?pg=dataayah',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    $('#btnsimpan').prop('disabled', false);
                     swal({
						title: 'Sukses !!',
						text: 'Data Ayah  <?= $siswa['nama_siswa'] ?>  Berhasil disimpan',
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
<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }
</script>
<!-- simpan ibu -->
<script>
    
    $(document).ready(function() {
        $('#form-dataibu').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_siswa/crud_siswa.php?pg=dataibu',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    $('#btnsimpan').prop('disabled', false);
                    swal({
						title: 'Sukses !!',
						text: 'Data Ibu  <?= $siswa['nama_siswa'] ?>  Berhasil disimpan',
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

<!-- simpan wali -->
<script>
    
    $(document).ready(function() {
        $('#form-datawali').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_siswa/crud_siswa.php?pg=datawali',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    $('#btnsimpan').prop('disabled', false);
                    swal({
						title: 'Terimakasih',
						text: 'Data Wali dari  <?= $siswa['nama_siswa'] ?>  Berhasil disimpan',
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



<!-- simpan nilai reguler -->
<script>
    
    $(document).ready(function() {
        $('#form-datanilai').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_siswa/crud_siswa.php?pg=datanilai',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    $('#btnsimpan').prop('disabled', false);
                    swal({
						title: 'Terimakasih',
						text: 'Data Nilai Reguler dari  <?= $siswa['nama_siswa'] ?>  Berhasil disimpan',
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





<!-- simpan afirmasi -->
<script>
    
    $(document).ready(function() {
        $('#form-dataafirmasi').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_siswa/crud_siswa.php?pg=dataafirmasi',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    $('#btnsimpan').prop('disabled', false);
                    swal({
						title: 'Terimakasih',
						text: 'Data Afirmasi dari  <?= $siswa['nama_siswa'] ?>  Berhasil disimpan',
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




<!-- simpan prestasi -->
<script>
    
    $(document).ready(function() {
        $('#form-dataprestasi').submit(function(e) {
			
			 
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_siswa/crud_siswa.php?pg=dataprestasi',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    $('#btnsimpan').prop('disabled', false);
                    swal({
						title: 'Terimakasih',
						text: 'Data Prestasi dari  <?= $siswa['nama_siswa'] ?>  Berhasil disimpan',
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





<!-- simpan program pilihan -->
<script>
    
    $(document).ready(function() {
        $('#form-dataprogrampilihan').submit(function(e) {
			
			 
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_siswa/crud_siswa.php?pg=dataprogrampilihan',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    $('#btnsimpan').prop('disabled', false);
                    swal({
						title: 'Terimakasih',
						text: 'Data Program Pilihan dari  <?= $siswa['nama_siswa'] ?>  Berhasil disimpan',
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





<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }
</script>

<!-- daerah siswa -->
<script type="text/javascript">
    $(document).ready(function() {



        // ambil data kabupaten ketika data memilih provinsi
        $('body').on("change", "#form_prov", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kabupaten";
            $.ajax({
                type: 'POST',
                url: "mod_siswa/daerah_siswa.php",
                data: data,
                success: function(hasil) {
                    $("#form_kab").html(hasil);

                }
            });
        });

        // ambil data kecamatan/kota ketika data memilih kabupaten
        $('body').on("change", "#form_kab", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kecamatan";
            $.ajax({
                type: 'POST',
                url: "mod_siswa/daerah_siswa.php",
                data: data,
                success: function(hasil) {
                    $("#form_kec").html(hasil);

                }
            });
        });

        // ambil data desa ketika data memilih kecamatan/kota
        $('body').on("change", "#form_kec", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=desa";
            $.ajax({
                type: 'POST',
                url: "mod_siswa/daerah_siswa.php",
                data: data,
                success: function(hasil) {
                    $("#form_des").html(hasil);

                }
            });
        });


    });
</script>

<!-- daerah ayah -->
<script type="text/javascript">
    $(document).ready(function() {

        // sembunyikan form kabupaten, kecamatan dan desa
        $("#form_kab_ayah").show();
        $("#form_kec_ayah").show();
        $("#form_des_ayah").show();

        // ambil data kabupaten ketika data memilih provinsi
        $('body').on("change", "#form_prov_ayah", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kabupaten";
            $.ajax({
                type: 'POST',
                url: "mod_siswa/daerah_ayah.php",
                data: data,
                success: function(hasil) {
                    $("#form_kab_ayah").html(hasil);
                    $("#form_kab_ayah").show();
                    $("#form_kec_ayah").show();
                    $("#form_des_ayah").show();
                }
            });
        });

        // ambil data kecamatan/kota ketika data memilih kabupaten
        $('body').on("change", "#form_kab_ayah", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kecamatan";
            $.ajax({
                type: 'POST',
                url: "mod_siswa/daerah_ayah.php",
                data: data,
                success: function(hasil) {
                    $("#form_kec_ayah").html(hasil);
                    $("#form_kec_ayah").show();
                    $("#form_des_ayah").show();
                }
            });
        });

        // ambil data desa ketika data memilih kecamatan/kota
        $('body').on("change", "#form_kec_ayah", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=desa";
            $.ajax({
                type: 'POST',
                url: "mod_siswa/daerah_ayah.php",
                data: data,
                success: function(hasil) {
                    $("#form_des_ayah").html(hasil);
                    $("#form_des_ayah").show();
                }
            });
        });


    });
</script>

<!-- daerah ibu -->
<script type="text/javascript">
    $(document).ready(function() {

        // sembunyikan form kabupaten, kecamatan dan desa
        $("#form_kab_ibu").show();
        $("#form_kec_ibu").show();
        $("#form_des_ibu").show();

        // ambil data kabupaten ketika data memilih provinsi
        $('body').on("change", "#form_prov_ibu", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kabupaten";
            $.ajax({
                type: 'POST',
                url: "mod_siswa/daerah_ibu.php",
                data: data,
                success: function(hasil) {
                    $("#form_kab_ibu").html(hasil);
                    $("#form_kab_ibu").show();
                    $("#form_kec_ibu").show();
                    $("#form_des_ibu").show();
                }
            });
        });

        // ambil data kecamatan/kota ketika data memilih kabupaten
        $('body').on("change", "#form_kab_ibu", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kecamatan";
            $.ajax({
                type: 'POST',
                url: "mod_siswa/daerah_ibu.php",
                data: data,
                success: function(hasil) {
                    $("#form_kec_ibu").html(hasil);
                    $("#form_kec_ibu").show();
                    $("#form_des_ibu").show();
                }
            });
        });

        // ambil data desa ketika data memilih kecamatan/kota
        $('body').on("change", "#form_kec_ibu", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=desa";
            $.ajax({
                type: 'POST',
                url: "mod_siswa/daerah_ibu.php",
                data: data,
                success: function(hasil) {
                    $("#form_des_ibu").html(hasil);
                    $("#form_des_ibu").show();
                }
            });
        });


    });
</script>

<!-- daerah wali -->
<script type="text/javascript">
    $(document).ready(function() {

        // sembunyikan form kabupaten, kecamatan dan desa
        $("#form_kab_wali").show();
        $("#form_kec_wali").show();
        $("#form_des_wali").show();

        // ambil data kabupaten ketika data memilih provinsi
        $('body').on("change", "#form_prov_wali", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kabupaten";
            $.ajax({
                type: 'POST',
                url: "mod_siswa/daerah_wali.php",
                data: data,
                success: function(hasil) {
                    $("#form_kab_wali").html(hasil);
                    $("#form_kab_wali").show();
                    $("#form_kec_wali").show();
                    $("#form_des_wali").show();
                }
            });
        });

        // ambil data kecamatan/kota ketika data memilih kabupaten
        $('body').on("change", "#form_kab_wali", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kecamatan";
            $.ajax({
                type: 'POST',
                url: "mod_siswa/daerah_wali.php",
                data: data,
                success: function(hasil) {
                    $("#form_kec_wali").html(hasil);
                    $("#form_kec_wali").show();
                    $("#form_des_wali").show();
                }
            });
        });

        // ambil data desa ketika data memilih kecamatan/kota
        $('body').on("change", "#form_kec_wali", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=desa";
            $.ajax({
                type: 'POST',
                url: "mod_siswa/daerah_wali.php",
                data: data,
                success: function(hasil) {
                    $("#form_des_wali").html(hasil);
                    $("#form_des_wali").show();
                }
            });
        });


    });
</script>

<!-- STATUS IBU -->
<script>
    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=domisili_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=domisili_ibu]").val($("input[name=domisili_ayah]").val());
        } else {
            $("input[name=domisili_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("select[name=status_tmp_tinggal_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("select[name=status_tmp_tinggal_ibu]").val($("select[name=status_tmp_tinggal_ayah]").val());
        } else {
            $("select[name=status_tmp_tinggal_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=prov_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=prov_ibu]").val($("input[name=prov_ayah]").val());
        } else {
            $("input[name=prov_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=kab_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=kab_ibu]").val($("input[name=kab_ayah]").val());
        } else {
            $("input[name=kab_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=kec_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=kec_ibu]").val($("input[name=kec_ayah]").val());
        } else {
            $("input[name=kec_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=desa_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=desa_ibu]").val($("input[name=desa_ayah]").val());
        } else {
            $("input[name=desa_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=alamat_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=alamat_ibu]").val($("input[name=alamat_ayah]").val());
        } else {
            $("input[name=alamat_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=kodepos_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=kodepos_ibu]").val($("input[name=kodepos_ayah]").val());
        } else {
            $("input[name=kodepos_ibu]").Attr("readonly", true);
        }
    });
</script>


<!-- STATUS WALI -->

<script>
    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=nama_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=nama_wali]").val($("input[name=nama_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=nama_wali]").val($("input[name=nama_ibu]").val());
        } else {
            $("input[name=nama_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("select[name=warga_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("select[name=warga_wali]").val($("select[name=warga_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("select[name=warga_wali]").val($("select[name=warga_ibu]").val());
        } else {
            $("select[name=warga_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=nik_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=nik_wali]").val($("input[name=nik_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=nik_wali]").val($("input[name=nik_ibu]").val());
        } else {
            $("input[name=nik_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=tempat_lahir_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=tempat_lahir_wali]").val($("input[name=tempat_lahir_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=tempat_lahir_wali]").val($("input[name=tempat_lahir_ibu]").val());
        } else {
            $("input[name=tempat_lahir_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=tgl_lahir_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=tgl_lahir_wali]").val($("input[name=tgl_lahir_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=tgl_lahir_wali]").val($("input[name=tgl_lahir_ibu]").val());
        } else {
            $("input[name=tgl_lahir_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("select[name=pendidikan_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("select[name=pendidikan_wali]").val($("select[name=pendidikan_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("select[name=pendidikan_wali]").val($("select[name=pendidikan_ibu]").val());
        } else {
            $("select[name=pendidikan_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("select[name=pekerjaan_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("select[name=pekerjaan_wali]").val($("select[name=pekerjaan_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("select[name=pekerjaan_wali]").val($("select[name=pekerjaan_ibu]").val());
        } else {
            $("select[name=pekerjaan_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("select[name=penghasilan_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("select[name=penghasilan_wali]").val($("select[name=penghasilan_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("select[name=penghasilan_wali]").val($("select[name=penghasilan_ibu]").val());
        } else {
            $("select[name=penghasilan_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=no_hp_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=no_hp_wali]").val($("input[name=no_hp_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=no_hp_wali]").val($("input[name=no_hp_ibu]").val());
        } else {
            $("input[name=no_hp_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=prov_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=prov_wali]").val($("input[name=prov_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=prov_wali]").val($("input[name=prov_ibu]").val());
        } else {
            $("input[name=prov_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=kab_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=kab_wali]").val($("input[name=kab_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=kab_wali]").val($("input[name=kab_ibu]").val());
        } else {
            $("input[name=kab_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=kec_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=kec_wali]").val($("input[name=kec_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=kec_wali]").val($("input[name=kec_ibu]").val());
        } else {
            $("input[name=kec_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=desa_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=desa_wali]").val($("input[name=desa_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=desa_wali]").val($("input[name=desa_ibu]").val());
        } else {
            $("input[name=desa_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=alamat_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=alamat_wali]").val($("input[name=alamat_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=alamat_wali]").val($("input[name=alamat_ibu]").val());
        } else {
            $("input[name=alamat_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=kodepos_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=kodepos_wali]").val($("input[name=kodepos_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=kodepos_wali]").val($("input[name=kodepos_ibu]").val());
        } else {
            $("input[name=kodepos_wali]").attr("readonly", true);
        }
    });
</script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-berkas').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_siswa/crud_berkas.php?pg=ubah',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

               swal({
							title: 'Terimakasih !!',
							text: 'Data Berhasil Di Upload',
							type: 'success',
							});
                setTimeout(function() {
                    window.location.reload();
                }, 1000);


            }
        });
    });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-kk').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_berkas/crud_berkas.php?pg=ubah',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                 swal({
							title: 'Terimakasih !!',
							text: 'Data Berhasil Di Upload',
							type: 'success',
							});
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-akta').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_berkas/crud_berkas.php?pg=ubah',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                 swal({
							title: 'Terimakasih !!',
							text: 'Data Berhasil Di Upload',
							type: 'success',
							});
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-ijazah').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_berkas/crud_berkas.php?pg=ubah',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                 swal({
							title: 'Terimakasih !!',
							text: 'Data Berhasil Di Upload',
							type: 'success',
							});
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-kip').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_berkas/crud_berkas.php?pg=ubah',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                 swal({
							title: 'Terimakasih !!',
							text: 'Data Berhasil Di Upload',
							type: 'success',
							});
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>