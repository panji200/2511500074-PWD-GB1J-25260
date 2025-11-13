<?php
    session_start();

    // Terima data dari form
    $nim = $_POST['txtnim'] ?? '';
    $nama = $_POST['txtnamalengkap'] ?? '';
    $tempatlahir = $_POST['txttempatlahir'] ?? '';
    $tanggallahir = $_POST['txttanggallahir'] ?? '';
    $hobi = $_POST['txthobi'] ?? '';
    $pasangan = $_POST['txtpasangan'] ?? '';
    $pekerjaan = $_POST['txtpekerjaan'] ?? '';
    $namaortu = $_POST["txtnamaortu"] ?? '';
    $namakakak = $_POST['txtnamakakak'] ?? '';
    $namaadik = $_POST['txtnamaadik'] ?? '';

    // Simpan ke session
    $_SESSION['sesnim'] = $nim;
    $_SESSION['sesnamalengkap'] = $nama;
    $_SESSION['tempatlahir'] = $tempatlahir;
    $_SESSION['tanggallahir'] = $tanggallahir;
    $_SESSION['hobi'] = $hobi;
    $_SESSION['pasangan'] = $pasangan;
    $_SESSION['pekerjaan'] = $pekerjaan;
    $_SESSION['namaortu'] = $namaortu;
    $_SESSION['namakakak'] = $namakakak;
    $_SESSION['namaadik'] = $namaadik;
    
    // Redirect kembali ke index.php
header('Location: index.php');
exit();

?>