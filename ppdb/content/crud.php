<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
$id = $_SESSION['id_siswa'];

if ($pg == 'ubah-pass') {
    $data = [
        'nisn' => $_POST['nisn'],
        'password' => $_POST['password']

    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}
if ($pg == 'simpandaftar') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $email = str_replace("'", "`", $_POST['email']);
    $nama_siswa = str_replace("'", "`", $_POST['nama_siswa']);


    $nisn = $_POST['nisnlama'];


    $data = [
        'nama_siswa' => $_POST['nama_siswa'],
        'nisn' => $nisn,
        'nis' => $_POST['nis'],
        'nik' => $_POST['nik'],
        'tempat_lahir' => $_POST['tempat_lahir'],
        'tgl_lahir' => $_POST['tgl_lahir'],
        'jk' => $_POST['jk'],
        'asal_sekolah' => $_POST['asal_sekolah'],
        'no_hp' => $_POST['no_hp'],
        'no_kk' => $_POST['no_kk'],
        'jurusan' => $_POST['jurusan'],

    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);

}




if ($pg == 'dataayah') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'nama_ayah' => $_POST['nama_ayah'],
        'no_hp_ayah' => $_POST['no_hp_ayah'],
        'nama_ibu' => $_POST['nama_ibu'],
        'no_hp_ibu' => $_POST['no_hp_ibu'],
        'prov_ayah' => $_POST['prov_ayah'],
        'kab_ayah' => $_POST['kab_ayah'],
        'kec_ayah' => $_POST['kec_ayah'],
        'desa_ayah' => $_POST['desa_ayah'],
        'alamat_ayah' => $_POST['alamat_ayah'],
        'rt_ayah' => $_POST['rt_ayah'],
        'rw_ayah' => $_POST['rw_ayah'],

    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}


if ($pg == 'datawali') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'nama_wali' => $_POST['nama_wali'],
        'hubungan_wali' => $_POST['hubungan_wali'],
        'no_hp_wali' => $_POST['no_hp_wali'],
        'prov_wali' => $_POST['prov_wali'],
        'kab_wali' => $_POST['kab_wali'],
        'kec_wali' => $_POST['kec_wali'],
        'desa_wali' => $_POST['desa_wali'],
        'alamat_wali' => $_POST['alamat_wali'],
        'rt_wali' => $_POST['rt_wali'],
        'rw_wali' => $_POST['rw_wali']

    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}


if ($pg == 'datanilai') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'rataratasemester4' => $_POST['rataratasemester4'],
        'kkmsemester4' => $_POST['kkmsemester4'],
        'rataratasemester5' => $_POST['rataratasemester5'],
        'kkmsemester5' => $_POST['kkmsemester5'],

    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}


if ($pg == 'dataafirmasi') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'kip' => $_POST['kip'],
        'pkh' => $_POST['pkh'],
        'kks' => $_POST['kks'],
        'sktm' => $_POST['sktm'],

    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}


if ($pg == 'dataprestasi') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'peringkatkelassemester1' => $_POST['peringkatkelassemester1'],
        'rataratasemester1' => $_POST['rataratasemester1'],
        'jumlahkelasparalelsemester1' => $_POST['jumlahkelasparalelsemester1'],

        'peringkatkelassemester2' => $_POST['peringkatkelassemester2'],
        'rataratasemester2' => $_POST['rataratasemester2'],
        'jumlahkelasparalelsemester2' => $_POST['jumlahkelasparalelsemester2'],

        'peringkatkelassemester3' => $_POST['peringkatkelassemester3'],
        'rataratasemester3' => $_POST['rataratasemester3'],
        'jumlahkelasparalelsemester3' => $_POST['jumlahkelasparalelsemester3'],

        'peringkatkelassemester4' => $_POST['peringkatkelassemester4'],
        'rataratasemester4' => $_POST['rataratasemester4'],
        'jumlahkelasparalelsemester4' => $_POST['jumlahkelasparalelsemester4'],

        'peringkatkelassemester5' => $_POST['peringkatkelassemester5'],
        'rataratasemester5' => $_POST['rataratasemester5'],
        'jumlahkelasparalelsemester5' => $_POST['jumlahkelasparalelsemester5'],

        'juaraprestasi1' => $_POST['juaraprestasi1'],
        'eventprestasi1' => $_POST['eventprestasi1'],
        'tingkatprestasi1' => $_POST['tingkatprestasi1'],
        'tahunprestasi1' => $_POST['tahunprestasi1'],

        'juaraprestasi2' => $_POST['juaraprestasi2'],
        'eventprestasi2' => $_POST['eventprestasi2'],
        'tingkatprestasi2' => $_POST['tingkatprestasi2'],
        'tahunprestasi2' => $_POST['tahunprestasi2'],

        'juaraprestasi3' => $_POST['juaraprestasi3'],
        'eventprestasi3' => $_POST['eventprestasi3'],
        'tingkatprestasi3' => $_POST['tingkatprestasi3'],
        'tahunprestasi3' => $_POST['tahunprestasi3'],



    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}


