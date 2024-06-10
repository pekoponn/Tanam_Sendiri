<?php

include_once("produk.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM barang WHERE id= '$id'");

header("location: produk.php");

?>