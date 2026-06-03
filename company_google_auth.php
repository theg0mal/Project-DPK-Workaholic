<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

try {
    ensure_company_columns();
    db_add_column_if_missing('perusahaan', 'google_uid', "VARCHAR(120) DEFAULT ''");
    db_add_column_if_missing('perusahaan', 'auth_provider', "VARCHAR(30) DEFAULT 'email'");

    $uid = trim($_POST['uid'] ?? '');
    $nama = trim($_POST['nama'] ?? 'Perusahaan Google');
    $email = trim($_POST['email'] ?? '');
    $foto = trim($_POST['foto'] ?? '');

    if ($uid === '' || $email === '') {
        echo json_encode(["status" => "error", "pesan" => "Data akun Google perusahaan tidak lengkap!"]);
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "pesan" => "Email Google tidak valid!"]);
        exit;
    }

    $stmt = mysqli_prepare($conn, "SELECT id, nama_perusahaan, logo FROM perusahaan WHERE email=? OR google_uid=? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 'ss', $email, $uid);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $company = mysqli_fetch_assoc($res);

    if ($company) {
        $id = (int)$company['id'];
        $namaFinal = $company['nama_perusahaan'] ?: $nama;
        $logoFinal = $company['logo'] ?: $foto;
        $upd = mysqli_prepare($conn, "UPDATE perusahaan SET google_uid=?, auth_provider='google', logo=IF(logo='', ?, logo) WHERE id=?");
        mysqli_stmt_bind_param($upd, 'ssi', $uid, $foto, $id);
        mysqli_stmt_execute($upd);
    } else {
        $hash = password_hash(bin2hex(random_bytes(16)), PASSWORD_DEFAULT);
        $industri = 'Belum diisi';
        $deskripsi = 'Company profile dibuat melalui Google Sign-In. Silakan lengkapi deskripsi perusahaan.';
        $kota = '';
        $website = '';
        $cari = 'Silakan lengkapi kandidat yang sedang dicari.';
        $ins = mysqli_prepare($conn, "INSERT INTO perusahaan (nama_perusahaan, email, password, industri, deskripsi, logo, kota, website, cari_kandidat, google_uid, auth_provider) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'google')");
        mysqli_stmt_bind_param($ins, 'ssssssssss', $nama, $email, $hash, $industri, $deskripsi, $foto, $kota, $website, $cari, $uid);
        if (!mysqli_stmt_execute($ins)) {
            echo json_encode(["status" => "error", "pesan" => "Gagal membuat akun perusahaan Google: " . mysqli_stmt_error($ins)]);
            exit;
        }
        $id = mysqli_insert_id($conn);
        $namaFinal = $nama;
        $logoFinal = $foto;
    }

    $_SESSION['company_id'] = $id;
    $_SESSION['company_nama'] = $namaFinal;
    $_SESSION['account_type'] = 'company';
    unset($_SESSION['user_id'], $_SESSION['user_nama']);

    echo json_encode(["status" => "ok", "pesan" => "Login Google perusahaan berhasil!", "id" => $id, "nama" => $namaFinal, "logo" => $logoFinal]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Login Google perusahaan gagal: " . $e->getMessage()]);
}
?>