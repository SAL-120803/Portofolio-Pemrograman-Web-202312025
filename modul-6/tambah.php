<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $conn->query("INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', '$harga', '$stok')");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk Baru</h1>
    <form method="POST">
        Nama Produk: <input type="text" name="nama_produk" required><br>
        Harga: <input type="number" name="harga" required><br>
        Stok: <input type="number" name="stok" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>