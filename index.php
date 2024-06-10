<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        }

        .login-button {
            margin-left: 130px;
        }

        .register-button {
            
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

<div class="login-form">
    <form action="login.php" method="post">
        <h2>Login</h2>
        <?php if(isset($_GET['pesan']) && $_GET['pesan'] == 'gagal') { ?>
            <div class="error">Login gagal! Username atau password salah.</div>
        <?php } ?>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Masukkan Username" required>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukkan Password" required>
        
        <button type="submit" class="login-button">Login</button>
        <button type="button" class="register-button" onclick="window.location.href='register_account.php'">Register</button>
    </form>
</div>

</body>
</html>
