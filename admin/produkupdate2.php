<?php
        include("koneksi.php");

        if (isset($_POST['Simpan'])) {
            $id = $_POST['id'];
            $nama= $_POST['nama'];
            $deskripsi = $_POST['deskripsi'];
            $harga= $_POST['harga'];
            $stok= $_POST['stok'];
            var_dump($nama);  

            include_once("koneksi.php");

            $result = mysqli_query($mysqli,"UPDATE barang SET nama='$nama' ,deskripsi='$deskripsi' ,harga='$harga',stok='$stok' WHERE id=$id");
            header('Location: produk.php');       

            // header("location:view.php");
        }
        ?>