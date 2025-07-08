<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 40px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: vertical;
        }

        textarea {
            height: 100px;
        }

        button {
            margin-top: 20px;
            padding: 12px;
            background-color:rgb(48, 105, 57);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .message {
            margin-top: 20px;
            padding: 15px;
            border-left: 5px solid #2ecc71;
            background-color: #ecf9f1;
        }

        .error {
            margin-top: 20px;
            padding: 15px;
            border-left: 5px solid #e74c3c;
            background-color: #fdecea;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Buku Tamu Digital STITEK Bontang</h1>

        <?php
        $nama = $email = $pesan = "";
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nama"])) {
                $errors[] = "Nama Lengkap wajib diisi.";
            } else {
                $nama = htmlspecialchars($_POST["nama"]);
            }

            if (empty($_POST["email"])) {
                $errors[] = "Alamat Email wajib diisi.";
            } else {
                $email = htmlspecialchars($_POST["email"]);
            }

            if (empty($_POST["pesan"])) {
                $errors[] = "Pesan/Komentar wajib diisi.";
            } else {
                $pesan = htmlspecialchars($_POST["pesan"]);
            }

            if (empty($errors)) {
                echo "<div class='message'>";
                echo "<strong>Pesan berhasil dikirim!</strong><br><br>";
                echo "<strong>Nama:</strong> $nama<br>";
                echo "<strong>Email:</strong> $email<br>";
                echo "<strong>Pesan:</strong><br>" . nl2br($pesan);
                echo "</div>";
            } else {
                echo "<div class='error'><ul>";
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul></div>";
            }
        }
        ?>

        <form method="POST" action="">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" value="<?= isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '' ?>">

            <label for="email">Alamat Email:</label>
            <input type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">

            <label for="pesan">Pesan/Komentar:</label>
            <textarea id="pesan" name="pesan"><?= isset($_POST['pesan']) ? htmlspecialchars($_POST['pesan']) : '' ?></textarea>

            <button type="submit">Kirim Pesan</button>
        </form>
    </div>
</body>
</html>