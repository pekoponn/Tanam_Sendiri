<?php
        include("koneksi.php");

        if (isset($_POST['Simpan'])) {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $username= $_POST['username'];
            $password= $_POST['password'];
            $level= $_POST['level'];
            $email= $_POST['email'];
            var_dump($nama);  

            include_once("koneksi.php");

            $result = mysqli_query($mysqli,"UPDATE user SET nama='$nama' ,username='$username' ,password='$password',level='$level' ,email='$email' WHERE id=$id");
            header('Location: index2.php');       

            // header("location:view.php");
        }
        ?>