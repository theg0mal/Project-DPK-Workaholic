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
    $res = mysqli_query($conn, "SELECT * FROM users WHERE id=$id LIMIT 1");
    $user = mysqli_fetch_assoc($res);

    if ($user) {
        unset($user['password']);

        $sessionNama = trim($_SESSION['user_nama'] ?? '');
        $sessionFoto = trim($_SESSION['user_foto'] ?? '');
        $needsSync = false;

        if (trim($user['nama'] ?? '') === '' && $sessionNama !== '') {
            $user['nama'] = $sessionNama;
            $needsSync = true;
        }
        if (trim($user['foto_profile'] ?? '') === '' && $sessionFoto !== '') {
            $user['foto_profile'] = $sessionFoto;
            $needsSync = true;
        }
        if ($needsSync) {
            $namaSync = $user['nama'] ?? '';
            $fotoSync = $user['foto_profile'] ?? '';
            $sync = mysqli_prepare($conn, "UPDATE users SET nama=IF(nama IS NULL OR nama='', ?, nama), foto_profile=IF(foto_profile IS NULL OR foto_profile='', ?, foto_profile) WHERE id=?");
            mysqli_stmt_bind_param($sync, 'ssi', $namaSync, $fotoSync, $id);
            mysqli_stmt_execute($sync);
        }

        if (empty($user['lokasi']) && !empty($user['kota'])) {
            $user['lokasi'] = $user['kota'];
        }
        echo json_encode(["status" => "ok", "data" => $user]);
    } else {
        echo json_encode(["status" => "error", "pesan" => "User tidak ditemukan!"]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal memuat profil: " . $e->getMessage()]);
}
?>
