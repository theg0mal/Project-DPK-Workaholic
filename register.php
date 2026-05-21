<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$nama     = trim($_POST['nama'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$nama || !$email || !$password) {
    echo json_encode(["status"=>"error","pesan"=>"Data tidak lengkap!"]);
    exit;
}
if (strlen($password) < 8) {
    echo json_encode(["status"=>"error","pesan"=>"Password minimal 8 karakter!"]);
    exit;
}

$emailSafe = mysqli_real_escape_string($conn, $email);
$cek = mysqli_query($conn, "SELECT id FROM users WHERE email='$emailSafe'");
if (mysqli_num_rows($cek) > 0) {
    echo json_encode(["status"=>"error","pesan"=>"Email sudah terdaftar!"]);
    exit;
}

$hash     = password_hash($password, PASSWORD_DEFAULT);
$namaSafe = mysqli_real_escape_string($conn, $nama);
$sql = "INSERT INTO users (nama, email, password) VALUES ('$namaSafe','$emailSafe','$hash')";

if (mysqli_query($conn, $sql)) {
    $id = mysqli_insert_id($conn);
    $_SESSION['user_id']   = $id;
    $_SESSION['user_nama'] = $nama;
    $_SESSION['account_type'] = 'user';
    unset($_SESSION['company_id'], $_SESSION['company_nama']);
    echo json_encode(["status"=>"ok","pesan"=>"Registrasi berhasil!","nama"=>$nama]);
} else {
    echo json_encode(["status"=>"error","pesan"=>"Gagal: ".mysqli_error($conn)]);
}
?>
