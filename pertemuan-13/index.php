<?php
session_start();
require_once __DIR__ . '/fungsi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biodata Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- Header -->
  <header>
    <h1>Biodata Mahasiswa</h1>

    <button class="menu-toggle" id="menuToggle">&#9776;</button>

    <nav>
      <ul>
        <li><a href="#biodata">Input Biodata</a></li>
        <li><a href="read.php">Data Mahasiswa</a></li>
      </ul>
    </nav>
  </header>

  <!-- Konten utama -->
  <main>
    <section id="biodata">
      <h2>Biodata Mahasiswa</h2>

      <!-- Pesan sukses -->
      <?php if (!empty($_SESSION['flash_sukses'])): ?>
        <div style="background:#d4edda; padding:10px; margin-bottom:10px;">
          <?= $_SESSION['flash_sukses']; ?>
        </div>
      <?php endif; ?>

      <!-- Pesan error -->
      <?php if (!empty($_SESSION['flash_error'])): ?>
        <div style="background:#f8d7da; padding:10px; margin-bottom:10px;">
          <?= $_SESSION['flash_error']; ?>
        </div>
      <?php endif; ?>

      <?php
      // bersihkan flash message setelah ditampilkan
      unset($_SESSION['flash_sukses'], $_SESSION['flash_error']);
      ?>

      <!-- Form input biodata -->
      <form action="proses.php" method="POST">

        <label>
          <span>NIM</span>
          <input type="text" name="nim" placeholder="Masukkan NIM" required>
        </label>

        <label>
          <span>Nama Lengkap</span>
          <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required>
        </label>

        <label>
          <span>Alamat</span>
          <textarea name="alamat" placeholder="Masukkan Alamat"></textarea>
        </label>

        <label>
          <span>Jurusan</span>
          <input type="text" name="jurusan" placeholder="Masukkan Jurusan">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>

      </form>
    </section>
  </main>

  // Footer
  <footer>
    <p>&copy; 2025 Pemrograman Web Dasar</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
