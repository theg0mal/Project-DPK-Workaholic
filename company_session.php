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
    ensure_profile_columns();
    ensure_lamaran_columns();
    db_add_column_if_missing('lowongan', 'deleted_at', 'DATETIME NULL');

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
    $jobStmt = mysqli_prepare($conn, "SELECT id, judul, lokasi, tipe, mode_kerja, pengalaman, gaji_min, gaji_max, deskripsi, kualifikasi, status, created_at FROM lowongan WHERE perusahaan_id=? AND deleted_at IS NULL ORDER BY created_at DESC");
    mysqli_stmt_bind_param($jobStmt, 'i', $id);
    mysqli_stmt_execute($jobStmt);
    $res = mysqli_stmt_get_result($jobStmt);
    while ($row = mysqli_fetch_assoc($res)) {
        $jobs[] = $row;
    }

    $applications = [];
    $appSql = "SELECT
            l.id, l.user_id, l.lowongan_id, l.nama_lengkap, l.email, l.no_hp, l.kota,
            l.pendidikan, l.pengalaman, l.gaji_ekspektasi, l.cover_letter, l.status, l.created_at,
            l.cv_file, l.cv_original_name, l.cover_letter_file, l.cover_letter_original_name,
            lo.judul AS job_title, lo.lokasi AS job_location, lo.tipe AS job_type,
            u.nama AS user_nama, u.headline, u.lokasi AS user_lokasi, u.tentang, u.skills,
            u.pengalaman_kerja, u.pendidikan_info, u.linkedin, u.portfolio, u.foto_profile
        FROM lamaran l
        INNER JOIN lowongan lo ON lo.id = l.lowongan_id
        LEFT JOIN users u ON u.id = l.user_id
        WHERE lo.perusahaan_id = ?
        ORDER BY l.created_at DESC";
    $appStmt = mysqli_prepare($conn, $appSql);
    mysqli_stmt_bind_param($appStmt, 'i', $id);
    mysqli_stmt_execute($appStmt);
    $appRes = mysqli_stmt_get_result($appStmt);
    while ($row = mysqli_fetch_assoc($appRes)) {
        $applications[] = $row;
    }

    echo json_encode(["status" => "ok", "data" => $company, "jobs" => $jobs, "applications" => $applications, "application_count" => count($applications)]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal memuat dashboard: " . $e->getMessage()]);
}
?>