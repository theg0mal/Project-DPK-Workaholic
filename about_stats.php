<?php
require 'koneksi.php';
header('Content-Type: application/json');

$lowongan   = $conn->query("SELECT COUNT(*) FROM lowongan")->fetch_row()[0];
$users      = $conn->query("SELECT COUNT(*) FROM users")->fetch_row()[0];
$perusahaan = $conn->query("SELECT COUNT(*) FROM perusahaan")->fetch_row()[0];
$akun       = $users + $perusahaan;

echo json_encode([
  'status'     => 'ok',
  'lowongan'   => (int)$lowongan,
  'akun'       => (int)$akun,
  'perusahaan' => (int)$perusahaan,
]);
$conn->close();
