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