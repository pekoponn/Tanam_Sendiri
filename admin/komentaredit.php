<?php
include "koneksi.php";

$id = $_GET['id'];
$query = "SELECT komentar.id, komentar.komentar, user.nama 
          FROM komentar 
          JOIN user ON komentar.id_user = user.id 
          WHERE komentar.id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Komentar</title>
</head>
<body>
    <h2>Edit Komentar</h2>
    <form action="proses_edit_komentar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label>Nama Pengguna:</label><br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" disabled><br>
        <label>Komentar:</label><br>
        <textarea name="komentar" rows="10" required><?php echo htmlspecialchars($data['komentar']); ?></textarea><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
