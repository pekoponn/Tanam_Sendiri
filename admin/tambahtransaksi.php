<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check out</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #BFD8AF;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 130vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin-top: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #99BC85;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 170px;
        }

        .error {
            color: red;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        select {
            width: 300px; 
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        .level {
            width: 400px;
        }

    </style>
    <script>
    function getHargaBarang() {
        var idBarang = document.getElementById("id_barang").value;
        var hargaBarang = document.getElementById("harga_barang");

        if (idBarang) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_harga.php?id=" + idBarang, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    hargaBarang.value = xhr.responseText;
                    updateTotalHarga();
                }
            };
            xhr.send();
        } else {
            hargaBarang.value = "";
            updateTotalHarga();
        }
    }

    function updateTotalHarga() {
        var jumlah = parseInt(document.getElementById("jumlah_barang").value) || 0;
        var harga = parseFloat(document.getElementById("harga_barang").value) || 0;
        var total = harga * jumlah;

        document.getElementById("total_harga").value = total;
    }

    document.getElementById("jumlah_barang").addEventListener("input", updateTotalHarga);
    document.getElementById("id_barang").addEventListener("change", getHargaBarang);
</script>
</head>
<body>
<form action="buy.php" method="POST" id="form_pemesanan">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <br>
        <div class="form-group">
            <label for="jumlah_barang">Jumlah Barang:</label>
            <input type="number" id="jumlah_barang" name="jumlah_barang" min="1" required>
        </div>
        <br>
        <div class="form-group">
            <label for="id_barang">Barang:</label>
            <select name="id_barang" id="id_barang" onchange="getHargaBarang()">
                <option value="">Pilih Barang</option>
                <option value="1">fuschia</option>
                <option value="2">lidah mertua</option>
                <option value="3">sirih gading</option>
                <option value="4">aglonema</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="harga_barang">Harga Barang:</label>
            <input type="text" id="harga_barang" name="harga_barang" readonly>
        </div>
        <br>
        <div class="form-group">
            <label for="total_harga">Total Harga:</label>
            <input type="text" id="total_harga" name="total_harga" readonly>
        </div>
        <br>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>
        </div>
        <br>
        <div class="form-group">
            <label for="metode_transaksi">Metode Transaksi:</label>
            <select id="metode_transaksi" name="metode_transaksi" required>
                <option value="Cash">Cod</option>
                <option value="Debit">Debit</option>
                <option value="Credit">Credit</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="tanggal_pemesanan">Tanggal Pemesanan:</label>
            <input type="date" id="tanggal_pemesanan" name="tanggal_pemesanan" placeholder="yyyy-mm-dd" required>
        </div>
        <br>
        <button type="submit" name="submit" class="button">Submit</button>
    </form>
    <div class="bottom"></div>
</body>
</html>

