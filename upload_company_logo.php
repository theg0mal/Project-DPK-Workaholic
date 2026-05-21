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
    if (!isset($_FILES['logo']) || $_FILES['logo']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(["status" => "error", "pesan" => "Pilih file logo terlebih dulu!"]);
        exit;
    }

    $file = $_FILES['logo'];
    if ($file['size'] > 2 * 1024 * 1024) {
        echo json_encode(["status" => "error", "pesan" => "Ukuran logo maksimal 2 MB!"]);
        exit;
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
    if (!isset($allowed[$mime])) {
        echo json_encode(["status" => "error", "pesan" => "Format logo harus JPG, PNG, atau WEBP!"]);
        exit;
    }

    $uploadDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'logos';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true);
    }

    $id = (int)$_SESSION['company_id'];
    $filename = 'company_' . $id . '_' . time() . '.' . $allowed[$mime];
    $target = $uploadDir . DIRECTORY_SEPARATOR . $filename;
    if (!move_uploaded_file($file['tmp_name'], $target)) {
        echo json_encode(["status" => "error", "pesan" => "Gagal menyimpan logo!"]);
        exit;
    }

    $path = 'uploads/logos/' . $filename;
    $stmt = mysqli_prepare($conn, "UPDATE perusahaan SET logo=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, 'si', $path, $id);
    mysqli_stmt_execute($stmt);

    echo json_encode(["status" => "ok", "pesan" => "Logo perusahaan berhasil diperbarui!", "logo" => $path]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Upload gagal: " . $e->getMessage()]);
}
?>