<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  #validasi nim wajib ada
  $nim = $_GET['nim'] ?? '';

  if ($nim === '') {
    $_SESSION['flash_error'] = 'NIM Tidak Valid.';
    redirect_ke('read.php');
  }

  /*
    Prepared statement untuk anti SQL injection.
    menyiapkan query DELETE dengan prepared statement 
    (WAJIB WHERE nim = ?)
  */
  $stmt = mysqli_prepare($conn, "DELETE FROM mahasiswa
                                WHERE nim = ?");
  if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('read.php');
  }

  #bind parameter dan eksekusi (s = string)
  mysqli_stmt_bind_param($stmt, "s", $nim);

  if (mysqli_stmt_execute($stmt)) { #jika berhasil
    /*
      Redirect balik ke read.php dan tampilkan info sukses.
    */
    $_SESSION['flash_sukses'] = 'Data mahasiswa berhasil dihapus.';
  } else { #jika gagal
    $_SESSION['flash_error'] = 'Data gagal dihapus. Silakan coba lagi.';
  }

  #tutup statement
  mysqli_stmt_close($stmt);

  redirect_ke('read.php');
