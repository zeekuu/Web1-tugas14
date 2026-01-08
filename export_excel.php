<?php
include 'koneksi.php';

header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=laporan_peminjaman.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "
<table border='1'>
    <tr style='background-color:#D9D9D9; font-weight:bold; text-align:center;'>
        <th>No</th>
        <th>Nama Mahasiswa</th>
        <th>Nim</th>
        <th>Kursus</th>
        <th>Durasi</th>
        <th>Tanggal Daftar</th>
    </tr>
";

$sql = "SELECT tabel_pendaftaran.id, tabel_mhs.namaMHS, tabel_mhs.nimMHS, tabel_kursus.namaKursus, tabel_kursus.Durasi, tabel_pendaftaran.tglDaftar
        FROM tabel_pendaftaran
        JOIN tabel_mhs ON tabel_pendaftaran.idMHS = tabel_mhs.id
        JOIN tabel_kursus ON tabel_pendaftaran.idKursus = tabel_kursus.id";
$result = mysqli_query($koneksi, $sql);
$no = 1;
$warna = false;

while ($row = mysqli_fetch_assoc($result)) {
    $bg = $warna ? '#F2F2F2' : '#FFFFFF';
    
    echo "
    <tr style='background-color:$bg'>
        <td style='text-align:center;'>".$no++."</td>
        <td>".$row['namaMHS']."</td>
        <td>".$row['nimMHS']."</td>
        <td>".$row['namaKursus']."</td>
        <td>".$row['Durasi']."</td>
        <td>".$row['tglDaftar']."</td>
    </tr>
    ";
    
    $warna = !$warna;
}

echo "</table>";