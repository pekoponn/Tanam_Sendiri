<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
</head>
<body>
    <h2>Tambah Artikel Baru</h2>
    <form action="proses_tambah_artikel.php" method="post">
        <label>Judul:</label><br>
        <input type="text" name="judul" required><br>
        <label>Konten:</label><br>
        <textarea name="konten" rows="10" required></textarea><br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>
<style>

    h2 {
        margin-left: 650px;
        margin-top: 150px;
    }

        body {
            font-family: Arial, sans-serif;
            background-color: #BFD8AF;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin-top: 30px;
            margin-left: 550px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #99BC85;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 170px;
        }

        .error {
            color: red;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        select {
            width: 300px; 
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        .level {
            width: 400px;
        }

    </style>
