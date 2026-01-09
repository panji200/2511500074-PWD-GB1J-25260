<?php
session_start();
require 'koneksi.php';


$sql = "SELECT * FROM mahasiswa ORDER BY created_at DESC";
$q = mysqli_query($conn, $sql);


if (!$q) {
    die("Query error: " . mysqli_error($conn));
}

$flash_sukses = $_SESSION['flash_sukses'] ?? '';
$flash_error  = $_SESSION['flash_error'] ?? '';
unset($_SESSION['flash_sukses'], $_SESSION['flash_error']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Data Mahasiswa</h2>

<!-- pesan sukses -->
<?php if ($flash_sukses): ?>
    <div style="background:#d4edda; padding:10px; margin-bottom:10px;">
        <?= $flash_sukses ?>
    </div>
<?php endif; ?>

<!-- pesan error -->
<?php if ($flash_error): ?>
    <div style="background:#f8d7da; padding:10px; margin-bottom:10px;">
        <?= $flash_error ?>
    </div>
<?php endif; ?>

<!-- tabel data mahasiswa -->
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jurusan</th>
        <th>Created At</th>
    </tr>

    <?php $no = 1; ?>
    <?php while ($row = mysqli_fetch_assoc($q)): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>
                <!-- Link untuk edit data mahasiswa -->
                <a href="edit.php?nim=<?= urlencode($row['nim']) ?>">Edit</a>
                |
                <!-- Link untuk delete data mahasiswa dengan konfirmasi -->
                <a href="proses_delete.php?nim=<?= urlencode($row['nim']) ?>"
                   onclick="return confirm('Hapus <?= htmlspecialchars($row['nama']) ?> ?')">
                   Delete
                </a>
            </td>
            <td><?= htmlspecialchars($row['nim']) ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['alamat'])) ?></td>
            <td><?= htmlspecialchars($row['jurusan']) ?></td>
            <td><?= date('d-m-Y H:i:s', strtotime($row['created_at'])) ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<!-- link kembali ke biodata mahasiswa -->
<div class="btn-kembali" style="margin-top:15px;">
    <a href="index.php" class="reset">← Kembali</a>
</div>

</body>
</html>
