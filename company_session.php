<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['company_id'])) {
    echo json_encode(["status" => "error", "pesan" => "Belum login sebagai perusahaan!"]);
    exit;
}

try {
    ensure_company_columns();
    $id = (int)$_SESSION['company_id'];
    $stmt = mysqli_prepare($conn, "SELECT id, nama_perusahaan, email, industri, deskripsi, kota, website, logo, cari_kandidat, tagline, created_at FROM perusahaan WHERE id=? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $company = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

    if (!$company) {
        echo json_encode(["status" => "error", "pesan" => "Perusahaan tidak ditemukan!"]);
        exit;
    }

    $jobs = [];
    $jobStmt = mysqli_prepare($conn, "SELECT id, judul, lokasi, tipe, mode_kerja, pengalaman, gaji_min, gaji_max, status, created_at FROM lowongan WHERE perusahaan_id=? ORDER BY created_at DESC");
    mysqli_stmt_bind_param($jobStmt, 'i', $id);
    mysqli_stmt_execute($jobStmt);
    $res = mysqli_stmt_get_result($jobStmt);
    while ($row = mysqli_fetch_assoc($res)) {
        $jobs[] = $row;
    }

    echo json_encode(["status" => "ok", "data" => $company, "jobs" => $jobs]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal memuat dashboard: " . $e->getMessage()]);
}
?>