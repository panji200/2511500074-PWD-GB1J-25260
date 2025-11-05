      <section id="about">
      <h2>Tentang Saya</h2>
      <?php
    
      $nim = "2511500074";
      $nama = "PANJI &#128526;";
      $tempat_lahir = "Bangka Tengah";
      $tanggal_lahir = "30 Oktober 2004";
      $hobi = "Memancing &#128526;";
      $pasangan = "Belum ada &hearts;";
      $pekerjaan = "Mahasiswa &copy; 2025";
      $nama_ortu = "Bapak PANJI dan Ibu Eri";
      $nama_kakak_laki = "Randi";
      $nama_kakak_perempuan = "Marisa";
      ?>
      <p><strong>NIM:</strong> <?php echo $nim; ?></p>
      <p><strong>Nama Lengkap:</strong> <?php echo $nama; ?></p>
      <p><strong>Tempat Lahir:</strong> <?php echo $tempat_lahir; ?></p>
      <p><strong>Tanggal Lahir:</strong> <?php echo $tanggal_lahir; ?></p>
      <p><strong>Hobi:</strong> <?php echo $hobi; ?></p>
      <p><strong>Pasangan:</strong> <?php echo $pasangan; ?></p>
      <p><strong>Pekerjaan:</strong> <?php echo $pekerjaan; ?></p>
      <p><strong>Nama Orang Tua:</strong> <?php echo $nama_ortu; ?></p>
      <p><strong>Nama Kakak Laki-Laki:</strong> <?php echo $nama_kakak_laki; ?></p>
      <p><strong>Nama Kakak Perempuan:</strong> <?php echo $nama_kakak_perempuan; ?></p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="" method="GET">
        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>
  </main>

  <footer>

    <script src="script.js"></script>
    <p>&copy; 2025 panji [2511500074]</p>
  </footer>
</body>
</html>