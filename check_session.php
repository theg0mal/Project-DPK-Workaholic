<?php
session_start();
header('Content-Type: application/json');
include 'koneksi.php';

// Cek session user biasa
if (!empty($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $stmt = mysqli_prepare($conn, "SELECT nama FROM users WHERE id = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    if ($row) {
        echo json_encode(['status' => 'ok', 'type' => 'user', 'nama' => $row['nama']]);
        exit;
    }
}

// Cek session perusahaan (session key: company_id)
if (!empty($_SESSION['company_id'])) {
    $id = $_SESSION['company_id'];
    $stmt = mysqli_prepare($conn, "SELECT nama_perusahaan FROM perusahaan WHERE id = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    if ($row) {
        echo json_encode(['status' => 'ok', 'type' => 'company', 'nama' => $row['nama_perusahaan']]);
        exit;
    }
}

echo json_encode(['status' => 'guest']);
mysqli_close($conn);