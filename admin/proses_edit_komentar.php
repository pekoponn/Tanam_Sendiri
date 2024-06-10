<?php
include "koneksi.php";

$id = $_POST['id'];
$komentar = $_POST['komentar'];

$query = "UPDATE komentar SET komentar = ? WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("si", $komentar, $id);

if ($stmt->execute()) {
    header("Location: comment.php");
} else {
    echo "Error: " . $stmt->error;
}
?>
