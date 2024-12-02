<?php
$koneksi = mysqli_connect('localhost','root','','pembelian_data');

// if(!$koneksi) {
//     echo "gagal";   
// }else{
//     echo"berhasil";
// }
$item= "";
$data2 = "";  // Variabel pencarian untuk digunakan pada query

// Parameter pemanggilan SEARCH = $_GET['key']
if(isset($_GET['key']) && !empty($_GET['key'])) {
    $data2 = $_GET['key'];
    // var_dump($data2);
    
    // fetching data dengan fitur %var%
    $item = " WHERE nama LIKE '%$data2%' OR handphone LIKE '%$data2%' OR alamat LIKE '%$data2%' OR purchase LIKE '%$data2%'";
    $item2 = "'" . $data2 . "'";
}

// PERUMUSAN HALAMAN 
$limitData = 3;
// fetching data ditambah jika kondisi melalui fitur search
// Gunakan Query untuk melakukan operator hitung data
$rowItem = "SELECT COUNT(*) FROM shop" . $item;
$hasilCount = mysqli_query($koneksi, $rowItem);

// Mengambil jumlah data yang ada di database 
$hasilnya = mysqli_fetch_assoc($hasilCount);
$jumlah = $hasilnya['COUNT(*)']; // Mengambil Jumlah total yang ada

// $jumlahHitung = mysqli_num_rows($hasilCount);
$jumlahHalaman = ceil($jumlah / $limitData);
// menentukan Parameter GET untuk halaman


$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$awalHalaman = ($halaman * $limitData) - $limitData;
// LIMITKAN DATANYA 
$dataItem = "SELECT * FROM shop" . $item . " LIMIT $awalHalaman, $limitData";
$hasil2 = mysqli_query($koneksi, $dataItem);

// Menyimpan hasil query dalam array $qwerty
$qwerty = [];
while($row = mysqli_fetch_assoc($hasil2)) {
    $qwerty[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA PELANGGAN</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="css/stylepurch.css">
</head>

<body>
    <h2>DATA PEMBELIAN PELANGGAN</h2>
    <!-- SEARCHING -->
    <form action="" method="get">
        <!-- UNTUK TES DEBUGGING HTML GUNAKAN  value="//echo isset($_GET['key']) ? $_GET['key'] : 'Kolom Pencarian'; ?>" /> PADA <input>-->
        <!-- <input type="text" name="key" placeholder="Kolom Pencarian" autocomplete="off" autofocus />
        <button type="submit">CARI</button> -->
        <form action="" method="post">
            <input type="text" name="key" placeholder="Cari Datamu!" size="25" autocomplete="off" autofocus id="key">
            <button type="submit" name="search" id="kata-kunci">Search</button>
            <!-- <img src="img/load.gif" alt="loading" class="image"> -->
        </form>
    </form>
    <!-- UNTUK DEBUGGING <a href=" ?key= //$uji; ?>"></a> -->
    <br>
    <div id="container">
        <!-- LOGIKA UNTUK NO RESULT -->
        <?php if (count($qwerty) > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>HANDPHONE</th>
                <th>ALAMAT</th>
                <th>JUMLAH PEMBELIAN</th>
                <th>STATUS</th>
                <th>PROCEED</th>
                <th>EDIT</th>
            </tr>
            <?php $i = 1 + $awalHalaman; ?>
            <?php foreach($qwerty as $a) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $a['nama']; ?></td>
                <td><?= $a['handphone']; ?></td>
                <td><?= $a['alamat']; ?></td>
                <td><?= $a['purchase']; ?></td>
                <td>Status Pending</td>
                <td style="text-align: center;">
                    <a href="process.php?id=<?= $a['id']; ?>" onclick="return confirm('Lanjutkan Pembayaran');"><i
                            data-feather="shopping-cart"></i></a>
                </td>
                <td style="text-align: center;">
                    <a href=" update.php"><i data-feather="edit"></i></a> |
                    <a href="delete.php?id=<?= $a['id']; ?>" onclick="return confirm('Konfirmasi Penghapusan');"><i
                            data-feather="trash-2"></i></a>
                </td>

            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        <?php else : ?>
        <h4>'Tidak Ditemukan Hasil 404'</h4>
        <?php endif; ?>
    </div>

    <!----------------------------------------- PAGINATION ----------------------------------->
    <!-- SHOWING SEARCH RESULT -->
    <?php if (isset($_GET['key']) && !empty($_GET['key'])) : ?>
    <p class="item">Menampilkan Hasil Pencarian Untuk <?= $item2; ?></p>
    <?php else : ?>
    <p class="item" style="display: none;">Menampilkan Hasil Pencarian Untuk <?= $item2; ?></p>
    <?php endif; ?>

    <!-- PREVIOUS SESSION -->
    <div class="pagination">
        <?php if ($halaman > 1): ?>
        <?php if (isset($_GET['key']) && !empty($_GET['key'])) : ?>
        <p style="display: none;">Tampilkan Semua<a href="purch.php" class="item">Data</a></p>
        <?php else : ?>
        <p>Tampilkan Semua<a href="purch.php" class="item">Data</a></p>
        <?php endif; ?>
        <a href="?halaman=<?= $halaman - 1; ?>&key=<?= isset($data2) ? $data2 : ''; ?>">Back</a>
        <?php endif; ?>

        <!-- MID SESSION -->
        <?php for ($i = 1; $i <= $jumlahHalaman; $i++): ?>
        <a href="?halaman=<?= $i; ?>&key=<?= isset($data2) ? $data2 : ''; ?>"
            class="<?= ($i == $halaman) ? 'active' : ''; ?>">
            <?= $i; ?>
        </a>
        <?php endfor; ?>

        <!-- NEXT SESSION -->
        <?php if ($halaman < $jumlahHalaman): ?>
        <a href="?halaman=<?= $halaman + 1; ?>&key=<?= isset($data2) ? $data2 : ''; ?>">Next</a>
        <?php endif; ?>

        <div class="sinkrondata">
            <!-- END OF SHOWING SEARCH RESULT -->
            <?php if (isset($_GET['key']) && !empty($_GET['key'])) : ?>
            <p>Tampilkan Semua<a href="purch.php" class="item">Data</a></p>
            <?php else : ?>
            <p><a href="purch.php" class="item" style="display: none;">Tampilkan Semua</a></p>
            <?php endif; ?>
        </div>
    </div>


    <script>
    feather.replace();
    </script>
    <script src="js/js/jquery-3.5.1.min.js"></script>
    <script src="js/js/script.js"></script>
</body>

</html>