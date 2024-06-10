<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Use prepared statements to avoid SQL injection
$stmt = $mysqli->prepare("SELECT * FROM user WHERE (email=? OR username=?) AND password=?");
$stmt->bind_param('sss', $email, $username, $password);
$stmt->execute();
$result = $stmt->get_result();
$cek = $result->num_rows;

if($cek > 0){
    $data = $result->fetch_assoc();

    // Set session variables based on user level
    $_SESSION['email'] = $data['email'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['id_user'] = $data['id']; // Store user ID in session

    if($data['level'] == "admin"){
        header("location:admin/index.php");
    } else if($data['level'] == "user"){
        header("location:user/index.php");
    } else {
        header("location:index.php");
    }
} else {
    header("location:index.php?pesan=gagal");
}
?>

<!-- 

// session_start();
// include "koneksi.php";

// if(isset($_POST['submit'])) {
//     $username = $_POST['username'];
//     $password = md5($_POST['password']); // Menggunakan MD5 tidak disarankan untuk keamanan yang lebih baik.
//     $level = $_POST['level'];
    
//     // Ubah query untuk memperhitungkan level pengguna
//     $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    
//     if(mysqli_num_rows($result) > 0) {
        
//         $level = mysqli_fetch_assoc($result);
        
//         // Cek level pengguna
//         if ($level['level'] == 'admin') {
//             $_SESSION['username'] = $username;
//             $_SESSION['level'] = "admin";
//             header("Location: admin/index.php");
//             exit();
//         } elseif ($level['level'] == 'user') {
//             $_SESSION['username'] = $username;
//              $_SESSION['level'] = "user";
//             header("Location: user/index.php");
//             exit();
//         }
//     } else {
//         // Jika tidak ada hasil dari query, tampilkan pesan kesalahan
//         echo "<script>alert('Gagal Login'); history.go(-1);</script>";
//     }
// }

// include "koneksi.php";

// if(isset($_POST['submit'])) {
//     $username = $_POST['username'];
//     $password = md5($_POST['password']);
    
//     $query = mysqli_prepare($koneksi, "SELECT id, username, password, level FROM user WHERE username = ?");
//     mysqli_stmt_bind_param($query, "s", $username);
//     mysqli_stmt_execute($query);
//     mysqli_stmt_store_result($query);
    
//     // Periksa apakah ada hasil dari query
//     if(mysqli_stmt_num_rows($query) > 0) {
//         mysqli_stmt_bind_result($query, $id, $usernameDB, $passwordDB, $level);
//         mysqli_stmt_fetch($query);
        
//         // Periksa apakah kata sandi yang dimasukkan cocok dengan yang ada di database
//         if (password_verify($password, $passwordDB)) {
//             session_start();
//             $_SESSION['id'] = $id;
//             $_SESSION['username'] = $usernameDB;
//             $_SESSION['level'] = $level;
            
//             // Redirect ke halaman yang sesuai dengan level pengguna
//             if ($level == 'admin') {
//                 header("Location: admin/index.php");
//             } elseif ($level == 'user') {
//                 header("Location: user/index.php");
//             }
//             exit();
//         } else {
//             // Jika kata sandi tidak cocok
//             echo "<script>alert('Kata sandi salah'); history.go(-1);</script>";
//         }
//     } else {
//         // Jika username tidak ditemukan
//         echo "<script>alert('Username tidak ditemukan'); history.go(-1);</script>";
//     }
// }


// include "koneksi.php";

// if(isset($_POST['submit'])) {
//     $username = $_POST['username'];
//     $password = md5($_POST['password']);
    
//     $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    
//     if(mysqli_num_rows($result) > 0) {
    
//         $user = mysqli_fetch_assoc($result);
        
       
//         if ($user['level'] == 'admin') {
//             header("Location:admin/index.php");
//             exit();
//         } elseif ($user['level'] == 'user') {
//             header("Location:user/index.php");
//             exit();
//         }
//     } else {
//         echo "<script>alert('Gagal Login'); history.go(-1);</script>";
//     }
// }


// session_start();
// include 'koneksi.php';

// $username = $_POST['username'];
// $password = md5($_POST['password']);

// $cekdb = mysqli_query($koneksi, "SELECT * FROM user WHERE username ='$username'");
// $hitung = mysqli_num_rows($cekdb);

// if ($hitung > 0) {
//     $data = mysqli_fetch_assoc($cekdb);
//     $passwordsekarang = $data['password'];

//     if (password_verify($password, $passwordsekarang)) {
//         if ($data['level'] == "admin") {
//             $_SESSION['username'] = $username;
//             $_SESSION['LEVEL'] = "admin";
//             header("location:admin/index.php");
//             exit();
//         } elseif ($data['level'] == "user") {
//             $_SESSION['username'] = $username;
//             $_SESSION['LEVEL'] = "user";
//             header("location:user/index.php");
//             exit();
//         }
//     } else {
//         header("location:halaman.php?pesan=gagal");
//         exit();
//     }
// } else {
//     header("location:halaman.php?pesan=gagal");
//     exit();
// }

// session_start();
// include 'koneksi.php';

// $username = $_POST['username'];
// $password = $_POST['password'];

// $cekdb = mysqli_query($mysqli,"SELECT * FROM username ='$username'");
//     $hitung = mysqli_num_rows($cekdb);
//     $pw = mysqli_fetch_array($cekdb);
//     $passwordsekarang = $pw['password'];

// if($cek > 0)

//     $data = mysqli_fetch_assoc($cekdb);

//     // cek jika user login sebagai admin
//     if($data['level']=="admin" password_verify($password,$passwordsekarang)){

//         // buat session login dan username
//         $_SESSION['username'] = $username;
//         $_SESSION['LEVEL'] = "admin";

//         // alihkan ke halaman daashboard admin
//         header("location:admin/index.php");

//     // cek jika user login sebagai user
//     }else if($data['level']=="user" password_verify($password,$passwordsekarang)){

//         // buat session login dan username
//         $_SESSION['username'] = $username;
//         $_SESSION['LEVEL'] = "user";
//         // alihkan ke halaman daashboard user
//         header("location:user/index.php");

//     }else{
//     header("location:halaman.php?pesan=gagal");
// }

// session_start();
// include 'koneksi.php';

// $username = $_POST['username'];
// $password = $_POST['password'];

// $cekdb = mysqli_query($mysqli, "SELECT * FROM user WHERE username ='$username'");
// $hitung = mysqli_num_rows($cekdb);

// if ($hitung > 0) {
//     $data = mysqli_fetch_assoc($cekdb);
//     $passwordsekarang = $data['password'];

//     if (password_verify($password, $passwordsekarang)) {
//         // Sesuaikan dengan level yang ada di database Anda
//         if ($data['level'] == "admin") {
//             $_SESSION['username'] = $username;
//             $_SESSION['level'] = "admin";
//             header("location:admin/index.php");
//             exit();
//         } elseif ($data['level'] == "user") {
//             $_SESSION['username'] = $username;
//             $_SESSION['level'] = "user";
//             header("location:user/index.php");
//             exit();
//         }
//     } else {
//         header("location:halaman.php?pesan=gagal");
//         exit();
//     }
// } else {
//     header("location:halaman.php?pesan=gagal");
//     exit();
// }

// session_start();
// include 'koneksi.php';

// $username = $_POST['username'];
// $password = md5($_POST['password']);

// // Ambil data pengguna dari database berdasarkan nama pengguna
// $login = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username'");
// $cek = mysqli_num_rows($login);

// if ($cek > 0) {
//     $data = mysqli_fetch_assoc($login);
    
//     // Verifikasi password yang dimasukkan dengan password yang disimpan dalam database
//     if (password_verify($password, $data['password'])) {
//         // Password cocok, set session login dan level pengguna
//         $_SESSION['username'] = $username;
//         $_SESSION['level'] = $data['level'];

//         // Alihkan ke halaman dashboard sesuai level pengguna
//         if ($data['level'] == "admin") {
//             header("location:admin/index.php");
//         } else if ($data['level'] == "user") {
//             header("location:user/index.php");
//         }
//     } else {
//         // Password tidak cocok, alihkan kembali ke halaman login
//         header("location:halaman.php?pesan=gagal");
//     }
// } else {
//     // Pengguna tidak ditemukan di database, alihkan kembali ke halaman login
//     header("location:halaman.php?pesan=gagal");
// }
// session_start();
// include 'koneksi.php';

// $email = $_POST['email'];
// $username = $_POST['username'];
// $password = $_POST['password'];

// $login = mysqli_query($mysqli,"select * from user where email='$email' or username='$username' and password='$password'");
// $cek = mysqli_num_rows($login);

// if($cek > 0){

//     $data = mysqli_fetch_assoc($login);

//     // cek jika user login sebagai admin
//     if($data['level']=="admin"){
//         // buat session login dan username
//         $_SESSION['email'] = $email;
//         $_SESSION['username'] = $username;
//         $_SESSION['level'] = "admin";
//         // alihkan ke halaman daashboard admin
//         header("location:admin/index.php");

//     // cek jika user login sebagai user
//     }else if($data['level']=="user"){
//         // buat session login dan username
//         $_SESSION['email'] = $email;
//         $_SESSION['username'] = $username;
//         $_SESSION['level'] = "user";
//         // alihkan ke halaman daashboard user
//         header("location:user/index.php");

//     }else{
//         // alihkan ke halaman login kembali
//         header("location:index.php");
//     }
// }else{
//     header("location:index.php?pesan=gagal");
// }

//   -->