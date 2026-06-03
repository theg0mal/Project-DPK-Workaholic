<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['company_id'])) {
    echo json_encode(["status" => "login", "pesan" => "Login sebagai admin perusahaan dulu!"]);
    exit;
}

try {
    db_add_column_if_missing('lowongan', 'deleted_at', 'DATETIME NULL');
    $companyId = (int)$_SESSION['company_id'];
    $id = (int)($_POST['id'] ?? 0);
    if ($id <= 0) {
        echo json_encode(["status" => "error", "pesan" => "Lowongan tidak valid!"]);
        exit;
    }

    $stmt = mysqli_prepare($conn, "UPDATE lowongan SET deleted_at=NOW(), status='tutup' WHERE id=? AND perusahaan_id=? AND deleted_at IS NULL");
    mysqli_stmt_bind_param($stmt, 'ii', $id, $companyId);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo json_encode(["status" => "ok", "pesan" => "Lowongan berhasil dihapus dari dashboard dan daftar publik."]);
    } else {
        echo json_encode(["status" => "error", "pesan" => "Lowongan tidak ditemukan atau bukan milik perusahaan ini."]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal menghapus lowongan: " . $e->getMessage()]);
}
?>