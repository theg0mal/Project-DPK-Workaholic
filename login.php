<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    echo json_encode(["status"=>"error","pesan"=>"Email dan password wajib diisi!"]);
    exit;
}

$emailSafe = mysqli_real_escape_string($conn, $email);
$result    = mysqli_query($conn, "SELECT * FROM users WHERE email='$emailSafe'");
$user      = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id']   = $user['id'];
    $_SESSION['user_nama'] = $user['nama'];
    $_SESSION['account_type'] = 'user';
    unset($_SESSION['company_id'], $_SESSION['company_nama']);
    echo json_encode(["status"=>"ok","nama"=>$user['nama'],"id"=>$user['id']]);
} else {
    echo json_encode(["status"=>"error","pesan"=>"Email atau password salah!"]);
}
?>
