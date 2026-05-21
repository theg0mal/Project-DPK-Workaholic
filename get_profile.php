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
