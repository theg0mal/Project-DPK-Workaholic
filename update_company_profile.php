<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['company_id'])) {
    echo json_encode(["status" => "login", "pesan" => "Login sebagai perusahaan dulu!"]);
    exit;
}

try {
    ensure_company_columns();
    $id = (int)$_SESSION['company_id'];
    $nama = trim($_POST['nama_perusahaan'] ?? '');
    $industri = trim($_POST['industri'] ?? '');
    $kota = trim($_POST['kota'] ?? '');
    $website = trim($_POST['website'] ?? '');
    $tagline = trim($_POST['tagline'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $cari = trim($_POST['cari_kandidat'] ?? '');

    if ($nama === '') {
        echo json_encode(["status" => "error", "pesan" => "Nama perusahaan wajib diisi!"]);
        exit;
    }

    $stmt = mysqli_prepare($conn, "UPDATE perusahaan SET nama_perusahaan=?, industri=?, kota=?, website=?, tagline=?, deskripsi=?, cari_kandidat=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, 'sssssssi', $nama, $industri, $kota, $website, $tagline, $deskripsi, $cari, $id);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['company_nama'] = $nama;
        echo json_encode(["status" => "ok", "nama" => $nama, "pesan" => "Profil perusahaan berhasil disimpan!"]);
    } else {
        echo json_encode(["status" => "error", "pesan" => mysqli_stmt_error($stmt)]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal menyimpan: " . $e->getMessage()]);
}
?>