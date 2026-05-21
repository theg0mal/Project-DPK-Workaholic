<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

try {
    ensure_company_columns();

    $nama = trim($_POST['nama_perusahaan'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $industri = trim($_POST['industri'] ?? '');
    $kota = trim($_POST['kota'] ?? '');
    $website = trim($_POST['website'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $cari = trim($_POST['cari_kandidat'] ?? '');

    if ($nama === '' || $email === '' || $password === '') {
        echo json_encode(["status" => "error", "pesan" => "Nama perusahaan, email, dan password wajib diisi!"]);
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "pesan" => "Format email tidak valid!"]);
        exit;
    }
    if (strlen($password) < 8) {
        echo json_encode(["status" => "error", "pesan" => "Password minimal 8 karakter!"]);
        exit;
    }

    $cek = mysqli_prepare($conn, "SELECT id FROM perusahaan WHERE email=? LIMIT 1");
    mysqli_stmt_bind_param($cek, 's', $email);
    mysqli_stmt_execute($cek);
    if (mysqli_num_rows(mysqli_stmt_get_result($cek)) > 0) {
        echo json_encode(["status" => "error", "pesan" => "Email perusahaan sudah terdaftar!"]);
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($conn, "INSERT INTO perusahaan (nama_perusahaan, email, password, industri, deskripsi, kota, website, cari_kandidat) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssssssss', $nama, $email, $hash, $industri, $deskripsi, $kota, $website, $cari);

    if (mysqli_stmt_execute($stmt)) {
        $id = mysqli_insert_id($conn);
        $_SESSION['company_id'] = $id;
        $_SESSION['company_nama'] = $nama;
        $_SESSION['account_type'] = 'company';
        unset($_SESSION['user_id'], $_SESSION['user_nama']);
        echo json_encode(["status" => "ok", "nama" => $nama, "id" => $id]);
    } else {
        echo json_encode(["status" => "error", "pesan" => mysqli_stmt_error($stmt)]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal daftar perusahaan: " . $e->getMessage()]);
}
?>