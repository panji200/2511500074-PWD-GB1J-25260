<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

# hanya izin POST request dari form
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php#biodata');
}

# ambil dan bersihkan data dari form
$nim     = bersihkan($_POST['nim'] ?? '');
$nama    = bersihkan($_POST['nama'] ?? '');
$alamat  = bersihkan($_POST['alamat'] ?? '');
$jurusan = bersihkan($_POST['jurusan'] ?? '');

# validasi input
$errors = [];

if ($nim === '') {
  $errors[] = 'NIM wajib diisi.';
}

if ($nama === '') {
  $errors[] = 'Nama wajib diisi.';
}

if (mb_strlen($nama) < 3) {
  $errors[] = 'Nama minimal 3 karakter.';
}

# Jika Ada Error → Kembali ke Form
if (!empty($errors)) {
  $_SESSION['old'] = [
    'nim'     => $nim,
    'nama'    => $nama,
    'alamat'  => $alamat,
    'jurusan' => $jurusan,
  ];

  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#biodata');
}

# Simpan ke Database
$sql = "INSERT INTO mahasiswa (nim, nama, alamat, jurusan)
        VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#biodata');
}


mysqli_stmt_bind_param($stmt, "ssss", $nim, $nama, $alamat, $jurusan);

# Eksekusi dan Cek Hasil
if (mysqli_stmt_execute($stmt)) {
  unset($_SESSION['old']);
  $_SESSION['flash_sukses'] = 'Data mahasiswa berhasil disimpan.';
  redirect_ke('read.php');
} else {
  $_SESSION['old'] = [
    'nim'     => $nim,
    'nama'    => $nama,
    'alamat'  => $alamat,
    'jurusan' => $jurusan,
  ];
  $_SESSION['flash_error'] = 'Data gagal disimpan. NIM mungkin sudah terdaftar.';
  redirect_ke('index.php#biodata');
}

mysqli_stmt_close($stmt);