if ($pg == 'dataprogram') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $dataasrama = 'N';
    $dataketrampilan = 'N';
    if (isset($_POST['asrama']) && $_POST['asrama'] == 'Y') {
        $dataasrama = 'Y';
    }
    if (isset($_POST['ketrampilan']) && $_POST['ketrampilan'] == 'Y') {
        $dataketrampilan = 'Y';
    }
    $data = [
        'asrama' => $dataasrama,
        'ketrampilan' => $dataketrampilan

    ];
    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
}



if ($pg == 'hapuskk') {

    $data = [

        'file_kk' => ''
    ];
    $where = [
        'id_siswa' => $_POST['id_siswa']
    ];
    update($koneksi, 'siswa', $data, $where);
}
if ($pg == 'foto') {

    $ektensi = ['jpg', 'png', 'jpeg'];
    $maxFileSize = 100 * 1024;
    if ($_FILES['foto']['name'] <> '') {
        $foto = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $temp = $_FILES['foto']['tmp_name'];
        $ext = explode('.', $foto);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            if ($fileSize <= $maxFileSize) {
                $dest = 'assets/upload/foto_siswa/siswa' . rand(1, 1000) . '.' . $ext;
                $upload = move_uploaded_file($temp, '../../' . $dest);
                if ($upload) {
                    $data2 = [
                        'foto' => $_POST['foto'],
                        'foto' => $dest
                    ];
                    $id_siswa = $_POST['id_siswa'];
                    update($koneksi, 'siswa', $data2, ['id_siswa' => $id_siswa]);
                } else {
                    echo "gagal";
                }
            } else {
                echo "Gagal";
            }
        }
    }



} else {
    echo "Gagal menyimpan";
}
if ($pg == 'ubah') {



    $ektensi = ['jpg', 'jpeg', 'png', 'pdf'];
    if ($_FILES['file_kk']['name'] <> '') {
        $file_kk = $_FILES['file_kk']['name'];
        $temp = $_FILES['file_kk']['tmp_name'];
        $ext = explode('.', $file_kk);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/upload/kk/kk' . rand(1, 1000) . '.' . $ext;
            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data = [
                    'file_kk' => $dest
                ];
                $id_siswa = $_POST['id_siswa'];
                $exec = update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['file_ijazah']['name'] <> '') {
        $file_ijazah = $_FILES['file_ijazah']['name'];
        $temp = $_FILES['file_ijazah']['tmp_name'];
        $ext = explode('.', $file_ijazah);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/upload/ijazah/ijazah' . rand(1, 1000) . '.' . $ext;
            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data = [
                    'file_ijazah' => $dest
                ];
                $id_siswa = $_POST['id_siswa'];
                $exec = update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['file_akte']['name'] <> '') {
        $file_akte = $_FILES['file_akte']['name'];
        $temp = $_FILES['file_akte']['tmp_name'];
        $ext = explode('.', $file_akte);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/upload/akta/akta' . rand(1, 1000) . '.' . $ext;
            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data = [
                    'file_akte' => $dest
                ];
                $id_siswa = $_POST['id_siswa'];
                $exec = update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['file_kip']['name'] <> '') {
        $file_kip = $_FILES['file_kip']['name'];
        $temp = $_FILES['file_kip']['tmp_name'];
        $ext = explode('.', $file_kip);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/upload/kip/kip' . rand(1, 1000) . '.' . $ext;
            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data = [
                    'file_kip' => $dest
                ];
                $id_siswa = $_POST['id_siswa'];
                $exec = update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['file_ktp']['name'] <> '') {
        $file_ktp = $_FILES['file_ktp']['name'];
        $temp = $_FILES['file_ktp']['tmp_name'];
        $ext = explode('.', $file_ktp);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/upload/ijazah/ktp' . rand(1, 1000) . '.' . $ext;
            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data = [
                    'file_ktp' => $dest
                ];
                $id_siswa = $_POST['id_siswa'];
                $exec = update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }


} else {
    echo "Gagal menyimpan";
}
if ($pg == 'batalkk') {

    $data = [

        'file_kk' => $_POST['file_kk'],
    ];
    $where = [
        'id_siswa' => $_POST['id_siswa']
    ];
    update($koneksi, 'siswa', $data, $where);

}
if ($pg == 'hapus_akta') {

    $data = [

        'file_akte' => $_POST['file_akte'],
    ];
    $where = [
        'id_siswa' => $_POST['id_siswa']
    ];
    update($koneksi, 'siswa', $data, $where);

}
if ($pg == 'hapus_ijazah') {

    $data = [

        'file_ijazah' => $_POST['file_ijazah'],
    ];
    $where = [
        'id_siswa' => $_POST['id_siswa']
    ];
    update($koneksi, 'siswa', $data, $where);

}
if ($pg == 'hapus_kip') {

    $data = [

        'file_kip' => $_POST['file_kip'],
    ];
    $where = [
        'id_siswa' => $_POST['id_siswa']
    ];
    update($koneksi, 'siswa', $data, $where);

}
if ($pg == 'hapus_ktp') {

    $data = [

        'file_ktp' => $_POST['file_ktp'],
    ];
    $where = [
        'id_siswa' => $_POST['id_siswa']
    ];
    update($koneksi, 'siswa', $data, $where);

}