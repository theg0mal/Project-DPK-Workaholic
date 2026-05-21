<?php
include 'koneksi.php';
header('Content-Type: application/json');

$email       = trim($_POST['email'] ?? '');
$newPassword = $_POST['new_password'] ?? '';
$konfirmasi  = $_POST['konfirmasi'] ?? '';

if (!$email || !$newPassword || !$konfirmasi) {
    echo json_encode(["status"=>"error","pesan"=>"Semua field wajib diisi!"]);
    exit;
}
if (strlen($newPassword) < 8) {
    echo json_encode(["status"=>"error","pesan"=>"Password minimal 8 karakter!"]);
    exit;
}
if ($newPassword !== $konfirmasi) {
    echo json_encode(["status"=>"error","pesan"=>"Password tidak cocok!"]);
    exit;
}

$emailSafe = mysqli_real_escape_string($conn, $email);
$cek = mysqli_query($conn, "SELECT id FROM users WHERE email='$emailSafe'");
if (mysqli_num_rows($cek) === 0) {
    echo json_encode(["status"=>"error","pesan"=>"Email tidak ditemukan!"]);
    exit;
}

$hash = password_hash($newPassword, PASSWORD_DEFAULT);
$sql  = "UPDATE users SET password='$hash' WHERE email='$emailSafe'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["status"=>"ok","pesan"=>"Password berhasil diubah! Silakan login."]);
} else {
    echo json_encode(["status"=>"error","pesan"=>"Gagal mengubah password."]);
}
?>
