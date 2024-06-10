<?php
include "koneksi.php";

$id = $_POST['id'];
$judul = $_POST['judul'];
$konten = $_POST['konten'];

$query = "UPDATE artikel SET judul = ?, konten = ?, tanggal = NOW() WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ssi", $judul, $konten, $id);

if ($stmt->execute()) {
    header("Location: artikel.php");
} else {
    echo "Error: " . $stmt->error;
}
?>
