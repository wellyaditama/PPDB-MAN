<?php

  $jenjang = fetch($koneksi, 'jenjang', ['id_jenjang' => $siswa['kelas']]);

  $documentRoot = $_SERVER['DOCUMENT_ROOT'];

  

?>

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
					 <img src="<?=$url?><?= $siswa['foto'] ?>" alt="Foto Siswa" class="rounded-circle" width="150">
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
				
				
				<button type="button" class="btn btn-sm btn-icon icon-left btn-primary" data-toggle="modal" data-target="#ubahpass" title="Ubah Password">
                        <i class="fa fa-key"></i>
                    </button> 
				<button type="button" class="btn btn-sm btn-icon icon-left btn-success" data-toggle="modal" data-target="#modal-foto" title="Upoad Foto">
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
                    <img src="../default.png" alt="Foto Siswa" class="rounded-circle" width="150">
					<?php } else { ?>
					 <img src="../<?= $siswa['foto'] ?>" alt="Foto Siswa" class="rounded-circle" width="150">
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
				<button type="button" class="btn btn-sm btn-icon icon-left btn-success" data-toggle="modal" data-target="#modal-foto" title="Upoad Foto">
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
               <ul class="list-group list-group-flush">
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
                 

                </ul>
				<br/> 
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
						<input type="file" accept=".jpg, .jpeg, .png" name="foto" class="custom-file-input" id="site-foto" required>
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
					title: 'Berhasil',
					text: 'Data Berhasil di Ubah',
					type: 'success',
					buttons: true,
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
													 
													<select class='form-control' name='jurusan' <?php if($siswa['status']==1 or $siswa['status']==2)  { echo "disabled"; } ?>>
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
													
													<input  type="hidden" name="nisnlama" value="<?= $siswa['nisn'] ?>" ="" />
													
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
											<div class="text-info">Gunakan tanda titik ( . ) sebagai koma untuk nilai desimal!</div>
											<p></p>
											</div>
											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Rata-rata Semester 4</b></i>
														</div>
													</div>
													<input class="form-control"  type="number" min="0" max="100" step="any" name="rataratasemester4" value="<?= $siswa['rataratasemester4'] ?>"  />
												</div>
											</div>

											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>KKM Semester 4</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" min="0" max="100" step="any" name="kkmsemester4" value="<?= $siswa['kkmsemester4'] ?>"  />
												</div>
											</div>

											 

											 <div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="text-info"><b>Rata-rata Semester 5</b></i>
														</div>
													</div>
													<input class="form-control"  type="number" min="0" max="100" step="any" name="rataratasemester5" value="<?= $siswa['rataratasemester5'] ?>"  />
												</div>
											</div>

											<div class="form-group col-md-6">
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text ">
															<i class="text-info"><strong>KKM Semester 5</strong></i>
														</div>
													</div>
													<input class="form-control"  type="number" min="0" max="100" step="any" name="kkmsemester5" value="<?= $siswa['kkmsemester5'] ?>"  />
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
									<form method="post" id="form-dataprogrampilihan">
										<input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control">
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


<br/>
<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
             <div class="row gutters-sm">
               
              <div class="col-md-12 mb-3">
              <div class="card mb-3">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="card-title mb-0">Cetak Dokumen </h5>
                    </div>
				
                    </div>
                  </div>
                <div class="card-body pb-0">
                * Pastikan seluruh data telah terisi lengkap sebelum mencetak. <br/>
		   * Pilih opsi paper size: A4, scale : fit to page width ketika mencetak.

			<br/><br/>
		<div class="col-lg-12 row">
			 <iframe name='printdaftar<?= $siswa['nisn'] ?>' src='print_daftar.php?id=<?= enkripsi($siswa['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar<?= $siswa['nisn'] ?>'].print()" class='btn btn-flat btn-warning'><i class='fa fa-print'></i>Cetak Formulir</button> &nbsp; 
											
			<iframe name='printdaftar_kartu<?= $siswa['nisn'] ?>' src='print_daftar_kartu.php?id=<?= enkripsi($siswa['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar_kartu<?= $siswa['nisn'] ?>'].print()" class='btn  btn-flat btn-secondary'><i class='fa fa-print'></i>Cetak Kartu</button> &nbsp; 
			
			<iframe name='printdaftar_surat<?= $siswa['nisn'] ?>' src='print_surat_pernyataan.php?id=<?= enkripsi($siswa['id_siswa']) ?>' style='border:none;width:1px;height:1px;'></iframe><button onclick="frames['printdaftar_surat<?= $siswa['nisn'] ?>'].print()" class='btn btn-flat btn-success'><i class='fa fa-print'></i>Cetak Surat Pernyataan</button>
			
			<!-- <a href="print_daftar_kartu.php?id=<?= enkripsi($siswa['id_siswa']) ?>" target="_blank"> cccc</a> -->
			
		</div>								
										
			
	
			<br/>
			<br/>
			
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
                url: 'content/crud.php?pg=simpandaftar',
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
                url: 'content/crud.php?pg=dataayah',
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
                url: 'content/crud.php?pg=dataibu',
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
                url: 'content/crud.php?pg=datawali',
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
                url: 'content/crud.php?pg=datanilai',
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
                url: 'content/crud.php?pg=dataafirmasi',
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
                url: 'content/crud.php?pg=dataprestasi',
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
                url: 'content/crud.php?pg=dataprogram',
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
            url: 'content/crud.php?pg=ubah',
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
					title: 'Berhasil',
					text: 'Data Berhasil di Ubah',
					type: 'success',
					buttons: true,
					});
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>
