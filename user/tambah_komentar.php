<?php
session_start();
include("koneksi.php");

$id_artikel = $_POST['id_artikel'];
$id_user = $_SESSION['id_user']; // Get user ID from session
$komentar = $_POST['komentar'];

// Use prepared statements to avoid SQL injection
$stmt = $mysqli->prepare("INSERT INTO komentar (id_artikel, id_user, komentar, tanggal) VALUES (?, ?, ?, NOW())");
$stmt->bind_param('iis', $id_artikel, $id_user, $komentar);

if ($stmt->execute()) {
    header("Location: index2.php");
} else {
    echo "Error: " . $stmt->error;
}
?>
