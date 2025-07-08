<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM produk WHERE id_produk=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $conn->query("UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stok' WHERE id_produk=$id");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <form method="POST">
        Nama Produk: <input type="text" name="nama_produk" value="<?= $row['nama_produk'] ?>" required><br>
        Harga: <input type="number" name="harga" value="<?= $row['harga'] ?>" required><br>
        Stok: <input type="number" name="stok" value="<?= $row['stok'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
