<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "login", "pesan" => "Harus login dulu!"]);
    exit;
}

try {
    ensure_sample_jobs();

    $user_id = (int) $_SESSION['user_id'];
    $lowongan_id = (int) ($_POST['lowongan_id'] ?? 0);
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $no_hp = trim($_POST['no_hp'] ?? '');
    $kota = trim($_POST['kota'] ?? '');
    $pendidikan = trim($_POST['pendidikan'] ?? '');
    $pengalaman = trim($_POST['pengalaman'] ?? '');
    $gaji = trim($_POST['gaji'] ?? '');
    $cover_letter = trim($_POST['cover_letter'] ?? '');

    if ($lowongan_id <= 0) {
        echo json_encode(["status" => "error", "pesan" => "Lowongan tidak valid!"]);
        exit;
    }
    if ($nama === '' || $email === '') {
        echo json_encode(["status" => "error", "pesan" => "Nama dan email wajib diisi!"]);
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "pesan" => "Format email tidak valid!"]);
        exit;
    }

    $cek = mysqli_prepare($conn, "SELECT id FROM lowongan WHERE id=? AND status='aktif' LIMIT 1");
    mysqli_stmt_bind_param($cek, 'i', $lowongan_id);
    mysqli_stmt_execute($cek);
    $res = mysqli_stmt_get_result($cek);
    if (mysqli_num_rows($res) === 0) {
        echo json_encode(["status" => "error", "pesan" => "Lowongan tidak ditemukan di database."]);
        exit;
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO lamaran (user_id, lowongan_id, nama_lengkap, email, no_hp, kota, pendidikan, pengalaman, gaji_ekspektasi, cover_letter) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'iissssssss', $user_id, $lowongan_id, $nama, $email, $no_hp, $kota, $pendidikan, $pengalaman, $gaji, $cover_letter);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(["status" => "ok", "pesan" => "Lamaran berhasil dikirim!"]);
    } else {
        echo json_encode(["status" => "error", "pesan" => "Gagal: " . mysqli_stmt_error($stmt)]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal mengirim lamaran: " . $e->getMessage()]);
}
?>
