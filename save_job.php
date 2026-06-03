<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "login", "pesan" => "Login dulu untuk menyimpan lowongan!"]);
    exit;
}

try {
    ensure_saved_jobs_table();
    db_add_column_if_missing('lowongan', 'deleted_at', 'DATETIME NULL');

    $userId = (int)$_SESSION['user_id'];
    $lowonganId = (int)($_POST['lowongan_id'] ?? 0);
    if ($lowonganId <= 0) {
        echo json_encode(["status" => "error", "pesan" => "Lowongan tidak valid!"]);
        exit;
    }

    $check = mysqli_prepare($conn, "SELECT id FROM lowongan WHERE id=? AND status='aktif' AND deleted_at IS NULL LIMIT 1");
    mysqli_stmt_bind_param($check, 'i', $lowonganId);
    mysqli_stmt_execute($check);
    $res = mysqli_stmt_get_result($check);
    if (!mysqli_fetch_assoc($res)) {
        echo json_encode(["status" => "error", "pesan" => "Lowongan tidak ditemukan atau sudah ditutup!"]);
        exit;
    }

    $stmt = mysqli_prepare($conn, "INSERT IGNORE INTO saved_jobs (user_id, lowongan_id) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, 'ii', $userId, $lowonganId);
    mysqli_stmt_execute($stmt);

    echo json_encode(["status" => "ok", "pesan" => "Lowongan berhasil disimpan ke profilmu.", "lowongan_id" => $lowonganId]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal menyimpan lowongan: " . $e->getMessage()]);
}
?>