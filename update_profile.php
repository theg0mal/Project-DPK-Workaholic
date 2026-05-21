<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "pesan" => "Belum login!"]);
    exit;
}

try {
    ensure_profile_columns();

    $id = (int) $_SESSION['user_id'];
    $nama = trim($_POST['nama'] ?? '');
    if ($nama === '') {
        echo json_encode(["status" => "error", "pesan" => "Nama tidak boleh kosong!"]);
        exit;
    }

    $stmt = mysqli_prepare($conn, "UPDATE users SET nama=?, headline=?, lokasi=?, kota=?, tentang=?, skills=?, pengalaman_kerja=?, pendidikan_info=?, linkedin=?, portfolio=?, no_hp=? WHERE id=?");
    $headline = $_POST['headline'] ?? '';
    $lokasi = $_POST['lokasi'] ?? '';
    $kota = $lokasi;
    $tentang = $_POST['tentang'] ?? '';
    $skills = $_POST['skills'] ?? '';
    $pengalaman = $_POST['pengalaman'] ?? '';
    $pendidikan = $_POST['pendidikan'] ?? '';
    $linkedin = $_POST['linkedin'] ?? '';
    $portfolio = $_POST['portfolio'] ?? '';
    $no_hp = $_POST['no_hp'] ?? '';

    mysqli_stmt_bind_param($stmt, 'sssssssssssi', $nama, $headline, $lokasi, $kota, $tentang, $skills, $pengalaman, $pendidikan, $linkedin, $portfolio, $no_hp, $id);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['user_nama'] = $nama;
        echo json_encode(["status" => "ok", "pesan" => "Profil berhasil disimpan!", "nama" => $nama]);
    } else {
        echo json_encode(["status" => "error", "pesan" => mysqli_stmt_error($stmt)]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal menyimpan profil: " . $e->getMessage()]);
}
?>
