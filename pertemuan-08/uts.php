<?php
    session_start();

    // Terima data dari form
    $sesnim = $_POST["txtnim"];
    $sesnama = $_POST["txtnamalengkap"];
    $sestempatlahir = $_POST["txttempatlahir"];
    $sestanggallahir = $_POST["txttanggallahir"];
    $seshobi = $_POST["txthobi"];
    $sespasangan = $_POST["txtpasangan"];
    $sespekerjaan = $_POST["txtpekerjaan"];
    $sesnamaortu = $_POST["txtnamaortu"];
    $sesnamakakak = $_POST["txtnamakakak"];
    $sesnamaadik = $_POST["txtnamaadik"];

    // Simpan ke session
    $_SESSION["sesnim"] = $sesnim;
    $_SESSION["txtnamalengkap"] = $sesnama;
    $_SESSION["txttempatlahir"] = $sestempatlahir;
    $_SESSION["txttanggallahir"] = $sestanggallahir;
    $_SESSION["txthobi"] = $seshobi;
    $_SESSION["txtpasangan"] = $sespasangan;
    $_SESSION["txtpekerjaan"] = $sespekerjaan;
    $_SESSION["txtnamaortu"] = $sesnamaortu;
    $_SESSION["txtnamakakak"] = $sesnamakakak;
    $_SESSION["txtnamaadik"] = $sesnamaadik;
    
    // Redirect kembali ke index.php
header('Location: index.php');
exit();
?>
    <?php
session_start();

// Terima data dari form
$nama = $_POST['txtNama'] ?? '';
$email = $_POST['txtEmail'] ?? '';
$pesan = $_POST['txtPesan'] ?? '';

// Simpan ke session
$_SESSION['sesnama'] = $nama;
$_SESSION['sesemail'] = $email;
$_SESSION['sespesan'] = $pesan;

// Redirect kembali ke index.php
header('Location: index.php');
exit();
?>