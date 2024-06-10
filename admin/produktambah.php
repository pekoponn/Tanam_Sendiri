<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
<form action="produktambah.php" method="post">
        <div>
            <label>Nama</label> <br>
            <input name="nama" type="text" >
        </div>  
        <div>
            <label>Deskripsi</label> <br>
            <input name="deskripsi" type="text"  >
        </div>  
        <div>
            <label>Harga</label> <br>
            <input name="harga" type="text"  >
        </div> 
        <div>
            <label>Stok</label> <br>
            <input name="stok" type="text"  >
        </div> 
        <div>
            <input type="hidden" name="id" >
            <input type="submit" name="Simpan" value="Simpan">
        </div>
    <?php
     
                if(isset($_POST['Simpan'])){
                    $nama = $_POST['nama'];
                    $deskripsi = $_POST['deskripsi'];
                    $harga = $_POST['harga'];
                    $stok = $_POST['stok'];

                    include_once("koneksi.php");

                    $result = mysqli_query($mysqli,"INSERT INTO barang(nama,deskripsi, harga, stok) VALUES ('$nama','$deskripsi', '$harga', '$stok')");

                    header("location:produk.php");
                }
               ?>
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
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="rgba(0,0,0,0)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M7 10l5 5 5-5H7z"/></svg>');
    background-repeat: no-repeat;
    background-position-x: calc(100% - 10px);
    background-position-y: center;
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
    </html>