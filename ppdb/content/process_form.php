<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize $data array with default values
    $data = array(
        'asrama' => 'N',
        'keterampilan' => 'N'
    );

    // Check if 'asrama' checkbox is checked
    if (isset($_POST['asrama']) && $_POST['asrama'] == 'Y') {
        $data['asrama'] = 'Y';
    }

    // Check if 'keterampilan' checkbox is checked
    if (isset($_POST['keterampilan']) && $_POST['keterampilan'] == 'Y') {
        $data['keterampilan'] = 'Y';
    }

    $id_siswa = $_POST['id_siswa'];
    update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);

    
}

// if ($pg == 'dataprogrampilihan') {
//     $status = (isset($_POST['status'])) ? 1 : 0;
//     $data = [ 
//         'asrama' => $_POST['asrama'],
//         'ketrampilan' => $_POST['ketrampilan']

//     ];
//     $id_siswa = $_POST['id_siswa'];
//     update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
// }

?>

