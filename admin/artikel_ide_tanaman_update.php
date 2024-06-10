<?php
include("koneksi.php");

if (!isset($_GET['id'])) {
    header('Location: artikel.php');
}
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM artikel_ide_tanaman WHERE id=$id");

while ($data = mysqli_fetch_array($result)) {
    $judul = $data['judul'];
    $konten = $data['konten'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
</head>
<body>
    <form action="artikel_ide_tanaman_update2.php" method="post">
        <div>
            <label>Judul</label> <br>
            <input name="judul" type="text" value="<?php echo $judul; ?>" required>
        </div>
        <div>
            <label>Konten</label> <br>
            <textarea name="konten" rows="5" required><?php echo $konten; ?></textarea>
        </div>
        <div>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <input type="submit" name="Simpan" value="Simpan">
        </div>
    </form>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            margin-top: 140px;
        }

        form {
            max-width: 600px;
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
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 200px;
            resize: vertical;
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
