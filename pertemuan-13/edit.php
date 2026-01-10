<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  // ambil NIM (string, bukan int)
  $nim = filter_input(INPUT_GET, 'nim', FILTER_SANITIZE_SPECIAL_CHARS);

  if (!$nim) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
  }

  // ambil data mahasiswa
  $stmt = mysqli_prepare($conn,
    "SELECT nim, nama, alamat, jurusan
     FROM mahasiswa
     WHERE nim = ? LIMIT 1"
  );

  if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('read.php');
  }

  mysqli_stmt_bind_param($stmt, "s", $nim);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('read.php');
  }

  // nilai awal form
  $nim     = $row['nim'] ?? '';
  $nama    = $row['nama'] ?? '';
  $alamat  = $row['alamat'] ?? '';
  $jurusan = $row['jurusan'] ?? '';

  // flash & old input
  $flash_error = $_SESSION['flash_error'] ?? '';
  $old = $_SESSION['old'] ?? [];
  unset($_SESSION['flash_error'], $_SESSION['old']);

  if (!empty($old)) {
    $nim     = $old['nim'] ?? $nim;
    $nama    = $old['nama'] ?? $nama;
    $alamat  = $old['alamat'] ?? $alamat;
    $jurusan = $old['jurusan'] ?? $jurusan;
  }
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Biodata Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <header>
      <h1>Edit Biodata Mahasiswa</h1>
    </header>
    <main>
      <section id="contact">

        <h2>Edit Biodata Mahasiswa</h2>

        <?php if (!empty($flash_error)): ?>
          <div style="padding:10px; margin-bottom:10px;
            background:#f8d7da; color:#721c24; border-radius:6px;">
            <?= $flash_error; ?>
          </div>
        <?php endif; ?>

        <form action="proses_update.php" method="POST">

          <label>
            <span>NIM</span>
          <input type="number" name="nim" value="<?= htmlspecialchars($nim); ?>">
          <input type="hidden" name="nim_lama" value="<?= htmlspecialchars($nim); ?>">
          </label>

          <label>
            <span>Nama</span>
            <input type="text" name="nama" required
              value="<?= htmlspecialchars($nama); ?>">
          </label>

          <label>
            <span>Alamat</span>
            <textarea name="alamat" required><?= htmlspecialchars($alamat); ?></textarea>
          </label>

          <label>
            <span>Jurusan</span>
            <input type="text" name="jurusan"
              value="<?= htmlspecialchars($jurusan); ?>">
          </label>

          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
          <a href="read.php" class="reset">Kembali</a>

        </form>
      </section>
    </main>

    <script src="script.js"></script>
  </body>
</html>
