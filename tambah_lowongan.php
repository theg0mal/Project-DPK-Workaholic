<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['company_id'])) {
    echo json_encode(["status" => "login", "pesan" => "Hanya admin perusahaan yang bisa menambah lowongan!"]);
    exit;
}

$companyId = (int)$_SESSION['company_id'];
$judul = trim($_POST['judul'] ?? '');
$lokasi = trim($_POST['lokasi'] ?? '');
$tipe = trim($_POST['tipe'] ?? '');
$mode = trim($_POST['mode_kerja'] ?? '');
$pengalaman = trim($_POST['pengalaman'] ?? '');
$gajiMin = (int)($_POST['gaji_min'] ?? 0);
$gajiMax = (int)($_POST['gaji_max'] ?? 0);
$deskripsi = trim($_POST['deskripsi'] ?? '');
$kualifikasi = trim($_POST['kualifikasi'] ?? '');

if ($judul === '' || $lokasi === '' || $tipe === '' || $mode === '' || $deskripsi === '') {
    echo json_encode(["status" => "error", "pesan" => "Judul, lokasi, tipe, mode kerja, dan deskripsi wajib diisi!"]);
    exit;
}
if ($gajiMax > 0 && $gajiMin > $gajiMax) {
    echo json_encode(["status" => "error", "pesan" => "Gaji minimum tidak boleh lebih besar dari gaji maksimum!"]);
    exit;
}

$stmt = mysqli_prepare($conn, "INSERT INTO lowongan (perusahaan_id, judul, lokasi, tipe, mode_kerja, pengalaman, gaji_min, gaji_max, deskripsi, kualifikasi, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'aktif')");
mysqli_stmt_bind_param($stmt, 'isssssiiss', $companyId, $judul, $lokasi, $tipe, $mode, $pengalaman, $gajiMin, $gajiMax, $deskripsi, $kualifikasi);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["status" => "ok", "id" => mysqli_insert_id($conn), "pesan" => "Lowongan berhasil ditambahkan!"]);
} else {
    echo json_encode(["status" => "error", "pesan" => "Gagal menambah lowongan: " . mysqli_stmt_error($stmt)]);
}
?>