<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
</head>
<body>
    <form action="artikel_ide_tanaman_tambah.php" method="post">
        <div>
            <label>Judul</label> <br>
            <input name="judul" type="text">
        </div>  
        <div>
            <label>Konten</label> <br>
            <textarea name="konten" rows="5"></textarea>
        </div>  
        <div>
            <label>Gambar</label> <br>
            <input name="gambar" type="text">
        </div> 
        <div>
            <label>URL</label> <br>
            <input name="url" type="text">
        </div> 
        <div>
            <label>Tanggal</label> <br>
            <input name="tanggal" type="date">
        </div> 
        <div>
            <input type="submit" name="Simpan" value="Simpan">
        </div>
    </form>

    <?php
    include_once("koneksi.php");

    if (isset($_POST['Simpan'])) {
        $judul = $_POST['judul'];
        $konten = $_POST['konten'];
        $gambar = $_POST['gambar'];
        $url = $_POST['url'];
        $tanggal = $_POST['tanggal'];

        $result = mysqli_query($mysqli, "INSERT INTO artikel_ide_tanaman (judul, konten, gambar, url, tanggal) VALUES ('$judul', '$konten', '$gambar', '$url', '$tanggal')");

        if ($result) {
            echo "Data berhasil ditambahkan.";
        } else {
            echo "Gagal menambahkan data.";
        }
    }
    ?>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            margin-top: 140px;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form div {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
</body>
</html>
