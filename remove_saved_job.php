<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "login", "pesan" => "Belum login!"]);
    exit;
}

try {
    ensure_saved_jobs_table();
    $userId = (int)$_SESSION['user_id'];
    $lowonganId = (int)($_POST['lowongan_id'] ?? 0);
    if ($lowonganId <= 0) {
        echo json_encode(["status" => "error", "pesan" => "Lowongan tidak valid!"]);
        exit;
    }

    $stmt = mysqli_prepare($conn, "DELETE FROM saved_jobs WHERE user_id=? AND lowongan_id=?");
    mysqli_stmt_bind_param($stmt, 'ii', $userId, $lowonganId);
    mysqli_stmt_execute($stmt);

    echo json_encode(["status" => "ok", "pesan" => "Lowongan dihapus dari pantauan.", "lowongan_id" => $lowonganId]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal menghapus lowongan tersimpan: " . $e->getMessage()]);
}
?>