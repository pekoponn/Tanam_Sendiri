<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #BFD8AF;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
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
</head>
<body>
    <form action="register_account.php" method="post">
    <h1 class="signup">Sign up </h1>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="level">Level:</label>
        <select id="level" name="level" class="level">
            <option value="user">User</option>
        </select>

        <label for="nama">Your Name:</label>
        <input type="text" id="nama" name="nama" required>
        <div id="passwordError" class="error"></div>

        <label for="Email">Email:</label>
        <input type="text" id="email" name="email" required>

        <button type="Submit" name="Submit" >Submit</button>
    </form>
    
    <?php

        if (isset($_POST['Submit'])) {
            $nama= $_POST['nama'];
            $username= $_POST['username'];
            $password= $_POST['password'];
            $level= $_POST['level'];
            $email = $_POST['email'];
            echo($password);

            include_once("koneksi.php");

            $result = mysqli_query($mysqli,"INSERT INTO user(nama,username,password,level,email)
            VALUES('$nama','$username','$password','$level','$email')");

            header("location:index.php");
        }

        // if (isset($_POST['Submit'])) {
        //     $nama = $_POST['nama'];
        //     $username = $_POST['username'];
        //     $password = $_POST['password'];
        //     $level = $_POST['level'];
        //     $email = $_POST['email'];
        //     echo($password);

        //     $method = "AES-256-CBC";
        //     $key = "encryptionKey123";
        //     $options = 0;
        //     $iv = '1234567891011121';
        //     $encryptedPassword = openssl_encrypt($password, $method, $key, $options, $iv);
        //     include_once("koneksi.php");

        //     $result = mysqli_query($mysqli, "INSERT INTO user(nama, username, password, level, email)
        //             VALUES('$nama', '$username', '$encryptedPassword', '$level', '$email')");

        //     header("location:index.php");
        // }

        ?>

</body>
</html>
