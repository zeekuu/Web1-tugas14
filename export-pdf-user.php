<?php
include 'koneksi.php';
$sql = "SELECT tabel_pendaftaran.id, tabel_mhs.namaMHS, tabel_mhs.nimMHS, tabel_kursus.namaKursus, tabel_kursus.Durasi, tabel_pendaftaran.tglDaftar
        FROM tabel_pendaftaran
        JOIN tabel_mhs ON tabel_pendaftaran.idMHS = tabel_mhs.id
        JOIN tabel_kursus ON tabel_pendaftaran.idKursus = tabel_kursus.id";
$result = mysqli_query($koneksi, $sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pendaftar</title>
</head>
<body>
  <script>
    window.print();
  </script>
  <center>
    <h1>Laporan Data Pendaftar</h1>
    <table border="1" cellpadding="10" cellspacing="0" width="80%">
      <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>kursus</th>
        <th>durasi</th>
        <th>tgl daftar</th>
      </tr>
      <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while($data = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $data['namaMHS']; ?></td>
            <td><?= $data['nimMHS']; ?></td>
            <td><?= $data['namaKursus']; ?></td>
            <td><?= $data['Durasi']; ?></td>
            <td><?= $data['tglDaftar']; ?></td>
          </tr>
          <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="3">Data kosong</td></tr>
            <?php endif; ?>
          </table>
        </center>
</div>

</body>
</html>