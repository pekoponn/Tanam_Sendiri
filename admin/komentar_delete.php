<?php
include "koneksi.php";

$id = $_GET['id'];

$query = "DELETE FROM komentar WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: comment.php");
} else {
    echo "Error: " . $stmt->error;
}
?>
