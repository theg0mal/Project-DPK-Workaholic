<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "login", "pesan" => "Login dulu untuk upload foto profil!"]);
    exit;
}

try {
    ensure_profile_columns();
    if (!isset($_FILES['foto']) || $_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(["status" => "error", "pesan" => "Pilih file foto terlebih dulu!"]);
        exit;
    }

    $file = $_FILES['foto'];
    if ($file['size'] > 2 * 1024 * 1024) {
        echo json_encode(["status" => "error", "pesan" => "Ukuran foto maksimal 2 MB!"]);
        exit;
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
    if (!isset($allowed[$mime])) {
        echo json_encode(["status" => "error", "pesan" => "Format foto harus JPG, PNG, atau WEBP!"]);
        exit;
    }

    $uploadDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'profiles';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true);
    }

    $id = (int)$_SESSION['user_id'];
    $filename = 'user_' . $id . '_' . time() . '.' . $allowed[$mime];
    $target = $uploadDir . DIRECTORY_SEPARATOR . $filename;
    if (!move_uploaded_file($file['tmp_name'], $target)) {
        echo json_encode(["status" => "error", "pesan" => "Gagal menyimpan foto!"]);
        exit;
    }

    $path = 'uploads/profiles/' . $filename;
    $stmt = mysqli_prepare($conn, "UPDATE users SET foto_profile=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, 'si', $path, $id);
    mysqli_stmt_execute($stmt);

    echo json_encode(["status" => "ok", "pesan" => "Foto profil berhasil diperbarui!", "foto" => $path]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Upload gagal: " . $e->getMessage()]);
}
?>