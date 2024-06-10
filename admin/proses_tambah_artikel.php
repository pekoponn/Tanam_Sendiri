<?php
include "koneksi.php";

$judul = $_POST['judul'];
$konten = $_POST['konten'];

$query = "INSERT INTO artikel (judul, konten, tanggal) VALUES (?, ?, NOW())";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ss", $judul, $konten);

if ($stmt->execute()) {
    header("Location: artikel.php");
} else {
    echo "Error: " . $stmt->error;
}
?>
