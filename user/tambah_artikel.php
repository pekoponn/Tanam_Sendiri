<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    // Validasi input
    if (!empty($judul) && !empty($konten)) {
        $query = "INSERT INTO artikel (judul, konten) VALUES (?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ss', $judul, $konten);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Judul dan konten harus diisi.";
    }
} else {
    header("Location: index.php");
    exit();
}
?>
