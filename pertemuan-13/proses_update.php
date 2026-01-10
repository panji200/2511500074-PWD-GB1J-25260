<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('read.php');
}

// ambil data dari form
$nim_lama = bersihkan($_POST['nim_lama'] ?? ''); // NIM lama untuk WHERE
$nim      = bersihkan($_POST['nim'] ?? '');     // NIM baru
$nama     = bersihkan($_POST['nama'] ?? '');
$alamat   = bersihkan($_POST['alamat'] ?? '');
$jurusan  = bersihkan($_POST['jurusan'] ?? '');

// validasi form
$errors = [];
if ($nim === '')      $errors[] = 'NIM wajib diisi.';
if ($nama === '')     $errors[] = 'Nama wajib diisi.';
if ($alamat === '')   $errors[] = 'Alamat wajib diisi.';
if ($jurusan === '')  $errors[] = 'Jurusan wajib diisi.';
if (mb_strlen($nama) < 3) $errors[] = 'Nama minimal 3 karakter.';

if (!empty($errors)) {
  $_SESSION['old'] = compact('nim','nama','alamat','jurusan');
  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('edit.php?nim=' . urlencode($nim_lama));
  exit;
}

// cek apakah NIM baru sudah ada di database selain record ini
$stmt_check = mysqli_prepare($conn, "SELECT nim FROM mahasiswa WHERE nim=? AND nim<>?");
mysqli_stmt_bind_param($stmt_check, "ss", $nim, $nim_lama);
mysqli_stmt_execute($stmt_check);
$res_check = mysqli_stmt_get_result($stmt_check);

if (mysqli_num_rows($res_check) > 0) {
    $_SESSION['flash_error'] = "NIM $nim sudah digunakan.";
    $_SESSION['old'] = compact('nim','nama','alamat','jurusan');
    redirect_ke('edit.php?nim=' . urlencode($nim_lama));
    exit;
}

// query update termasuk NIM baru
$stmt = mysqli_prepare(
  $conn,
  "UPDATE mahasiswa
   SET nim = ?, nama = ?, alamat = ?, jurusan = ?
   WHERE nim = ?"
);

if (!$stmt) {
  $_SESSION['flash_error'] = 'Terjadi kesalahan sistem.';
  redirect_ke('edit.php?nim=' . urlencode($nim_lama));
}

mysqli_stmt_bind_param($stmt, "sssss", $nim, $nama, $alamat, $jurusan, $nim_lama);

if (mysqli_stmt_execute($stmt)) {
  unset($_SESSION['old']);
  $_SESSION['flash_sukses'] = 'Data berhasil diperbarui.';
  redirect_ke('read.php');
} else {
  $_SESSION['flash_error'] = 'Data gagal diperbarui.';
  $_SESSION['old'] = compact('nim','nama','alamat','jurusan');
  redirect_ke('edit.php?nim=' . urlencode($nim_lama));
}

mysqli_stmt_close($stmt);
?>
