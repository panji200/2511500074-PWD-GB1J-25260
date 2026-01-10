<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  $CID = filter_input(INPUT_GET, 'CID', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$CID) {
    $_SESSION['flash_error'] = 'CID Tidak Valid.';
    redirect_ke('tabel_mahasiswa.php');
  }
  $stmt = mysqli_prepare($conn, "DELETE FROM tbl_mahasiswa
                                WHERE CID = ?");
  if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('tabel_mahasiswa.php');
  }
  mysqli_stmt_bind_param($stmt, "i", $CID);

  if (mysqli_stmt_execute($stmt)) { 
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah dihapus.';
  } else {
    $_SESSION['flash_error'] = 'Data gagal dihapus. Silakan coba lagi.';
  }
  mysqli_stmt_close($stmt);

  redirect_ke('tabel_mahasiswa.php');

/* ===============================
   VALIDASI CID
================================ */
$CID = filter_input(INPUT_GET, 'CID', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$CID) {
  $_SESSION['flash_error'] = 'CID biodata tidak valid.';
  redirect_ke('tabel_mahasiswa.php');
}

/* ===============================
   DELETE DATA BIODATA
================================ */
$stmt = mysqli_prepare(
  $conn,
  "DELETE FROM tbl_mahasiswa WHERE CID = ?"
);

if (!$stmt) {
  $_SESSION['flash_error'] = 'Gagal memproses penghapusan data.';
  redirect_ke('tabel_mahasiswa.php');
}

mysqli_stmt_bind_param($stmt, "i", $CID);

if (mysqli_stmt_execute($stmt)) {
  $_SESSION['flash_sukses'] = 'Biodata berhasil dihapus.';
} else {
  $_SESSION['flash_error'] = 'Biodata gagal dihapus.';
}

mysqli_stmt_close($stmt);

redirect_ke('tabel_mahasiswa.php');