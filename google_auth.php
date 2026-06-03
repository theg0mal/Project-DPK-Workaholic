<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

try {
    db_add_column_if_missing('users', 'google_uid', "VARCHAR(120) DEFAULT ''");
    db_add_column_if_missing('users', 'auth_provider', "VARCHAR(30) DEFAULT 'email'");
    db_add_column_if_missing('users', 'foto_profile', "VARCHAR(255) DEFAULT ''");

    $uid = trim($_POST['uid'] ?? '');
    $nama = trim($_POST['nama'] ?? 'Pengguna Google');
    $email = trim($_POST['email'] ?? '');
    $foto = trim($_POST['foto'] ?? '');

    if ($uid === '' || $email === '') {
        echo json_encode(["status" => "error", "pesan" => "Data akun Google tidak lengkap!"]);
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "pesan" => "Email Google tidak valid!"]);
        exit;
    }

    $stmt = mysqli_prepare($conn, "SELECT id, nama, foto_profile FROM users WHERE email=? OR google_uid=? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 'ss', $email, $uid);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($res);

    if ($user) {
        $id = (int)$user['id'];
        $namaFinal = trim($user['nama'] ?? '') !== '' ? $user['nama'] : $nama;
        $fotoFinal = trim($user['foto_profile'] ?? '') !== '' ? $user['foto_profile'] : $foto;
        $upd = mysqli_prepare($conn, "UPDATE users SET google_uid=?, auth_provider='google', nama=IF(nama IS NULL OR nama='', ?, nama), foto_profile=IF(foto_profile IS NULL OR foto_profile='', ?, foto_profile) WHERE id=?");
        mysqli_stmt_bind_param($upd, 'sssi', $uid, $nama, $foto, $id);
        mysqli_stmt_execute($upd);
    } else {
        $hash = password_hash(bin2hex(random_bytes(16)), PASSWORD_DEFAULT);
        $ins = mysqli_prepare($conn, "INSERT INTO users (nama, email, password, google_uid, auth_provider, foto_profile) VALUES (?, ?, ?, ?, 'google', ?)");
        mysqli_stmt_bind_param($ins, 'sssss', $nama, $email, $hash, $uid, $foto);
        if (!mysqli_stmt_execute($ins)) {
            echo json_encode(["status" => "error", "pesan" => "Gagal membuat akun Google: " . mysqli_stmt_error($ins)]);
            exit;
        }
        $id = mysqli_insert_id($conn);
        $namaFinal = $nama;
        $fotoFinal = $foto;
    }

    $_SESSION['user_id'] = $id;
    $_SESSION['user_nama'] = $namaFinal;
    $_SESSION['user_foto'] = $fotoFinal;
    $_SESSION['account_type'] = 'user';
    unset($_SESSION['company_id'], $_SESSION['company_nama']);

    echo json_encode(["status" => "ok", "pesan" => "Login Google berhasil!", "id" => $id, "nama" => $namaFinal, "foto" => $fotoFinal]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Login Google gagal: " . $e->getMessage()]);
}
?>