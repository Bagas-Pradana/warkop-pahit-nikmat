<?php
require '../purch.php';

// Koneksi dan pengecekan input pencarian
$key = $_GET['key'] ?? '';
$item = " WHERE nama LIKE '%$key%' OR handphone LIKE '%$key%' OR alamat LIKE '%$key%' OR purchase LIKE '%$key%'";

// Menghitung total data
$rowItem = "SELECT COUNT(*) FROM shop" . $item;
$hasilCount = mysqli_query($koneksi, $rowItem);
$hasilnya = mysqli_fetch_assoc($hasilCount);
$jumlah = $hasilnya['COUNT(*)'];
$limitData = 3;
$jumlahHalaman = ceil($jumlah / $limitData);

// Mengatur halaman saat ini
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$awalHalaman = ($halaman * $limitData) - $limitData;

// Mengambil data
$dataItem = "SELECT * FROM shop" . $item . " LIMIT $awalHalaman, $limitData";
$hasil2 = mysqli_query($koneksi, $dataItem);

// Menyimpan hasil query dalam array
$qwerty = [];
while ($row = mysqli_fetch_assoc($hasil2)) {
    $qwerty[] = $row;
}

// Menampilkan data dalam format HTML (tabel atau lainnya)
if (count($qwerty) > 0) {
    echo "<table border='1' cellpadding='10' cellspacing='0'>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>HANDPHONE</th>
                <th>ALAMAT</th>
                <th>JUMLAH PEMBELIAN</th>
                <th>STATUS</th>
                <th>PROCEED</th>
                <th>EDIT</th>
            </tr>";
    
    $i = 1 + $awalHalaman;
    foreach ($qwerty as $a) {
        echo "<tr>
                <td>" . $i . "</td>
                <td>" . htmlspecialchars($a['nama']) . "</td>
                <td>" . htmlspecialchars($a['handphone']) . "</td>
                <td>" . htmlspecialchars($a['alamat']) . "</td>
                <td>" . htmlspecialchars($a['purchase']) . "</td>
                <td>Status Pending</td>
                <td style='text-align: center;'>
                    <a href='process.php?id=" . $a['id'] . "' onclick=\"return confirm('Lanjutkan Pembayaran');\"><i data-feather='shopping-cart'></i></a>
                </td>
                <td style='text-align: center;'>
                    <a href='update.php'><i data-feather='edit'></i></a> |
                    <a href='delete.php?id=" . $a['id'] . "' onclick=\"return confirm('Konfirmasi Penghapusan');\"><i data-feather='trash-2'></i></a>
                </td>
            </tr>";
        $i++;
    }
    echo "</table>";
} else {
    echo "<h4>'Tidak Ditemukan Hasil 404'</h4>";
}
?>