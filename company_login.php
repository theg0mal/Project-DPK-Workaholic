<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    echo json_encode(["status" => "error", "pesan" => "Email dan password wajib diisi!"]);
    exit;
}

$stmt = mysqli_prepare($conn, "SELECT * FROM perusahaan WHERE email=? LIMIT 1");
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
$company = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if ($company && password_verify($password, $company['password'])) {
    $_SESSION['company_id'] = (int)$company['id'];
    $_SESSION['company_nama'] = $company['nama_perusahaan'];
    $_SESSION['account_type'] = 'company';
    unset($_SESSION['user_id'], $_SESSION['user_nama']);
    echo json_encode(["status" => "ok", "nama" => $company['nama_perusahaan'], "id" => $company['id']]);
} else {
    echo json_encode(["status" => "error", "pesan" => "Email atau password perusahaan salah!"]);
}
?>