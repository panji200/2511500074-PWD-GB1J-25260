<?php
session_start();

// Debug: tampilkan semua session
echo "<!-- Session Data: ";
print_r($_SESSION);
echo " -->";

$sesnim = $_SESSION["nim"] ?? '';
$sesnama = $_SESSION["namalengkap"] ?? '';  
$sestempatlahir = $_SESSION["tempatlahir"] ?? '';
$sestanggallahir = $_SESSION["tanggallahir"] ?? '';
$seshobi = $_SESSION["hobi"] ?? '';
$sespasangan = $_SESSION["pasangan"] ?? '';
$sespekerjaan = $_SESSION["pekerjaan"] ?? '';
$sesnamaortu = $_SESSION["namaortu"] ?? '';
$sesnamakakak = $_SESSION["namakakak"] ?? '';
$sesnamaadik = $_SESSION["namaadik"] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>


    

  <section id="contact">
      <h2>Biodata Sederhana Mahasiswa</h2>
      <form action="proses.php" method="POST">

        <label for="txtNim"><span>Nim:</span>
          <input type="Nim" id="txtNim" name="txtNim" placeholder="isi nim anda........." required autocomplete="nim">
        </label>

        <label for="txtnamalengkap"><span>Nama Lengkap:</span>
          <input type="Nama" id="txtnamalengkap" name="txtnamalengkap" placeholder="isi nama lengkap anda........." required autocomplete="nama">
        </label>

        <label for="txttempatlahir"><span>Tempat Lahir:</span>
          <input type="Tempat Lahir" id="txttempatlahir" name="txttempatlahir" placeholder="isi tempat lahir anda........." required autocomplete="email">
        </label>

        <label for="txttanggallahir"><span>Tanggal Lahir:</span>
          <input type="Tanggal Lahir" id="txttanggallahir" name="txttanggallahir" placeholder="isi tanggal lahir anda........." required autocomplete="email">
        </label>

        <label for="txthobi"><span>Hobi:</span>
          <input type="Hobi" id="txthobi" name="txthobi" placeholder="isi hobi anda........." required autocomplete="email">
        </label>

        <label for="txtpasangan"><span>Pasangan:</span>
          <input type="Pasangan" id="txtpasangan" name="txtpasangan" placeholder="isi pasangan anda kalau ada........." required autocomplete="email">
        </label>

        
        <label for="txtpekerjaan"><span>Pekerjaan:</span>
          <input type="Pekerjaan" id="txtpekerjaan" name="txtpekerjaan" placeholder="isi pekerjaan anda........." required autocomplete="email">
        </label>

        <label for="txtnamaortu"><span>Nama Orang Tua:</span>
          <input type="Nama Orang Tua" id="txtnamaortu" name="txtnamaortu" placeholder="isi nama orang tua anda........." required autocomplete="email">
        </label>

        <label for="txtnamakakak"><span>Nama Kakak:</span>
          <input type="Nama Kakak" id="txtnamakakak" name="txtnamakakak" placeholder="isi nama kakak anda........." required autocomplete="email">
        </label>

        <label for="txtnamaadik"><span>Nama Adik:</span>
          <input type="Nama Adik" id="txtnamadik" name="txtnamaadik" placeholder="isi nama adik anda........." required autocomplete="email">
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>


      

    </section>

    <section id="about">
      <?php
          $nim = "2511500074&hearts;";
          $Nama_Lengkap = "PANJI&hearts;";
          $Tempat_Lahir = "Beruas&hearts;";
          $Tanggal_Lahir = "30-10-2004&hearts;";
          $hobi = "Memancing";
          $Pasangan = "Belum ada&hearts;";
          $Pekerjaan = "Petani sawit&hearts;";
          $Nama_orang_tua ="Agani&hearts;";
          $Nama_kakak = "Randi&hearts;";
          $Nama_adik = "Alex&hearts;";
      ?>

      <h2>Tentang Saya</h2>
      <p><strong>Nim:</strong><?php echo $sesnim;?> </p>
      <p><strong>Nama Lengkap:</strong><?php echo $sesnama;?></p>
      <p><strong>Tempat Lahir:</strong><?php echo $sestempatlahir;?></p>
      <p><strong>Tanggal Lahir:</strong> <?php echo $sestanggallahir;?></p>
      <p><strong>Hobi:</strong><?php echo $seshobi;?></p>
      <p><strong>Pasangan:</strong> <?php echo $sespasangan;?></p>
      <p><strong>Pekerjaan:</strong><?php echo $sespekerjaan;?></p>
      <p><strong>Nama Orang Tua:</strong> <?php echo $sesnamaortu;?></p>
      <p><strong>Nama Kakak:</strong> <?php echo $sesnamakakak;?></p>
      <p><strong>Nama Adik:</strong> <?php echo $sesnamaadik;?></p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action=" " method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="sesNamaaku" name="txtNamaaku" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="sesEmailaku" name="txtEmailaku" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="sesPesanaku" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>



      </form>
</section>



  </main>

  <footer>
    <p><marquee>&copy; 2025 PANJI[2511500074]</marquee></p>
  </footer>

  <script src="script.js"></script>
</body>
  
</html>