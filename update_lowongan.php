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
    $judul = trim($_POST['judul'] ?? '');
    $lokasi = trim($_POST['lokasi'] ?? '');
    $tipe = trim($_POST['tipe'] ?? '');
    $mode = trim($_POST['mode_kerja'] ?? '');
    $pengalaman = trim($_POST['pengalaman'] ?? '');
    $gajiMin = (int)($_POST['gaji_min'] ?? 0);
    $gajiMax = (int)($_POST['gaji_max'] ?? 0);
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $kualifikasi = trim($_POST['kualifikasi'] ?? '');
    $status = trim($_POST['status'] ?? 'aktif');

    if ($id <= 0) {
        echo json_encode(["status" => "error", "pesan" => "Lowongan tidak valid!"]);
        exit;
    }
    if ($judul === '' || $lokasi === '' || $tipe === '' || $mode === '' || $deskripsi === '') {
        echo json_encode(["status" => "error", "pesan" => "Judul, lokasi, tipe, mode kerja, dan deskripsi wajib diisi!"]);
        exit;
    }
    if ($gajiMax > 0 && $gajiMin > $gajiMax) {
        echo json_encode(["status" => "error", "pesan" => "Gaji minimum tidak boleh lebih besar dari gaji maksimum!"]);
        exit;
    }
    if (!in_array($status, ['aktif', 'tutup'], true)) $status = 'aktif';

    $stmt = mysqli_prepare($conn, "UPDATE lowongan SET judul=?, lokasi=?, tipe=?, mode_kerja=?, pengalaman=?, gaji_min=?, gaji_max=?, deskripsi=?, kualifikasi=?, status=? WHERE id=? AND perusahaan_id=? AND deleted_at IS NULL");
    mysqli_stmt_bind_param($stmt, 'sssssiisssii', $judul, $lokasi, $tipe, $mode, $pengalaman, $gajiMin, $gajiMax, $deskripsi, $kualifikasi, $status, $id, $companyId);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) >= 0) {
        echo json_encode(["status" => "ok", "pesan" => "Lowongan berhasil diperbarui!"]);
    } else {
        echo json_encode(["status" => "error", "pesan" => "Gagal memperbarui lowongan!"]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal memperbarui lowongan: " . $e->getMessage()]);
}
?>