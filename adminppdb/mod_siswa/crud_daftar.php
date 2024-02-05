<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'hapusdaftarcheck') {
    $kode = $_POST['kode'];
    $query = mysqli_query($koneksi, "DELETE from siswa where id_siswa in (" . $kode . ")");
   
    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
}
if ($pg == 'aktif') {
    $id_siswa = $_POST['id_siswa'];
    $data = [
        
        'status'         => 1
    ];
    
   update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
	$query = mysqli_query($koneksi, "select * from siswa WHERE id_siswa='$id_siswa'");
   while ($data0 = mysqli_fetch_array($query)) {

    $namaSiswa = $data0['nama_siswa'];
    $noHP   = $data0['no_hp'];
    $no_daftar = $data0['no_daftar'];
	
	

    }
    $pesanWA    .= "Assalamaulaikum wr wb.\nYth.*$namaSiswa*\n\nBerikut Kami Informasikan Bahwa Status Pendaftaran Anda  dengn no Pendaftaran *$no_daftar* Sudah Di Terima di *$setting[nama_sekolah]* .\n\n";
    $pesanWA    .= "Salam kami,\n";
    $pesanWA    .= "*$setting[nama_sekolah]*\n";
	$pesanWA    .= "$setting[klikchat]\n";
    
    $dataWA = [
        'api_key' => $setting[apikey],
        'sender'  => $setting[sender],
        'number'  => $noHP, //MASUKAN VARIABEL $noHP disini
        'message' => $pesanWA,
		
        
    ];
    
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "$setting[server]/api/send_jadwal.php",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 0,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($dataWA))
    );
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response;  			
   
    
}


