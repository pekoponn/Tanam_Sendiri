<?php
include("koneksi.php");

if (isset($_POST['Simpan'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    $result = mysqli_query($mysqli, "UPDATE artikel_ide_tanaman SET judul='$judul', konten='$konten' WHERE id=$id");

    header('Location: artikel_ide_tanaman.php');
}
?>
