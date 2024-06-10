<?php
include_once("koneksi.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM artikel_ide_tanaman WHERE id = '$id'");

header("location: artikel.php");
?>
