<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "login", "pesan" => "Belum login!"]);
    exit;
}

try {
    ensure_lamaran_columns();
    ensure_company_columns();
    db_add_column_if_missing('lowongan', 'deleted_at', 'DATETIME NULL');

    $userId = (int)$_SESSION['user_id'];
    $stmt = mysqli_prepare($conn, "SELECT l.id, l.lowongan_id, l.nama_lengkap, l.email, l.status, l.created_at,
            lo.judul, lo.lokasi, lo.tipe, lo.mode_kerja, lo.status AS lowongan_status,
            p.nama_perusahaan, p.logo AS perusahaan_logo
        FROM lamaran l
        JOIN lowongan lo ON lo.id = l.lowongan_id
        JOIN perusahaan p ON p.id = lo.perusahaan_id
        WHERE l.user_id=?
        ORDER BY l.created_at DESC, l.id DESC");
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    $items = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $items[] = [
            'id' => (int)$row['id'],
            'lowongan_id' => (int)$row['lowongan_id'],
            'title' => $row['judul'],
            'company' => $row['nama_perusahaan'],
            'location' => $row['lokasi'],
            'type' => $row['tipe'],
            'mode' => $row['mode_kerja'],
            'status' => $row['status'] ?: 'dikirim',
            'lowongan_status' => $row['lowongan_status'],
            'sent_at' => date('d M Y', strtotime($row['created_at'])),
            'sent_at_full' => $row['created_at'],
        ];
    }

    echo json_encode(["status" => "ok", "data" => $items]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal memuat riwayat lamaran: " . $e->getMessage()]);
}
?>