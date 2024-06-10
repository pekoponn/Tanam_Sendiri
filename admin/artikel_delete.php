<?php
include "koneksi.php";

$id = $_GET['id'];

$query = "DELETE FROM artikel WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: artikel.php");
} else {
    echo "Error: " . $stmt->error;
}
?>