if ($pg == 'ubahditerima') {
    $data = [
        
        'status'         => 1
    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}

if ($pg == 'ubahtidakditerima') {
    $data = [
        
        'status'         => 2
    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}

if ($pg == 'ubahterdaftar') {
    $data = [
        
        'status'         => 0
    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}


if ($pg == 'ubahvalid') {
    $data = [
        
        'validasi_data'         => 1
    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}


if ($pg == 'ubahtidakvalid') {
    $data = [
        
        'validasi_data'         => 2
    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}


if ($pg == 'ubahbelumdivalidasi') {
    $data = [
        
        'validasi_data'         => 0
    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}


if ($pg == 'tidakaktif') {
    $data = [
        
        'status'         => 0
    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}
if ($pg == 'aktif2') {
  $data = [
        
        'status'         => 1
    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}
if ($pg == 'belumdf') {
    $data = [
        
        'konfirmasi'         => 0
    ];
    $id_daftar = $_POST['id_daftar'];
    update($koneksi, 'daftar', $data, ['id_daftar' => $id_daftar]);
}
if ($pg == 'sudahdf') {
  $data = [
        
        'konfirmasi'         => 1
    ];
    $id_daftar = $_POST['id_daftar'];
    update($koneksi, 'daftar', $data, ['id_daftar' => $id_daftar]);
}
if ($pg == 'ubah') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $nama = str_replace("'", "`", $_POST['nama']);
    $data = [
        'nisn' => $_POST['nisn'],
        'nama' => ucwords(strtoupper($nama)),
        'asal_sekolah' => $_POST['asal'],
        'no_hp' => str_replace(" ", "", $_POST['nohp']),
        'status' => $status
    ];
    $id_daftar = $_POST['id_daftar'];
    update($koneksi, 'daftar', $data, ['id_daftar' => $id_daftar]);
}
if ($pg == 'tambah') {
    
    $query = "SELECT max(no_daftar) as maxKode FROM siswa";
        $hasil = mysqli_query($koneksi, $query);
        $data  = mysqli_fetch_array($hasil);
        $kodedaftar = $data['maxKode'];
        $noUrut = (int) substr($kodedaftar, 8, 3);
        $noUrut++;
        $char = "PPDB" . date('Y');
        $newID = $char . sprintf("%03s", $noUrut);
   
    $data = [
        'no_daftar' => $newID,
        'jenis' => 1,
		'jk' => $_POST['jk'],
        'nisn' => $_POST['nisn'],
		'tempat_lahir' => $_POST['tempat_lahir'],
		'tgl_lahir' => $_POST['tgl_lahir'],
        'nama_siswa' => $_POST['nama_siswa'],
		'asal_sekolah' => $_POST['asal_sekolah'],
        'status'         => 0,
		'jurusan' => $_POST['jurusan'],
		'no_hp' => $_POST['no_hp'],
		'password' => $_POST['nisn']
       

    ];
		
    $exec = insert($koneksi, 'siswa', $data);
	$pesanWA    = "Assalamualaikum wr wb.\n\nKepada Yth.*$_POST[nama_siswa]*\n\nProses Pendaftaran anda  di *$setting[nama_sekolah]* Telah berhasil\n\n";
                
                $pesanWA    .= "*Berikut Detail Akun anda*.\n";
                $pesanWA    .= "No Pendaftaran: *$newID*\n";
                $pesanWA    .= "Nama: *$_POST[nama_siswa]*\n";
                $pesanWA    .= "Tempat Lahir: *$_POST[tempat_lahir]*\n";
                $pesanWA    .= "Tanggal Lahir: *$_POST[tgl_lahir]*\n";
                $pesanWA    .= "Asal Sekolah: *$_POST[asal_sekolah]*\n";
                $pesanWA    .= "Username: *$_POST[nisn]*\n";
                $pesanWA    .= "Password: *$_POST[nisn]*\n\n";;
                $pesanWA    .= "Salam kami, Panitia PPDB\n";
                $pesanWA    .= "*$setting[nama_sekolah]*\n";
				$pesanWA    .= "$setting[klikchat]\n";

                $dataWA = [
                    'api_key' => $setting['apikey'],
					'sender'  => $setting['sender'],
                    'number'  => $_POST['no_hp'], //MASUKAN VARIABEL $noHP disini
                    'message' => $pesanWA
                ];

                $curl = curl_init();
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "$setting[server]/api/send_jadwal.php",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => json_encode($dataWA))
                );

                $response = curl_exec($curl);

                curl_close($curl);
				 echo $response;
    echo mysqli_error($koneksi);
	
}
if ($pg == 'hapus') {
    $id_daftar = $_POST['id_daftar'];
    delete($koneksi, 'daftar', ['id_daftar' => $id_daftar]);
}
//membatalkan proses daftar ulang
if ($pg == 'konfirmasi') {
    $$data = [
        
    ];

     $exec = delete($koneksi, 'daftar', $data, ['id_daftar' => $id]);
    if ($exec) {
        $pesan = [
            'pesan' => 'Selamat.... Data Pendaftar Berhasil Dikosongkan'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'batal') {

    $data = [
        'status' => 0
    ];
    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];
    update($koneksi, 'daftar', $data, $where);
    delete($koneksi, 'bayar', $where);
}
if ($pg == 'bataldf') {

    $data = [
        'konfirmasi' => 0
    ];
    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];
    update($koneksi, 'daftar', $data, $where);
    
}
if ($pg == 'status') {
    $status = (isset($_POST['status'])) ? $_POST['status'] : 0;
    $nama = str_replace("'", "`", $_POST['nama']);
    $data = [
        'nisn' => $_POST['nisn'],
        'nama' => ucwords(strtoupper($nama)),
        'tempat_lahir' => $_POST['tempat_lahir'],
        'tgl_lahir' => $_POST['tgl_lahir'],
        'asal_sekolah' => $_POST['asal'],
        'npsn_asal' => $_POST['npsn_asal'],
        'no_hp' => str_replace(" ", "", $_POST['no_hp']),
        'status' => $status
    ];
    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];
    $id_daftar = $_POST['id_daftar'];
    update($koneksi, 'daftar', $data, $where);
}
if ($pg == 'simpandatadiri') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'nis'              => $_POST['nis'],
		'jurusan'              => $_POST['jurusan'],
		
		'nisn'              => $_POST['nisn'],
		'kelas'              => $_POST['kelas'],
        'nik'               => $_POST['nik'],
        'no_kk'             => $_POST['nokk'],
        'nama'              => mysqli_escape_string($koneksi, $_POST['nama']),
        'tempat_lahir'      => mysqli_escape_string($koneksi, $_POST['tempat']),
        'tgl_lahir'         => $_POST['tgllahir'],
        'jenkel'            => $_POST['jenkel'],
        'no_hp'             => $_POST['nohp'],
        'asal_sekolah'      => $_POST['asal'],
        'anak_ke'           => $_POST['anakke'],
        'saudara'           => $_POST['saudara'],
        'paud'            => $_POST['paud'],
        'tk'             => $_POST['tk'],
		'citacita'            => $_POST['citacita'],
        'hobi'             => $_POST['hobi'],
        'status_keluarga'   => $_POST['statuskeluarga'],
        'agama'              => $_POST['agama'],
        'no_kip'              => $_POST['kip']

    ];
	$where = [
         'id_daftar' => $_POST['id_daftar']
    ];
    update($koneksi, 'daftar', $data, $where);
    echo mysqli_error($koneksi);
    
                    echo "ok";
}


if ($pg == 'simpanalamat') {

    $data = [
        'alamat'            => mysqli_escape_string($koneksi, $_POST['alamat']),
        'rt'                => $_POST['rt'],
        'rw'                => $_POST['rw'],
        'desa'              => mysqli_escape_string($koneksi, $_POST['desa']),
        'kecamatan'         => mysqli_escape_string($koneksi, $_POST['kecamatan']),
        'kota'              => mysqli_escape_string($koneksi, $_POST['kota']),
        'provinsi'          => mysqli_escape_string($koneksi, $_POST['provinsi']),
        'kode_pos'          => $_POST['kodepos'],
        'tinggal'           => $_POST['tinggal'],
        'jarak'             => $_POST['jarak'],
        'waktu'             => $_POST['waktu'],
        'transportasi'      => $_POST['transportasi']

    ];
	$where = [
         'id_daftar' => $_POST['id_daftar']
    ];
    update($koneksi, 'daftar', $data, $where);
    echo mysqli_error($koneksi);
    
                    echo "ok";
}

if ($pg == 'simpanortu') {

    $data = [
        'status_ayah'            => $_POST['status_ayah'],
		'nik_ayah'            => $_POST['nikayah'],
        'nama_ayah'           => mysqli_escape_string($koneksi, $_POST['namaayah']),
        'tahun_ayah'         => mysqli_escape_string($koneksi, $_POST['tahunayah']),
        
        'pendidikan_ayah'     => $_POST['pendidikan_ayah'],
        'pekerjaan_ayah'      => $_POST['pekerjaan_ayah'],
        'penghasilan_ayah'    => $_POST['penghasilan_ayah'],
        'no_hp_ayah'          => $_POST['nohpayah'],
        'status_ibu'            => $_POST['status_ibu'],
		'nik_ibu'             => $_POST['nikibu'],
        'nama_ibu'            => mysqli_escape_string($koneksi, $_POST['namaibu']),
        'tahun_ibu'          => mysqli_escape_string($koneksi, $_POST['tahunibu']),
        
        'pendidikan_ibu'      => $_POST['pendidikan_ibu'],
        'pekerjaan_ibu'       => $_POST['pekerjaan_ibu'],
        'penghasilan_ibu'     => $_POST['penghasilan_ibu'],
        'no_hp_ibu'           => $_POST['nohpibu'],
        'nik_wali'            => $_POST['nikwali'],
        'nama_wali'           => mysqli_escape_string($koneksi, $_POST['namawali']),
        'tahun_wali'         => mysqli_escape_string($koneksi, $_POST['tahunwali']),
        
        'pendidikan_wali'     => $_POST['pendidikan_wali'],
        'pekerjaan_wali'      => $_POST['pekerjaan_wali'],
        'penghasilan_wali'    => $_POST['penghasilan_wali'],
        'no_hp_wali'          => $_POST['nohpwali'],
    ];
	$where = [
         'id_daftar' => $_POST['id_daftar']
    ];
    update($koneksi, 'daftar', $data, $where);
    echo mysqli_error($koneksi);
    
                    echo "ok";
}
